<?php

namespace system\components;

class App {

    use Singleton; // singleton trait

    public $config; // app global configuration
    public $request; // GET & POST handler

    /**
     * @var \PDOStatement
     */
    public $connection; // database PDO object

    public $controller; // current controller object
    public $action; // requested action name

    public static $current; // singleton instance

    /**
     * App constructor (singleton)
     * @param array $config
     */
    public function __construct(array $config) {
        if (empty(static::$current)) {
            $this->config = $config;
            static::$current = $this;
        } else {
            return static::$current;
        }
    }

    /**
     * Start main loop
     */
    public function start() {
        $this->connection = $this->setConnection();
        $this->route($_GET);

        //var_dump(App::$current);
        //var_dump($_GET);
    }

    private function route($request) {
        $router = new Router($request);

        $this->controller = $router->getController();
        $this->action = $router->getAction();

        try {
            ($this->controller)->{$this->action}();
        } catch (\Exception $error) {
            echo $error->getMessage();die();
        }
    }

    /**
     * Creates DB connection with PDO
     */
    private function setConnection() {
        $settings = $this->config['db'];

        $host = $settings['host'];
        $user = $settings['user'];
        $password = $settings['password'];
        $database = $settings['database'];

        try {
            $dbh = new \PDO("mysql:host={$host};dbname={$database}", $user, $password);
            return $dbh;
        } catch (\PDOException $error) {
            echo $error->getMessage();
            die();
        }
    }

}

<?php

namespace system\components;

class Router {

    private $_data;
    private $controllerName = 'site';
    private $actionName = 'index';

    public function __construct($request) {
        $this->_data = $request;
    }

    public function getController() {
        if (isset($this->_data['route'])) {
            $items = explode('/', $this->_data['route']);

            $this->controllerName = empty($items[0]) ? 'site' : $items[0];
            $this->actionName = isset($items[1]) ? $items[1] : 'index';
        }

        $c_parts = explode('-', $this->controllerName);

        for ($i = 0; $i < count($c_parts); $i++) {
            $c_parts[$i] = ucfirst($c_parts[$i]);
        }

        $clearController = implode('', $c_parts);
        $controllerPath = ROOT."/app/controllers/{$clearController}Controller.php";

        if (file_exists($controllerPath)) {
            try {
                require_once $controllerPath;

                $controller = "app\controllers\\".$clearController."Controller";
                return new $controller($this->controllerName);
            } catch (\Exception $error) {
                echo $error->getMessage(); die();
            }
        } else {
            echo "Class '{$clearController}' not found!"; die();
        }
    }

    public function getAction() {
        $clearAction = ucfirst($this->actionName);
        return "action{$clearAction}";
    }

}

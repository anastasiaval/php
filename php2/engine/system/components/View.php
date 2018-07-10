<?php

namespace system\components;

use Twig_Loader_Filesystem;
use Twig_Environment;

class View {

    public $layout;
    public $view;

    private $_render;

    public function __construct($controllerName, $layout, $view) {
        $this->layout = $layout;
        $this->view = "{$controllerName}/{$view}";
    }

    public function render(array $params) {
        // return Twig rendered html
        $loader = new Twig_Loader_Filesystem(ROOT.'/app/views');

        $this->_render = new Twig_Environment($loader, array(
            'cache' => App::$current->config['components']['twig']['cache'],
        ));

        $viewFile = $this->_render->render("{$this->view}.twig", $params);
        $layoutFile = $this->_render->render("layouts/{$this->layout}.twig", [
            'content' => $viewFile,
        ]);

        echo $layoutFile;
    }

}

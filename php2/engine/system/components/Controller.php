<?php

namespace system\components;

abstract class Controller {

    public $name;
    public $layout = 'main';

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function render(string $view, array $params = []) {
        $view = new View(
            $this->name, //controller name
            $this->layout, //main layout
            $view //view name
        );

        $view->render($params);
    }

}

<?php

trait Singleton {
    private static $instance;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

class SingletonPattern {
    use Singleton;
}


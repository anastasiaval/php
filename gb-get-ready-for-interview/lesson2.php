1. Какие типы паттернов проектирования существуют?

Порождающие (Creational):
    Фабричный метод (Factory Method),
    Абстрактная фабрика (Abstract Factory),
    Строитель (Builder),
    Прототип (Prototype),
    Одиночка (Singleton),
    Object Pool

Структурные (Structural ):
    Адаптер (Adapter),
    Мост (Bridge),
    Компоновщик (Composite),
    Декоратор (Decorator),
    Фасад (Facade),
    Легковес (Flyweight),
    Заместитель (Proxy),
    Private Class Data

Поведенческие (Behavioral ):
    Цепочка обязанностей (Chain of Responsibility),
    Команда (Command),
    Итератор (Iterator),
    Посредник (Mediator),
    Снимок (Memento),
    Наблюдатель (Observer),
    Состояние (State),
    Стратегия (Strategy),
    Шаблонный метод (Template Method),
    Посетитель (Visitor)
    Interpreter,
    Null Object

2. Как можно улучшить Singleton при помощи trait-ов?

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

class First extends SingletonPattern {
    use Singleton;
    public $name = 'First';
    public function showMe() {
        echo '<h2>'.$this->name.'</h2><pre>';
        print_r($this);
        echo '</pre>';
    }
}
class Second extends First {
    use Singleton;
    public $name = 'Second';
}

$firstClass1 = First::getInstance();
$firstClass1->showMe();
$firstClass2 = First::getInstance();
$firstClass2->showMe();
$secondClass1 = Second::getInstance();
$secondClass1->showMe();
$secondClass2 = Second::getInstance();
$secondClass2->showMe();

?>

3. Как реализуется паттерн Фабричный метод? В чем его отличие от паттерна Фабрика?

Фабричный метод - это один метод, который может создать один тип объекта.
В абстрактной фабрике несколько методов для разных типов объектов.

4. Объясните назначение и применение магических методов __get, __set, __isset, __unset, __call и __callStatic.
Когда, как и почему их стоит использовать (или нет)?

__get - для чтения данных из любых не публичных свойств
__set - чтобы установить значение свойства, которое не является публичным
__isset - проверка свойства на существование
__unset - очистить значение публичного свойства
__call - перехватывает обращение к несуществующему методу в контексте объекта
__callStatic - перехватывает обращение к несуществующему методу в статическом контексте

5. Опишите несколько структур данных из стандартной библиотеки PHP (SPL). Приведите примеры использования.

<?php
//Класс SplStack предоставляет основные функциональные возможности стека с использованием двусвязного списка
// Работает по принципу last in first out
$stack = new SplStack;
$stack->push('one'); // добавление элементов
$stack->push('two');
$stack->push('three');
$stack->count(); // количество элементов
$stack->pop(); // удаление узла с конца списка (three)

// Класс SplQueue предоставляет основные функциональные возможности очереди с использованием двусвязного списка.
// Работает по принципу first in first out
$queue = new SplQueue();
$queue->enqueue(1); // добавление элемента в очередь
$queue->enqueue(2);
$queue->enqueue(3);
$queue->top();// узел в конце очереди (3)
$queue->dequeue(); // удаление элемента из начала очереди (1)


// Класс SplMaxHeap предоставляет основные функциональные возможности кучи, сохраняя максимальный элемент наверху.
$heapMax = new SplMaxHeap();
$heapMax->insert('123'); // добавляет элемент в кучу и пересортирует её
$heapMax->insert('456');
$heapMax->insert('789');
$heapMax->extract(); // удаление элемента (789)

// Класс SplMinHeap предоставляет основные функциональные возможности кучи, сохраняя минимальный элемент наверху.
$heapMin = new SplMinHeap();
$heapMin->insert('123'); // добавляет элемент в кучу и пересортирует её
$heapMin->insert('456');
$heapMin->insert('789');
$heapMin->extract(); // удаление элемента (123)

?>

6. Найдите все ошибки в коде:

<?php

interface MyInt {
    public function funcI();
    private function funcP(); //public
}

class A {
    protected prop1; // public $prop1
    private prop2; // public $prop2

    function funcA(){
        return $this->prop2;
    }
}

class B extends A {
    function funcB(){
        return $this->prop1;
    }
}

class C extends B implements MyInt {
    function funcB(){
        return $this->prop1;
    }

    private function funcP(){ //public
        return 123;
    }

//    public function funcI(){
//        return 123;
//    }
}

$b = new B();
$b->funcA();// свойство $prop2 не определено
$c = new C();
$c->funcI();


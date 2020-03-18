<?php
//class App отслеживает URL, в зависимости от URL показываются страницы. Если есть запрашиваемый контроллер,
// то показываем страницу соответсвующую контроллеру пользователю, а если нет то показывается главная страница.

class App
{

    protected $controller;
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl(); // массив содержащий данные URL  ['Home', 'index', ''] - главная страница

        if($url === NULL) {
            $this->controller = 'Home';
        } else{
            $this->controller='NotFound';
        }

        if (file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        require_once 'app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller; //создаем объект на основе класса controller

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) { //существует ли данный метод в объекте controller
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [0]; // если массив не пустой, то берем значения массива,
         //в которм индексы начинаются с 0



        call_user_func_array([$this->controller, $this->method], $this->params);  //вызывает функцию внутри класса
        //можно передать параметры

    }

    // Получаем данные из URL
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(
                rtrim($_GET['url'], '/'),
                FILTER_SANITIZE_STRING
            ));
        }
    }
}
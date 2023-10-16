<?php

namespace src\Controllers;

use src\Models\Articles\Article;
use src\View\View;
use src\Services\Db;
class MainController
{
    private $view;

    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . "/../../templates");
        $this->db = Db::getInstance();
    }

    public function main()
    {
        $articles = Article::findAll();

        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php', ['name' => $name]);
    }
}
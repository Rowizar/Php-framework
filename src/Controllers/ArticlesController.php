<?php

namespace src\Controllers;

use src\Models\Comments\Comment;
use src\Models\Users\User;
use src\Models\Articles\Article;
use src\View\View;
class ArticlesController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../templates');
    }

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);
        $comments = Comment::findAll();

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('articles/view.php', ['article' => $article, 'comments' => $comments]);
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);

            return;
        }

        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        $article->save();
    }

    public function add(): void
    {
        $author = User::getById(2);
        $article = new Article();

        $article->setAuthor($author);

        $article->setName('Новое название статьи');

        $article->setText('Новый текст статьи');

        $article->save();
    }

    public function delete(int $id)
    {
        $article = Article::getById($id);

        $article->delete();
    }
}
<?php

namespace src\Controllers;

use src\Models\Comments\Comment;
use src\Models\Users\User;
use src\View\View;
use src\Models\Articles\Article;
class CommentsController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../templates');
    }

    public function view(int $commentId)
    {
        $article = Article::getById($commentId);
        $comments = Comment::findAll();


        if ($comments === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $this->view->renderHtml('comments/view.php', ['article' => $article,'comments' => $comments]);
    }

    public function edit(int $commentId): void
    {
        $comment = Comment::getById($commentId);
        var_dump($comment);
        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);

            return;
        }

        $comment->setText($_POST['text']);

        $comment->save();

        header("Location: http://localhost/Php-framework/www/articles/comments/{$comment->getArticleId()}");
        die();
    }


    public function add($id): void
    {
        $author = User::getById($id);

        $pattern = '~articles/comments/(\d+)/add$~';
        preg_match($pattern, $_GET['route'], $matches);

        $article = Article::getById($matches[1]);
        $comment = new Comment();

        $comment->setAuthor($author);
        $comment->setArticle($article);
        $comment->setText($_POST["text"]);

        $comment->save();

        header("Location: http://localhost/Php-framework/www/articles/comments/{$matches[1]}");

        die();
    }
}
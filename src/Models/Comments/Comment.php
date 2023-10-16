<?php

namespace src\Models\Comments;

use src\Models\Users\User;
use src\Models\ActiveRecordEntity;
use src\Models\Articles\Article;
class Comment extends ActiveRecordEntity
{
    protected $author_id;
    protected $articles_id;
    protected $text;
    protected $date;

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setAuthor(User $author): void
    {
        $this->author_id = $author->getId();
    }

    public function setArticle(Article $article): void
    {
        $this->articles_id = $article->getId();
    }

    public function getArticleId(): int
    {
        return $this->articles_id;
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }
}
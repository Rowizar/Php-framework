<?php include __DIR__ . '/../header.php'; ?>

<h1><?= $article->getName() ?></h1>
<p><?= $article->getText() ?></p>
<p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
<?php
$pattern = '~articles/(\d+)~';
preg_match($pattern, $_GET['route'], $matches);
?>
<?php foreach ($comments as $comment): ?>
    <?php if ($comment->getArticleId() == $matches[1]): ?>
        <p>Комментарий: <?= $comment->getText() ?></p>
    <?php endif; ?>
<?php endforeach; ?>
<div style="text-align: center;">
    <h1>Добавить комментарий</h1>
    <form action="comments/<?= $article->getId() ?>/add" method="post">
        <label>Текст <input type="text" name="text"></label>

        <br><br>

        <input type="submit" value="Добавить">
    </form>
</div>

<?php include __DIR__ . '/../footer.php'; ?>

<?php

return [
    '~^$~' => [src\Controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [src\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [src\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [src\Controllers\ArticlesController::class, 'add'],
    '~articles/delete/(\d+)~' => [src\Controllers\ArticlesController::class, 'delete'],
    '~articles/comments/(\d+)$~' => [src\Controllers\CommentsController::class, 'view'],
    '~articles/comments/(\d+)/add$~' => [src\Controllers\CommentsController::class, 'add'],
    '~articles/comments/(\d+)/edit$~' => [src\Controllers\CommentsController::class, 'edit'],
];

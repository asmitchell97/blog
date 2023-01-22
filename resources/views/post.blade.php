<!DOCTYPE html>
<link rel="stylesheet" href="/css/app.css">

<h1>
    <?= $post->getTitle(); ?>
</h1>
<h2>
    <?= $post->getExcerpt(); ?>
</h2>
<p>
    <?= $post->getBody(); ?>
</p>

<a href="/posts">Back to posts</a>
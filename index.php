<?php
    include_once "init.php";

    if (isset($_POST['submit'])) {
        $postName = $_POST['post-name'];
        $postText = $_POST['post'];
        $author = $_POST['author'];

        $post->createPost($postName, $postText, $author);
    }
?>

<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Diskuzní fórum</title>
</head>
<body>
    <header>
        <form method="post">
            <label for="post-name">Název příspěvku</label>
            <input type="text" id="post-name" name="post-name">

            <label for="post">Příspěvek</label>
            <textarea name="post" id="post" cols="30" rows="10"></textarea>

            <label for="author">Přezdívka uživatele</label>
            <input type="text" id="author" name="author">

            <input type="submit" value="Odeslat" name="submit" id="submit">
        </form>
    </header>
    <main>
        <?php
            $allPosts = $post->getAllPosts();
        ?>

        <?php foreach ($allPosts as $post): ?>
            <article>
                <h3><?= $post->post_name ?></h3>
                <p>'<?= $post->post ?></p>
                <div><?= $post->author ?> - <?= date_format(new DateTime($post->created), "d.m.Y H:i") ?></div>
            </article>
        <?php endforeach; ?>
    </main>
</body>
</html>
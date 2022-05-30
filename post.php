<!DOCTYPE html>
<html lang="ua">

<head>
    <?php
    require_once "lib/mysql.php";
    $sql = 'SELECT * FROM article WHERE `id` = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$_GET['id']]);

    $article = $query->fetch(PDO::FETCH_OBJ);

    $website_title = $article->title;
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
        <?php
        echo "<div class='post'>
                <h1>" . $article->title . "</h1>
                <p>" . $article->anons . "</p><br>
                <p>" . $article->full_text . "</p>
                <p class='avtor'>Автор: <span>" . $article->avtor . "</span></p><br>
                <p><b>Дата і час публікації:</b> " . date("Y.m.d H:i:s", $article->date) . "</p>
            </div>";
        ?>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
</body>

</html>
<?php
if (!isset($_COOKIE['login'])) {
    header('Location: /register.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    $website_title = "Додати статтю";
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
        <h1>Додати статтю</h1>
        <form>
            <label for="title">Назва статті</label>
            <input type="text" name="title" id="title">

            <label for="anons">Анонс статті</label>
            <textarea name="anons" id="anons"></textarea>

            <label for="sometext">Основний текст</label>
            <textarea name="sometext" id="sometext"></textarea>

            <div class="error-mess" id="error-block"></div>

            <button type="button" id="add_article">Додати</button>
        </form>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    <script>
        $('#add_article').click(function() {
            let title = $('#title').val();
            let anons = $('#anons').val();
            let sometext = $('#sometext').val();

            $.ajax({
                url: 'ajax/add_article.php',
                type: 'POST',
                cache: false,
                data: {
                    'title': title,
                    'anons': anons,
                    'sometext': sometext
                },
                dataType: 'html',
                success: function(data) {
                    if (data === "Done") {
                        $("#add_article").text("Все готово");
                        $("#error-block").hide();
                        $('#title').val("");
                        $('#anons').val("");
                        $('#sometext').val("");
                    } else {
                        $("#error-block").show();
                        $("#error-block").text(data);
                    }
                }
            });
        });
    </script>
</body>

</html>
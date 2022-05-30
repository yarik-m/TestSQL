<header>
    <span class="logo">ТестMySQL</span>
    <nav>
    <a href="/">Головна</a>
        <?php if (isset($_COOKIE['login'])) : ?>
            <a href="/add-article.php">Додати статтю</a>
            <a href="/login.php" class="btn">Кабінет користувача</a>
        <?php else : ?>
            <a href="/login.php" class="btn">Увійти</a>
            <a href="/register.php" class="btn">Реєстрація</a>
        <?php endif; ?>
       
    </nav>
</header>
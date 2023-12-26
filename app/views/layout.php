<?php
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "Вы не вошли в систему";
$user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : false;
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- encoding -->
    <meta charset="UTF-8">
    <!-- Mobile support -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title and SEO -->
    <title>ДПО приложение</title>

    <!-- Styles -->
    <link rel="stylesheet" href="#">

</head>

<body>
    <div class="layout">
        <aside class="sidebar" id="sidebar">
            <ul class="sidebar__list">
                <li>
                    <div class="sidebar-group">
                        <p class="sidebar-group__title">Основное</p>
                        <ul class="sidebar-group__list">
                            <li class="auth"><?= $user_email ?></li>
                            <li>
                                <img src="/app/vendors/img/icon/home-icon.png" alt="">
                                <a href="/">Главное</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-group">
                        <p class="sidebar-group__title">Административная панель</p>
                        <ul class="sidebar-group__list">
                            <li>
                                <img src="/app/vendors/img/icon/home-icon.png" alt="">
                                <a href="/users">Пользователи</a>
                            </li>
                            <li>
                                <img src="/app/vendors/img/icon/home-icon.png" alt="">
                                <a href="/pages">Страницы</a>
                            </li>
                            <li>
                                <img src="/app/vendors/img/icon/home-icon.png" alt="">
                                <a href="/roles">Роли</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-group">
                        <p class="sidebar-group__title">Панель авторизации</p>
                        <ul class="sidebar-group__list">

                            <li><a href="/auth/login">Вход</a></li>
                            <li><a href="/auth/register">Регистрация</a></li>
                            <li><a href="/auth/logout">Выйти</a></li>

                        </ul>
                    </div>
                </li>
            </ul>
        </aside>
        <main class="content" id="content">
            <?php echo $content; ?>
        </main>
    </div>

</body>

</html>
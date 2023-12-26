<?php

ob_start();

?>

<form class="form" method="POST" action="/auth/store">
    <h1 class="form-title">Регистрация</h1>
    <div class="form-fields">
        <input type="text" placeholder="ФИО" id="username" name="username" required>
        <?php if (isset($error)) : tte($error) ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <input type="email" placeholder="Электронная почта" id="email" name="email" required>
        <input type="password" placeholder="Пароль" id="password" name="password" required>
        <input type="password" placeholder="Повторите пароль" id="confirm_password" name="confirm_password" required>
    </div>
    <div class="form-button">
        <button type="submit" class="button">Зарегистрироваться</button>
    </div>

    <div class="form-info">
        <p>Если у вас уже есть аккаунт
            <a href="/auth/login"><?= htmlspecialchars("Авторизация") ?></a>
        </p>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>
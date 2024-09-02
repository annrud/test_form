<form method="post">
    <div class="mb-3">
        <label for="inputPhoneEmail" class="form-label">Email/Телефон</label>
        <input type="text" name="phone_email" class="form-control<?=!empty($errors['phone_email']) ? ' is-invalid' : ''?>" id="inputPhoneEmail" value="<?=$_POST['phone_email'] ?? ''?>">
        <?php if (!empty($errors['phone_email'])):?>
            <div class="invalid-feedback"><?=$errors['phone_email']?></div>
        <?php endif;?>
    </div>
    <div class="mb-3">
        <label for="inputPassword" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control<?=!empty($errors['password']) ? ' is-invalid' : ''?>" id="inputPassword" value="<?=$_POST['password'] ?? ''?>">
        <?php if (!empty($errors['password'])):?>
            <div class="invalid-feedback"><?=$errors['password']?></div>
        <?php endif;?>
    </div>
    <div class="mb-3">
        <div
                style="height: 100px"
                id="captcha-container"
                class="smart-captcha<?=!empty($errors['captcha']) ? ' is-invalid' : ''?>"
                data-sitekey="ysc1_H4QXnpqewOLXQZA2WVCeejdhcTUcJyHnL0e4SYRl87094c6a"
        ></div>
        <?php if (!empty($errors['captcha'])):?>
            <div class="invalid-feedback"><?=$errors['captcha']?></div>
        <?php endif;?>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
    <a href="/register.php" class="btn btn-secondary">Регистрация</a>
</form>

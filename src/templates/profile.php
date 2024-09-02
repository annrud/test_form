<form method="post">
    <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Имя</label>
        <input type="text" name="login" class="form-control<?=!empty($errors['login']) ? ' is-invalid' : ''?>" id="inputName" value="<?=$user['login']?>">
        <?php if (!empty($errors['login'])):?>
            <div class="invalid-feedback"><?=$errors['login']?></div>
        <?php endif;?>
    </div>
    <div class="mb-3">
        <label for="exampleInputPhone1" class="form-label">Телефон</label>
        <input type="tel" name="phone" class="form-control<?=!empty($errors['phone']) ? ' is-invalid' : ''?>" id="inputPhone" value="<?=$user['phone']?>">
        <?php if (!empty($errors['phone'])):?>
            <div class="invalid-feedback"><?=$errors['phone']?></div>
        <?php endif;?>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control<?=!empty($errors['email']) ? ' is-invalid' : ''?>" id="inputEmail" value="<?=$user['email']?>">
        <?php if (!empty($errors['email'])):?>
            <div class="invalid-feedback"><?=$errors['email']?></div>
        <?php endif;?>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-6">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control<?=!empty($errors['password']) ? ' is-invalid' : ''?>" id="inputPassword" value="">
                <?php if (!empty($errors['password'])):?>
                    <div class="invalid-feedback"><?=$errors['password']?></div>
                <?php endif;?>
            </div>
            <div class="col-6">
                <label for="exampleInputPassword1" class="form-label">Повтор пароля</label>
                <input type="password" name="repeat_password" class="form-control<?=!empty($errors['password']) ? ' is-invalid' : ''?>" id="inputRepeatPassword" value="">
                <?php if (!empty($errors['password'])):?>
                    <div class="invalid-feedback"><?=$errors['password']?></div>
                <?php endif;?>
            </div>

        </div>
    </div>
    <button type="submit" class="btn btn-primary">Изменить</button>
</form>

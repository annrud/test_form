<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TestForm | <?=$title ?? 'Тестовые формы'?></title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <?php if ($active == 'login'):?>
        <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
    <?php endif;?>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if (isset($_SESSION['userId'])):?>
                            <a class="nav-link<?=$active == 'profile' ? ' active' : ''?>" href="/profile.php">Профиль</a>
                            <a class="nav-link" href="/logout.php">Выход</a>
                        <?php else:?>
                            <a href="/register.php" class="nav-link<?=$active == 'register' ? ' active' : ''?>">Регистрация</a>
                            <a href="/login.php" class="nav-link<?=$active == 'login' ? ' active' : ''?>">Вход</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-7 align-self-center">
                <?php include $template ?>
            </div>
        </div>
    </div>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

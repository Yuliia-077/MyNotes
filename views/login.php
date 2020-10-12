<?php
//page for sign in
require_once(ROOT.'/layout/head.php');
?>
<body>
<div class="page-header header container-fluid">
    <div class="overlay">
        <div class="description">
            <h1>Увійдіть у MyNotes</h1>
            <form action="#" method="post">
                <?php if(isset($errors) && is_array($errors)):?>
                    <ul>
                        <?php foreach ($errors as $error):?>
                            <li class="error"><?php echo $error; ?></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
                <div class="form-group">
                    <label for="email" class="col-form-label">Електронна пошта:</label><br>
                    <input type="email" name="email" class="form-control-md" id="email" value="<?php echo $email;?>"/><br>
                    <label for="password" class="col-form-label">Пароль:</label><br>
                    <input type="password" name="password" class="form-control-md" id="password"><br><br>
                    <input type="submit" name="login" value="Ввійти" class="btn btn-primary"><br>
                </div>
            </form>
            <a class="log" href="registration">Зареєструватися</a>
        </div>
    </div>
</div>
<script src="./templates/js/main.js"></script>
</body>
<?php
require_once(ROOT.'/layout/head.php');
?>
<body>
<?php if(isset($errors) && is_array($errors)):?>
    <ul>
        <?php foreach ($errors as $error):?>
            <li class="error"><?php echo $error; ?></li>
        <?php endforeach;?>
    </ul>
<?php endif;?>
<div class="page-header header container-fluid">
    <div class="overlay">
        <div class="description">
            <h1>Реєстрація у MyTeam</h1>
            <form action="#" method="post">
                <div class="form-group">
                    <input type="text" name="user_name" class="form-control-md" placeholder="Ім'я користувача*"  value="<?php echo $user_name; ?>"/><br>
                    <input type="text" name="first_name" class="form-control-md" placeholder="Ім'я" value="<?php echo $first_name; ?>"/><br>
                    <input type="text" name="last_name" class="form-control-md" placeholder="Прізвище" value="<?php echo $last_name; ?>"/><br>
                    <input type="date" name="date_of_birth" class="form-control-md" placeholder="Дата народження" value="<?php echo $date_of_birth; ?>"/><br>
                    <input type="email" name="email" class="form-control-md" placeholder="Електронна пошта*" value="<?php echo $email; ?>"/><br>
                    <input type="password" name="password" class="form-control-md" placeholder="Пароль*" id="myPass" value="<?php echo $password; ?>"><br>
                    <input type="checkbox" onclick="showPassword()"/>Показати пароль
                    <script src="./templates/js/showPassword.js"></script>
                    <input type="password" name="rep_password" class="form-control-md" placeholder="Повторіть пароль*" value="<?php echo $rep_password; ?>"/><br><br>
                    <input type="submit" value="Зареєструватися" class="btn btn-primary" name="signup"/><br>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./templates/js/main.js"></script>
</body>
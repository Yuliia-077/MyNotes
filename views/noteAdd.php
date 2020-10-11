<?php
require_once(ROOT.'/layout/header.php');
?>

<div class="container">
    <h1>Додати замітку</h1>
    <form action="#" method="post">
        <?php if(isset($errors) && is_array($errors)):?>
            <ul>
                <?php foreach ($errors as $error):?>
                    <li class="error"><?php echo $error; ?></li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>
        <div class="form-group">
            <label for="heading" class="col-form-label">Тема:</label><br>
            <input type="heading" name="heading" class="form-control-md" id="heading"/><br>
            <label for="note" class="col-form-label">Текст замітки:</label><br>
            <textarea name="note" class="form-control-md" id="note"></textarea><br>
            <input type="submit" name="add" value="Додати" class="btn btn-primary"><br>
        </div>
    </form>
</div>>
</body>


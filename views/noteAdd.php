<?php
//add note
require_once(ROOT.'/layout/header.php');
?>

<div class="container">
    <form action="#" method="post">
        <div class="note-add">
            <h1>Додати замітку</h1>
            <?php if(isset($error)):?>
                <p class="error" style="text-align: center"><?php echo $error; ?></p>
            <?php endif;?>
            <label for="heading" class="col-form-label">Тема:</label><br>
            <input type="heading" name="heading" class="form-control-md" id="heading"/><br>
            <label for="note" class="col-form-label">Текст замітки:</label><br>
            <textarea name="note" class="form-control-md" id="note"></textarea><br>
            <input type="submit" name="add" value="Додати" class="btn btn-primary"><br>
        </div>
    </form>
</div>>
</body>


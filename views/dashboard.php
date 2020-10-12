<?php
//page with list note
require_once(ROOT.'/layout/header.php');
?>

<div class="container">
    <?php foreach ($notes as $note):?>
    <div class="notes"/>
        <div class="title-note">
            <?php echo $note['heading'];?>
            <a style="text-align: right" href=<?php echo "delete/".$note['id'];?> onclick="return confirm('Чи дійсно ви хочете видалити цю замітку?');"><i class="far fa-trash-alt"></i></a>
        </div>
        <?php echo $note['text'];?>
    </div>
<?php endforeach;?>
</div>
</body>
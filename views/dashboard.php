<?php
require_once(ROOT.'/layout/header.php');
?>

<div class="container">
    <?php foreach ($notes as $note):?>
    <div class="notes"/>
        <div class="title">
            <?php echo $note['heading'];?>
        </div>
        <div class="one_note"> <?php echo $note['text'];?></div>
        <a href=<?php echo "delete/".$note['id'];?> onclick="return confirm('Чи дійсно ви хочете видалити цю замітку?');"><i class="far fa-trash-alt"></i></a>
    </div>
<?php endforeach;?>
</div>
</body>
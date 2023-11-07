<link href="<?php echo ROOT_URL; ?>/Engine/API/Notes/Show/Style.css" rel="stylesheet" />
<div id="notes-show">
    <h1 class="wrap-title">
        <?php echo $entity->getTitle(); ?>
    </h1>

    <div class="seeds">
        <?php echo $entity->getSeeds(); ?>
        <br/>
        <a href="javascript:void(0)" onclick="Synopsis.Notes.edit();">Edit</a> &diams;
        <a href="javascript:void(0)" onclick="Synopsis.Notes.RID.edit();">Change Key</a>
    </div>

    <hr/>
    <?php echo $entity->parseNote(); ?>
</div>
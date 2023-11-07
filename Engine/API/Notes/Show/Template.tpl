<link href="<?php echo ROOT_URL; ?>/Engine/API/Notes/Show/Style.css" rel="stylesheet" />
<div id="notes-show">
    <h1><?php echo $entity->getTitle(); ?></h1>
    <hr/>
    <?php echo $entity->parseNote(); ?>
</div>
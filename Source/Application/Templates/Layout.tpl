<!DOCTYPE html>
<html lang="en">
<head>
    <script><?php echo file_get_contents(ROOT_DIR . "/vendor/anton-moskalenko/rune-framework/Frontside/Library/Jquery.min.js"); ?></script>
    <script><?php echo file_get_contents(ROOT_DIR . "/vendor/anton-moskalenko/rune-framework/Frontside/Library/Underscore.min.js"); ?></script>
    <script><?php echo file_get_contents(ROOT_DIR . "/vendor/anton-moskalenko/rune-framework/Frontside/Library/Backbone.min.js"); ?></script>
    <script><?php echo file_get_contents(ROOT_DIR . "/Library/API/API.js"); ?></script>
    <script><?php echo file_get_contents(ROOT_DIR . "/Application/Client/Application.js"); ?></script>

    <style>
        <?php echo file_get_contents(ROOT_DIR . "/Application/General.css"); ?>
    </style>
    <title>Synopsis</title>
</head>
<body>
    <div id="content">
        <script>Application.render();</script>
    </div>
</body>
</html>
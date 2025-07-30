<!DOCTYPE html>
<html lang="en">
    <head>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/vendor/technomage-liloi/rune-framework/Frontside/Library/Jquery.min.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/vendor/technomage-liloi/rune-framework/Frontside/Library/Underscore.min.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/vendor/technomage-liloi/rune-api/Client/API.js'); ?></script>

        <script><?php echo file_get_contents(dirname(__DIR__) . '/Sources/API/Requests.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/Sources/API/Laws/Requests.js'); ?></script>

        <style><?php echo file_get_contents(__DIR__ . '/Style.css'); ?></style>

        <title><?php echo $config['title']; ?></title>
    </head>
    <body>
        <div style="text-align: center;">
            <a class="butn" href="javascript:void(0)" onclick="window.location.reload();">Refresh</a>
        </div>
        <div id="page">
            <script>Requests.Laws.show();</script>
        </div>
    </body>
</html>
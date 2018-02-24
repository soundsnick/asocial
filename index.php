<?php
    session_start();
    define('projectConstant', '1-14-40ernazar');
    include('core/route.php');
    include('core/config.php');
    include('components/components.php');
    include('core/actions.php');
    include('core/engine.php');
    include('modules/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require 'components/head_meta.php';
        require 'components/head_links.php';
        require 'components/head_scripts.php';
    ?>
    <title><?=$project['title'].' | '.$project['name']?></title>
</head>
<body>
    <app class="application">
    <?php
        require 'components/navigation.php';
        $engine->render($page);
        require 'components/footer.php';
    ?>
    </app>
</body>
</html>
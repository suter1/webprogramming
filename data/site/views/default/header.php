<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php
    $default_path="/assets";
    $styles="$default_path/styles/";
    $javascripts = "$default_path/javascript/";
    $css_files = glob('assets/styles/*.{css}', GLOB_BRACE);
    foreach ($css_files as $css) {
        $path = $styles . basename($css);
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$path\" />";
    }
    $javascript_files = glob('assets/javascript/*.{js}', GLOB_BRACE);
    foreach ($javascript_files as $js){
        $path = $javascripts . basename($js);
        echo "<script src=\"$path\"></script>";
    }
    ?>
    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css"
          integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/logo/icon_isithombe_web.ico">
    <meta charset="UTF-8"/>
    <title>isithombe</title>
</head>
<body>
    <div class="flex-container">
    <header>
        <div class="headline eqWrap">
            <a href="/home">
                <div class="logo equalHW eq"></div>
            </a>
            <div class="equalHWWide eq">
                <input type="text" name="search" id="search" class="search" autocomplete="false" placeholder=
                "<?php
				echo Localization::find_by(['qualifier' => 'search', 'lang' => get_language()])->getValue();
				?>..." class="search" onkeypress="search(event);"/>
            </div>
            <div class="equalHW eq">
                <?php require_once("views/default/profile.php"); ?>
            </div>
            <div class="equalHW eq">
                <?php require_once("views/default/basket.php") ?>
            </div>
            <?php
            if(!is_null(current_user()) && current_user()->isAdmin()){
                echo "<div class='equalHW eq'><a href='/admin'><button style='width: auto;'>Admin</button></a></div>";
            }
            ?>
        </div>
    </header>
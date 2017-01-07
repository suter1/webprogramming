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
    <title>Insert title here</title>
</head>
<body>
    <div class="flex-container">
    <header>
        <div class="headline eqWrap">
            <a href="index.php">
                <div class="logo equalHW eq"></div>
            </a>
            <div class="equalHWWide eq">
                <input type="text" name="search" class="search" autocomplete="false" placeholder="Suche..." class="search"/>
            </div>
            <div class="equalHW eq">
                <span class="toggle"><i class="fa fa-user-circle" aria-hidden="true"/>
                    <div class="toggle_div hide">
                        <div class="arrow-up"></div>
                        <div class="popup">
                            <?php require_once("templates/default/profile.php"); ?>
                        </div>
                    </div>
                </span>
            </div>
            <div class="equalHW eq">
                <span class="toggle"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <div class="toggle_div hide">
                    <div class="arrow-up"></div>
                    <div class="popup">
                        <?php require_once("templates/default/basket.php") ?>
                    </div>
                </div>
                </span>
            </div>
        </div>
    </header>
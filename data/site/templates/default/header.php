<!DOCTYPE html>
<html>
<head>
    <?php
    $css_files = glob('assets/styles/*.{css}', GLOB_BRACE);
    foreach ($css_files as $css) {
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$css\" />";
    }
    $javascript_files = glob('assets/javascripts/*.{js}', GLOB_BRACE);
    foreach ($javascript_files as $js){
        echo "<script src=\"$js\"></script>";
    }
    ?>
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
                <input type="text" name="search" class="search" placeholder="Suche..." class="search"/>
            </div>
            <div class="equalHW eq">
                <a>Account &lt;Username&gt;</a>
            </div>
            <div class="equalHW eq">
                Basket
            </div>
        </div>
    </header>
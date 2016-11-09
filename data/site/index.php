<?php
/**
 * @author Jan Dellsberger, extended Tobias Flühmann
 */
session_start();

$url = $_SERVER["REQUEST_URI"];
$params = explode("/", $url);
require_once("autoload.php");
require_once("includes/functions.php");
require_once('db/init_db.php');

if (sizeof($params) > 2 && in_array($params[2], $GLOBALS['languages'])) {
    $language = $params[1];
    $pageId = $params[2];
}else {
    $pageId = $params[1];
}


if (!empty($pageId) && in_array($pageId, $GLOBALS['pages'])) {
    $GLOBALS['page'] = $pageId;
} else {
    //crap
    echo $pageId;
    echo "<br>crap";
}
$pageFile = "pages/" . $GLOBALS['page'] . ".php";
if (is_file($pageFile)) {
    require_once $pageFile;
} else {
    echo 'Page not found: ' . $pageFile;
    return;
}
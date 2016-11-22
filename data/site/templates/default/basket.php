<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 22/11/16
 * Time: 20:56
 */

if(isset($_SESSION['basket'])) $_SESSION['basket']->render();
else echo "<p>Your basket is empty.</p>";
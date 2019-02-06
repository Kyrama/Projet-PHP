<?php
/**
 * Created by PhpStorm.
 * User: PC_Unite_Baptiste
 * Date: 14/01/2019
 * Time: 20:57
 */

echo '<h1>Error</h1>';
if(isset($code)){
    echo "<p>".$code."</p>";
    $code=null;
}
elseif(isset($name)){
    echo '<p>Impossible de charger '.$name.'.</p>';
    $name=null;
}
elseif(isset($Error)){
    echo "<p>".$Error."</p>";
}

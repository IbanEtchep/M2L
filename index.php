<?php
echo '<h1>index</h1>';

require_once ('controllers/Router.php');

$router = new Router();
$router->routeReq();

?>
     
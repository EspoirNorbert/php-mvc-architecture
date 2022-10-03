<?php
ob_start();
$title = "Accueil";
?>
<div class="jumbotron jumbotron-fluid">
  <div class="container ">
    <h1>PHPMVCApp</h1>      
    <p class="lead">Php App architectured with MVC patterns</p>
  </div>
</div>
<?php
$content = ob_get_clean();
require_once('layouts/app.layout.php');
<?php
ob_start();
$title = "404";
?>
<div class="d-flex justify-content-center align-items-center" style=" height: 100vh;" id="main">
    <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">404</h1>
    <div class="inline-block align-middle">
    	<h2 class="font-weight-normal lead" id="desc">The page you requested was not found.</h2>
        
    </div>
</div>
</div>
<?php
$content = ob_get_clean();
require_once('layouts/app.layout.php');

<?php
ob_start();
$title = "Create a post - ";
?>
<div class="container mt-5">
    <div>
        <h2 class="mt-5">Creation d'un article</h2>
        <hr>
        <?php
        if (isset($errors)) {

        ?>
            <div class="alert alert-danger">
                <ul class="list-group">
                    <?php
                    foreach ($errors as $error => $value) {
                    ?>
                        <li class="list-group-item">$value</li>
                    <?php
                    }
                    ?>
            </div>
        <?php
        }

        ?>
        <form class="border p-3 mb-2" method="post" action='/posts'>
            <div class="form-group">
                <label for="labelTitle">Title *</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter le titre de votre article" required>
            </div>
            <div class="form-group">
                <label for="content">Content *</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="10" placeholder="Enter le contenue de votre article" required></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block">Create</button>
        </form>

    </div>
</div>
<?php
$content = ob_get_clean();
require_once(dirname(__DIR__) . '/layouts/app.layout.php');

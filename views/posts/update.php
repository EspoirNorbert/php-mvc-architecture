<?php
ob_start();
$title = "$title";
?>
<div class="container mt-5">
    <div>
        <h2 class="mt-5 bg-success p-2 text-white"><?= $post->getTitle() ?></h2>
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
        <form class="border p-3 mb-2" method="post" action="/posts/<?= $post->getId() ?>/update">
            <input type="hidden" name="id" value="<?= $post->getId() ?>">
            <div class="form-group">
                <label for="labelTitle">Title *</label>
                <input type="text" class="form-control" name="title" value="<?= $post->getTitle() ?>" placeholder="Enter le titre de votre article" required>
            </div>
            <div class="form-group">
                <label for="content">Content *</label>
                <textarea class="form-control" name="content" rows="10" placeholder="Enter le contenue de votre article" required><?= $post->getContent() ?></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block">Update</button>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once(dirname(__DIR__) . '/layouts/app.layout.php');

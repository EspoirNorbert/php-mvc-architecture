<?php
ob_start();
$title = "Articles";
?>
<div class="container mt-5">
    <div>
    <h2 class="mt-5">Articles  (<?= $totalPost ?>) </h2>
    <hr>
    <?php 
        if (count($posts) == 0) {

        ?>
        <div class="d-flex flex-column p-5 text-center mx-auto">
            <h3><small> Vous n'avez creer aucun article pour le moment</small></h3>
            <p>Tous vos articles  seront sauvegardées ici pour que vous puissiez les consulter tout moment. <br>
                <a  href="/posts/create" class="btn btn-success">Creer un article</a>
            </p>
        <?php
       
        }
        else {
    ?>

    <div class="card-decks">
        <?php 
        
        foreach($posts as $post){
            extract($post);
        ?>
            <div class="card mb-2">
                <div class="card-body">
                <h5 class="card-title"><?= $title ?> </h5>
                <h6 class="card-subtitle mb-2 text-muted">Post N°<?= $id ?></h6>
                <p class="card-text"><?= $content ?></p>
                <p class="card-text"><small class="text-muted">Published <?= $date ?> </small></p>
                <a href="/posts/<?= $id ?>/delete" 
                onclick="return confirm('Vous vous vraiment supprime cet post')" 
                class="card-link btn btn-danger">Delete</a>
                <a href="/posts/<?= $id ?>" class="card-link btn btn-info">Update</a>
            </div>
        </div>
        <?php
        }  
        ?>
    </div>
    <?php 
    }
    ?>
</div>
</div>
<?php
$content = ob_get_clean();
require_once(dirname(__DIR__) .'/layouts/app.layout.php');
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= (isset($title)) ? $title . ' - PostMVCApp' : "PostMVCApp" ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- navigation -->
    <?php require_once ('partials/nav.php') ?>
    <!-- content -->
    <main>
      <?= $content ?>
    </main>
    <!-- footer -->
    <?php require_once ('partials/footer.php') ?>
    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
</body>
</html>
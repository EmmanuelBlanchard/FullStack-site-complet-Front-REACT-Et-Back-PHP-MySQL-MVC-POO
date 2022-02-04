<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php require_once("views/commons/menu.php"); ?>
        <div class="container">
            <h1 class="rounded border border-dark m-2 p-2 text-center text-white bg-info"><?= $title ?></h1>
            <?php if(!empty($_SESSION['alert'])) : ?> 
                <div class="alert <?= $_SESSION['alert']['type'] ?>" role="alert">
                    <?= $_SESSION['alert']['message'] ?>
                </div>
            <?php 
                unset($_SESSION['alert']);
                endif; 
            ?>
            <?= $content ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

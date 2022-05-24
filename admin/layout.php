<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="style.css?v=2">
    <title><?= $title?></title>
    </head>
    <body>
       <div>
        <header>
            <a href="add.php">Добавить страницу</a><br><br>
            <a href="elems/logout.php">Выйти</a><br><br>
            <?php include 'elems/header.php';
            echo $info; ?>
        </header>
        <main>
            <?= $content?>
        </main>
        <footer>
            footer
        </footer>
       </div>
    </body>
</html>


<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru" class="h-100">

<head>
    <title>
    </title>
    
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        
    </header>
    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
  
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 fixed-bottom">
        <div class="container">
            
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
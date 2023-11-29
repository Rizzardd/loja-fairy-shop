<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
//debug_print_backtrace();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

    <div class="cardContainer">
        <?php
        foreach ($data["products"] as $product) {
            ?>
            <div class="productCard">
                <?php if ($product->getFileLocation()): ?>
                    <img src="<?= $product->getFileLocation() ?>" alt="<?= $product->getName() ?>" class="productImage">
                <?php endif;
                ?>
                <h3>
                    <?= $product->getName() ?>
                </h3>
                <p>Brand:
                    <?= $product->getBrand() ?>
                </p>
                <p>Price:
                    <?= $product->getPrice() ?>
                </p>
            </div>
            <?php
        }
        ?>
    </div>


</body>

</html>
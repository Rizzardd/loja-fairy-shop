<?php
//echo $data['produto'];
$product = $data['product'];
//echo $data['product']->getName();
?>

<?php 
$base = __DIR__;
include $base . '\..\layout\menu.php';
$product = $data['product'];
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
    <form method="POST" action="/product/update">
        <div class="mb-3">
            <input type="hidden" name="cod"  value="<?= $product->getCod() ?>" name="cod">
        </div>
        <div class="mb-3">
            <label for="#" class="form-label">Name</label>
            <input type="text" name="name" class="form-control w-25" value="<?= $product->getName() ?>">
        </div>
        <div class="mb-3">
            <label for="#" class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control w-25" value="<?= $product->getBrand() ?>">
        </div>
        <div class="mb-3">
            <label for="#" class="form-label">Price</label>
            <input type="text" name="price" class="form-control w-25" value="<?= $product->getPrice() ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
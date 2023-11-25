<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>product</h1>
    <hr />
    <?php 
    if($data['msg']){
    ?>

    <?php 

}?>
    <a href="/product/register">Add Product</a>

    <table class="table">
        <thead>
            <th>Code</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach ($data['products'] as $product) { ?>
                <tr>
                    <td>
                        <?= $product->getCod() ?>
                    </td>
                    <td>
                        <?= $product->getName() ?>
                    </td>
                    <td>
                        <?= $product->getBrand() ?>
                    </td>
                    <td>
                        <?= $product->getPrice() ?>
                    </td>
                    <td>
                        <a href="/product/initEdit/<?= $product->getCod()?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                        Edit
                        </a>
                        <span>
                            <form action="/product/delete" method="POST">
                            <input type="hidden" name="cod" value="<?=?>">
                                <input type="button" value="X">
                            </form>
                        </span>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>
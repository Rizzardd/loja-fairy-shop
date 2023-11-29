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

    <a href="/product/register">Add Product</a>


    <?php foreach ($data['products'] as $product) { ?>

        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div class="row p-2 bg-white border rounded">
                        <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                src="https://i.imgur.com/QpjAiHq.jpg"></div>
                        <div class="col-md-6 mt-1">
                            <h5>
                                <?= $product->getName() ?>
                            </h5>
                            <div class="d-flex flex-row">
                                <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                            </div>
                            <div class="mt-1 mb-1 spec-1"><span>Product Code:
                                    <?= $product->getCod() ?>
                                </span><span class="dot"></span><span>Light weight</span><span class="dot"></span><span>Best
                                    finish<br></span></div>
                            <div class="mt-1 mb-1 spec-1"><span>
                                    <?= $product->getBrand() ?>
                                </span><span class="dot"></span><span>For men</span><span
                                    class="dot"></span><span>Casual<br></span></div>
                            <p class="text-justify text-truncate para mb-0">There are many variations of passages of
                                Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                injected humour, or randomised words which don't look even slightly
                                believable.<br><br></p>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1">
                                    <?= $product->getPrice() ?>
                                </h4><span class="strike-text">$20.99</span>
                            </div>
                            <h6 class="text-success">Free shipping</h6>
                            <div class="d-flex flex-column mt-4">
                                <a class="btn btn-primary btn-sm" href="/product/initEdit/<?= $product->getCod() ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                    Edit
                                </a>
                                <form action="/product/delete" method="post">
                                    <input type="hidden" name="productCode" value="<?= $product->getCod() ?>">
                                    <input type="hidden" name="productName" value="<?= $product->getName() ?>">
                                    <input type="hidden" name="productBrand" value="<?= $product->getBrand() ?>">
                                    <button class="btn btn-outline-primary btn-sm mt-2 w-100" type="button"
                                        onclick="openDeleteDialog(this)">Delete</button>
                                    <button type="submit" style="display: none;">Confirm Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    <dialog id="deleteDialog">
        <p id="deleteMessage"></p>
        <button onclick="confirmDelete()">Yes, delete</button>
        <button onclick="closeDeleteDialog()">Cancel</button>
    </dialog>

    <script>
        const deleteDialog = document.getElementById('deleteDialog');
        let currentForm;

        function openDeleteDialog(button) {
            currentForm = button.closest('form');
            const productName = currentForm.querySelector('input[name="productName"]').value;
            const productBrand = currentForm.querySelector('input[name="productBrand"]').value;

            document.getElementById('deleteMessage').innerText = `Are you sure you want to delete ${productName} by ${productBrand}?`;
            deleteDialog.showModal();
        }

        function closeDeleteDialog() {
            deleteDialog.close();
        }

        function confirmDelete() {
            currentForm.submit();
            closeDeleteDialog();
        }
    </script>
</body>



</html>
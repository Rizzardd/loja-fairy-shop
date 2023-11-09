<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/product/store" method="POST">
        <label for="">Product Name</label>
        <input type="text" name="name" id="product_name">
        <label for="">Brand Name</label>
        <input type="text" name="brand" id="product_brand"> 
        <label for="">Price</label>
        <input type="text" name="price" id="product_price">
        <input type="submit" value="register">
    </form>
</body>

</html>
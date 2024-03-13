<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <select name="category" id="category">
            <option value="">Categories</option>
            <option value="men">Men</option>
            <option value="women">Women</option>
            <option value="footwear">Footwear</option>
        </select>
        <input type="text" name="prod_name" placeholder="Product Name">
        <textarea name="prod_desc" id="prod_desc" placeholder="Product Description"></textarea>
        <input type="text" name="prod_price" placeholder="Product Price">
        <input type="text" name="quantity" placeholder="Quantity">
        <input type="file" name="prod_img">
        <input type="file" name="prod_img2">

        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
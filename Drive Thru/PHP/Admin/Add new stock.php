<div class="container">
    <br><br><br>
    <form action="./Add new stock.php" method="post" class="new-stock">
        <div class="label form-group">
            <label for="category">
                Category
            </label>
            <br>
            <select name="category" id="category" class="form-control form-control-sm">
                <option value="None">-Select Category-</option>
                <option value="sharing">Sharing</option>
                <option value="burger">Burgers</option>
                <option value="drinks">Drinks</option>
            </select>
        </div>
        <div class="label form-group">
            <label for="name">
                Name of an Item
            </label>
            <br>
            <input type="text" name="item_name" id="name" class="item-name form-control form-control-sm" />
        </div>
        <div class="label form-group">
            <label for="qty">
                Quantity
            </label>
            <br>
            <input type="text" id="qty" name="qty" class="qty form-control form-control-sm" />
        </div>
        <div class="label form-group">
            <label for="price">
                Price
            </label>
            <br>
            <input type="text" id="price" name="price" class="price form-control form-control-sm" />
        </div>
        <div class="label form-group">
            <label for="img_url">
                Image name
            </label>
            <br>
            <input type="text" name="img_url" id="img_url" class="img_url form-control form-control-sm" />
        </div>
        <div class="label form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-outline-secondary btn-sm btn-block"/>
        </div>
    </form>
</div>
<?php
    include 'C:/xampp/htdocs/Drive Thru/HTML/nav admin.html';
    if (isset($_POST['submit']))
    {
        $name = $_POST['item_name']; $category = $_POST['category']; $qty = $_POST['qty']; $price = $_POST['price']; $img = $_POST['img_url'];
        $sql_st = "INSERT INTO ". $category ." (`name`,`qty`,`price`,`img_url`) 
                VALUES ('". $name ."', ". $qty .", ". $price .", '". $img ."')";

        include '../connect.php';

        if(!$conn->query($sql_st) === TRUE)
        {
            die ($conn->error);
        }
        echo '<script>alert("Record added successfully")</script>';

        include '../close.php';
    }
?>
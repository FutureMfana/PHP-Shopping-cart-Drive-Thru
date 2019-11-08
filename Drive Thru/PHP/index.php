<?php
    include '../HTML/nav.html';
    include '../HTML/container.html';

    include 'connect.php';

    /* SESSION CONTINUES AS IT STARTED AS connect.php */

    if(isset($_POST["add_to_cart"])) //check is the Add to Cart button is clicked
    {
        if(isset($_SESSION["shopping_cart"])) //check if the $_SESSION array got something in it
        {
            $item_array_item = array_column($_SESSION["shopping_cart"], "item"); //gets all the items bought so far
            if(!in_array($_GET["id"], $item_array_item)) //checks if the item to be bought hasn't been bought already NOTE the NOT operator
            {
                $count = count($_SESSION["shopping_cart"]); //keeps track of number of elements stored in an array
                $item_array = array(
                    'item' => $_GET["id"], //passed through url and the unique attribute discribing the item, id is defined in form action
                    'item_name' => $_POST["hidden_name"], //getting this value from the form hidden text fields
                    'item_price' => $_POST["hidden_price"],
                    'item_qty' => $_POST["qty"] //from the text box with name qty, which allows user to specify qty for an item of choice
                );
                $_SESSION["shopping_cart"][$count] = $item_array; //storing elements to the $_SESSION array for 2nd time or more

            }else{
                echo '<script> alert("Item already added to the cart. You can remove the item and add it agian with required quantity") </script>';
                //echo '<script> window.location="index.php"</script>'; //page redirecting
            }
        }else{
            $item_array = array(
                'item' => $_GET["id"], //passed through url and the unique attribute discribing the item, id is defined in form action
                'item_name' => $_POST["hidden_name"], //getting this value from the form hidden text fields
                'item_price' => $_POST["hidden_price"],
                'item_qty' => $_POST["qty"] //from the text box with name qty, which allows user to specify qty for an item of choice
            );
            $_SESSION["shopping_cart"][0] = $item_array; //first assignment to the $_SESSION array
        }
    }

    //For removing item from the list of bought items
    if(isset($_GET["action"]) && $_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item"] ==  $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]); //removing item
            }
        }
    }

    $sql_st = "SELECT * FROM sharing WHERE qty > 0";

    $dataset = $conn->query($sql_st);
    if($dataset->num_rows < 1)
    {
        echo "We are out of stock";
    }
    
    $count_disp_cols = 1;
    while($row = $dataset->fetch_assoc())
    {
        if ($count_disp_cols % 3 == 1)
        {
            echo '<div class="row">';
        }

        echo '
            <div class="card col-md-2">
                <form method="post" action="index.php?action=add&id='.$row['name'].'">
                    <img src="../IMG/Sharing/'. $row['img_url'] .'" class="item-img card-img-top" alt="'. $row['name'] .'">
                    <div class="card-body">
                        <h5 class="card-title">'. $row['name'] .'</h5>
                        <p class="card-text"> R'. $row['price'] .'</p>
                        <p><input type="number" name="qty" id="number" value="1" min="1" class="card-controls input-qty"/></p>
                        <input type="hidden" name="hidden_name" value="'. $row['name'] .'"/>
                        <input type="hidden" name="hidden_price" value="'. $row['price'] .'"/>
                        <input type="submit" class="btn btn-outline-secondary btn-sm card-controls" name="add_to_cart" value="Add to Cart"/>
                    </div>
                </form>
            </div>
        ';

        if ($count_disp_cols % 3 == 0)
        {
            echo '</div>';
        }

        $count_disp_cols += 1;
    }

    echo'
        <div class="order-container">
            <h4>Order Info</h4>
            <form method="post" action="order.php">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th >Item</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                        ';
                        $total = 0; //to be paid by the customer
                        if (!empty($_SESSION["shopping_cart"]))
                        {
                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                            {
                            
                                echo'
                                    <tr>
                                        <td>'.$values["item_name"].'</td>
                                        <td>'.$values["item_qty"].'</td>
                                        <td>R'. number_format($values["item_qty"] * $values["item_price"], 2) .'</td>
                                        <td><a href="index.php?action=delete&id='. $values["item"] .'"><span class="text-danger">Remove</span></a></td>
                                    </tr>
                                ';
                                $total = ($values["item_qty"] * $values["item_price"]) + $total;
                            }
                        }
                        echo'
                        <tr>
                            <td colspan="3"><b>Total</b></td>
                            <td><input type="text" class="total" name="total" value="R'. number_format($total, 2) .'" readonly/></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="submit" class="btn btn-outline-info btn-sm btn-block" value="Submit order"/>
                            </td>
                        </tr>
                    </thead>
                <table/>
            </form>
        </div>    
    ';
    include 'close.php';
?>
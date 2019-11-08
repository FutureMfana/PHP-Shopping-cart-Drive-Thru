<br><br><br>
<?php
    include 'C:/xampp/htdocs/Drive Thru/HTML/nav admin.html';
    echo '
    <div class="container">
    <select name="category" class="custom-select-sm custom-select mb-3">
            <option value="Empty">-Select Category-</option>
            <option value="sharing">Sharing</option>
            <option value="burgers">Burgers</option>
            <option value="drinks">Drinks</option>
        </select>';
    
    
   /* if (isset($_POST["category"]))
    {
        if((isset($_POST["category"]) =="sharing")
        {*/
            $sql_st = 'SELECT name FROM sharing';
        /*}
        elseif((isset($_POST["category"]) =="drinks")
        {  
            $sql_st = 'SELECT name FROM drinks';
        }
        elseif((isset($_POST["category"]) =="burgers")
        {
            $sql_st = 'SELECT name FROM burger';
        }
    }*/
    include '../connect.php';
    $dataset = $conn->query($sql_st);
    
    echo '
        <form method="post" action="Update Stock.php">
            <div>
                <label for="name">Name</label>
                <br>
                <select name="name" class="form-control">
                    <option value="none">-Select name of the product-</option>';
                        
                        while($row = $dataset->fetch_assoc())
                        {
                            echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
                        }

                    echo'
                </select>
            </div>
        </form>    
    ';
?>
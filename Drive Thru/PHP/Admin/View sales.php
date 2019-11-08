<br><br><br>
<?php
    include 'C:/xampp/htdocs/Drive Thru/HTML/nav admin.html';
    include '../connect.php';

    $sql_st = "SELECT * FROM sales";
   
    echo '
    <div class="container">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">Order #</th>
                    <th scope="col">Date and Time</th>
                    <th scope="col">Vat </th>
                    <th scope="col">Price</th>
                </tr>
            </thead>';
    if($conn->query($sql_st))
    {   
        $vat = 0;
        $total = 0;
        $ds = $conn->query($sql_st);
        while($row=$ds->fetch_assoc())
        {
            $vat += $row["vat"];
            $total += $row["total"];
            echo '
                <tr>
                    <td>'.$row["order_id"].'</td>
                    <td>'.$row["date"].'</td>
                    <td>'.$row["vat"].'</td>
                    <td>'.$row["total"].'</td>
                </tr>
            ';
        }
        echo '
            <tr>
                <td colspan="2">Total</td>
                <td>'.$vat.'</td>
                <td>'.$total.'</td>
            </tr>
        </table>
        
    </div>
    ';
    }

    include '../close.php';
?>
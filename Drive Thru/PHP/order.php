<?php
    include 'connect.php';
    $total = (int)str_replace("R", "", $_POST['total']);
    $vat = number_format($total * 0.15, 2);
    $date = '<script>
        var date = d.getFullYear() + "-" + d.getMonth() + "-" + d.getDate()
    </script>';
    $sql_st = 'INSERT INTO sales (`date`,`vat`,`total`) VALUES (NOW(),'.$vat.','.$total.')';

    if ($conn->query($sql_st))
    {
        $drinks = $conn->query("SELECT `name` FROM drinks");
        $burgers = $conn->query("SELECT `name` FROM burger");
        $sharing = $conn->query("SELECT `name` FROM sharing");
        echo '<script>alert("Order placed successfully</script>';
        header("Location: index.php");
        session_destroy();
    }else{
        die ( $conn->error);
    }
    include 'close.php';
?>
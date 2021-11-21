<?php 


function insert_order($conn,$ord_id,$ord_acct)
{
    $sqlCartAdd = "INSERT INTO tbl_orders (ord_id,ord_uid) VALUES ('$ord_id','$ord_acct');";
    $result = mysqli_query($conn,$sqlCartAdd);

}

function insert_order_deatils($conn,$orderslastid,$ord_id)
{
    $sqlAddOrder = "INSERT INTO tbl_orderdetails (ord_lid,ords_id) VALUES ('$orderslastid','$ord_id');";
    $result = mysqli_query($conn,$sqlAddOrder);
}


function add_to_cart($conn,$uid,$bid)
{
    $sqlCartAdd = "INSERT INTO tbl_cart (uid,bid) VALUES ('$uid','$bid');";
    $result = mysqli_query($conn,$sqlCartAdd);

    header("location: ../bookview.php?id=".$bid."&add_to_cart=success");
    exit();
}

function book_added($conn,$uid,$bid)
{
    $sqlValidate = "SELECT * FROM tbl_cart WHERE uid = '".$uid."' AND bid = '".$bid."';";
    $result = mysqli_query($conn,$sqlValidate);

  
    
    if(mysqli_num_rows($result) > 0)
    {
        $results = true;
        return $results;
    }
    else 
    {
        $results = false;
        return $results;    
    }
}

?>
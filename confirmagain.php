<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
}
$btn="";
require("connection.php"); 
$coid="";
extract($_POST);
if ($type=="reorder") {
    $sql="update confirmed_orders set aid='$aid' where id='$coid'";
    $rs=$db->exec($sql);
    $sql="select * from confirmed_orders where id='$coid'";
    $rs=$db->query($sql);
    $row=$rs->fetch(PDO::FETCH_OBJ);
    $aid=$row->aid;
    $uid=$row->uid;
    $st=$row->sub_total;
    $df=$row->delivery_fee;
    $oids=explode(',', $row->oids);
}
else{
    $stringids=implode(',',$iid);
    $sql="insert into confirmed_orders(uid,oids,sub_total, aid)
    VALUES('". $_SESSION['activeUser'] ."','$stringids','$st','$aid')";
    $rs=$db->exec($sql);
    $lid=$db->lastInsertId();
    
foreach ($iid as $key) {
    $sql="update orders set confirmed=1 where id=$key";
    $rs=$db->exec($sql); 
}

$sql="select * from confirmed_orders where id='$lid'";
$rs=$db->query($sql);
$row=$rs->fetch(PDO::FETCH_OBJ);
$aid=$row->aid;
$uid=$row->uid;
$st=$row->sub_total;
$df=$row->delivery_fee;
$oids=explode(',', $row->oids);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
<link rel="stylesheet" href="css/linearicons.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/nice-select.css">                  
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="generic-banner">
        <div class="container" style="padding-top: 30px; padding-bottom: 15px;">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="text-white">Order Confirmed</h2>
                </div>
            </div>  
        </div>
    </div>
    <div class="container" style="margin-top: 40px;">
        <div class="single-menu">
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-2">
                            <h4>Order ID:</h4>
                        </div>
                        <div class="col-md-4">
                            <h4><?php echo $row->id;?></h4>
                        </div>
                    </div>
                    <?php
                        $status="";
                        $color="";
                        if ($row->status=="ip") {
                            $status="In Process";
                            $color="#ff8400";
                        }elseif ($row->status=="it") {
                            $status="In Transit";
                            $color="#f7f016";
                        }elseif ($row->status=="dl") {
                            $status="Delivered";
                            $color="#3ce312";
                        }
                        ?>
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-2">
                            <h4>Status:</h4>
                        </div>
                        <div class="col-md-4">
                            <h4 style="color: <?php echo $color?>"><?php echo $status;?></h4>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-2">
                            <h4>Created:</h4>
                        </div>
                        <div class="col-md-4">
                            <h4><?php echo $row->created;?></h4>
                        </div>
                    </div>
                    <div class="row" style="border: 1px solid gray; margin-bottom: 30px;"></div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-12">
                            <h3>Delivery Address</h3>
                        </div>
                    </div>
                    <?php
                    $sql="select * from users where id='$uid'";
                    $rs=$db->query($sql);
                    $row=$rs->fetch(PDO::FETCH_OBJ);
                    ?>
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-12">
                            <h4><?php echo "$row->firstname $row->lastname";?></h4>
                        </div>
                    </div>
                    <?php
                    $sql="select * from address where id='$aid'";
                    $rs=$db->query($sql);
                    $row=$rs->fetch(PDO::FETCH_OBJ);
                    ?>
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-12">
                            <h4><?php echo $row->area;?></h4>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-12">
                            <h4><?php echo "Blk $row->block, Rd $row->block, Bldg $row->building, Flr $row->building, Flat $row->apartment";?></h4>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-12">
                            <h4><?php echo "Building $row->building";?></h4>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-12">
                            <h4>Mobile: <?php echo $row->mobile;?></h4>
                        </div>
                    </div>
                    <div class="row" style="border: 1px solid gray; margin-bottom: 30px;"></div>
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-md-12">
                            <h3>Order Summary</h3>
                        </div>
                    </div>
                    <?php
                    foreach ($oids as $key) {
                        $sql="select items.name,orders.quantity, orders.total_price from orders,items where orders.id='$key' and orders.iid=items.id";
                        $rs=$db->query($sql);
                        $row=$rs->fetch(PDO::FETCH_OBJ); 
                    ?>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <h4><?php echo "$row->name";?></h4>
                        </div>
                        <div class="col-md-4">
                            <h4><?php echo "BHD $row->total_price x $row->quantity";?></h4>
                        </div>
                        <div class="col-md-4" align="right">
                            <h4>
                                <?php
                                $item_total= $row->total_price*$row->quantity;
                                 echo sprintf('%0.3f',$item_total);
                                 ?>
                                
                            </h4>
                        </div>
                    </div>
                    <?php }?>
                    <div class="row" style="margin-bottom: 15px; margin-top: 70px;">
                        <div class="col-md-6">
                            <h4>Sub Total</h4>
                        </div>
                        <div class="col-md-6" align="right">
                            <h4>BHD <?php echo sprintf('%0.3f',$st);?></h4>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-6">
                            <h4>Delivery Fee</h4>
                        </div>
                        <div class="col-md-6" align="right">
                            <h4>BHD <?php echo sprintf('%0.3f',$df);?></h4>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-6">
                            <h4>Total</h4>
                        </div>
                        <div class="col-md-6" align="right">
                            <h4>BHD 
                                <?php
                                $total=$st+$df; 
                                echo sprintf('%0.3f',$total);
                                ?>      
                            </h4>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <a href="menu.php" class="genric-btn primary-border radius" style="width: 100%; font-size: 16pt;">DONE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
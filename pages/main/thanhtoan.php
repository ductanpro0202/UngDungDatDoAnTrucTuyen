<?php
session_start();
include('../../admincp/config/config.php');
$id_khachhang=$_SESSION['id_khachhang'];
$code_order= rand(0,9999);
$insert_cart="INSERT INTO tbl_cart(id_khachhang, code_cart, cart_status) 
VALUE ('".$id_khachhang."', '".$code_order."', 1)";
$cart_query= mysqli_query($mysqli, $insert_cart);
if($cart_query){
    //them gio hang chi tiet
    foreach($_SESSION['cart'] as $key => $value){
        $id_sanpham = $value['id'];
        $soluongmua=$value['soluongmua'];
        $insert_order_details="INSERT INTO tbl_cart_details(id_sanpham, code_cart, soluongmua) 
        VALUE ('".$id_sanpham."', '".$code_order."', '".$soluongmua."')";
        mysqli_query($mysqli, $insert_order_details);
    }
}
unset($_SESSION['cart']);
header('Location:../../index.php?quanly=camon');
?>
<?php
include_once( __DIR__.'/inc/functions.php' );

// if page was submitted, insert new bill to db and redirect
if( isset( $_POST['submit'] ) ){

    $studentName = $_POST['stdName'];
    $regNo = $_POST['stdRegNo'];
    $classId = $_POST['class'];
    $depositDate = $_POST['depositDate'];
    $depositedBy = $_POST['depositedBy'];
    $particulars = $_POST['particulars'];
    $months = $_POST['months'];

    $receiptId = saveBill($studentName, $regNo, $classId, $depositDate, $depositedBy, 
                            $particulars, $months);

    // if receipt id was returned, redirect to view, else redirect to home
    if( !empty( $receiptId ) ){
        header('Location: view.php?id=' . $receiptId );
    }else{
        header('Location: index.php');
    }
    
}
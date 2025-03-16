<?php

include_once(__DIR__.'/db.php');


/**
 * Returns an associative array of existing classes in the DB
 */
function getClasses() {
    global $mysqli;

    $ret = [];

    $query = "SELECT * FROM classes";
    $result = $mysqli->query( $query );
    if( $result && $result->num_rows > 0 ){

        while($row = $result->fetch_array()){
            $ret[ $row['id'] ] = $row['name'];
        }
    }
    $result->free();

    return $ret;
}

/**
 * Returns an associative array of existing particulars
 */
function getParticulars() {
    global $mysqli;

    $ret = [];

    $query = "SELECT * FROM particulars";
    $result = $mysqli->query( $query );
    if( $result && $result->num_rows > 0 ){

        while($row = $result->fetch_array()){
            $ret[ $row['id'] ] = array( 'name'=> $row['name'], 'price' => $row['price'] );
        }
    }
    $result->free();

    return $ret;
}

/**
 * Get receipt list for home page
 */
function getReceiptsSummary(){
    global $mysqli;

    $ret = [];
    $query = "SELECT r.id, r.stdName, r.regNo, c.name AS className, r.depositDate, r.depositedBy, SUM(p.price) AS sum 
                FROM receipts r
                LEFT JOIN receipt_particular rp on r.id = rp.receipt_id
                INNER JOIN particulars p ON p.id = rp.particular_id
                INNER JOIN classes c on r.classId = c.id
                GROUP BY r.id
                ORDER BY r.id DESC";
    
    $result = $mysqli->query( $query );
    if( $result && $result->num_rows > 0 ){

        while($row = $result->fetch_array()){
            $ret[ $row['id'] ] = array( 'stdName'=> $row['stdName'], 'regNo' => $row['regNo'], 'className' => $row['className'],
                                            'depositDate' => $row['depositDate'], 'depositedBy' => $row['depositedBy'], 'sum' => $row['sum'] );
        }
    }
    $result->free();

    return $ret;
}

/**
 * Get receipt details by id
 */
function getReceipt($id){
    global $mysqli;

    $ret = [];
    $query = "SELECT r.id, r.stdName, r.regNo, c.name AS className, r.depositDate, r.depositedBy, SUM(p.price) * COUNT(DISTINCT p.id) / COUNT(*) AS sum,
                GROUP_CONCAT(DISTINCT CONCAT( p.name, ' (Rs. ', p.price, ')' ) separator '\n' ) AS particulars,
                GROUP_CONCAT(DISTINCT MONTHNAME(STR_TO_DATE(rn.month, '%m')) separator '\n' ) AS months,
                COUNT(DISTINCT rn.month) AS monthCount
                FROM receipts r
                LEFT JOIN receipt_month rn ON rn.receipt_id = r.id
                LEFT JOIN receipt_particular rp on r.id = rp.receipt_id
                INNER JOIN particulars p ON p.id = rp.particular_id
                INNER JOIN classes c on r.classId = c.id
                WHERE r.id = $id";
    
    $result = $mysqli->query( $query );
    if( $result && $result->num_rows > 0 ){

        if($row = $result->fetch_array()){
            $ret = array( 'id' => $row['id'], 'stdName'=> $row['stdName'], 'regNo' => $row['regNo'], 'className' => $row['className'],
                                            'depositDate' => $row['depositDate'], 'depositedBy' => $row['depositedBy'], 
                                            'sum' => $row['sum'], 'particulars' => $row['particulars'], 
                                            'months' => $row['months'], 'monthCount' => $row['monthCount'] );
        }
    }
    $result->free();

    return $ret;
}

/**
 * Saves a bill in the database with the given data
 */
function saveBill($studentName, $regNo, $classId, $depositDate, $depositedBy, $particulars, $months){
    global $mysqli;

    // start transaction
    $mysqli->autocommit(FALSE);

    // start insert
    $queryReceipt = "INSERT INTO receipts(stdName, regNo, classId, depositDate, depositedBy) VALUES(?, ?, ?, ?, ?)";
    $stmtReceipt = $mysqli->prepare($queryReceipt);
    $stmtReceipt->bind_param("ssiss", $studentName, $regNo, $classId, $depositDate, $depositedBy);
    $stmtReceipt->execute();

    // get receipt id
    $receiptId = $mysqli->insert_id;

    // insert particulars
    $queryParticulars = "INSERT INTO receipt_particular(receipt_id, particular_id) VALUES(?, ?)";
    $stmtReceiptParticular = $mysqli->prepare($queryParticulars);
    $stmtReceiptParticular->bind_param("ii", $receiptId, $particularsId);
    foreach( $particulars as $particularsId ){
        $stmtReceiptParticular->execute();
    }

    // insert months
    $queryMonths = "INSERT INTO receipt_month(receipt_id, month) VALUES(?, ?)";
    $stmtReceiptMonth = $mysqli->prepare($queryMonths);
    $stmtReceiptMonth->bind_param("ii", $receiptId, $month);
    foreach( $months as $month ){
        $stmtReceiptMonth->execute();
    }

    // commit transaction
    $mysqli->commit();

    return $receiptId;    
}
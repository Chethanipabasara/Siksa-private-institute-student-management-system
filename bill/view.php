<?php
include_once( __DIR__.'/inc/functions.php' );

$id = $_GET['id'];
if( empty( $id ) ){
    header('Location: index.php');
}

$receipt = getReceipt( $id );
if( empty( $receipt['id'] ) ){
    die('Not Available');
}

$monthCount = intval( $receipt['monthCount'] );
$totalFees = 250 * $monthCount;
$total = $totalFees + $receipt['sum'];
?>

<?php include_once(__DIR__.'/header.php'); ?>
<body class="viewpage">
    <div class="container">
        <div class="columns">
            <div class="column col-8 col-mx-auto view-container">
                <div class="floating-button-container">
                    <a class="btn btn-lg btn-error" href="index.php">
                        <i class="icon icon-arrow-left"></i> Back
                    </a>
                </div> 
                <div class="text-center">
                    <h1>Payment Receipt</h1>
                </div> 
                <div class="columns">
                    <div class="col-4 col-mx-auto">
                        <h5><?php echo 'Student: ', $receipt['stdName'], ' / (', $receipt['regNo'], ')'; ?></h5>
                        <h6>Class: <?php echo $receipt['className']; ?></h6>
                        <h6>Paid By: <?php echo $receipt['depositedBy']; ?></h6>
                    </div>
                    <div class="col-4 col-mx-auto">
                        <h6>Receipt No: <?php echo $receipt['id']; ?></h6>
                        <h6>Date: <?php echo $receipt['depositDate']; ?></h6>
                    </div>
                    <div class="col-12 table-container">
                        <table class="table receipt-table text-center">
                            <thead>
                                <tr>
                                    <th>Fees (Rs 250 x)</th>
                                    <th>Particulars</th>
                                    <th>Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo nl2br( $receipt['months'] ); ?></td>
                                    <td><?php echo nl2br( $receipt['particulars'] ); ?></td>
                                    <td><?php echo number_format($totalFees, 2), ' + ', number_format($receipt['sum'], 2) ; ?></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th>Rs. <?php echo number_format($total, 2); ?> /-</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col-12">
                        <div class="floating-button-container">
                            <button class="btn btn-lg btn-primary" onclick="window.print()">
                                <i class="icon icon-share"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
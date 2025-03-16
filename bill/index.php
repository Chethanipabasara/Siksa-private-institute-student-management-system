<?php
include_once( __DIR__.'/inc/functions.php' );

$receipts = getReceiptsSummary();
?>

<?php include_once(__DIR__.'/header.php'); ?>
<body class="homepage">
    <div class="container">
        <div class="columns">
            <div class="column col-8 col-mx-auto">
                 <div class="floating-button-container">
                    <a class="btn btn-lg btn-primary" href="new.php">
                        <i class="icon icon-plus"></i> New
                    </a>
                </div>  
                <div class="text-center">
                    <h1>Student Fees</h1>
                    <div class="columns">
                        <div class="col-12">
                            <?php

                                if( sizeof( $receipts ) == 0 ){
                                    ?>
                                <div class="receipt-summary">
                                    No Receipts found
                                </div>
                                    <?php
                                }else{

                                    foreach( $receipts as $id => $receipt ){
                                    ?>
                                    
                                    <div class="receipt-summary columns text-center">
                                        <div class="col-2">
                                            <h4>Receipt : <?php echo $id ?></h4>
                                        </div>
                                        <div class="col-8">
                                            <h4><?php echo $receipt['stdName'], ' / ', $receipt['className'], ' (Rs. ', number_format($receipt['sum'], 2), ')' ; ?></h4>
                                        </div>
                                        <div class="col-2">
                                            <a class="btn btn-lg btn-success" href="view.php?id=<?php echo $id; ?>">View</a>
                                        </div>
                                    </div>

                                    <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>                              
            </div>
        </div>
    </div>
</body>
</html>
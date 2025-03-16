<?php
include_once( __DIR__.'/inc/functions.php' );

$classes = getClasses();
$particulars = getParticulars();
?>

<?php include_once(__DIR__.'/header.php'); ?>
<body class="newpage">
    <div class="container">
        <div class="columns">
            <div class="column col-8 col-mx-auto">
                 <div class="floating-button-container">
                    <a class="btn btn-lg btn-error" href="index.php">
                        <i class="icon icon-arrow-left"></i> Back
                    </a>
                </div>  
                <div class="text-center">
                    <h1>Add Student Fee</h1>
                </div>                              
            </div>
            <div class="column col-8 col-mx-auto form-container">
                <form action="add.php" method="POST">

                    <div class="columns main-details">
                        <div class="column col-3">
                            <div class="form-group">
                                <label class="form-label" for="stdName">Name</label>
                                <input class="form-input" type="text" id="stdName" placeholder="Name" name="stdName" required>
                            </div>
                        </div>

                        <div class="column col-2">
                            <div class="form-group">
                                <label class="form-label" for="stdRegNo">Registration No</label>
                                <input class="form-input" type="text" id="stdRegNo" placeholder="Registration No" name="stdRegNo" required>
                            </div>
                        </div>

                        <div class="column col-3">
                            <div class="form-group">
                                <label class="form-label" for="class">Class</label>
                                <select class="form-select" name="class" required>
                                    <option value="" disabled selected>Choose an option</option>
                                    <?php 
                                        foreach( $classes as $id => $className ){
                                            echo "<option value='$id'>", $className, "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="column col-2">
                            <div class="form-group">
                                <label class="form-label" for="depositDate">Deposit Date</label>
                                <input class="form-input" type="date" id="depositDate" placeholder="Date" name="depositDate"
                                    value="<?php echo date('Y-m-d'); ?>" readonly required>
                            </div>
                        </div>

                        <div class="column col-2">
                            <div class="form-group">
                                <label class="form-label" for="depositedBy">Deposited By</label>
                                <input class="form-input" type="text" id="depositedBy" placeholder="Deposited By" name="depositedBy" required>
                            </div>
                        </div>
                    </div>

                    <div class="columns additional">
                        <div class="column col-6 text-center">
                            <div class="additional-group">
                                <h4>Particulars</h4>
                                <table class="table">
                                    <tbody>
                                        <?php 

                                            foreach( $particulars as $id => $item ){
                                        ?>
                                        <tr>
                                            <td class="table-item-name"><?php echo $item['name'], ' (Rs. ', number_format($item['price'], 2), ')'; ?></td>
                                            <td>
                                                <div class="form-group">
                                                    <label class="form-switch">
                                                        <input type="checkbox" name="particulars[]" value="<?php echo $id; ?>">
                                                        <i class="form-icon"></i>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="column col-6 text-center">
                            <div class="additional-group">
                                <h4>Months</h4>
                                <table class="table">
                                    <tbody>
                                        <?php

                                            for( $i = 0 ; $i < 12 ; $i = $i + 2 ){
                                                $j = $i +1;
                                        ?>
                                        <tr>
                                            <td class="table-item-name"><?php echo date('F', strtotime("+$i months")); ?></td>
                                            <td>
                                                <div class="form-group">
                                                    <label class="form-switch">
                                                        <input type="checkbox" name="months[]" value="<?php echo date('n', strtotime("+$i months")); ?>">
                                                        <i class="form-icon"></i>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="table-item-name"><?php echo date('F', strtotime("+$j months")); ?></td>
                                            <td>
                                                <div class="form-group">
                                                    <label class="form-switch">
                                                        <input type="checkbox" name="months[]" value="<?php echo date('n', strtotime("+$j months")); ?>">
                                                        <i class="form-icon"></i>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="col-12 btn-submit-container">
                            <button type="submit" class="btn btn-lg btn-success" name="submit">Submit</button>
                        </div>
                    </div>
                </form>              
            </div>
        </div>
    </div>
</body>
</html>
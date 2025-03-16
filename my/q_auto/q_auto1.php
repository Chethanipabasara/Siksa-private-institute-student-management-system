<!--This page Print All Data in Product Table--> 
<tbody>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'demo'); // setup your database connection
    $query = "SELECT *  FROM `regist`";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $cat_id = "";
            $cat_id = $row['id'];
            $sql = "SELECT * FROM regist WHERE id=$cat_id"; //cat_id = Select category id
            $result1 = mysqli_query($con, $sql);
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $v_id = "";
                $v_id = $row['v_id'];
                $sql1 = "SELECT * FROM vendor WHERE v_id=$v_id"; //V_id = Vendor id convert to Vendor name
                $result2 = mysqli_query($con, $sql1);
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    ?>
                    <tr>
                        <td>Pro-00<?php echo $row['id']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row2['mname']; ?></td>
                        <td><?php echo $row1['lname']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row2['vendor_name']; ?></td>
                        <td><?php echo $row1['email']; ?></td>
                        <td><?php echo $row['uname']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        
                        <td>
                            <a class="btn btn-success btn-sm" style="color: #fff;" href="edit_qty_fun.php?pro_id=<?php echo $row['id']; ?>" target="_blank">Manage</a>
                        </td>
                    </tr>
                    <?php
                }
            }
        }
    }
    ?>
</tbody>
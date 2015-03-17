<?php
include './config.php';
$sql = " SELECT * FROM memo WHERE id = 1";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$memo = $row['data'];
?>
<div class="row">
    <div class="col-md-offset-4 col-md-4">
        <div class="print_section">
            <div class="center-block ">
            <center><h1 class="center"> <span class="center">Al Nahian Traders</span></h1></center>
            </div>
            <form class="form-horizontal" role="form" action="process/add_sale.php" method="post">
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label left">Name</label>
                    <div class="col-sm-8">
                        <input type="text" required="" class="form-control" name="name" id="name" placeholder="Enter Customer full name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-4 control-label ">Address</label>
                    <div class="col-sm-8">
                        <input type="text" required="" class="form-control" name="address" id="address" placeholder="Enter Customer address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-4 control-label ">Phone no</label>
                    <div class="col-sm-8">
                        <input type="text" required="" class="form-control" name="phone" id="phone" placeholder="Enter Customer Phone no">
                    </div>
                </div>
                <!--This section is to show cart-->
                <div class="row">
                    <div class="col-md-6 cal">
                        <?php
                        echo" MEMO NO : " . $memo;
                        ?>
                    </div>
                    <div class="col-md-6 cal">
                        <div class="right_al">
                            <p >
                            <?php
                            date_default_timezone_set('Asia/Dhaka');
                            $date = date("Y-m-d h:i:sa");
                            echo "Date : " . $date;
                            ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                        <center>
                            <?php
                            $num = 0;
                            $total = 0;
                            $sql = "SELECT * FROM `chart`WHERE memo= $memo ORDER BY id DESC";
                            $result = mysqli_query($con, $sql);
                            //                if($result) print_r($result);
                            $num = mysqli_num_rows($result);
                            //                echo$num;
                            if ($num != 0) {
                            ?>
                            <table class="table table-bordered table-hover table-responsive">
                                <tr class="active">
                                    <th>ID</th>
                                    <th>Item Code</th>
                                    <th>Company</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Total</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                Echo '<tr class="success">
                                    <td class="info">' . $row['id'] . '</td>
                                    <td class="active">' . $row['item'] . '</td>
                                    <td class="active">' . $row['company'] . '</td>
                                    <td class="success">' . $row['qty'] . '</td>
                                    <td class="warning">' . $row['s_rate'] . '</td>
                                    <td class="info">' . $row['total'] . '</td>
                                </tr>';
                                $total += $row['total'];
                                }
                                ?>
                            </table>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 cal right_al">
                        <p>Total = <?php echo "$total" ?></p>
                    </div>
                    <div class="col-md-12 cal right_al">
                        
                        <!-- <form class="form-inline" role="form" action="process/add_sale.php" method="post"> -->
                            <input type="number" class="hidden" readonly="" name="memo" id="memo" value=<?php echo $memo ?>>
                            <input type="number" class="hidden" readonly="" name="total" id="total" value=<?php echo $total ?>>
                            <div class="form-group">
                                <label for="due" class="col-sm-4 control-label ">Due</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="due" id="due" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="due_add" id="due_add" class="btn btn-default tiles_salse_proceed">Print it</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <?php
                } else {
                echo" <center><h1> NO Data Available </h1></center> ";
                }
                ?>
            </div>
        </div>
    </div>
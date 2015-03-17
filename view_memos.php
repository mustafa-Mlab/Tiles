<?php require './config.php'; ?>
<div class="page">
    <div class="row">
        <div class="col-md-12">
            <div class="center">
                <?php
                $num = 0;
                $total = 0;
                $due=0;
                $profit = 0;
                $sql = "SELECT * FROM `salse`ORDER BY id DESC";
                $result = mysqli_query($con, $sql);
//                if($result) print_r($result);
                $num = mysqli_num_rows($result);
//                echo$num;
                if ($num != 0) {
                    ?>
                    <table class="table table-bordered table-hover table-responsive">
                        <tr class="active">
                            <th>Id</th>
                            <th>Memo No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Total</th>
                            <th>Due</th>
                            <th>Profit</th>
                            <th>Selling Date</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            Echo '<tr class="success">
                            <td class="active">' . $row['id'] . '</td>
                            <td class="active">' . $row['memo_no'] . '</td>
                            <td class="active">' . $row['name'] . '</td>
                            <td class="active">' . $row['address'] . '</td>
                            <td class="active">' . $row['phone'] . '</td>
                            <td class="active">' . $row['total'] . '</td>
                            <td class="success">' . $row['due'] . '</td>
                            <td class="warning">' . $row['profit'] . '</td>
                            <td class="danger">' . $row['salse_date'] . '</td>
                        </tr>';
                            $total += $row['total'];
                            $profit += $row['profit'];
                            $due += $row['due'];
                        }
                        ?>
                        <tr class="warning">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo 'Total ' ?></td>
                            <td><?php echo $total ?></td>
                            <td><?php echo $due ?></td>
                            <td><?php echo $profit ?></td>
                            <td></td>
                        </tr>

                    </table>
                <?php
                } else {
                    echo" <h1 class = 'center' > NO Data Available </h1> ";
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php require './config.php'; ?>
<div class="page">
    <div class="row">
        <div class="col-md-12">
            <div class="center">
                <?php
                $num = 0;
                $total = 0;
                $sql = "SELECT * FROM `chart`ORDER BY id DESC";
                $result = mysqli_query($con, $sql);
//                if($result) print_r($result);
                $num = mysqli_num_rows($result);
//                echo$num;
                if ($num != 0) {
                    ?>
                    <table class="table table-bordered table-hover table-responsive">
                        <tr class="active">
                            <th>Id</th>
                            <th>Company</th>
                            <th>Item Code</th>
                            <th>Quantity</th>
                            <th>Purchase Rate</th>
                            <th>Selling Rate</th>
                            <th>Total</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            Echo '<tr class="success">
                            <td class="active">' . $row['id'] . '</td>
                            <td class="active">' . $row['company'] . '</td>
                            <td class="active">' . $row['item'] . '</td>
                            <td class="success">' . $row['qty'] . '</td>
                            <td class="warning">' . $row['p_rate'] . '</td>
                            <td class="danger">' . $row['s_rate'] . '</td>
                            <td class="info">' . $row['total'] . '</td>
                        </tr>';
                            $total += $row['total'];
                        }
                        ?>
                        <tr class="warning">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo 'Total ' ?></td>
                            <td><?php echo $total ?></td>
                            
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
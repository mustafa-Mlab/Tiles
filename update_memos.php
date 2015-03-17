<?php
require_once("config.php");
?>
<div class="page">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" role="form" action="process/update_memo.php" method="post">
                <div class="form-group ">
                    <label for="memo" class="col-sm-4 control-label">Memo No</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="memo" id="memo" > 
                        <?php
                            include './config.php';
                            $sql = "SELECT memo_no FROM `salse`ORDER BY memo_no ASC";
                            $result = mysqli_query($con, $sql);
                            $num = mysqli_num_rows($result);
                            if ($num != 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value = " . $row['memo_no'] . "> " . $row['memo_no'] . " </option>";
                                }
                            } else {
                                echo '<option> No Item found ' . print_r($result) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="due" class="col-sm-4 control-label">Due</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="due" id="due" placeholder="Due">
                    </div>
                </div>
                <center><button type="submit" class="btn btn-default tiles_button col-sm-2">Update</button></center>
            </form>
        </div>
    </div>
</div>
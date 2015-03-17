<div class="page">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" role="form"action="process/add_to_cart.php" method="post">
                <div class="form-group">
                    <label for="memo" class="col-sm-4 control-label">Memo NO:</label>
                    <div class="col-sm-8">
                        <?php
                        require_once 'config.php';
                        $sql = " SELECT * FROM memo WHERE id = 1";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $memo = $row['data'];
                        ?>
                        <input type="number" readonly="readonly" class="form-control" name="memo" id="memo" value=<?php echo $memo; ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="item" class="col-sm-4 control-label">Item Description</label>
                    <div class="col-sm-8">
                        <input type="text" required="" class="form-control" name="item" id="item" placeholder="Enter Item Description code">
                    </div>
                </div>
                <div class="col-sm-offset-4 col-sm-6 item_avail_result" id="item_avail_result"></div>
                <div class="form-group">
                    <label for="company" class="col-sm-4 control-label">Company</label>
                    <div class="col-sm-8">
                        <input type="text" required="" class="form-control" name="company" id="company" placeholder="Enter company name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="qty" class="col-sm-4 control-label">Quantity</label>
                    <div class="col-sm-8">
                        <input type="number" required="" class="form-control" name="qty" id="qty" placeholder="Enter Quantity in sq ft">
                    </div>
                </div>
                <input type="number" class="hidden" name="p_rate" id="p_rate">
                <div class="form-group">
                    <label for="rate" class="col-sm-4 control-label">Rate</label>
                    <div class="col-sm-8">
                        <input type="number" required="" class="form-control" name="rate" id="rate" placeholder="Enter Rate">
                    </div>
                </div>
                <div class="form-group">
                    <label for="total" class="col-sm-4 control-label">Total</label>
                    <div class="col-sm-8">
                        <input type="number" required="" class="form-control" name="total" id="total" placeholder="Enter Rate">
                    </div>
                </div>
                
                <center>
                <button type="submit" class="btn btn-default tiles_button col-sm-2" id="add_to_cart"><i class="fa fa-cart-plus"></i>
Add to cart</button>
                </center>
            </form>
        </div>
        <div class="col-md-6">
            <!--This section is to show cart-->
            <div class="row">
                <div class="col-md-6">
                    <?php
                    echo" MEMO NO : " . $memo;
                    ?>
                </div>
                <div class="col-md-6">
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
                    <tr class="warning">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><div class="button tiles_salse_proceed" id="print" > <a href="http://localhost/Tiles/index.php?id=prememo">proceed</a></div></td>
                        <td><?php echo 'Total ' ?></td>
                        <td><?php echo $total ?></td>
                    </tr>
                </table>
                <div class="row">
                <form class="form-inline" role="form" action="process/deleet_frm_cart.php" method="post">
                    <div class="form-group col-md-7">
                        <label class="col-md-3" for="id">ID:</label>
                        <select class="form-control col-md-5" name="id" id="id">
                            <option value= 0 selected="selected">Select One</option>
                            <?php
                            include './config.php';
                            $sql = "SELECT * FROM `chart`ORDER BY item ASC";
                            $result = mysqli_query($con, $sql);
                            //                if($result) print_r($result);
                            $num = mysqli_num_rows($result);
                            if ($num != 0) {
                            while ($row = mysqli_fetch_array($result)) {
                            echo "<option value = " . $row['id'] . "> " . $row['id'] . " </option>";
                            }
                            } else {
                            echo '<option> No Item found ' . print_r($result) . '</option>';
                            }
                            ?>
                        </select>
                        
                    </div>
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-default tiles_button"><i class="fa fa-times"></i>Delete</button>
                    </div>
                    
                </form>
                </div>
                <?php
                } else {
                echo" <center><h1> NO Data Available </h1></center> ";
                }
                ?>
                </center>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$('#item').keyup(function(){ // Keyup function for check the user action in input
var item = $(this).val(); // Get the username textbox using $(this) or you can use directly $('#username')
var itemAvailResult = $('#item_avail_result'); // Get the ID of the result where we gonna display the results
// if(Username.length > 2) { // check if greater than 2 (minimum 3)
itemAvailResult.html('Loading..'); // Preloader, use can use loading animation here
var UrlToPass = 'action=item_availability&item='+item;
$.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
type : 'POST',
data : UrlToPass,
url  : 'process/checker.php',
success: function(responseText){ // Get the result and asign to each cases
// alert(responseText);
if(responseText == 0){
itemAvailResult.html('<span class="error">no item available in stock right now</span>');
}
else{
itemAvailResult.html(responseText);
}
// else if(responseText > 0){
//     itemAvailResult.html('<span class="success">item name available</span>');
// }
// else{(responseText > 0)
//     alert('Problem with sql query');
// }
}
});
if(item.length == 0) {
itemAvailResult.html('');
}
// }else{
//     UsernameAvailResult.html('Enter atleast 3 characters');
// }

});

// $('#password, #username').keydown(function(e) { // Dont allow users to enter spaces for their username and passwords
//     if (e.which == 32) {
//         return false;
//     }
// });
// $('#password').keyup(function() { // As same using keyup function for get user action in input
//     var PasswordLength = $(this).val().length; // Get the password input using $(this)
//     var PasswordStrength = $('#password_strength'); // Get the id of the password indicator display area

//     if(PasswordLength <= 0) { // Check is less than 0
//         PasswordStrength.html(''); // Empty the HTML
//         PasswordStrength.removeClass('normal weak strong verystrong'); //Remove all the indicator classes
//     }
//     if(PasswordLength > 0 && PasswordLength < 4) { // If string length less than 4 add 'weak' class
//         PasswordStrength.html('weak');
//         PasswordStrength.removeClass('normal strong verystrong').addClass('weak');
//     }
//     if(PasswordLength > 4 && PasswordLength < 8) { // If string length greater than 4 and less than 8 add 'normal' class
//         PasswordStrength.html('Normal');
//         PasswordStrength.removeClass('weak strong verystrong').addClass('normal');
//     }
//     if(PasswordLength >= 8 && PasswordLength < 12) { // If string length greater than 8 and less than 12 add 'strong' class
//         PasswordStrength.html('Strong');
//         PasswordStrength.removeClass('weak normal verystrong').addClass('strong');
//     }
//     if(PasswordLength >= 12) { // If string length greater than 12 add 'verystrong' class
//         PasswordStrength.html('Very Strong');
//         PasswordStrength.removeClass('weak normal strong').addClass('verystrong');
//     }
// });
});
</script>
<script>
$(document).ready(function () {
$("#item").change(function ()
{
var id = $(this).val();
var dataString = 'id=' + id;
$.ajax
({
type: "POST",
url: "process/ajax_rate.php",
data: dataString,
cache: false,
success: function (html)
{
var res = html.split(",");
if (res[0] === "Wrong") {
// alert("Wrong Id number please try again");
}
else {
var qty = document.getElementById("qty");
qty.value = res[0];
var p_rate = document.getElementById("p_rate");
p_rate.value = res[1];
var srate = document.getElementById("rate");
srate.value = res[2];
var company = document.getElementById("company");
company.value = res[3];
var total = document.getElementById("total");
total.value = qty.value * srate.value;
}
}
});
});
});
</script>
<script type="text/javascript">
var x = document.getElementById('qty'),
y = document.getElementById('rate'),
total = document.getElementById('total');
function calculate_total() {
// Use your real calculation here
total.value = Number(x.value) * Number(y.value);
}
if (window.addEventListener) {
x.addEventListener('change', calculate_total, false);
y.addEventListener('change', calculate_total, false);
} else if (window.attachEvent) {
x.attachEvent('onchange', calculate_total);
y.attachEvent('onchange', calculate_total);
}
</script>
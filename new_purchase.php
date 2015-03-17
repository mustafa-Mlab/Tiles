<div class="page">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" role="form" action="process/add_new_purchase.php" method="POST">
                <div class="form-group">
                    <label for="id" class="col-sm-4 control-label">Item Description</label>
                    <div class="col-sm-8">
                        <input type="number" required="" class="form-control" name="id" id="id" placeholder="Enter Item Description">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company" class="col-sm-4 control-label">Company</label>
                    <div class="col-sm-8">
                        <input type="text" required="" class="form-control" name="company" id="company" placeholder="Enter Item company">
                    </div>
                </div>
                <div class="form-group">
                    <label for="qty" class="col-sm-4 control-label">Quantity</label>
                    <div class="col-sm-8">
                        <input type="number" required="" class="form-control" name="qty" id="qty" placeholder="Enter Quantity in sq ft">
                    </div>
                </div>

                <div class="form-group">
                    <label for="purchase_rate" class="col-sm-4 control-label">Purchase Rate</label>
                    <div class="col-sm-8">
                        <input type="number" required="" class="form-control" name="purchase_rate" id="purchase_rate" placeholder="Enter Rate">
                    </div>
                </div>
                <div class="form-group">
                    <label for="selling_rate" class="col-sm-4 control-label">Selling rate</label>
                    <div class="col-sm-8">
                        <input type="number" required="" class="form-control" name="selling_rate" id="selling_rate" placeholder="Enter Rate">
                    </div>
                </div>
                <div class="form-group">
                    <label for="total" class="col-sm-4 control-label">Total</label>
                    <div class="col-sm-8">
                        <input type="number" required="" class="form-control" name="total" id="total" placeholder="Enter Rate">
                    </div>
                </div>
                <div class="form-group">
                    <label for="due" class="col-sm-4 control-label">Due</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="due" id="due" placeholder="Due">
                    </div>
                </div>
                <center><button type="submit" class="btn btn-default tiles_button col-sm-2">Add</button></center>
            </form>
        </div>
        <!--    <div class="col-md-6">
                cart
            </div>-->
    </div>
</div>

<script type="text/javascript">
    var x = document.getElementById('qty'),
            y = document.getElementById('purchase_rate'),
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
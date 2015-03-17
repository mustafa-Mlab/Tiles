<?php
session_start();
require_once './header.php';

?>
<div class="left left-sidebar">

</div>
<div class="content">
    <?php
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
            include($id . '.php');
    }
     else {
            include('sales.php');
        }
    ?>
</div>
<?php
require_once './footer.php';
?>
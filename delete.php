<?php
session_start();
require_once("config/database.php");
if (isset($_GET['uid'])) {
    $id = $_GET['uid'];
    $delete = $connection->query("DELETE FROM `register` WHERE `ID`='$id'");
    if ($delete) {
?>
        <script>
            window.location.assign("index.php")
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Data not deleted');
            window.location.assign("index.php")
        </script>

<?php
    }
}
?>
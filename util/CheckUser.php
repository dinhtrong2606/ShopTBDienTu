<?php
if (!isset($_SESSION['admin'])) {
    header("LOCATION: ../auth/login.php");
}

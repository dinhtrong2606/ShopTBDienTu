<?php
session_start();
if (isset($_SESSION['user'])) {
    session_destroy();
    unset($_SESSION['user']);
?>
    <script>
        window.location.href = 'index.php';
        alert('Bạn đã đăng xuất thành công !');
    </script>
<?php
}

?>
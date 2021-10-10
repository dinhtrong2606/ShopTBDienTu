<?php
if (!isset($_SESSION['user'])) {
?>
    <script>
        alert('Bạn phải đăng nhập trước khi mua hàng');
        window.location.href = 'login.php';
    </script>
<?php
}
?>
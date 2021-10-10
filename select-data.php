<?php
    require_once 'util/DBConnectionUtil.php';

    $sql = "SELECT * FROM comment ORDER BY id_comment DESC";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>

<div class="item">
    <h2><?php echo $row['name']; ?></h2>
    <p><?php echo $row['content']; ?></p>
</div>

    <?php } } ?>
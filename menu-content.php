<?php require_once 'templates/mello/inc/header.php' ?>
<?php require_once 'templates/mello/inc/leftbar.php' ?>
<head>
</head>
<title>Chính sách đổi - trả</title>
<body>
<div style="width: 800px">
<br />
<h1 style="text-align:center">Chính sách đổi - trả</h1>
<br /><br />
<table border="2" style="width: 790px;border: 1px solid black" >
    <tr>
        <th style="width: 600px"><b>NỘI DUNG CHÍNH SÁCH</b></th>
        <th><b>ĐIỀU KIỆN ÁP DỤNG</b></th>
    </tr>
    
        <?php 
        $qr = mysqli_query($mysqli, "SELECT * FROM content ORDER BY content_id ASC");
        while($row = mysqli_fetch_array($qr)){
            ?>
            <tr>
            <td><?php echo $row['content_1'] ?></td>
            <td><?php echo $row['content_2'] ?></td>
            </tr>
            <?php
        }
        ?>
    
</table>
</div>
</body>

<?php require_once 'templates/mello/inc/footer.php' ?>
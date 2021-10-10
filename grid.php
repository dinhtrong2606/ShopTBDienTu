<?php require_once 'templates/mello/inc/header.php'; ?>
<?php require_once 'templates/mello/inc/leftbar.php'; ?>
<div id="main" class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-main">
<br>
	<div class="wrap-banner-cate">
		<a class="cate-img" href="#"><img src="templates/mello/images/banner-2.png" alt="" /></a>
	</div>
	<div class="page-title category-title">
		<?php
		$qr3 = "SELECT * FROM menu WHERE id_menu = {$_GET['sanpham_id']} ORDER BY id_menu ASC";
		$result3 = $mysqli->query($qr3);
		while ($row3 = mysqli_fetch_array($result3)) {
		?>
			<h1><?php echo $row3['name_menu']; ?></h1>
		<?php
		}
		?>
	</div>
	<div id="catalog-listing">
		<div class="category-products page-product-list">
			<div class="toolbar-top">
				<div class="toolbar">
					<div class="sorter">
						<label>View as</label>
						<p class="view-mode">
							<strong title="Grid" class="grid">Grid</strong>
							<a href="list.php" title="List" class="list">List</a>
						</p>
					</div>
				</div>
			</div>
			<ul class="products-grid row">
				<?php
				$qr2 = "SELECT * FROM tbl_sanpham WHERE id_menu = {$_GET['sanpham_id']} ORDER BY sanpham_id ASC";
				$result2 = $mysqli->query($qr2);
				while ($row2 = mysqli_fetch_array($result2)) {
				?>
					<li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 item">
						<div class="item-wrap">
							<div class="item-image">
								<a class="product-image no-touch" href="#" title="Ipad Air and iOS7">
									<img class="first_image" style="width: 170px;height:170px" src="files/uploads/<?php echo $row2['sanpham_image']; ?>" alt="Product demo" />
								</a>
								<div class="item-btn">
									<div class="box-inner">
										<a title="Add to wishlist" href="#" class="link-wishlist">&nbsp;</a>
										<a title="Add to compare" href="#" class="link-compare">&nbsp;</a>
										<span class="qview"><a href="detail.html"></a>
											<a class="vt_quickview_handler" data-original-title="Quick View" data-placement="left" data-toggle="tooltip" href="#"><span>Quick View</span></a>
										</span>
									</div>
								</div>
								<a title="Add to cart" class="btn-cart" href="#">&nbsp;</a>
							</div>
							<div class="pro-info">
								<div class="pro-inner">
									<div class="pro-title product-name"><a href="detail.php?sanpham_id=<?php echo $row2['sanpham_id']; ?>"><?php echo $row2['sanpham_name']; ?></a></div>
									<div class="pro-content">
										<div class="wrap-price" style="width: 150px;">
											<div class="price-box">
												<span class="regular-price">
													<span class="price"><?php echo number_format($row2['sanpham_gia']) . ' vnđ'; ?></span></span>
											</div>
										</div>
										<div class="ratings">
											<div class="rating-box">
												<div class="rating" style="width:80%"></div>
											</div>
											<span class="amount"><a href="detail.html">1(s)</a></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end item wrap -->
					</li>
				<?php

				}
				?>
			</ul>
	</div>
</div>
</div>
</div>
</div>
</div>
<!--end content-->
</body>

</html>
<?php require_once 'templates/mello/inc/footer.php'; ?>
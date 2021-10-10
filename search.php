<?php require_once 'templates/mello/inc/header.php' ?>
<?php require_once 'templates/mello/inc/leftbar.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div style="width: 800px" id="catalog-listing">
		<div class="category-products page-product-list">
			<div class="toolbar-top">
				<div class="toolbar">
					<div class="sorter">
						<label>View as</label>
					</div>
				</div>
			</div>
			<ul class="products-grid row">

				<?php
				if(isset($_GET['action'])){
                    $search = $_POST['search'];
                }else{
                    $search = '';
                }

                $query = "SELECT * FROM tbl_sanpham WHERE sanpham_name LIKE '%$search%' ORDER BY sanpham_id ASC ";
                $result = $mysqli->query($query);
                while($arUser = mysqli_fetch_assoc($result))
                {
				?>
					<li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 item">
						<div class="item-wrap">
							<div class="item-image">
								<a class="product-image no-touch" href="#" title="Ipad Air and iOS7">
									<img class="first_image" style="width: 170px;height:170px" src="files/uploads/<?php echo $arUser['sanpham_image']; ?>" alt="Product demo" />
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
									<div class="pro-title product-name"><a href="detail.php?sanpham_id=<?php echo $arUser['sanpham_id']; ?>"><?php echo $arUser['sanpham_name']; ?></a></div>
									<div class="pro-content">
										<div class="wrap-price" style="width: 150px;">
											<div class="price-box">
												<span class="regular-price">
													<span class="price"><?php echo number_format($arUser['sanpham_gia']) . ' vnđ'; ?></span></span>
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
			<div class="toolbar-bottom">
				<div class="toolbar">
					<div class="pager">
						<div class="pages">
							<strong>Pages</strong>
							<ol>
								<li class="current">1</li>
								<li><a href="grid.html?p=2">2</a></li>
								<li>
									<a class="next" href="grid.html?p=2" title="Next">
										&nbsp; </a>
								</li>
							</ol>
						</div>
						<!--<label class="item-pp"></label>-->
					</div>
					<div class="sorter">
						<label>View as</label>
						<p class="view-mode">
							<strong title="Grid" class="grid">Grid</strong>
							<a href="grid.html?mode=list" title="List" class="list">List</a>
						</p>
						<div class="sort-by">
							<label>Sort By</label>
							<div class="wrap-sb">
								<div class="selected-order"></div>
								<ul class="select-order">
									<li><a href="grid.html?dir=asc&amp;order=position" class="selected">Position</a></li>
									<li><a href="grid.html?dir=asc&amp;order=name">Name</a></li>
									<li><a href="grid.html?dir=asc&amp;order=price">Price</a></li>
								</ul>
							</div>
							<a class="desc" href="grid.html?dir=desc&amp;order=position" title="Set Descending Direction">
								<!--<img src="" alt="" class="v-middle" />-->
							</a>
						</div>
						<div class="limiter">
							<label>Show</label>
							<div class="wrap-show">
								<div class="selected-limiter"></div>
								<ul class="select-limiter">
									<li><a href="grid.html?limit=9" class="selected">9</a></li>
									<li><a href="grid.html?limit=12">12</a></li>
									<li><a href="grid.html?limit=24">24</a></li>
									<li><a href="grid.html?limit=36">36</a></li>
								</ul>
							</div>
							<label class="stylepp">per page</label>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</body>
</html>l
<?php require_once 'templates/mello/inc/footer.php' ?>
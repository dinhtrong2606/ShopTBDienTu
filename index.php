<?php require_once 'templates/mello/inc/header.php'; ?>
<?php require_once 'util/function.php'; ?>
<!--begin content-->
<div id="box-content">
	<div class="position-10">
		<div class="container">
			<div class="slide-show">
				<div class="vt-slideshow">
					<ul>
						<li class="slide1" data-transition="random"><img src="templates/mello/images/slide/bg-s2.png" alt="" /></li>
						<li class="slide2" data-transition="random"><img src="templates/mello/images/slide/bg-s1.png" alt="" /></li>
						<li class="slide3" data-transition="random"><img src="templates/mello/images/slide/bg-s3.png" alt="" /></li>
						<li class="slide3" data-transition="random"><img src="templates/mello/images/slide/bg-s4.png" alt="" /></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="position-02">
		<div class="container">
			<div class="row">
				<div class="title-sp">
					SẢN PHẨM MỚI NHẤT
					<div class="std">
						Nhận các sản phẩm cửa hàng trực tuyến độc quyền
					</div>
				</div>
				<div class="block vt-slider vt-slider3">
					<div class="slider-inner">
						<div class="container-slider">
							<div class="products-grid">
								<?php
								$qr = "SELECT * FROM tbl_sanpham WHERE sanpham_news = '1' ORDER BY sanpham_id ASC LIMIT 8";
								$result = $mysqli->query($qr);
								while ($row_new_deals = mysqli_fetch_array($result)) {
								?>
									<div class="item">
										<div class="item-wrap">
											<div class="item-image">
												<a class="product-image no-touch" href="#" title="<?php echo $row_new_deals['sanpham_name']; ?>">
													<img class="first_image" style="width: 200px;height:200px" src="files/uploads/<?php echo $row_new_deals['sanpham_image']; ?>" alt="Product demo" />
												</a>
												<div class="item-btn">
													<div class="box-inner">
														<a title="Add to wishlist" href="#" class="link-wishlist">&nbsp;</a>
														<a title="Add to compare" href="#" class="link-compare">&nbsp;</a>
														<span class="qview">
															<a class="vt_quickview_handler" data-original-title="Quick View" data-placement="left" data-toggle="tooltip" href="#"><span>Quick View</span></a>
														</span>
													</div>
												</div>
												<a title="Add to cart" class="btn-cart" href="detail.php?sanpham_id=<?php echo $row_new_deals['sanpham_id']; ?>">&nbsp;</a>
											</div>
											<div class="pro-info">
												<div class="pro-inner">
													<div class="pro-title product-name"><a href="detail.php?sanpham_id=<?php echo $row_new_deals['sanpham_id']; ?>"><?php echo $row_new_deals['sanpham_name']; ?></a></div>
													<div class="pro-content">
														<div class="wrap-price">
															<div class="price-box">
																<?php
																if ($row_new_deals['sanpham_soluong'] > 0) {
																?>
																	<span class="regular-price">
																		<span class="price"><?php echo number_format($row_new_deals['sanpham_giakhuyenmai']) . ' vnđ'; ?></span></span>
																	<p class="special-price">
																		<span class="price"><?php echo number_format($row_new_deals['sanpham_gia']) . ' vnđ'; ?></span>
																	</p>
																	<div class="buy-button">
																		<form class="quick-buy-form" action="cart.php?action=add" method="POST">
																			<input type="hidden" value="1" name='quantity[<?php echo $row_new_deals['sanpham_id']; ?>]'>
																			<input style="padding: 10px;margin-left: 45px;background-color:gold" type="submit" value="Mua ngay">
																		</form>
																	</div>
																<?php
																} else {
																?>
																	<p class="regular-price">
																		<span class="price"><?php echo 'Hết hàng'; ?></span>
																	</p>
																<?php
																}
																?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
						<div class="navslider">
							<a class="prev" href="#">Prev</a>
							<a class="next" href="#">Next</a>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
	<div id="cart-item">
		<a data-fancybox data-type="ajax" data-src="ajax-cart.php" href="javascript:;">
			<img width="100" src="files/uploads/giohang_2.png" alt="">
		</a>
	</div>
	<div class="position-04">
		<div class="container">
			<div class="row">
				<div class="title-sp">
					SẢN PHẨM BÁN CHẠY NHẤT
					<div class="std">
						Nhận các sản phẩm cửa hàng trực tuyến độc quyền
					</div>
				</div>
				<div class="block vt-slider vt-slider4">
					<div class="slider-inner">
						<div class="container-slider">
							<div class="products-grid">
								<div class="item">
									<?php
									$qr3 = "SELECT * FROM tbl_sanpham ORDER BY sold_number DESC LIMIT 4";
									$result3 = $mysqli->query($qr3);
									while ($row_sold = mysqli_fetch_array($result3)) {
									?>
										<div class="item-wrap">
											<div class="item-image">
												<a class="product-image no-touch" href="#" title="">
													<img class="first_image" style="width: 135px;height:135px" src="files/uploads/<?php echo $row_sold['sanpham_image']; ?>" alt="Product demo" />
												</a>
											</div>
											<div class="product-shop">
												<div class="pro-info">
													<div class="pro-inner">
														<div class="pro-title product-name"><a href="detail.php?sanpham_id=<?php echo $row_sold['sanpham_id']; ?>"><?php echo $row_sold['sanpham_name']; ?></a></div>
														<div class="pro-content">
															<div class="wrap-price">
																<div class="price-box">
																	<?php
																	if ($row_sold['sanpham_soluong'] > 0) {
																	?>
																		<span class="regular-price">
																			<span class="price"><?php echo number_format($row_sold['sanpham_giakhuyenmai']) . ' vnđ'; ?></span></span>
																		<p class="special-price">
																			<span class="price"><?php echo number_format($row_sold['sanpham_gia']) . ' vnđ'; ?></span>
																		</p>
																	<?php
																	} else {
																	?>
																		<p class="regular-price">
																			<span class="price"><?php echo 'Hết hàng'; ?></span>
																		</p>
																	<?php
																	}
																	?>
																</div>
															</div>
															<div class="ratings">
																<div class="rating-box">
																	<div class="rating" style="width:80%"></div>
																</div>
																<span class="amount"><a href="#">1(s)</a></span>
															</div>
														</div>
													</div>
												</div>
												<div class="item-btn">
													<div class="box-inner">
														<a title="Add to wishlist" href="#" class="link-wishlist">&nbsp;</a>
														<a title="Add to compare" href="#" class="link-compare">&nbsp;</a>
														<span class="qview">
															<a class="vt_quickview_handler" data-original-title="Quick View" data-placement="left" data-toggle="tooltip" href="#"><span>Quick View</span></a>
														</span>
														<a title="Add to cart" class="btn-cart" href="detail.php?sanpham_id=<?php echo $row_sold['sanpham_id']; ?>">&nbsp;</a>
													</div>
												</div>
											</div>
										</div>
										<!--end item wrap -->
									<?php
									}
									?>
									<!--end item wrap -->
								</div>
								<div class="item">
									<?php
									$qr4 = "SELECT * FROM tbl_sanpham ORDER BY sold_number ASC LIMIT 4";
									$result4 = $mysqli->query($qr4);
									while ($row_sold2 = mysqli_fetch_array($result4)) {
									?>
										<div class="item-wrap">
											<div class="item-image">
												<a class="product-image no-touch" href="#" title="Ipad Air and iOS7">
													<img class="first_image" style="width: 135px;height:135px" src="files/uploads/<?php echo $row_sold2['sanpham_image']; ?>" alt="Product demo" />
												</a>
											</div>
											<div class="product-shop">
												<div class="pro-info">
													<div class="pro-inner">
														<div class="pro-title product-name"><a href="detail.php?sanpham_id=<?php echo $row_sold2['sanpham_id']; ?>"><?php echo $row_sold2['sanpham_name']; ?></a></div>
														<div class="pro-content">
															<div class="wrap-price">
																<div class="price-box">
																	<?php
																	if ($row_sold2['sanpham_soluong'] > 0) {
																	?>
																		<span class="regular-price">
																			<span class="price"><?php echo number_format($row_sold2['sanpham_giakhuyenmai']) . ' vnđ'; ?></span></span>
																		<p class="special-price">
																			<span class="price"><?php echo number_format($row_sold2['sanpham_gia']) . ' vnđ'; ?></span>
																		</p>
																	<?php
																	} else {
																	?>
																		<p class="regular-price">
																			<span class="price"><?php echo 'Hết hàng'; ?></span>
																		</p>
																	<?php
																	}
																	?>
																</div>
															</div>
															<div class="ratings">
																<div class="rating-box">
																	<div class="rating" style="width:80%"></div>
																</div>
																<span class="amount"><a href="#">1(s)</a></span>
															</div>
														</div>
													</div>
												</div>
												<div class="item-btn">
													<div class="box-inner">
														<a title="Add to wishlist" href="#" class="link-wishlist">&nbsp;</a>
														<a title="Add to compare" href="#" class="link-compare">&nbsp;</a>
														<span class="qview">
															<a class="vt_quickview_handler" data-original-title="Quick View" data-placement="left" data-toggle="tooltip" href="#"><span>Quick View</span></a>
														</span>
														<a title="Add to cart" class="btn-cart" href="detail.php?sanpham_id=<?php echo $row_sold2['sanpham_id']; ?>">&nbsp;</a>
													</div>
												</div>
											</div>
										</div>
									<?php
									}
									?>
								</div>
								<!--end item wrap -->
							</div>
						</div>
					</div>
					<div class="navslider">
						<a class="prev" href="#">Prev</a>
						<a class="next" href="#">Next</a>
					</div>

				</div>
			</div>

		</div>
	</div>
	<div class="position-06">
		<div class="container">
			<div class="row">
				<div class="box-newletter">
					<div class="title">
						<span>Newsletter</span>
					</div>
					<form action="#" method="post">
						<input type="text" name="newletter" placeholder="Enter email address..." />
						<button><span>Subscribe</span></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="position-08">
		<div class="container">
			<div class="title-sp">
				<h2>The shop</h2>
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab1">Hàng mới về</a></li>
					<li><a data-toggle="tab" href="#tab2">Sản phẩm phổ biến</a></li>
					<li><a data-toggle="tab" href="#tab3">Sản phẩm đặc biệt</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div id="tab1" class="tab-pane fade in active">
					<div class="block vt-slider vt-slider7">
						<div class="slider-inner">
							<div class="container-slider">
								<div class="products-grid">
									<?php
									$qr5 = "SELECT * FROM tbl_sanpham WHERE sanpham_news = '1' ORDER BY sanpham_id DESC LIMIT 6";
									$result5 = $mysqli->query($qr5);
									while ($row_new_arrivals = mysqli_fetch_array($result5)) {
									?>
										<div class="item">
											<div class="item-wrap">
												<div class="item-image">
													<a class="product-image no-touch" href="#" title="<?php echo $row_new_arrivals['sanpham_name']; ?>">
														<img class="first_image" style="width:190px;height:190px" src="files/uploads/<?php echo $row_new_arrivals['sanpham_image']; ?>" alt="Product demo" />
													</a>
													<div class="item-btn">
														<div class="box-inner">
															<a title="Add to wishlist" href="#" class="link-wishlist">&nbsp;</a>
															<a title="Add to compare" href="#" class="link-compare">&nbsp;</a>
															<span class="qview">
																<a class="vt_quickview_handler" data-original-title="Quick View" data-placement="left" data-toggle="tooltip" href="#"><span>Quick View</span></a>
															</span>
														</div>
													</div>
													<a title="Add to cart" class="btn-cart" href="detail.php?sanpham_id=<?php echo $row_new_arrivals['sanpham_id']; ?>">&nbsp;</a>
												</div>
												<div class="pro-info">
													<div class="pro-inner">
														<div class="pro-title product-name"><a href="detail.php?sanpham_id=<?php echo $row_new_arrivals['sanpham_id']; ?>"><?php echo $row_new_arrivals['sanpham_name']; ?></a></div>
														<div class="pro-content">
															<div class="wrap-price">
																<div class="price-box">
																	<?php
																	if ($row_new_arrivals['sanpham_soluong'] > 0) {
																	?>
																		<span class="regular-price">
																			<span class="price"><?php echo number_format($row_new_arrivals['sanpham_giakhuyenmai']) . ' vnđ'; ?></span></span>
																		<p class="special-price">
																			<span class="price"><?php echo number_format($row_new_arrivals['sanpham_gia']) . ' vnđ'; ?></span>
																		</p>
																	<?php
																	} else {
																	?>
																		<p class="regular-price">
																			<span class="price"><?php echo 'Hết hàng'; ?></span>
																		</p>
																	<?php
																	}
																	?>
																</div>
															</div>
															<!-- <div class="ratings">
												  <div class="rating-box">
													 <div class="rating" style="width:80%"></div>
												  </div>
												  <span class="amount"><a href="#">1(s)</a></span>
											   </div> -->
														</div>
													</div>
												</div>
											</div>
											<!--end item wrap -->
										</div>
									<?php
									}
									?>
								</div>
							</div>
							<div class="navslider">
								<a class="prev" href="#">Prev</a>
								<a class="next" href="#">Next</a>
							</div>

						</div>
					</div>
				</div>
				<div id="tab2" class="tab-pane fade">
					<div class="block vt-slider vt-slider5">
						<div class="slider-inner">
							<div class="container-slider">
								<div class="products-grid">
									<?php
									$qr6 = "SELECT * FROM tbl_sanpham ORDER BY sanpham_soluong DESC LIMIT 5";
									$result6 = $mysqli->query($qr6);
									while ($row_ppl = mysqli_fetch_array($result6)) {
									?>
										<div class="item">
											<div class="item-wrap">
												<div class="item-image">
													<a class="product-image no-touch" href="#" title="<?php echo $row_ppl['sanpham_name']; ?>">
														<img class="first_image" style="width:190px;height:190px" src="files/uploads/<?php echo $row_ppl['sanpham_image']; ?>" alt="Product demo" />
													</a>
													<div class="item-btn">
														<div class="box-inner">
															<a title="Add to wishlist" href="#" class="link-wishlist">&nbsp;</a>
															<a title="Add to compare" href="#" class="link-compare">&nbsp;</a>
															<span class="qview">
																<a class="vt_quickview_handler" data-original-title="Quick View" data-placement="left" data-toggle="tooltip" href="#"><span>Quick View</span></a>
															</span>
														</div>
													</div>
													<a title="Add to cart" class="btn-cart" href="detail.php?sanpham_id=<?php echo $row_ppl['sanpham_id']; ?>">&nbsp;</a>
												</div>
												<div class="pro-info">
													<div class="pro-inner">
														<div class="pro-title product-name"><a href="detail.php?sanpham_id=<?php echo $row_ppl['sanpham_id']; ?>"><?php echo $row_ppl['sanpham_name']; ?></a></div>
														<div class="pro-content">
															<div class="wrap-price">
																<div class="price-box">
																	<?php
																	if ($row_ppl['sanpham_soluong'] > 0) {
																	?>
																		<span class="regular-price">
																			<span class="price"><?php echo number_format($row_ppl['sanpham_giakhuyenmai']) . ' vnđ'; ?></span></span>
																		<p class="special-price">
																			<span class="price"><?php echo number_format($row_ppl['sanpham_gia']) . ' vnđ'; ?></span>
																		</p>
																	<?php
																	} else {
																	?>
																		<p class="regular-price">
																			<span class="price"><?php echo 'Hết hàng'; ?></span>
																		</p>
																	<?php
																	}
																	?>
																</div>
															</div>
															<div class="ratings">
																<div class="rating-box">
																	<div class="rating" style="width:80%"></div>
																</div>
																<span class="amount"><a href="#">1(s)</a></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--end item wrap -->
										</div>
									<?php
									}
									?>
								</div>
							</div>
							<div class="navslider">
								<a class="prev" href="#">Prev</a>
								<a class="next" href="#">Next</a>
							</div>

						</div>

					</div>
				</div>
				<div id="tab3" class="tab-pane fade">
					<div class="block vt-slider vt-slider6">
						<div class="slider-inner">
							<div class="container-slider">
								<div class="products-grid">
									<?php
									$qr7 = "SELECT * FROM tbl_sanpham WHERE sanpham_hot = '0' ORDER BY sanpham_id ASC";
									$result7 = $mysqli->query($qr7);
									while ($row_special = mysqli_fetch_array($result7)) {
									?>
										<div class="item">
											<div class="item-wrap">
												<div class="item-image">
													<a class="product-image no-touch" href="#" title="<?php echo $row_special['sanpham_name']; ?>">
														<img class="first_image" style="width:190px;height:190px" src="files/uploads/<?php echo $row_special['sanpham_image']; ?>" alt="Product demo" />
													</a>
													<div class="item-btn">
														<div class="box-inner">
															<a title="Add to wishlist" href="#" class="link-wishlist">&nbsp;</a>
															<a title="Add to compare" href="#" class="link-compare">&nbsp;</a>
															<span class="qview">
																<a class="vt_quickview_handler" data-original-title="Quick View" data-placement="left" data-toggle="tooltip" href="#"><span>Quick View</span></a>
															</span>
														</div>
													</div>
													<a title="Add to cart" class="btn-cart" href="detail.php?sanpham_id=<?php echo $row_special['sanpham_id']; ?>">&nbsp;</a>
												</div>
												<div class="pro-info">
													<div class="pro-inner">
														<div class="pro-title product-name"><a href="detail.php?sanpham_id=<?php echo $row_special['sanpham_id']; ?>"><?php echo $row_special['sanpham_name']; ?></a></div>
														<div class="pro-content">
															<div class="wrap-price">
																<div class="price-box">
																	<?php
																	if ($row_special['sanpham_soluong'] > 0) {
																	?>
																		<span class="regular-price">
																			<span class="price"><?php echo number_format($row_special['sanpham_giakhuyenmai']) . ' vnđ'; ?></span></span>
																		<p class="special-price">
																			<span class="price"><?php echo number_format($row_special['sanpham_gia']) . ' vnđ'; ?></span>
																		</p>
																	<?php
																	} else {
																	?>
																		<p class="regular-price">
																			<span class="price"><?php echo 'Hết hàng'; ?></span>
																		</p>
																	<?php
																	}
																	?>
																</div>
															</div>
															<div class="ratings">
																<div class="rating-box">
																	<div class="rating" style="width:80%"></div>
																</div>
																<span class="amount"><a href="#">1(s)</a></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--end item wrap -->
										</div>
									<?php
									}
									?>
								</div>
							</div>
							<div class="navslider">
								<a class="prev" href="#">Prev</a>
								<a class="next" href="#">Next</a>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="position-09">
		<div class="container">
			<div class="row">
				<div class="popular-cate">
					<div class="position-01">
						<div class="img01"><a href="#"><img src="templates/mello/images/position-01/images-01.png" alt="" /></a></div>
						<div class="img02"><a href="#"><img src="templates/mello/images/position-01/images-02.png" alt="" /></a></div>
						<div class="img03"><a href="#"><img src="templates/mello/images/position-01/images-03.png" alt="" /></a></div>
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
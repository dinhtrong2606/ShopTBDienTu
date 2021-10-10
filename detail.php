<?php require_once 'templates/mello/inc/header.php'; ?>
<?php require_once 'templates/mello/inc/leftbar.php'; ?>
<?php require_once 'util/function.php'; ?>
<div id="main" class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-main">
	<div class="product-essential">
		<div class="wrap">
			<?php
			$qr = "SELECT * FROM tbl_sanpham WHERE sanpham_id = {$_GET['sanpham_id']}";
			$result = $mysqli->query($qr);
			while ($row = mysqli_fetch_array($result)) {
			?>
				<form action="cart.php?action=add" method="post" id="product_addtocart_form">
					<div style="margin-bottom: 30px;margin-top:30px" class="product-name">
						<h1><?php echo $row['sanpham_name']; ?></h1>

					</div>
					<div class="product-img-box">
						<div class="image-main">
							<img style="width: 300px;height:300px" src="files/uploads/<?php echo $row['sanpham_image']; ?>" style="width:40%" alt="Product demo" />
						</div>
						<div class="click-quick-view">&nbsp;</div>


						<div class="image-quick-view no-display">

							<div class="content">
								<span class="close">x</span>
								<img src="files/uploads/<?php echo $row['sanpham_image']; ?>" alt="" />
							</div>
						</div>
					</div>
					<div class="product-shop" style="margin-top: -40%;float:right;width:57%">
						<div class="wrap-er">
							<div class="ratings">
								<div class="rating-box">
									<div class="rating" style="width:87%"></div>
								</div>
								<p class="rating-links">
									<a href="#">(1)</a>
									<span class="separator">|</span>
									<a class="re-temp" href="#">Add Your Review</a>
								</p>
							</div>
						</div>
						<br>
						<!--<div class="product-code"><label>Product code:</label></div>-->
						<div class="short-description">
							<div class="std"><span>
									<ul class="left">
										<li>Bảo hành:</li>
										<li>Đi kèm:</li>
										<li>Tình trạng:</li>
										<li>Khuyến mãi:</li>
										<li>Còn hàng:</li>
									</ul>
									<ul class="right">
										<li>12 tháng</li>
										<li>Hộp ,sách ,sạc, cáp, tai nghe</li>
										<li>Máy mới 100%</li>
										<li>Tất cả các sản phẩm khi mua online sẽ được freeship</li>
										<li>Còn hàng</li>
									</ul>
							</div>
							<div class="box-info-detail">
								<p class="availability in-stock">
									<span class="label">Availability:</span>
									<span class="value">In stock</span>
								</p>
								<br>
								<div style="margin-bottom: 30px;" class="price-info">
									<div class="price-box">
										<p class="old-price">
											<span style="font-size: 30px;" class="price">
												<?php echo number_format($row['sanpham_giakhuyenmai']) . ' vnđ'; ?></span>
										</p>
										<p class="special-price">
											<span class="price">
												<?php echo number_format($row['sanpham_gia']) . ' vnđ'; ?></span>
										</p>
									</div>
								</div>
								<label>Số lượng: </label>
								<input style="width:30px;border-radius:5px;text-align:center" id='quantity' min='1' name='quantity[<?php echo $row['sanpham_id']; ?>]' type='number' value='1' />
								<button style="margin-left: 50px;" class="btn btn-success btn-md" type="submit">Add To Cart</button>
								<div class="product-options-bottom">
									<div class="item">
										<div class="product-shop">

											<br />
											<br />
											<div class="add-to-box-sub">
												<ul class="add-to-links" style="display: flex;">
													<li><a style="border: 1px;padding: 7px;border-radius: 3px; background-color:darksalmon;margin-right:17px" href="wishlist.php?id=<?php echo $_GET['sanpham_id']; ?>" class="link-wishlist">Add to Wishlist</a></li>
													<li><a style="border: 1px;padding: 7px;border-radius: 3px; background-color:darksalmon;margin-right:17px" href="#" class="link-compare">Add to Compare</a></li>
													<li><a style="border: 1px;padding: 7px;border-radius: 3px; background-color:darksalmon" class="email-friend" href="#">Email to a Friend</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<!--div class="product-options-bottom">
									<div class="add-to-box add-to-cart">
																	</div>
									</div-->
							</div>
							<!-- end div .box-info-detail -->
						</div>
				</form>
			<?php
			}
			?>
			<div class="share-this" style="margin-top:18px;">
				<span class='st_sharethis_large' displayText='ShareThis'></span>
				<span class='st_facebook_large' displayText='Facebook'></span>
				<span class='st_twitter_large' displayText='Tweet'></span>
				<span class='st_linkedin_large' displayText='LinkedIn'></span>
				<span class='st_pinterest_large' displayText='Pinterest'></span>
				<span class='st_email_large' displayText='Email'></span>
				<script type="text/javascript">
					var switchTo5x = true;
				</script>
				<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
				<script type="text/javascript">
					stLight.options({
						publisher: "6d56a077-95db-44a6-a019-d5a901534fea",
						doNotHash: false,
						doNotCopy: false,
						hashAddressBar: false
					});
				</script>
			</div>
		</div>
		<div class="tab-detail">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Đánh giá sản phẩm</a></li>
				<li><a data-toggle="tab" href="#menu1">Review</a></li>
			</ul>

			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<?php
					if (isset($_SESSION['user'])) {
					?>
						<ul style="display: flex; padding-right:10px">
							<?php 
							$result_comment = mysqli_query($mysqli, "SELECT * FROM comment");
							$row_comment = mysqli_fetch_array($result_comment);
							?>
							<li><a href=""><i class="fa fa-clock-o"></i><?php echo $row_comment['created_time']; ?></a></li> 
						</ul>
						<style type="text/css">
							.style_comment {
								border: 1px solid #ddd;
								border-radius: 10px;
								background: #F0F0E9;
							}
						</style>
						<div class="row style_comment">
							<div class="col-md-2">
								<img width="100%" src="files/uploads/batman.jpg" alt="" class="img img-responsive img-thumbnail">
							</div>
							<div class="col-md-10">
								<div class="content" id="content"></div>
							</div>
						</div>
						<?php
						if (isset($_GET['sanpham_id'])) {
							$id_comment = $_GET['sanpham_id'];
						}
						?>
						<hr />
						<p><b>Viết đánh giá của bạn</b></p>
						<form id="form">
							<div class="form-group">
								<label>Tên:</label>
								<input type="text" name="ten" required="" id="name" class="form-control" placeholder="Đình Trọng">
							</div>
							<label for="">Nội dung</label>
							<textarea name="binhluan" id="msg" cols="30" rows="10"></textarea>
							<button id="btn" class="btn btn-default">Gửi đánh giá</button>
						</form>
					<?php
					}else{
						echo '<p>Hãy <a style="color: blue" href="login.php">Đăng nhập</a> để có thể đánh giá sản phẩm</p>';
					}
					?>



				</div>
				<div id="menu1" class="tab-pane fade">
					<h3>Customer Reviews 1 item(s)</h3>
					<p><span tyle="float:left;">1 Item(s)</span> <span style="float:right;">Show <select>
								<option>6</option>
								<option selected>10</option>
								<option>12</option>
								<option>15</option>
								<option>20</option>
							</select>per page</span></p>
					<br />
					<p><a href="#>">7uptheme</a></p>
					<p>At verov eos et accusamus et iusto ods un dignissimos ducimus qui blan ditiis prasixer esentium</p>
					<table class="ratings-table">
						<colgroup>
							<col class="review-label" />
							<col class="review-value" />
						</colgroup>
						<tbody>
							<tr>
								<th>Quality</th>
								<td>
									<div class="rating-box">
										<div class="rating" style="width:80%;"></div>
									</div>
								</td>
							</tr>
							<tr>
								<th>Price</th>
								<td>
									<div class="rating-box">
										<div class="rating" style="width:80%;"></div>
									</div>
								</td>
							</tr>
							<tr>
								<th>Value</th>
								<td>
									<div class="rating-box">
										<div class="rating" style="width:100%;"></div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<p>Review by 7uptheme / (Posted on 4/14/2015)</p>
					<div class="form-add">
						<h2>Write Your Own Review</h2>
						<form action="" method="post" id="review-form">
							<input name="form_key" type="hidden" value="JbT1G5uAkBcFDot6" />
							<h3>You're reviewing: <span>Ipad Air and iOS7</span>
							</h3>
							<div class="fieldset">
								<h4>How do you rate this product? <em class="required">*</em></h4>
								<span id="input-message-box"></span>
								<table class="data-table review-summary-table ratings" id="product-review-table">
									<col width="1" />
									<col />
									<col />
									<col />
									<col />
									<col />
									<thead>
										<tr>
											<th>&nbsp;</th>
											<th>
												<div class="rating-box">
													<span class="rating nobr" style="width:20%;"></span>
												</div>
											</th>
											<th>
												<div class="rating-box">
													<span class="rating nobr" style="width:40%;"></span>
												</div>
											</th>
											<th>
												<div class="rating-box">
													<span class="rating nobr" style="width:60%;"></span>
												</div>
											</th>
											<th>
												<div class="rating-box">
													<span class="rating nobr" style="width:80%;"></span>
												</div>
											</th>
											<th>
												<div class="rating-box">
													<span class="rating nobr" style="width:100%;"></span>
												</div>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>Price</th>
											<td class="value"><label for="Price_1"><input type="radio" name="ratings[3]" id="Price_1" value="11" class="radio" /></label></td>
											<td class="value"><label for="Price_2"><input type="radio" name="ratings[3]" id="Price_2" value="12" class="radio" /></label></td>
											<td class="value"><label for="Price_3"><input type="radio" name="ratings[3]" id="Price_3" value="13" class="radio" /></label></td>
											<td class="value"><label for="Price_4"><input type="radio" name="ratings[3]" id="Price_4" value="14" class="radio" /></label></td>
											<td class="value"><label for="Price_5"><input type="radio" name="ratings[3]" id="Price_5" value="15" class="radio" /></label></td>
										</tr>
										<tr>
											<th>Value</th>
											<td class="value"><label for="Value_1"><input type="radio" name="ratings[2]" id="Value_1" value="6" class="radio" /></label></td>
											<td class="value"><label for="Value_2"><input type="radio" name="ratings[2]" id="Value_2" value="7" class="radio" /></label></td>
											<td class="value"><label for="Value_3"><input type="radio" name="ratings[2]" id="Value_3" value="8" class="radio" /></label></td>
											<td class="value"><label for="Value_4"><input type="radio" name="ratings[2]" id="Value_4" value="9" class="radio" /></label></td>
											<td class="value"><label for="Value_5"><input type="radio" name="ratings[2]" id="Value_5" value="10" class="radio" /></label></td>
										</tr>
										<tr>
											<th>Quality</th>
											<td class="value"><label for="Quality_1"><input type="radio" name="ratings[1]" id="Quality_1" value="1" class="radio" /></label></td>
											<td class="value"><label for="Quality_2"><input type="radio" name="ratings[1]" id="Quality_2" value="2" class="radio" /></label></td>
											<td class="value"><label for="Quality_3"><input type="radio" name="ratings[1]" id="Quality_3" value="3" class="radio" /></label></td>
											<td class="value"><label for="Quality_4"><input type="radio" name="ratings[1]" id="Quality_4" value="4" class="radio" /></label></td>
											<td class="value"><label for="Quality_5"><input type="radio" name="ratings[1]" id="Quality_5" value="5" class="radio" /></label></td>
										</tr>
									</tbody>
								</table>
								<input type="hidden" name="validate_rating" class="validate-rating" value="" />
								<ul class="form-list">
									<li>
										<label for="review_field" class="required"><em>*</em>Let us know your thoughts</label>
										<div class="input-box">
											<textarea name="detail" id="review_field" cols="5" rows="3" class="required-entry"></textarea>
										</div>
									</li>
									<li class="inline-label">
										<label for="summary_field" class="required"><em>*</em>Summary of Your Review</label>
										<div class="input-box">
											<input type="text" name="title" id="summary_field" class="input-text required-entry" value="" />
										</div>
									</li>
									<li class="inline-label">
										<label for="nickname_field" class="required"><em>*</em>What's your nickname?</label>
										<div class="input-box">
											<input type="text" name="nickname" id="nickname_field" class="input-text required-entry" value="" />
										</div>
									</li>
								</ul>
							</div>
							<div class="buttons-set">
								<button type="submit" title="Submit Review" class="button"><span><span>Submit Review</span></span></button>
							</div>
						</form>

					</div>
				</div>



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
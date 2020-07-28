<?php

if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="incrementDecrement.js"></script>
<form method="post" action="addtocart.php" style="width: 50%;">
<div class="overlay" id="overlay">
	<div class="container" style="margin-top: 150px;">
		<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
		<div class="single-menu"style="box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-1"></div>
				<div class="col-md-3"><img class='img-fluid' src="<?php echo $row->picUrl; ?>" style="border-radius: 10%;" >
				</div>
				<div class="col-md-8">
					<div class="row" style="margin-bottom: 20px;">
						<div class="col-md-12">
							<h3><?php echo $row->name; ?></h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<h4>Description:</h4><hr>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h5><?php echo $row->description; ?></h5>
						</div>
					</div>
					<div class="row" align="right">
						<div class="col-md-8"></div>
						<div class="col-md-1"><h5 style="margin-top: 10px;">QTY:</h5></div>
						
						<div class="col-md-3">
							<a onclick="decrementValue('number<?php echo $count?>')" class="genric-btn primary-border radius" style="padding: 10px; line-height: 1.5;float: left;" href="javascript:;">-</a>
							<input name="qty" value="1" size="3" max="100" min="1" maxlength="3" style="text-align: center;width: 50%; float: left;" class="form-control" id="number<?php echo $count?>">
							<a onclick="incrementValue('number<?php echo $count?>')"  class="genric-btn primary-border radius" style="padding: 10px;line-height: 1.5;float: left;" href="javascript:;">+</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<h3 style="color: #b68834;">BHD <?php echo sprintf('%0.3f',$total_price);  ?></h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-4" align="right">
					<a href="menu.php" onclick="off(<?php echo $count?>)" class="genric-btn danger-border radius" style="margin-right: 20px; float: left;">CANCEL</a>
					
					<input type="submit" name="btn" value="ADD TO CART" class="genric-btn success-border radius">
					<input type="hidden" name="tp" value="<?php echo $total_price;?>">
					<input type="hidden" name="id" value="<?php echo $row->id;?>">
					
				</div>
			</div>
		</div>
		</div>
		</div>
	</div>
</div>
</form>
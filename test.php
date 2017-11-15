
<?php require_once ('listgiohang.php');
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang Bán Hàng</title>
	<style>
		.danhsachsp {
			width: auto;
		}
		.item {
			border: 1px solid;
			width: 200px;
			height: 200px;  
			float: left;

		}
		.item-name {
			margin-left: 40px;
			font-size: 16px;
		}
		.item-img img {
			width: 100px;
			margin-left: 40px;
			padding-top: 10px;	
		}
		.item-price {
			margin-left: 40px;
		}
		.buy-item {
			margin-left: 40px;
		}
		.buy-item a:hover {
			color: orange;
		}
		.qty {
			float: left;
		}
	</style>
</head>
<body>
	<h3>Danh Sách Sản Phẩm</h3>
	<div class="danhsachsp">
		<?php foreach ($product as $listProduct) { ?>
			<div class="item">
				<div class="item-img">
					<?php echo $listProduct['spmau']; ?>
				</div>
				<div class="item-name">
					<?php echo $listProduct['name']; ?>
				</div>
				<div class="item-price">
					<?php echo 'Giá : '. $listProduct['price']; ?>
				</div>
				<div class="buy-item">
					<a href='insertcart.php?id=<?php echo $listProduct['id']; ?>'>Mua Ngay</a>
				</div>

			</div>
		<?php } ?>


 	</div>
 	<div class="qty">
		<p>
		<?php 
			$total = 0;
			if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
				foreach ($_SESSION['cart'] as $list) {
					$total += $list['qty'];
				}
			}
		 ?>
		 Đang có <a href="viewcart.php"> <?php echo $total; ?></a> sản phẩm trong giỏ hàng </p>
 	</div>
</body>
</html>



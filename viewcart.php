<?php
    session_start();
	$total = 0;
?>
<style type="text/css">
	img {
		width: 45%;
	}
	td	{
		text-align: center;
	}

</style>
<meta charset="utf-8"/>
<h3>Thông Tin Giỏ Hàng || <a href='test.php'>Quay lại mua tiếp</a></h3>
<?php if(isset($_SESSION['cart']) && $_SESSION['cart']!= null) { ?>
    <form action='updatecart.php' method='POST'>
    <table border='1' width='600'>
    <tr>
    <th>Têm Sảm Phẩm</th>
    <th>Ảnh</th>
    <th>Giá Sản Phẩm</th>
    <th>Số Lượng</th>
    <th>Thành Tiền</th>
    <th>Xóa</th>
    </tr>
	<?php foreach($_SESSION['cart'] as $list) { ?>
		<?php
			$thanhTien = $list['price']* $list['qty'];
			$total += $thanhTien;
		?>
        <tr>
        <td><?php echo $list['name'];?></td>
        <td><?php echo $list['spmau']; ?></td>
        <td><?php echo $list['price'];?></td>
        <td><input size='2' type='text' name='qty[<?php echo $list['id'];?>]' value='<?php echo $list['qty'];?>'/></td>
        <td><?php echo number_format($thanhTien) ;?></td>
        <td><a href='deletecart.php?id=<?php echo $list['id'];?>'>Xóa</a></td>
        </tr>
    <?php } ?>
	<tr>
	</tr>
    </table>
	Tổng tiền : <?php echo number_format($total);?>
    <p align='right' style='width: 600px'>
    <input type='submit' value='Update' name='btnUpdate'/>
    </p>
    </form>
<?php } else { ?>
Không có sản phẩm nào
<?php } ?>
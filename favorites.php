<!DOCTYPE html>
<html lang="de">

<head>
	<title>Arthouse - Wunschliste</title>

	<!-- Import CSS Dateien-->
	<?php
			include 'elemente/css-import.php'; ?>
		<link rel="stylesheet" href="assets/css/wishlist-styles.css">

</head>

<body>

<!-- Import NAVBAR Dateien-->
<?php
	include 'elemente/newnavbar.php'; ?>

<!-- CONTENT-BEREICH -->

<div id="shopping-cart">
	<div class="txt-heading">Wunschliste</div>

	<a id="btnEmpty" href="index.php?action=empty">Leeren</a>
	<?php
		if (isset($_SESSION["cart_item"])){
			$total_quantity = 0;
			$total_price    = 0;
			?>
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
				<tbody>
				<tr>
					<th style="text-align:left;">Bild</th>
					<th style="text-align:left;">Name/Titel</th>
					<th style="text-align:right;" width="5%">Anzahl</th>
					<th style="text-align:right;" width="10%">Unit Price</th>
					<th style="text-align:right;" width="10%">Price</th>
					<th style="text-align:center;" width="5%">Entfernen</th>
				</tr>
				<?php
					foreach ($_SESSION["cart_item"] as $item){
						$item_price = $item["quantity"] * $item["price"];
						?>
						<tr>
							<td><img src="<?php
									echo $item["image"]; ?>" class="cart-item-image"/><?php
									echo $item["name"]; ?></td>
							<td><?php
									echo $item["code"]; ?></td>
							<td style="text-align:right;"><?php
									echo $item["quantity"]; ?></td>
							<td style="text-align:right;"><?php
									echo "$ ".$item["price"]; ?></td>
							<td style="text-align:right;"><?php
									echo "$ ".number_format($item_price, 2); ?></td>
							<td style="text-align:center;"><a href="index.php?action=remove&code=<?php
									echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png"
							                                                             alt="Remove Item"/></a></td>
						</tr>
						<?php
						$total_quantity += $item["quantity"];
						$total_price    += ($item["price"] * $item["quantity"]);
					}
				?>

				<tr>
					<td colspan="2" align="right">Total:</td>
					<td align="right"><?php
							echo $total_quantity; ?></td>
					<td align="right" colspan="2"><strong><?php
								echo "$ ".number_format($total_price, 2); ?></strong></td>
					<td></td>
				</tr>
				</tbody>
			</table>
			<?php
		} else {
			?>
			<div class="no-records">Die Wunschliste ist leer!</div>
			<?php
		}
	?>
</div>


<?php
	include 'elemente/footer.php'; ?>

<!-- Import FOOTER Datein-->


<!-- Import SCRIPT Datein-->
<?php
	include 'elemente/script-import.php'; ?>

</body>
</html>
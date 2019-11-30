<style>
*{
	font-size:11px;
	font-family: Arial, Helvetica, sans-serif;
	text-align:left;
}

body {
    margin: 0;
    color: #000;
    background-color: #fff;
  }
@media print {
*{
	font-size:11px;
	font-family: Arial, Helvetica, sans-serif;
	text-align:left;
}

body {
    margin: 0;
    color: #000;
    background-color: #fff;
  }
}
table.order-table tr th{
	border:none;
	border-top:1px dotted #000;
	border-bottom:1px dotted #000;
}
table.order-table tr td{
	border:none;
}
/**/table.order-table tr td:last{
	border:none;
	border-top:1px dotted #000;
	border-bottom:1px dotted #000;
}
</style>
<table>
<tr>
<td style="text-align:right;" colspan="2"><?= date('d-M-y h:i a');?></td>
</tr>
<tr>
<td style="text-align:center;" colspan="2"><img style="width:100px;" src="<?= base_url()?>assets/images/logo.png" /></td>
</tr>
<tr>
<th style="text-align:center;font-size:15px;font-family: 'Times New Roman', Times, serif;" colspan="2">SHAKO MAKO RESTAURANT</th>
</tr>
<tr><td style="height:15px;" colspan="2"></td></tr>
<tr>
<th style="text-align:center;font-size:14px;" colspan="2"><?= ($param == NULL)?'SALES INVOICE':'KITCHEN COPY';?></th>
</tr>
<tr><td style="height:10px;" colspan="2"></td></tr>
<tr>
<th>ORDER ID :</th>
<td>SM-O300<?= $order['id']?></td>
</tr>
<tr>
<th>ORDER DATE/TIME :</th>
<td><?= date('M d @ h:i a',strtotime($order['order_date']))?></td>
</tr>
<?php if($param != NULL){ ?>
<tr>
<th>ORDER TYPE :</th>
<td><?= ucwords($order['type'])?></td>
</tr>
<?php } ?>
<tr>
<th>ORDER SOURCE :</th>
<td><?php if($order['type'] == 'delivery'){ echo "Customer APP";}else{echo "TABLET";}?></td>
</tr>
<tr><td style="height:15px;" colspan="2"></td></tr>
<?php if($param == NULL){ ?>
<tr>
<th style="text-align:center;font-size:14px;" colspan="2">CUSTOMER INFORMATION</th>
</tr>
<tr><td style="height:10px;" colspan="2"></td></tr>
<tr>
<th>ID :</th>
<td>SM-C100<?= $customer['id']?></td>
</tr>
<tr>
<th>NAME :</th>
<td><?= $order['customer_name']?></td>
</tr>
<tr>
<th>MOBILE # :</th>
<td><?= '+971'.str_replace('971','',$order['customer_phone'])?></td>
</tr>
<tr><td style="height:15px;" colspan="2"></td></tr>
<tr>
<th style="text-align:center;font-size:14px;" colspan="2">ORDER INFORMATION</th>
</tr>
<tr><td style="height:10px;" colspan="2"></td></tr>
<?php if($order['type'] == 'delivery'){ ?>
<tr>
<th>Rider Name</th>
<td><?= $rider['first_name'].' '.$rider['last_name']?></td>
</tr>
<tr><td style="height:15px;" colspan="2"></td></tr>
<tr>
<th>HOME/FLAT :</th>
<td><?= $order['customer_house_flat']?></td>
</tr>
<tr>
<th>BUILDING :</th>
<td><?= $order['customer_building_name']?></td>
</tr>
<tr>
<th>STREET :</th>
<td><?= $order['customer_address'].' '.$order['customer_address2']?></td>
</tr>
<tr>
<th>AREA :</th>
<td><?= $order['customer_area']?></td>
</tr>
<tr>
<th>CITY :</th>
<td>Dubai</td>
</tr>
<tr>
<th>EXTRA DIRECTION :</th>
<td><?= $order['customer_extra_direction']?></td>
<tr><td style="height:20px;" colspan="2"></td></tr>
</tr>
<?php }elseif($order['type'] == 'dine-in'){ ?>
<tr>
<th>WAITER</th>
<td><?= $waiter['first_name'].' '.$waiter['last_name']?></td>
</tr>
<tr><td style="height:15px;" colspan="2"></td></tr>
<tr>
<th>TABLE # :</th>
<td><?= $order['table_no']?></td>
</tr>
<tr>
<th>PAX # :</th>
<td><?= $order['pax_no']?></td>
</tr>
<?php }elseif($order['type'] == 'takeaway'){ ?>
<tr>
<th>WAITER :</th>
<td><?= $waiter['first_name'].' '.$waiter['last_name']?></td>
</tr>
<tr><td style="height:15px;" colspan="2"></td></tr>
<tr>
<th>VEHICLE # :</th>
<td><?= $order['customer_vehicle_no']?></td>
</tr>
<?php } ?>
<tr><td style="height:15px;" colspan="2"></td></tr>
<?php } ?>
</table>
<table border="0" cellpadding="3" class="order-table" style="border-collapse: collapse;width:100%;">
<tr>
<th>#</th>
<th>Item</th>
<?php /*if($param == NULL){ ?>
<th>Modifier</th>
<?php }*/ ?>
<th>Qty</th>
<?php if($param == NULL){ ?>
<!--<th>Unit Price</th>-->
<th>Total Price</th>
<?php } ?>
</tr>
<?php foreach($items as $key => $item){ ?>
<tr>
<td style="vertical-align: top;">
<?= $key+1?>
</td>
<td><?= ucwords($item['name_en'])?>
<?php 
$isDeal = $this->db->where('id',$item['product_id'])->where('isdeal','yes')->count_all_results('product');
if($isDeal > 0){
	$this->db->select('product.name_en, deal_product.quantity');
	$this->db->join('product','product.id = deal_product.product');
	$products = $this->db->where('product_id',$item['product_id'])->get('deal_product')->result_array();
	echo "<ul style='list-style-type:none;margin-top: 2px;padding: 0;'>";
	echo '<li><b>Deal Items:</b></li>';
	foreach($products as $mkey => $product){
		echo '<li>';
		echo ucwords($product['quantity'].' '.$product['name_en']);
		echo '</li>';
	}
	echo "</ul>";
}
if($item['mod'] == 'yes'){
	if(!empty($item['mods'])){
		echo "<ul style='list-style-type:none;margin-top: 2px;padding: 0;'>";
		// echo '<li><b>Mods:</b></li>';
		foreach($item['mods'] as $mkey => $mod){
			echo '<li>';
			echo ucwords($mod['type'].' '.$mod['modifier']);
			echo '</li>';
		}
		echo "</ul>";
	}
}
if($item['comments'] != ""){
	echo "<ul style='list-style-type:none;margin-top: 2px;padding: 0;'><li><b>Comments:</b></li><li>".$item['comments']."</li></ul>";
}
?>
</td>
<?php /*if($param == NULL){ ?>
<td>
<?php if($item['mod'] == 'no'){
	echo "-";
}else{
	foreach($item['mods'] as $mkey => $mod){
		echo ' ';
		echo ($mod['type'].' '.$mod['modifier']);
		echo ', ';
	}

}
	if($item['comments'] != ""){
		echo $item['comments'];
	}?>
</td>
<?php }*/ ?>
<td><?= $item['quantity']?></td>
<?php if($param == NULL){ ?>
<!--<td style="text-align:center;">AED<br><?= number_format($item['unit_price'],2)?></td>-->
<td style="text-align:center;">AED<br><?= number_format($item['total_price'],2)?></td>
<?php } ?>
</tr>
<?php } ?>
<tr><td style="border-bottom:1px dotted #000;" colspan="<?= ($param == NULL)?'4':'3';?>"></td></tr>
</table>
<table>
<tr><td style="height:15px;" colspan="2"></td></tr>
<tr>
<th>General Request :</th>
<td><?= $order['comments']?></td>
</tr>
<tr><td style="height:20px;" colspan="2"></td></tr>
</table>
<?php if($param == NULL){ ?>
<table>
<tr>
<th>ORDER TOTAL :</th>
<td>AED <?= number_format($order['order_charges'],2)?></td>
</tr>
<tr>
<th>VAT 5%  (<?= ($order['gst_option'] == 'inclusive')?'INCLUDED':'EXCLUDED';?>) :</th>
<td>
<?php if($order['gst_option'] == 'exclusive'){ ?>AED <?= number_format($order['gst_charges'],2)?><?php } ?>
<?php if($order['gst_option'] == 'inclusive'){
	$gst_value = intval(($settings['gst']/100)*$order['order_charges']);
	// $gst_value = $order['order_charges']-intval($gst_value);
	?>AED <?= number_format($gst_value,2)?>
<?php } ?>
</td>
</tr>
<tr>
<th>DELIVERY CHARGES :</th>
<td>AED <?= number_format($order['delivery_charges'],2)?></td>
</tr>
<tr>
<th>GRAND TOTAL :</th>
<td>AED <?= number_format($order['total_charges'],2)?></td>
</tr>
<tr>
<th>PAYMENT METHOD :</th>
<td>COD</td>
</tr>
<tr>
<th>DELIVERY TIME :</th>
<td>NOW</td>
</tr>
</table>
<?php } ?>
<div style="footer {page-break-after: always;}"></div>
<script>
window.print();
window.close();
</script>
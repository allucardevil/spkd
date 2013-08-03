<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bukti Timbang Barang Incoming | PT Gapura Angkasa Denpasar</title>
<style type="text/css">
html {
	margin : 0px;
}
table.gridtable {
	font-family: time,verdana,arial,sans-serif;
	font-size:12px;
	color:#333333;
	border-width: 0px;
	border-color: #666666;
	border-collapse: collapse;
	width:70mm;
	
}
table.gridtable th {
	border-width: 0px;
	padding: 4px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 0px;
	padding: 2px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
	text-align: left;
}
</style>

</head>
<body>
<table class="gridtable">
<?php foreach($detail as $row)
{ ?>
	<tr>
		<td colspan="3"><center>PT. GAPURA ANGKASA-PT ANGKASA PURA II</center></td>
	</tr>
	<tr>
		<td colspan="3"><center>Domestic Cargo Warehouse</center></td>
	</tr>
	<tr>
		<td colspan="3"><center>Kualanamu International Airport</center></td>
	</tr>
	<tr>
		<td colspan="3"><center><hr/></center></td>
	</tr>
	<tr>
		<td colspan="3"><center>BUKTI TIMBANG BARANG INBOUND</center></td>
	</tr>
	<tr>
		<td colspan="3"><center>_____________________________</center></td>
	</tr>
    <tr>
		<td colspan="3"><center><b><?php echo $row->in_btb;?></b></center></td>
	</tr>
	<tr>
		<td colspan="2"></td><td><font size="1pt"><?php // if($row->in_status_cetak == 1){echo "<< REPRINTED VERSION >>";} ?></font></td>
	</tr>
	
	<tr>
		<td>Pengirim/Agent</td><td>:</td><td><?php echo $row->in_agent;?></td>
	</tr>
	<tr>
		<td>Airline/Tujuan</td><td>:</td><td><?php echo $row->in_airline."/".$row->in_tujuan;?></td>
	</tr>
	<tr>
		<td>No. SMU</td><td>:</td><td><?php echo $row->in_smu;?></td>
	</tr>
	<tr>
		<td>Jenis Barang</td><td>:</td><td><?php echo $row->in_jenisbarang;?></td>
	</tr>
<?php } ?>
</table>	
	
<table class="gridtable">
	<tr>
		<td colspan="5"><center><hr/></center></td>
	</tr>
	<tr>
		<td rowspan="3">NO</td>
		<td rowspan="3">KOLI</td>
		<td colspan="3"><center>BERAT</center></td>
	</tr>
	<tr>
		<td colspan="3"><center>_____________________________</center></td>
	</tr>
	<tr>
		<td>AKTUAL</td>
		<td>PxLxT</td>
		<td>VOL</td>
	</tr>
	
<?php 
$no=0;
$total_berat=0;
$total_koli=0;
foreach($detail_berat as $row_berat)
{ $no++;
	$total_koli	=	$total_koli + $row_berat->in_koli;
	$total_berat = $total_berat + $row_berat->in_berat_datang;
	
?>	
	<tr>
		<td colspan="5"><center>_____________________________</center></td>
	</tr>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row_berat->in_koli; ?></td>
		<td><?php echo $row_berat->in_berat_datang; ?></td>
		<td><?php echo "0x0x0"; ?></td>
		<td><?php echo "0"; ?></td>
	</tr>
	<tr>
		<td colspan="5"><center>_____________________________</center></td>
	</tr>
<?php } ?>
	<tr>
		<td><?php echo "TOTAL"; ?></td>
		<td><?php echo $total_koli ?></td>
		<td><?php echo $total_berat; ?></td>
		<td><?php echo "0x0x0"; ?></td>
		<td><?php echo "0"; ?></td>
	</tr>
	<tr>
		<td colspan="5"><center>_____________________________</center></td>
	</tr>
</table>
</body>
</html>
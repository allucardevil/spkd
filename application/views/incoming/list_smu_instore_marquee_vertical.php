<html>
<head>
<style type="text/css">
html {
	margin : 0px;
}
body{
	background-color: #000080;
}

#content {vertical-align:middle;}

table.gridtable {
	font-family: time,verdana,arial,sans-serif;
	font-size:12px;
	color:#333333;
	border-width: 0px;
	border-color: #666666;
	border-collapse: collapse;
	width:100mm;
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
	border-color: #ffffff;
	text-align: left;
	font-size: 18px;
	color: #ffff00;
}
</style>
</head>
<body>
<div id="content">
	<center>
	<marquee  scrollamount="2" direction="up" loop="true" width="100%"> 
		<font color="#ffffff">
			<strong> 
				<table class="gridtable">
				<?php 
				if(isset($result)){
					foreach($result as $row){	
				?>
					<tr>
						<td width="30%"><?php echo 	$row->inb_no_smu ;?></td>
						<td width="30%"><?php echo 	$row->inb_koli." koli" ;?></td>
						<td width="30%"><?php echo 	$row->inb_berat_aktual." kg" ;?></td>
					</tr>
				<?php
					}
				}
				?>
				</table>
			</strong>
		</font>
	</marquee>
	</center>
</div>	
</body>
</html>

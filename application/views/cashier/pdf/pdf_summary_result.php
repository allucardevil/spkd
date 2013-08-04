<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PT Gapura Angkasa Kualanamu | Warehouse Management System</title>
<style type="text/css">
html{
	margin:15px;
}

table.gridtable {
	font-family: times,arial,sans-serif;
	font-size:14px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
	margin-top:10px;
	margin-bottom:2px;
	border-top: 1px solid;
	width:270mm;
	height:auto;
	
}
table.gridtable th {
	border-width: 1px;
	padding: 4px;
	border-style: solid;
	border-color: #666666;
	height:auto;
	border-bottom:1px solid;
	border-top:1px solid;
}
table.gridtable td {
	border-width: 1px;
	padding: 2px;
	border-style: solid;
	border-color: #666666;
	border-bottom: 1px solid;
	background-color: #ffffff;
	text-align: left;
	height:auto;
}
</style>

</head>
<body>
<div id='content'>
            	<h2>Summary Report</h2>
					
                    <table  border="1" class="gridtable">
                    		<tr>
                            	<td colspan="3"><div align="center"><strong><?php echo strtoupper(mdate("%d-%M-%Y", strtotime($date))); ?></strong></div></td>
                            	<td colspan="6"><div align="center"><strong>INCOMING SUMMARY INCOME</strong></div></td>
                            </tr>	
                        <tr>
                            	<td><div align="center"><strong>Airline</strong></div></td>
                            	<td><div align="center"><strong>Koli</strong></div></td>
                                <td><div align="center"><strong>Berat</strong></div></td>
                                <td><div align="center"><strong>WHC</strong></div></td>
                                <td><div align="center"><strong>CSC</strong></div></td>
                                <td><div align="center"><strong>ADM</strong></div></td>
                                <td><div align="center"><strong>Sub Total</strong></div></td>
                                <td><div align="center"><strong>PPN</strong></div></td>
                                <td><div align="center"><strong>Total</strong></div></td>
                            </tr>
                    <?php 
					$tot_koli = 0;
					$tot_berat = 0;
					$grand_total = 0;
					foreach($incoming as $items): 	
					$tot_koli = $tot_koli + $items->in_koli;
					$tot_berat = $tot_berat +  $items->in_berat_bayar;
					$grand_total = $grand_total + $items->totbiaya;
					?>
    						
                            
                             <tr>
                             	<td><strong><?php echo strtoupper($items->in_airline); ?></strong></td>
                                <td><div align="right"><?php echo number_format($tot_koli, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($tot_berat, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->whc, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->csc, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->adm, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->whc+$items->csc+$items->adm, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->ppn, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->totbiaya, 0, ',', '.'); ?></div></td>
                             </tr> 
                             
                             
                    <?php endforeach; ?>
                    
                    		<tr>
                             	<td colspan="8"><strong>GRAND TOTAL</strong></td>
                                <td><strong><?php echo number_format($grand_total, 0, ',', '.'); ?></strong></td>
                             </tr>  
                    
                    </table>
                    
                     <table  border="1" class="gridtable">
                    		<tr>
                            	<td colspan="3"><div align="center"><strong><?php echo strtoupper(mdate("%d-%M-%Y", strtotime($date))); ?></strong></div></td>
                            	<td colspan="6"><div align="center"><strong>OUTGOING SUMMARY INCOME</strong></div></td>
                            </tr>	
                           <tr>
                            	<td><div align="center"><strong>Airline</strong></div></td>
                            	<td><div align="center"><strong>Koli</strong></div></td>
                                <td><div align="center"><strong>Berat</strong></div></td>
                                <td><div align="center"><strong>WHC</strong></div></td>
                                <td><div align="center"><strong>CSC</strong></div></td>
                                <td><div align="center"><strong>ADM</strong></div></td>
                                <td><div align="center"><strong>Sub Total</strong></div></td>
                                <td><div align="center"><strong>PPN</strong></div></td>
                                <td><div align="center"><strong>Total</strong></div></td>
                            </tr>
                    <?php 
					$tot_koli = 0;
					$tot_berat = 0;
					$grand_total = 0;
					foreach($outgoing as $items): 	
					$tot_koli = $tot_koli + $items->btb_totalkoli;
					$tot_berat = $tot_berat +  $items->btb_totalberatbayar;
					$grand_total = $grand_total + $items->totbiaya;
					?>
    						
                            
                             <tr>
                             	<td><div align="center"><strong><?php echo strtoupper($items->airline); ?></strong></div></td>
                                <td><div align="right"><?php echo $tot_koli; ?></div></td>
                                <td><div align="right"><?php echo number_format($tot_berat, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->whc, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->csc, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->adm, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->whc+$items->csc+$items->adm, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->ppn, 0, ',', '.'); ?></div></td>
                                <td><div align="right"><?php echo number_format($items->totbiaya, 0, ',', '.'); ?></div></td>
                             </tr> 
                             
                             
                    <?php endforeach; ?>
                    
                    		<tr>
                             	<td colspan="8"><strong>GRAND TOTAL</strong></td>
                                <td><strong><?php echo number_format($grand_total, 0, ',', '.'); ?></strong></td>
                             </tr>  
                    
                    </table>
</div>
</body>
</html>

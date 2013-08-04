<div id='content'>
            	<h2>Summary Report</h2>
					
                    <table>
                    		<tr>
                            	<td colspan="3" align="center"><strong><?php echo strtoupper(mdate("%d-%M-%Y", strtotime($date))); ?></strong></td>
                            	<td colspan="6" align="center"><strong>INCOMING SUMMARY INCOME</strong></td>
                            </tr>	
                            <tr>
                            	<td align="center"><strong>Airline</strong></td>
                            	<td align="center"><strong>Koli</strong></td>
                                <td align="center"><strong>Berat</strong></td>
                                <td align="center"><strong>WHC</strong></td>
                                <td align="center"><strong>CSC</strong></td>
                                <td align="center"><strong>ADM</strong></td>
                                <td align="center"><strong>Sub Total</strong></td>
                                <td align="center"><strong>PPN</strong></td>
                                <td align="center"><strong>Total</strong></td>
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
                             	<td align="center"><strong><?php echo strtoupper($items->in_airline); ?></strong></td>
                                <td align="right"><?php echo number_format($tot_koli, 0, ',', '.'); ?></td>
                                <td align="right"><?php echo number_format($tot_berat, 0, ',', '.'); ?></td>
                                <td align="right"><?php echo number_format($items->whc, 0, ',', '.'); ?></td>
                                <td align="right"><?php echo number_format($items->csc, 0, ',', '.'); ?></td>
                                <td align="right"><?php echo number_format($items->adm, 0, ',', '.'); ?></td>
                                <td align="right"><?php echo number_format($items->whc+$items->csc+$items->adm, 0, ',', '.'); ?></td>
                                <td align="right"><?php echo number_format($items->ppn, 0, ',', '.'); ?></td>
                                <td align="right"><?php echo number_format($items->totbiaya, 0, ',', '.'); ?></td>
                             </tr> 
                             
                             
                    <?php endforeach; ?>
                    
                    		<tr>
                             	<td colspan="8"><strong>GRAND TOTAL</strong></td>
                                <td><strong><?php echo number_format($grand_total, 0, ',', '.'); ?></strong></td>
                             </tr>  
                    
                    </table>
                    
                     <table>
                    		<tr>
                            	<td colspan="3" align="center"><strong><?php echo strtoupper(mdate("%d-%M-%Y", strtotime($date))); ?></strong></td>
                            	<td colspan="6" align="center"><strong>OUTGOING SUMMARY INCOME</strong></td>
                            </tr>	
                           <tr>
                            	<td align="center"><strong>Airline</strong></td>
                            	<td align="center"><strong>Koli</strong></td>
                                <td align="center"><strong>Berat</strong></td>
                                <td align="center"><strong>WHC</strong></td>
                                <td align="center"><strong>CSC</strong></td>
                                <td align="center"><strong>ADM</strong></td>
                                <td align="center"><strong>Sub Total</strong></td>
                                <td align="center"><strong>PPN</strong></td>
                                <td align="center"><strong>Total</strong></td>
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
                             	<td><strong><?php echo strtoupper($items->airline); ?></strong></td>
                                <td><?php echo $tot_koli; ?></td>
                                <td><?php echo number_format($tot_berat, 0, ',', '.'); ?></td>
                                <td><?php echo number_format($items->whc, 0, ',', '.'); ?></td>
                                <td><?php echo number_format($items->csc, 0, ',', '.'); ?></td>
                                <td><?php echo number_format($items->adm, 0, ',', '.'); ?></td>
                                <td><?php echo number_format($items->whc+$items->csc+$items->adm, 0, ',', '.'); ?></td>
                                <td><?php echo number_format($items->ppn, 0, ',', '.'); ?></td>
                                <td><?php echo number_format($items->totbiaya, 0, ',', '.'); ?></td>
                             </tr> 
                             
                             
                    <?php endforeach; ?>
                    
                    		<tr>
                             	<td colspan="8"><strong>GRAND TOTAL</strong></td>
                                <td><strong><?php echo number_format($grand_total, 0, ',', '.'); ?></strong></td>
                             </tr>  
                    
                    </table>
                    
                    <?php echo anchor('cashier/payment/pdf_summary_result/' . $date, 'EXPORT TO PDF'); ?>
</div>

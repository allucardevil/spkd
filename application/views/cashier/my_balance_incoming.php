<div id='content'>
	
            	<h2>Daily Incoming Transaction  Report Tanggal <?php echo mdate('%d-%m-%Y', time()); ?> Kasir : <?php echo $user; ?><h2>
				
		
     		
                    <table class="table table-bordered">
                    	
                        <tr>
                        	
                            <th>Date</th>
                            <th>No BTB</th>
                            <th>No SMU</th>
                            <th>Koli</th>
                            <th>Berat Aktual</th>
                            <th>Berat Bayar</th>
                            <th>Hari</th>
                            <th>WHC</th>
                            <th>CSC</th>
                            <th>Adm</th>
                            <th>Sub Total</th>
                            <th>PPN</th>
                            <th>Total</th>
                        </tr>
                        <?php
						$tot = 0; 
						foreach($query as $row): 
						$tot=$tot+$row->total_biaya;
						?>
               			
        
                        	
                            <td><?php echo mdate("%d-%m-%Y",strtotime($row->tglbayar)); ?></td>
                            <td><?php echo strtoupper($row->no_smubtb); ?></td>
                            <td><?php echo strtoupper($row->nosmu); ?></td>
                            <td><?php echo strtoupper($row->in_koli); ?></td>
                            <td><?php echo strtoupper($row->in_berat_datang); ?></td>
                            <td><?php echo strtoupper($row->in_berat_bayar); ?></td>
                            <td><?php echo strtoupper($row->hari); ?></td>
                            <td><?php echo strtoupper($row->sewagudang); ?></td>
                            <td><?php echo strtoupper($row->cargo_charge); ?></td>
                            <td><?php echo strtoupper($row->administrasi); ?></td>
                            <td><?php echo strtoupper($row->sewagudang_after_discount+$row->administrasi); ?></td>
                            <td><?php echo strtoupper($row->ppn); ?></td>
                            <td><?php echo strtoupper($row->total_biaya); ?></td>
                          
                        </tr>
                        <?php endforeach; ?>
                        <tr>
							<th colspan="11"></th>
                            <th colspan="2">Rp. <?php echo number_format($tot, 0, ',', '.'); ?></th>
                      	</tr>
                    </table>
              
</div>
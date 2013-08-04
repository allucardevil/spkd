<div id="content">
	    	PT Gapura Angkasa - PT Angkasa Pura II<br />
        Cargo Warehouse Kualanamu International Airport<br />
        <br />
    	Laporan Pendapatan Harian Incoming Airline : <?php echo strtoupper($airline); ?>  Tanggal : <?php echo $date; ?><br />
    	<table>
        	<tr>
            	<th>Agent</th>
                <th>NPJG</th>
                <th>No SMU</th>
                <th>No Faktur</th>
                <th>Hari</th>
                <th>Koli</th>
                <th>Berat</th>
              
                
                <th>WHC</th>
                <th>CSC</th>
                <th>Adm</th>
                <th>Total</th>
                <th>Ppn</th>
                <th>Total</th>
            </tr>
            <?php 
			$tot_whc = 0;
			$tot_csc = 0;
			$tot_kol = 0;
			$tot_bbr = 0;
			$tot_adm = 0;
			$tot_ppn = 0;
			foreach($details as $item): 
			if (isset($item)) 
			{
				if($item->in_berat_bayar <= 10)
				{
					$berat = 10;
				} 
				else 
				{
					$berat = $item->in_berat_bayar;
				} 
				
				if ($item->hari <= 3)
				{ 
					$hari = 1;
				} 
				else 
				{
					$hari = $item->hari-2;
				}
			?>
            <tr>
            	<td><?php echo $item->in_agent; ?></td>
                <td><?php echo $item->nodb; ?></td>
                <td><?php echo $item->nosmu; ?></td>
                <td><?php echo $item->nofaktur; ?></td>
                <td><center><?php echo $item->hari; ?></center></td>
                <td><?php echo number_format($item->in_koli, 0, ',', '.'); ?></td>
                <?php
					
					$whc = 525 * $hari * $berat;
					$tot_whc = $tot_whc + $whc;
					
					$csc = 275 * $hari * $berat;
					$tot_csc = $tot_csc + $csc;
					
					$adm = 5000;
					$tot_adm = $tot_adm + $adm;
					
					$ppn = ($whc + $csc + $adm)*0.1;
					$tot_ppn = $tot_ppn + $ppn;
					
					$tot_kol = $tot_kol + $item->in_koli;
					$tot_bbr = $tot_bbr + $berat;
					
					
				?>
                <td><?php echo number_format($berat, 1, ',', '.'); ?></td>
                <td><?php echo number_format($whc, 0, ',', '.'); ?></td>
                <td><?php echo number_format($csc, 0, ',', '.'); ?></td>
                <td><?php echo number_format($adm, 0, ',', '.'); ?></td>
                <td><?php echo number_format($whc+$csc+$adm, 0, ',', '.'); ?></td>
                <td><?php echo number_format($ppn, 0, ',', '.'); ?></td>
                <td><?php echo number_format($whc+$csc+$adm+$ppn, 0, ',', '.'); ?></td>
            </tr>
            <?php 
			}
			endforeach; 
			?>
			<tr>
            	<td colspan="5"><b>TOTAL</b></td>
                <td><?php echo number_format($tot_kol, 0, ',', '.'); ?></td>
                
                <td><?php echo number_format($tot_bbr, 1, ',', '.'); ?></td>
                <td><?php echo number_format($tot_whc, 0, ',', '.'); ?></td>
                <td><?php echo number_format($tot_csc, 0, ',', '.'); ?></td>
                <td><?php echo number_format($tot_adm, 0, ',', '.'); ?></td>
                <td><?php echo number_format($tot_whc+$tot_csc+$tot_adm, 0, ',', '.'); ?></td>
                <td><?php echo number_format($tot_ppn, 0, ',', '.'); ?></td>
                <td><?php echo number_format($tot_whc+$tot_csc+$tot_adm+$tot_ppn, 0, ',', '.'); ?></td>
            </tr>
			
        </table>
         <?php echo anchor('harian/incoming_pdf/' . $airline . '/' . $date . '/', 'export to pdf' ); ?>
    
</div>
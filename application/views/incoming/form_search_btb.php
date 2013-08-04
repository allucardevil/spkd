<div id="content">
	<h2>Pencarian Berdasarkan No SMU</h2>
	<?php 	echo form_open('incoming/search_btb');?>
			<input type="text" name="smu" placeholder="masukan no smu">
			<input type="submit" value="search" class="btn btn-primary">
	<?php	
			echo form_close();?>
<div id="printableArea" >    
	<table>
		<thead>
			<tr>
				<th>BTB</th>
                <th>SMU</th>
				<th>Agent</th>
				<th>Airline</th>
				<th>Tgl Manifest</th>
                <th>Koli</th>
				<th>Berat Aktual</th>
				<th>Berat Bayar</th>
                <th>Status BTB</th>
                <th>Status Bayar</th>
                <th>Status Gudang</th>
				<th>Action</th>
                
			</tr>
		</thead>
		<tbody>
			<?php foreach($result as $row){
			?>
			<tr>
				<td><?php echo $row->inb_no_smu;?></td>
                <td><?php echo $row->in_btb;?></td>
				<td><?php echo $row->in_agent;?></td>
				<td><?php echo $row->in_airline;?></td>
				<td><?php echo $row->in_tgl_manifest;?></td>
                <td><?php echo $row->inb_koli;?></td>
				<td><?php echo $row->in_berat_datang;?></td>
				<td><?php echo $row->in_berat_bayar;?></td>
                <td>
				<?php 
					if($row->inb_status_void == 'yes')
					{
						echo 'VOID' ;
					}
					else
					{
						echo 'ACTIVE';
					}
				?>
                </td>
                <td>
				<?php 
					if($row->in_status_bayar == 'yes')
					{
						echo 'LUNAS' ;
					}
					else
					{
						echo 'Belum Bayar';
					}
				?>
                </td>
                <td>
				<?php 
					if($row->inb_status_gudang == 'outstore')
					{
						echo 'Belum Tiba' ;
					}
					elseif($row->inb_status_gudang == 'instore')
					{
						echo 'Barang di Gudang';
					}
					else
					{
						echo 'Barang sudah diambil';
					}
				?>
                </td>
				<td>
					<?php 
						if($row->inb_status_void == 'yes')
						{
							echo anchor('incoming/print_incoming_btb/'.$row->in_btb, 'CETAK ULANG', 'class="btn btn-primary btn-white"');
						}
						else
						{
							if($row->in_status_bayar == 'no')
							{
								echo anchor('incoming/void_breakdown_btb/'.$row->inb_id,'VOID', 'class="btn btn-danger"');
							}
							
							echo "&nbsp;";
							echo anchor('incoming/print_incoming_btb/'.$row->in_btb, 'CETAK BTB', 'class="btn btn-primary"');
						}
						
						
						
					?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	  </table>
     
</div>
</div>	




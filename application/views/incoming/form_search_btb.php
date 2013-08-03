<div id="content">
	<?php 	echo form_open('incoming/search_btb');?>
			<input type="text" name="smu" placeholder="smu">
			<input type="submit" value="search">
			<!-- <input type="button" onclick="printDiv('printableArea')" value="Print" />
			-->
	<?php	
			echo form_close();?>
<div id="printableArea" >    
	<table>
		<thead>
			<tr>
				<th>BTB</th>
				<th>Agent</th>
				<th>Airline</th>
				<th>Tgl Manifest</th>
				<th>Berat Aktual</th>
				<th>Berat Bayar</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($result as $row){
			?>
			<tr>
				<td><?php echo $row->in_btb;?></td>
				<td><?php echo $row->in_agent;?></td>
				<td><?php echo $row->in_airline;?></td>
				<td><?php echo $row->in_tgl_manifest;?></td>
				<td><?php echo $row->in_berat_datang;?></td>
				<td><?php echo $row->in_berat_bayar;?></td>
				<td>
					<?php 
						echo anchor('incoming/void_breakdown_btb/'.$row->in_btb,"<input type='button' value='Void'>");
						echo "   ";
						echo anchor('incoming/print_incoming_btb/'.$row->in_btb,"<input type='button' value='Print'>");
					?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	  </table>
     
</div>
</div>	




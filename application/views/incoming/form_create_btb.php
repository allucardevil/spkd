<div id="content">
	<?php 	echo form_open('incoming/search_form_create_btb');?>
			<input type="text" name="smu" placeholder="smu">
			<input type="submit" value="search">
	<?php	
			echo form_close();
			
			echo form_open('incoming/create_btb');
			?>
			<table>
			<?php 
			if(isset($result))
			{
			foreach($result as $row){
			?>	
				<tr><td>Agent</td><td>:</td>
					<td>
						<?php 
						$list_agent = array();
						$list_agent['non'] = 'Pilih Agen'; 
						foreach ($agent as $row_agent)
						{
							$btbagent = $row_agent->btb_agent;
							$list_agent[$btbagent] = $row_agent->btb_agent; 
						}
						echo form_dropdown('agent',$list_agent);
						?>
					</tdx>
				</tr>
				<tr><td>Airline</td><td>:</td><td><input type="text" name="airline" value="<?php echo strtoupper($row->inb_airlines); ?>" readonly="readonly"></td></tr>
				<tr><td>Asal</td><td>:</td><td><input type="text" name="asal" value="CGK"></td></tr>
				<tr><td>Tujuan</td><td>:</td><td><input type="text" name="tujuan" value="KNO"></td></tr>
				<tr><td>SMU</td><td>:</td><td><input type="text" name="smu" value="<?php echo $row->inb_no_smu; ?>" readonly="readonly"></td></tr>
				<tr><td>Jenis Barang</td>
					<td>:</td>
					<td>
						<?php
						$list_typebarang = array();
						$list_typebarang['consol'] = 'CONSOL'; 
						foreach($typebarang as $row_typebarang)
						{
							$list_typebarang[$row_typebarang->typebarang] = $row_typebarang->typebarang;
						}
						echo form_dropdown('typebarang',$list_typebarang);
						?>
					</td>
				</tr>
				<tr><td>No Flight</td><td>:</td><td><input type="text" name="noflight" value="<?php echo $row->inb_flight_number?>"></td></tr>
				<tr><td>Koli</td><td>:</td><td><input type="text" name="koli" value="<?php echo $row->inb_koli;?>" readonly="readonly"></td></tr>
				<tr><td>Berat Aktual</td><td>:</td><td><input type="text" name="berataktual" value="<?php echo $row->inb_berat_aktual;?>" readonly="readonly"></td></tr>
				<tr><td>Berat Volume</td><td>:</td>
					<td>
						<input type="text" name="beratvolume" value="<?php echo $row->inb_berat_volume;?>">
						<input type="hidden" name="id_breakdown" value="<?php echo $row->inb_id;?>">
					</td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" value="submit"></td>
				</tr>
			</table> 
			<?php
			}
			}
			echo form_close();
			?>
			
		</tbody>
	  </table>
     
</div>
</div>	



<div id="content">
	<?php echo form_open('incoming/insert_manifest_instore'); ?>
    
		<strong>
		Insert Incoming Manifest Outstore
		<br>
		<br>
		<font size="2pt">
		Format : Airlines / No Flight / No SMU / Koli / Berat
		<br>
		Contoh : GA/11092900/2/100
		</font>
		</strong>
	  <table>
		<tr>
			<td>Incoming Manifest </td>
			<td>
			<input type="text" name="incoming" placeholder="" size="66">
			<br>
			</td>
        </tr>
		<tr>
			<td colspan=2><input type='submit' value='Save'></td>
		</tr>
      </table>
	  <?php 
		if(($this->uri->segment(4) == "error" ) OR ($this->uri->segment(3) == "error" )){ echo "<b> Proses Input Gagal <br> Input Data harus sesuai dengan format yang disediakan </b>";}
		else if($this->uri->segment(4) == "success" ){ 
			echo "<b> Proses Input Berhasil </b>";
		?>
		<table>
			<tr>
				<th>No</th>
				<th>Airlines</th>
				<th>SMU</th>
				<th>Koli</th>
				<th>Berat</th>
				<th>Aksi</th>
			</tr>
			<?php
				$no = 0;
				foreach($result as $row)
				{ 
				$no++;
			?>
				<?php // echo form_open('incoming/create_btb'); ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><input type="text" name="airlines" value="<?php echo $row->inb_airlines;?>" readonly></td>
					<td><input type="text" name="no_smu" value="<?php echo $row->inb_no_smu;?>" readonly></td>
					<td><input type="text" name="koli" value="<?php echo $row->inb_koli;?>" readonly></td>
					<td><input type="text" name="berat_aktual" value="<?php echo $row->inb_berat_aktual;?>" readonly></td>
					<td><?php 
						echo anchor('incoming/void_breakdown/'.$row->inb_id,"<input type='button' value='Void'>"); 
						echo "   ";
						echo anchor('incoming/form_create_btb/'.$row->inb_id,"<input type='button' value='Create BTB'>"); 
						?>
					</td>
				</tr>
				<?php // echo form_close(); ?>
			<?php
				}
			?>
		</table>
		<?php
		}
	  ?>
      <?php echo form_close(); ?>
</div>


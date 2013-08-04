<div id="content">
	<?php echo form_open('incoming/insert_manifest_instore'); ?>
	  <table>
          <tr>
            <th colspan="3"><font color="#FFFF00">BARANG SUDAH DITERIMA DI GUDANG</font></th>
          </tr>
          <tr>
            <th>Format : </th>
            <th colspan="2">Airlines / No SMU / Koli / Berat</th>
          </tr>
            <tr>
                <th>Contoh : </th>
                
                <th colspan="2">GA/11092900/2/100</th>
            </tr>
            <tr>
                <td>Incoming Manifest </td>
                <td><input type="text" name="incoming" placeholder="" size="66"></td>
                <td><input type='submit' value='Save' class="btn btn-primary"></td>
            </tr>
      </table>
      
      <p><strong>gunakan form ini untuk input barang yang <font color="#006600">SUDAH DITERIMA DI GUDANG</font> !!!</strong></p>
      
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
				<?php // echo form_open('incoming/create_btb');?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><input type="text" name="airlines" value="<?php echo $row->inb_airlines;?>" readonly></td>
					<td><input type="text" name="no_smu" value="<?php echo $row->inb_no_smu;?>" readonly></td>
					<td><input type="text" name="koli" value="<?php echo $row->inb_koli;?>" readonly></td>
					<td><input type="text" name="berat_aktual" value="<?php echo $row->inb_berat_aktual;?>" readonly></td>
					<td><?php 
						echo anchor('incoming/void_breakdown/'.$row->inb_id,'VOID', 'class="btn btn-danger"'); 
						echo "   ";
						echo anchor('incoming/form_create_btb/'.$row->inb_id,'CETAK BTB', 'class="btn btn-primary"'); 
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


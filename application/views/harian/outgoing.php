<div id="content">
	<?php echo form_open('harian/outgoing_result'); ?>
    <h5>Laporan Penjualan Harian Outgoing</h5>
      <table>
		
        <tr>
        	<td>Date</td><td><input type="text" name="date" id="datepicker" placeholder="select date"></td>
        </tr>
        
        <tr>
        	<td>Airline</td><td><select name="airline">
						<option value="none">select airline</option>
						<?php foreach ( $airline as $item ) : ?>
							<option value="<?php echo $item->airlinecode	 ?>"><?php echo ucfirst( $item->airlinename ) ?></option>
						<?php endforeach ?>
                    </select></td>
        </tr>
        
        <tr>
        	<td>&nbsp;</td>
            <td><input type='submit' value='Print' class="btn btn-default"></td>
        </tr>
		
      </table>
      <?php echo form_close(); ?>
</div>


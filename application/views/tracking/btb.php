<div id="content">
	<?php echo form_open('tracking/btb_search'); ?>
      <table>
      	<tr>
        	<td>No BTB</td>
            <td> : <input type='text' name='no_btb'></td>
     	</tr>
        <tr>
            <td>Type</td>
            <td>
                <select name="type">
                    <option name="outgoing">outgoing</option>
                    <option name="incoming">incoming</option>
                </select>
            </td>
        </tr>
      <tr>
      	<td colspan="2"><input type='submit' value='Login'></td>
      </tr>
      </table>
      <?php echo form_close(); ?>
</div>


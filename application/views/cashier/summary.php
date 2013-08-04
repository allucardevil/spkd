<div id='content'>
            	<h2>Summary Report</h2>
					
                    <?php echo form_open('cashier/payment/summary_result'); 	?>
    							<div class="input-group">
      								<input type="text" class="form-control" id="datepicker" placeholder="select date" name="date" value="<?php echo mdate('%d-%m-%Y', time()); ?>">
      								<span class="input-group-btn">
                                    <?php echo form_submit('submit','Go!', 'class="btn btn-default"'); ?>
                                  </span>
                                </div>
                             
                    <?php echo form_close(); ?>
</div>

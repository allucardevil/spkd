<div id='content'>
            	<h2>Void Delivery Bill</h2>
					
                    <?php 
							echo form_open('cashier/payment/do_void_dbo/'.$no_btb);
					?>
                    
                      Alasan : <br/><input name="reason" size=100  type="text">
                      <?php echo form_submit('submit', 'Void' ); ?>
					 
</div>
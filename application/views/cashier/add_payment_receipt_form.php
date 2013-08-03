<div id='content'>
            	<h2>SEARCH BTB</h2>
					
                    <?php 
							echo form_open('cashier/payment/do_search_receipt');
					?>
                    
                      <input name="btb_no" size=40 placeholder="EX : 11072013000001" type="text">
                      <?php echo form_submit('submit', 'SEARCH' ); ?>
					  <?php if($this->uri->segment(4) == 'not_found')
					{ ?>
							<p><strong>Note:</strong> <br/>
							Nomor yang dimasukkan salah.</p>

					<?php }?> 
					<?php if($this->uri->segment(4) == 'duplicate_data')
					{ ?>
							<p><strong>Note:</strong> <br/>
							Data double</p>

					<?php }?>
					 <p><br/>INFO: <BR>Masukkan Nomor Bukti Timbang Barang (<B>No. BTB</B>) untuk DeliveryBill
		<B>OUTGOING</B>. <BR>Masukkan nomor Surat Muatan Udara/Airway Bill (<B>No. SMU/AWB</B>) untuk 
		DeliveryBill <B>INCOMING</B></p>
                
</div>
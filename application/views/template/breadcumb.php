<div class="btn-group btn-group-justified">

        	<?php 
			$session_data = $this->session->userdata('logged_in');
			if($this->session->userdata('logged_in'))
			{
				echo anchor('dashboard', strtoupper($session_data['id_user']) . ' [ ' . $session_data['level'] . ' ]', 'class="btn btn-default"'); 
			}
			?>
            
            <?php echo anchor('dashboard','Home', 'class="btn btn-default"'); ?>
            <?php echo anchor('tracking/smu', 'SMU Tracking', 'class="btn btn-default"'); ?>
            <?php echo anchor('tracking/btb', 'BTB Tracking', 'class="btn btn-default"'); ?>
           
            
            <?php
			# level btb
			if($session_data['level'] == 'btb')
	    	{
				echo anchor('weighing/outgoing/add','BTB Baru', 'class="btn btn-default"'); 
			}
			?>
            
            <?php
			# level gapura management
			if($session_data['level'] == 'gapura')
	    	{
			}
			?>
            
            <?php
			# level supervisor
			if($session_data['level'] == 'supervisor')
	    	{
				echo anchor('harian/incoming','LPKH Incoming', 'class="btn btn-default"'); 
				echo anchor('harian/outgoing','LPKH Outgoing', 'class="btn btn-default"'); 
				echo anchor('login/register','Register User', 'class="btn btn-default"'); 
			}
			?>
            
            <?php
			# level kasir
			if($session_data['level'] == 'kasir')
	    	{
				echo anchor('cashier/payment','Kasir', 'class="btn btn-default"'); 
			}
			?>
            
            <?php
			# level store in // break down checker
			if($session_data['level'] == 'store_in')
	    	{
			}
			?>
            
            <?php
			# level store out // build up checker
			if($session_data['level'] == 'store_out')
	    	{
			
			}
			?>
            
            <?php
			# level incoming
			if($session_data['level'] == 'incoming')
	    	{
			 	echo anchor('incoming','Inbound Area', 'class="btn btn-default"'); 
			}
			?>
            
            <?php
			# level outgoing
			if($session_data['level'] == 'outgoing')
	    	{
			
			}
			?>
            
            <?php
			# level admin
			if($session_data['level'] == 'admin')
	    	{
				echo anchor('weighing/outgoing/add','BTB Baru', 'class="btn btn-default"');
				
				echo anchor('cashier/payment','NPJG Baru', 'class="btn btn-default"'); 
				echo anchor('harian/incoming','LPKH Incoming', 'class="btn btn-default"');
				echo anchor('harian/outgoing','LPKH Outgoing', 'class="btn btn-default"');
				
				echo anchor('incoming/add_manifest_instore','Input SMU Barang Gudang', 'class="btn btn-default"'); 
				echo anchor('incoming/form_create_btb','Create BTB Incoming', 'class="btn btn-default"'); 
				echo anchor('incoming/search_btb','Search Incoming SMU', 'class="btn btn-default"'); 
				
				echo anchor('login/register','Register User', 'class="btn btn-default"');   
			}
			?>
            
            
            
            
            
            
			<?php
			#session_start();
			$session_data = $this->session->userdata('logged_in');
			if ($this->session->userdata('logged_in'))
			{
			 	echo anchor('login/logout','Logout', 'class="btn btn-default"'); 
			}
			else
			{
				echo anchor('login','Login', 'class="btn btn-default"'); 
			}
			?>
        
</div>	

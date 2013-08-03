<div id="menu">
	<table>
    	<tr>
        	<?php 
			$session_data = $this->session->userdata('logged_in');
			if($this->session->userdata('logged_in'))
			{
			?>
				<td><?php echo anchor('dashboard', $session_data['id_user']); ?></td>
			<?php
			}
			?>
            
            <td><?php echo anchor('dashboard','Home'); ?></td>
            <td><?php echo anchor('tracking/smu', 'SMU Tracking'); ?></td>
            <td><?php echo anchor('tracking/btb', 'BTB Tracking'); ?></td>
            <td><?php echo anchor('user/login','Search'); ?></td>
            <td><?php echo anchor('user/login','Help'); ?></td>
            
            <?php
			# level btb
			if($session_data['level'] == 'btb')
	    	{
			?>
            <td><?php echo anchor('weighing/outgoing/add','NEW BTB'); ?></td>
            <?php
			# level btb
			}
			?>
            
            <?php
			# level gapura management
			if($session_data['level'] == 'gapura')
	    	{
			?>
            <td></td>
            <?php
			# level gapura management
			}
			?>
            
            <?php
			# level supervisor
			if($session_data['level'] == 'supervisor')
	    	{
			?>
            <td><?php echo anchor('weighing/outgoing/add','NEW BTB'); ?></td>
            <td><?php echo anchor('weighing/outgoing/search','SEARCH BTB'); ?></td>
            <td><?php echo anchor('harian/incoming','LPKH Incoming'); ?></td>
            <td><?php echo anchor('harian/outgoing','LPKH Outgoing'); ?></td>
            <td><?php echo anchor('login/register','Register User'); ?></td>
            <?php
			# level supervisor
			}
			?>
            
            <?php
			# level kasir
			if($session_data['level'] == 'kasir')
	    	{
			?>
            <td><?php echo anchor('cashier/payment','NPSG Baru'); ?></td>
            <td><?php echo anchor('harian/incoming','LPKH Incoming'); ?></td>
            <td><?php echo anchor('harian/outgoing','LPKH Outgoing'); ?></td>
            <!-- incoming -->
			<td><?php echo anchor('incoming/add_manifest_instore','Insert Incoming Manifest Instore'); ?></td>
            <td><?php echo anchor('incoming/add_manifest_outstore','Insert Incoming Manifest Outstore'); ?></td>
            <td><?php echo anchor('incoming/list_breakdown','Breakdown Check'); ?></td>
            <td><?php echo anchor('incoming/form_breakdown','Breakdown Add'); ?></td>
            <td><?php echo anchor('incoming/incoming_btb','Incoming BTB'); ?></td>
            
            <?php
			# level kasir
			}
			?>
            
            <?php
			# level store in // break down checker
			if($session_data['level'] == 'store_in')
	    	{
			?>
            <td></td>
            <?php
			# level store in
			}
			?>
            
            <?php
			# level store out // build up checker
			if($session_data['level'] == 'store_out')
	    	{
			?>
            <td></td>
            <?php
			# level store out // build up checker
			}
			?>
            
            <?php
			# level incoming
			if($session_data['level'] == 'incoming')
	    	{
			?>
            <!--- incoming --->
            <td><?php echo anchor('incoming/add_manifest_instore','Input SMU Barang Gudang'); ?></td>
            <td><?php echo anchor('incoming/form_create_btb','Create BTB Incoming'); ?></td>
            <td><?php echo anchor('incoming/search_btb','Search Incoming SMU'); ?></td>
            <!--- incoming --->
            <?php
			# level incoming
			}
			?>
            
            <?php
			# level outgoing
			if($session_data['level'] == 'outgoing')
	    	{
			?>
            <td><?php echo anchor('cashier/payment','NPJG BARU'); ?></td>
            <?php
			# level outgoing
			}
			?>
            
            <?php
			# level admin
			if($session_data['level'] == 'admin')
	    	{
			?>
            <!--- kasir --->
            <td><?php echo anchor('cashier/payment','NPJG BARU'); ?></td>
            <td><?php echo anchor('harian/incoming','LPKH Incoming'); ?></td>
            <td><?php echo anchor('harian/outgoing','LPKH Outgoing'); ?></td>
            <!--- kasir --->
            
            <!--- incoming --->
            <td><?php echo anchor('incoming/add_manifest_instore','Input SMU Barang Gudang'); ?></td>
            <td><?php echo anchor('incoming/form_create_btb','Create BTB Incoming'); ?></td>
            <td><?php echo anchor('incoming/search_btb','Search Incoming SMU'); ?></td>
            <!--- incoming --->
            
            <!--- outgoing --->
            <!--- outgoing --->
            
            <!--- supervisor --->
            <td><?php echo anchor('login/register','Register User'); ?></td>
            <!--- supervisor --->
            
            <!--- admin --->
            <!--- admin --->
            
            
            
            
             
            <td><?php echo anchor('tracking/smu', 'SMU Tracking'); ?></td>
            <td><?php echo anchor('tracking/btb', 'BTB Tracking'); ?></td>
            
            
            
            <?php
			# level admin
			}
			?>
            
            
            
            
            
            
			<?php
			#session_start();
			
			if (!$this->session->userdata('logged_in'))
			{
			?>
				<td><?php echo anchor('login','Login'); ?></td>
			<?php
			}
			else
			{
			?>
				<td><?php echo anchor('login/logout','Logout'); ?></td>
			<?php
			}
			?>
        </tr>
        
    </table>
	
</div>
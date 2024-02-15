<?php

function main_menu_function(){
    include PLUGIN_PATH.'/template/admin_main_menu.php';
}

function payments_menu_functions(){
	global $wpdb,$table_prefix;

	$payments=$wpdb->get_results('SELECT * FROM '.$table_prefix.'idonate_doners ORDER BY id DESC ');

	if(isset($_GET['action']) && $_GET['action']=='delete'){
		$id=isset($_GET['id']) ? $_GET['id']:0;
		$result=$wpdb->delete($table_prefix.'idonate_doners',array('id'=>$id));
		if ($result){
			?>
				<script type="text/javascript">
					location.reload();
				</script>
			<?php
		}
	}



	include PLUGIN_PATH.'/template/admin_payment_menu.php';
}

function setting_menu_functions(){
	if (isset($_POST['submit'])){
		$idonate_acive=isset($_POST['active_idonate']) ?'1':'0';
		update_option('active_idonate',$idonate_acive);
		update_option('idonate_api_gateway',$_POST['idonate_api_gateway']);
	}
	$active_idonate_get_option=intval( get_option( 'active_idonate' ))== 1 ?'checked':'';


    include PLUGIN_PATH.'/template/admin_setting_menu.php';
}
<?php 
/**
 * connect with database
 *
 * @author sergey
 */
	class Connectdb{
		public function config(){
			$configs = array(
			    'host' => 'localhost',
			    'username' => 'root',
			    'userpassword'=>'',
			    'db'=>'guest'
			);
			$link = new mysqli($configs['host'], $configs['username'], $configs['userpassword'], $configs['db']);
					mysqli_query($link,"SET NAMES 'utf8'"); 
					mysqli_query($link,"SET CHARACTER SET 'utf8'");
					mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci'");
					return $link;
		}
	}
	
 ?>
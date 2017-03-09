<?php 
/**
 * Контроллер подключает необходимую страницу и отвечает за валидацию полей
 *
 * @author sergey
 */
	class ViewController{

		public function generateviewAction($view=" ", $error=" ",$result=" ", $request=" ",$uri=""){
			include_once ROOT."/app/views/$view".'.php';
		}
		public function validation($post){
			$error=array();
				if(!preg_match('~[a-zA-Z0-9]~', $post['username'])){
					array_push($error, "Введите правильное имя");
				}
				if(preg_match('~[a-zA-Z0-9]~', $post['user_code'])){
					if($_SESSION['code']!=$post['user_code']){
						array_push($error, "Введите правильный код");
					}
					
				}else{
					array_push($error, "Введите код в правильном формате");
				}
				return $error;
		}
		

	}
 ?>
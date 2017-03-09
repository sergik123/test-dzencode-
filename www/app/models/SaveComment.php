<?php

/**
 * сохраняет в бд все данные
 *
 * @author sergey
 */
class SaveComment{
	public $link;
	public $connect;
	public function __construct(){
		$this->link=new Connectdb;
		$this->connect=$this->link->config();
		
	}
	/*метод сохраняет главные комментарии*/
    public function save($post=' ',$files=' '){
    	$name=mysqli_real_escape_string($this->connect,htmlentities($post['username']));
    	$email=mysqli_real_escape_string($this->connect,htmlentities($post['email']));
    	$homepage=mysqli_real_escape_string($this->connect,filter_var($post['homepage'],FILTER_VALIDATE_URL));
    	$comment=mysqli_real_escape_string($this->connect,$post['comment']);
    	$ip=mysqli_real_escape_string($this->connect,filter_var($_SERVER['REMOTE_ADDR'],FILTER_VALIDATE_IP));
    	$browser=mysqli_real_escape_string($this->connect,htmlentities($_SERVER['HTTP_USER_AGENT']));
    	$date_comment=mysqli_real_escape_string($this->connect, htmlentities(date("Y-m-d H:i:s")));
    	$file=mysqli_real_escape_string($this->connect, htmlentities($files));
    	$table_name='comments';


		$sql_insert_user="INSERT INTO $table_name   (username, 
			                                         email,
			                                         homepage,
			                                         comment,
			                                         ip_users,
			                                         browser,
			                                         date_comment,
			                                         files) 
			                 VALUES('$name','$email','$homepage','$comment','$ip','$browser','$date_comment','$file')";

			$res= mysqli_query($this->connect,$sql_insert_user);
			mysqli_close($this->connect);
    	
    }
	/*метод сохраняет ответы на комментарии*/
	
    public function save_request($post=' ',$id=' '){
    	$id_comment=mysqli_real_escape_string($this->connect,htmlentities($id));
    	$name=mysqli_real_escape_string($this->connect,htmlentities($post['username']));
    	$email=mysqli_real_escape_string($this->connect,htmlentities($post['email']));
    	$homepage=mysqli_real_escape_string($this->connect,filter_var($post['homepage'],FILTER_VALIDATE_URL));
    	$comment=mysqli_real_escape_string($this->connect,$post['comment']);
    	$ip=mysqli_real_escape_string($this->connect,filter_var($_SERVER['REMOTE_ADDR'],FILTER_VALIDATE_IP));
    	$browser=mysqli_real_escape_string($this->connect,htmlentities($_SERVER['HTTP_USER_AGENT']));
    	$date_comment=mysqli_real_escape_string($this->connect, htmlentities(date("Y-m-d H:i:s")));
    	
    	$table_name='request';


		$sql_insert_user="INSERT INTO $table_name   (username_request, 
			                                         email_request,
			                                         home_request,
			                                         comment_request,
			                                         ip_request,
			                                         browser_request,
			                                         date_request,
			                                         main_id) 
			                 VALUES('$name','$email','$homepage','$comment','$ip','$browser','$date_comment','$id_comment')";

			$res= mysqli_query($this->connect,$sql_insert_user);
			mysqli_close($this->connect);
    	
    }
}

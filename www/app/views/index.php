<?php require_once('header.php'); ?>
	<h2>Гостевая книга</h2>
	<ul>
	<?php for ($i=0; $i <count($error); $i++): ?>
		<li><?=$error[$i]; ?></li>
	<?php endfor; ?>
	</ul>
	<?php if(empty($_POST['id_request'])): ?>
	<form action="" method="post" enctype="multipart/form-data"  id="form_comment">
		<div class="form-group">
		  <label for="usr">UserName:</label>
		  <input type="text" class="validation form-control" name="username" required="введите имя" value="<?=$_POST['username']?>" id="usr">
		  <label for="email">Email:</label>
		  <input type="email" class="validation form-control" name="email" value="<?=$_POST['email']?>" required id="email">
		  <label for="homepage">Homepage:</label>
		  <input type="url" class="form-control" name="homepage" value="<?=$_POST['homepage']?>" id="homepage">
		    <label for="comment">Comment:</label>
  		  <textarea class="validation form-control" rows="5" name="comment" value="<?=$_POST['comment']?>" id="comment" required></textarea>

  		  <label for="file">Прикрепить картинку:</label>
		  <input type="file" accept="image/jpeg,image/gif,image/png" class="form-control" name="file" value="" id="file">

		  <img style="margin-left: 10px;" class="img-thumbnail" src= '/../captcha.php'  alt= 'Пример каптчи на php' />
		  <input type= 'text' name= 'user_code' value="<?=$_POST['user_code']?>" class="validation" id="user_code" required>
		  <input type="submit" class="submit btn btn-primary btn-md " name="save_comment" value="Отправить">
		</div>
	</form>
<?php endif; ?>
	<hr>
	<?php if (empty($result) || $result==1): ?>
		<h4>Еще никто не оставил здесь комментарий</h4>
	<?php else: ?>
		<div id="sort">
			<span>Сортировка </span><a href="/index/main/username/">по имени</a><a href="/index/main/email/">по email</a><a href="/index/main/date_comment/">по дате</a> <a href="/index/main/<?=$uri?>/ASC">&#8593</a><a href="/index/main/<?=$uri?>/DESC">&#8595</a>
		</div>
		
	<ul id="comment_text">
		<?php foreach ($result as $key => $value): ?>
			<li><img src="/../img/avatar.png" alt="admin"><span><?=$value['username']; ?> </span> <span style="color:gray; font-size:12px;"><?=$value['date_comment']; ?> </span></li>
			<p><?=$value['comment'] ?> </p>
			<?php if(!empty($value['files'])): ?>
			<a href="/../files/<?=$value['files']?>" target="_blank">Прикрепленный файл</a><br><br>
		<?php endif; ?>
			<a href="" data-toggle="modal" id="request_link" data-target="#myModal<?=$value['id'] ?>">Ответить</a>
			<?php if (!empty($request)): ?>
				<?php foreach ($request as $key => $val): ?>
			<ul>
				<?php if ($value['id']==$val['main_id']): ?>
				<?php $cur=current($val); ?>
					<li style="margin-left: <?=$cur*10 ?>px;"><img src="/../img/guest.png" alt="guest"><span><?=$val['username_request']; ?> </span> <span style="color:gray; font-size:12px;"><?=$val['date_request']; ?> </span> <p><?=$val['comment_request'] ?> </p>
					<a href="" data-toggle="modal" id="request_link" data-target="#myModal<?=$value['id'] ?>">Ответить</a></li>
					
				<?php endif ?>
			</ul>
				
			<?php endforeach ?>
			<?php endif; ?>
			
			<form action="/index/main/<?=$value['id'] ?>" method="post"  id="form_request_comment">

			<input type="hidden" name="id_request" value="<?=$value['id'] ?>">

			<div class="modal fade" id="myModal<?=$value['id'] ?>"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Ответ на комментарий</h4>
			        <ul>
	<?php for ($i=0; $i <count($error); $i++): ?>
		<li><?=$error[$i]; ?></li>
	<?php endfor; ?>
	</ul>
			      </div>
			      <div class="modal-body">
			      
					<div class="form-group">
					  <label for="usr">UserName:</label>
					  <input type="text" class="validation1 form-control" name="username" required="введите имя" value="<?=$_POST['username']?>" id="usr">
					  <label for="email">Email:</label>
					  <input type="email" class="validation1 form-control" name="email" value="<?=$_POST['email']?>" required id="email">
					  <label for="homepage">Homepage:</label>
					  <input type="url" class="form-control" name="homepage" value="<?=$_POST['homepage']?>" id="homepage">
					    <label for="comment">Comment:</label>
			  		  <textarea class="validation1 form-control" rows="5" name="comment" value="<?=$_POST['comment']?>" id="comment" required></textarea>
					  <img style="margin-left: 10px;" class="img-thumbnail" src= '/../captcha.php'  alt= 'Пример каптчи на php' />
					  <input type= 'text' name= 'user_code' value="<?=$_POST['user_code']?>" class="validation1" id="user_code" required>
					</div>
				
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
			        <button type="submit" name="request" id="submit_request" class="btn btn-primary">Сохранить ответ</button>
			      </div>
			    </div>
			  </div>
			</div>
			</form>

		<?php endforeach ?>
		
	</ul>
	<?php endif; ?>
 	

<?php require_once('footer.php'); ?>
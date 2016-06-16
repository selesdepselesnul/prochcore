<?php
require_once '../function.php';
redirect_if_not_login();
require_once 'header-admin.php';

update_if_not_empty('Admin', 'username', 'username');
update_if_not_empty('Admin', 'password', 'password');
update_if_not_empty('Admin', 'email', 'email');
update_if_not_empty('Admin', 'fullname', 'fullname');

if(isset($_POST["submit"])) {
	if($_FILES["avatar"]["tmp_name"] !== '') {
		$check = getimagesize($_FILES["avatar"]["tmp_name"]);
	    if($check) {
			$tmp_ava = $_FILES["avatar"]["tmp_name"];
			if(is_valid_std_img($tmp_ava)) {
				$admin = read_row_by_id('Admin', 1);
				$ava_name = $_FILES["avatar"]["name"];
				unlink($admin['avatar']);
				move_uploaded_file($tmp_ava, $ava_name);
				process_db(function($conn) use($ava_name){
					mysqli_query($conn, "UPDATE Admin SET avatar = '$ava_name' WHERE id = 1");
				});
			} else {
				$is_image_success = false;
			}
	    } else {
			$is_image_success = false;
		}
	}
}

$admin = read_row_by_id('Admin', 1);
?>
<div class="row upper-row">
	<img src="<?php echo $admin['avatar'] ?>" class="img-circle" width="200" height="200">
	<form method="POST" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label class="control-label" for="avatar">Pilih avatar</label>
			<input type="file" name="avatar"/>
 			<span class="label label-info" role="alert">jpg / png / gif</span>
		</div>
		<?php if (isset($is_image_success)): ?>
			<?php if(!$is_image_success): ?>
				<div class="form-group">
					<div class="label label-danger">
						<?php echo 'format tidak di support !' ?>
					</div>
				</div>
			<?php endif ?>
		<?php endif ?>
		<div class="form-group">
			<label class="control-label" for="username">Username</label>
			<input class="form-control" type="text" name="username"
				   value="<?php echo $admin['username']?>" />
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input class="form-control" type="text" name="password"
					value="<?php echo $admin['password']?>" />
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" name="email"
					value="<?php echo $admin['email']?>" />
		</div>
		<div class="form-group">
			<label for="fullname">Fullname</label>
			<input class="form-control" type="text" name="fullname"
					value="<?php echo $admin['fullname']?>"/>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-default" name="submit" value="save">
		</div>
	</form>
</div>

<?php require_once '../footer.php'; ?>

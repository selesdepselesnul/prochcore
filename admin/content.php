<?php
require_once '../function.php';
redirect_if_not_login();
require_once 'header-admin.php';

$home = read_row_by_id('Home', 1);
$about = read_row_by_id('About', 1);
$contact = read_row_by_id('Contact', 1);
$home_weapons = read_rows('HomeWeapon');
?>

<script type="text/javascript">
    var counter = 0;

    function readURL(input) {
        const idNumber = input.id.split('_').pop();

        console.log(idNumber);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                const weaponPreview = document.getElementById('weaponPreview'+idNumber);
                weaponPreview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removingWeapon(e) {
        const weapons = document.getElementById('weapons');

        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'weapons_deleted[]';
        hiddenInput.value = e.id;

        weapons.appendChild(hiddenInput);
        weapons.removeChild(e.parentElement);
    };

    function addingWeapon() {
        counter++;

        // div container of weapon
        const div = document.createElement('div');
        div.id = 'weapon_group_'+counter;

        // div img
        const divImg = document.createElement('div');
        divImg.className = 'img';

        // weapon img
        const weaponPreviewImg = document.createElement('img');
        weaponPreviewImg.id='weaponPreview'+counter;
        weaponPreviewImg.src = '';
        weaponPreviewImg.className = 'img';

        divImg.appendChild(weaponPreviewImg);

        const removeButton = document.createElement('button');
        removeButton.textContent = 'remove';
        removeButton.onclick = function() {
            removingWeapon(this);
        };
        removeButton.className = 'btn btn-danger';
        removeButton.type = 'button';

        // weapon input file
        const weaponInputFile = document.createElement('input');
        weaponInputFile.type = 'file';
        weaponInputFile.name= 'weapon_pictures[]';
        weaponInputFile.id = 'weapon_picture_'+counter;
        weaponInputFile.setAttribute('onchange', 'readURL(this)');

        // weapon desc
        const weaponDescTextArea = document.createElement('textarea');
        weaponDescTextArea.name = 'weapon_descriptions[]';
        weaponDescTextArea.rows = 8;
        weaponDescTextArea.cols = 40;
        weaponDescTextArea.className = 'form-control';

        div.appendChild(divImg);
        div.appendChild(removeButton);
        div.appendChild(weaponInputFile);
        div.appendChild(weaponDescTextArea);
        div.appendChild(document.createElement('br'));

        const weapons = document.getElementById('weapons');
        weapons.appendChild(div);
    }

</script>
<div class="row upper-row ">
    <form method="post" name="contact" enctype="multipart/form-data" id="configForm">
        <div class="panel panel-default">
          <div class="panel-heading">Home</div>
          <div class="panel-body">

              <div class="form-group">
                  <label class="control-label" for="home_header">Header</label>
                  <input class="form-control" type="text" name="home_header" value="<?php echo $home['header']?>">
              </div>

              <div class="form-group">
                  <label class="control-label" for="home_content">Content</label>
                  <textarea class="form-control" name="home_content" rows="8" cols="40"><?php echo $home['content']?></textarea>
              </div>

               <br />
              <h3>Weapon Gallery</h3>
              <div id="weapons">
                  <?php foreach ($home_weapons as $i => $home_weapon): ?>
                      <div id="weapon_group_<?php echo $i+1 ?>">


                          <div class="img">
                              <img id="weaponPreview<?php echo $i+1 ?>"
                                  src="<?php echo $home_weapon['image_path']?>">
                          </div>
                          <button class="btn btn-danger" type="button" onclick="removingWeapon(this)"
                              id="<?php echo $home_weapon['image_path'] ?>">remove</button>

                          <input type="file" name="weapon_pictures[]"
                                 id="weapon_picture_<?php echo $i+1 ?>"
                                 onchange="readURL(this)">
                         <span class="label label-info" role="alert">jpg / png / gif</span>

                          <textarea class="form-control" name="weapon_descriptions[]" rows="8" cols="40"><?php echo $home_weapon['description'] ?>
                          </textarea>
                          <br />
                      </div>
                  <?php endforeach; ?>
              </div>
              <button class="btn btn-primary" type="button" onclick="addingWeapon()">+</button>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">About</div>
          <div class="panel-body">
              <div class="form-group">
                  <label class="control-label" for="about_header">Header</label>
                  <input class="form-control" type="text" name="about_header" value="<?php echo $about['header']?>">
              </div>

              <div class="form-group">
                  <label class="control-label" for="about_content">Content</label>
                  <textarea class="form-control" name="about_content" rows="8"
                    cols="40"><?php echo $about['content'];?></textarea>
              </div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">Contact</div>
          <div class="panel-body">
             <div class="form-group">
                 <label class="control-label" for="header">header</label>
                 <input class="form-control" type="text" name="contact_header" value="<?php echo $contact['header']?>">
             </div>
            <div class="form-group">
                <label class="control-label" for="header">Address-header</label>
                <input class="form-control" type="text" name="contact_address_header" value="<?php echo $contact['address_header']?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="header">Company Name</label>
                <input class="form-control" type="text" name="contact_company_name"
                    value="<?php echo $contact['company_name']?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="contact_address_content">Address-Content</label>
                <textarea class="form-control" name="contact_address_content" rows="8" cols="40"><?php echo $contact['address_content']?></textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="contact_address_content">Telp</label>
                <input class="form-control" name="contact_telp_number" value="<?php echo $contact['telp_number']?>"></input>
            </div>
            <div class="form-group">
                <label class="control-label" for="contact_form_header">Form-Header</label>
                <input class="form-control" type="text" name="contact_form_header" value="<?php echo $contact['form_header']?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="contact_form_header">Admin Email Header</label>
                <input class="form-control" type="text" name="contact_admin_email_header"
                value="<?php echo $contact['admin_email_header']?>">
            </div>
          </div>
        </div>
        <input type="submit" class="btn btn-default" value="save">
    </form>
</div>


<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if(!empty($_POST['weapons_deleted'])) {
            foreach ($_POST['weapons_deleted'] as $weapon_path) {
                $relative_weapon_fs = explode($config['base_url'], $weapon_path)[1];
                $full_path_weapon_fs = $_SERVER['DOCUMENT_ROOT'].'/'.$config['project_root'].'/'.$relative_weapon_fs;
                delete_row('HomeWeapon', 'image_path', $weapon_path);
                unlink($full_path_weapon_fs);
            }
        }

        if(!empty($_POST['weapon_descriptions'])
            && !empty($_FILES['weapon_pictures'])) {

            $weapon_pictures_error = $_FILES['weapon_pictures']['error'];
            $weapon_tmp_pictures = $_FILES['weapon_pictures']['tmp_name'];
            $weapon_names =  $_FILES['weapon_pictures']['name'];
            $weapon_descriptions = $_POST['weapon_descriptions'];
            $full_path_img = [];

            foreach ($weapon_pictures_error as $i => $err) {
                if($err == UPLOAD_ERR_OK) {
                    if(is_valid_std_img($weapon_tmp_pictures[$i])) {
                        $relative_pic = 'images/weapons/'.$weapon_names[$i];
                        $pic = $_SERVER['DOCUMENT_ROOT']
                            .'/'.$config['project_root'].'/'
                            .$relative_pic;
                        move_uploaded_file(
                            $weapon_tmp_pictures[$i],
                            $pic
                        );

                        $full_path_img[] = $config['base_url'].$relative_pic;
                        add_row('HomeWeapon' , [
                            'image_path' => $config['base_url'].$relative_pic,
                            'description' => $weapon_descriptions[$i]]);
                    }
                }
            }
        }

        update_if_not_empty('Home', 'home_header', 'header');
        update_if_not_empty('Home', 'home_content', 'content');

        update_if_not_empty('About', 'about_header', 'header');
        update_if_not_empty('About', 'about_content', 'content');

        update_if_not_empty('Contact', 'contact_header', 'header');
        update_if_not_empty('Contact', 'contact_address_header', 'address_header');
        update_if_not_empty('Contact', 'contact_company_name', 'company_name');
        update_if_not_empty('Contact', 'contact_address_content', 'address_content');
        update_if_not_empty('Contact', 'contact_telp_number', 'telp_number');
        update_if_not_empty('Contact', 'contact_social_media_header', 'social_media_header');
        update_if_not_empty('Contact', 'contact_form_header', 'form_header');
        update_if_not_empty('Contact', 'contact_admin_email_header', 'admin_email_header');

        redirect_to($config['base_url'].'admin/content.php');

    }

?>
<script>
    const lastWeapon = document.getElementById('weapons').lastElementChild;
    if(lastWeapon)
        counter = lastWeapon.id.split('_').pop();
</script>
<?php require_once '../footer.php' ?>;

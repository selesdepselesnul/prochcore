<?php
require_once '../function.php';
redirectIfNotLogin();
require_once 'header-admin.php';

$home = read_table_by_id('Home', 1);
$about = read_table_by_id('About', 1);
$contact = read_table_by_id('Contact', 1);
$home_weapons = read_table('HomeWeapon');
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

        div.appendChild(divImg);
        div.appendChild(document.createElement('br'));
        div.appendChild(weaponInputFile);
        div.appendChild(document.createElement('br'));
        div.appendChild(weaponDescTextArea);
        div.appendChild(document.createElement('br'));

        const weapons = document.getElementById('weapons');
        weapons.appendChild(div);
    }

</script>
<div class="row upper-row ">
    <form method="post" name="contact" enctype="multipart/form-data" id="configForm">
        <h2>Home</h2>
        <label for="home_header">Header</label>
        <input type="text" name="home_header" value="<?php echo $home['header']?>"> <br />
        <label for="home_content">Content</label>
        <textarea name="home_content" rows="8" cols="40"><?php echo $home['content']?></textarea> <br />
        <div id="weapons">
            <?php foreach ($home_weapons as $i => $home_weapon): ?>
                <div id="weapon_group_<?php echo $i+1 ?>">
                    <div class="img">
                        <img id="weaponPreview<?php echo $i+1 ?>"
                            src="<?php echo $home_weapon['image_path']?>" class="img">
                    </div>

                    <button type="button" onclick="removingWeapon(this)"
                        id="<?php echo $home_weapon['image_path'] ?>">-</button>
                    <input type="file" name="weapon_pictures[]"
                           id="weapon_picture_<?php echo $i+1 ?>"
                           onchange="readURL(this)"> <br />
                    <textarea name="weapon_descriptions[]" rows="8" cols="40"><?php echo $home_weapon['description'] ?>
                    </textarea><br />
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" onclick="addingWeapon()">+</button>

        <hr />
        <h2>About</h2>
        <label for="about_header">Header</label>
        <input type="text" name="about_header" value="<?php echo $about['header']?>"> <br />
        <label for="about_content">Content</label>
        <textarea name="about_content" rows="8" cols="40"><?php echo $about['content']?></textarea><br />
        <hr />
        <h2>Contact</h2>
        <label for="header">header</label>
        <input type="text" name="contact_header" value="<?php echo $contact['header']?>"> <br />
        <label for="contact_address_header">Address-Header</label>
        <input type="text" name="contact_address_header" value="<?php echo $contact['address_header']?>"> <br />
        <label for="contact_address_content">Address-Content</label>
        <textarea name="contact_address_content" rows="8" cols="40"><?php echo $contact['address_content']?></textarea> <br />
        <label for="contact_social_media_header">Social Media-Header</label>
        <input type="text" name="contact_social_media_header" value="<?php echo $contact['social_media_header']?>"> <br />
        <label for="contact_form_header">Form-Header</label>
        <input type="text" name="contact_form_header" value="<?php echo $contact['form_header']?>"> <br />
        <input type="submit" class="btn btn-default">
    </form>
</div>


<?php

    function updateIfNotEmpty($table_name, $post_name, $field_name) {
        if(!empty($_POST[$post_name]))
            update_table_by_id($table_name, 1, [
                $field_name => $_POST[$post_name]
            ]);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if(!empty($_POST['weapons_deleted'])) {
            foreach ($_POST['weapons_deleted'] as $weapon_path) {
                $relative_weapon_fs = explode($config['base_url'], $weapon_path)[1];
                $full_path_weapon_fs = $_SERVER['DOCUMENT_ROOT'].'/'.$config['project_root'].'/'.$relative_weapon_fs;
                delete_table('HomeWeapon', 'image_path', $weapon_path);
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

            // delete_table('HomeWeapon');
            foreach ($weapon_pictures_error as $i => $err) {
                if($err == UPLOAD_ERR_OK) {
                    $relative_pic = 'images/weapons/'.$weapon_names[$i];
                    $pic = $_SERVER['DOCUMENT_ROOT']
                        .'/'.$config['project_root'].'/'
                        .$relative_pic;
                    move_uploaded_file(
                        $weapon_tmp_pictures[$i],
                        $pic
                    );

                    $full_path_img[] = $config['base_url'].$relative_pic;
                    write_table('HomeWeapon' , [
                        'image_path' => $config['base_url'].$relative_pic,
                        'description' => $weapon_descriptions[$i]]);
                }
            }
        }

        updateIfNotEmpty('Home', 'home_header', 'header');
        updateIfNotEmpty('Home', 'home_content', 'content');

        updateIfNotEmpty('About', 'about_header', 'header');
        updateIfNotEmpty('About', 'about_content', 'content');

        updateIfNotEmpty('Contact', 'contact_header', 'header');
        updateIfNotEmpty('Contact', 'contact_address_header', 'address_header');
        updateIfNotEmpty('Contact', 'contact_address_content', 'address_content');
        updateIfNotEmpty('Contact', 'contact_social_media_header', 'social_media_header');
        updateIfNotEmpty('Contact', 'contact_form_header', 'form_header');

        redirectTo($config['base_url'].'admin/content.php');

    }

?>
<script>
    const lastWeapon = document.getElementById('weapons').lastElementChild;
    if(lastWeapon)
        counter = lastWeapon.id.split('_').pop();
</script>
<?php require_once '../footer.php' ?>;

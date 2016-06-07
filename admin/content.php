<?php
require_once '../header.php';
require_once '../tags.php';
?>
<script type="text/javascript">
var counter = 1;

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

function addingWeapon() {
    counter++;

    // div container of weapon
    const div = document.createElement('div');
    div.id = 'weaponGroup'+counter;

    // weapon img
    const weaponPreviewImg = document.createElement('img');
    weaponPreviewImg.id='weaponPreview'+counter;
    weaponPreviewImg.src = '';

    // weapon name
    const weaponNameInput = document.createElement('input');
    weaponNameInput.type = 'text';
    weaponNameInput.name = 'weapon_names[]';

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

    div.appendChild(weaponPreviewImg);
    div.appendChild(document.createElement('br'));
    div.appendChild(weaponNameInput);
    div.appendChild(document.createElement('br'));
    div.appendChild(weaponInputFile);
    div.appendChild(document.createElement('br'));
    div.appendChild(weaponDescTextArea);
    div.appendChild(document.createElement('br'));

    const weapons = document.getElementById('weapons');
    weapons.appendChild(div);
}

</script>
<form method="post" name="contact" enctype="multipart/form-data">
    <h2>Home</h2>
    <label for="home_header">Header</label>
    <input type="text" name="home_header" value="<?php echo $content['home']['header']?>"> <br />
    <label for="home_content">Content</label>
    <textarea name="home_content" rows="8" cols="40"><?php echo $content['home']['content']?></textarea> <br />
    <div id="weapons">
        <div id="weaponGroup1">
            <img src="" id="weaponPreview1"/> <br/>
            <input type="text" name="weapon_names[]"> <br />
            <input type="file" name="weapon_pictures[]" id="weapon_picture_1" onchange="readURL(this)"> <br />
            <textarea name="weapon_descriptions[]" rows="8" cols="40"></textarea> <br />
        </div>
    </div>
    <button type="button" onclick="addingWeapon()">+</button>
    <button type="button">-</button>
    <hr />
    <h2>About</h2>
    <label for="about_header">Header</label>
    <input type="text" name="about_header" value="<?php echo $content['about']['header']?>"> <br />
    <label for="about_content">Content</label>
    <textarea name="about_content" rows="8" cols="40"><?php echo $content['about']['content']?></textarea><br />
    <hr />
    <h2>Contact</h2>
    <label for="header">header</label>
    <input type="text" name="contact_header" value="<?php echo $content['contact']['header']?>"> <br />
    <label for="contact_address_header">Address-Header</label>
    <input type="text" name="contact_address_header" value="<?php echo $content['contact']['address_header']?>"> <br />
    <label for="contact_address_content">Address-Content</label>
    <textarea name="contact_address_content" rows="8" cols="40"><?php echo $content['contact']['address_content']?></textarea> <br />
    <label for="contact_social_media_header">Social Media-Header</label>
    <input type="text" name="contact_social_media_header" value="<?php echo $content['contact']['social_media_header']?>"> <br />
    <label for="contact_form_header">Form-Header</label>
    <input type="text" name="contact_form_header" value="<?php echo $content['contact']['form_header']?>"> <br />
    <input type="submit">
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['home_header'])
            && isset($_POST['home_content'])
            && isset($_FILES['weapon_pictures'])
            && isset($_POST['weapon_names'])
            && isset($_POST['weapon_descriptions'])) {

            $weapon_pictures_error = $_FILES['weapon_pictures']['error'];
            $weapon_tmp_pictures = $_FILES['weapon_pictures']['tmp_name'];
            $weapon_names =  $_FILES['weapon_pictures']['name'];
            $weapon_descriptions = $_POST['weapon_descriptions'];
            $full_path_img = [];

            delete_content('HomeWeapon');
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
                    write_content('HomeWeapon' , [
                        'image_path' => $relative_pic,
                        'description' => $weapon_descriptions[$i]]);
                }
            }


        }

        if(isset($_POST['about_header'])
            && isset($_POST['about_content'])) {
            update_content('About',
                ['header' => $_POST['about_header'],
                 'content' => $_POST['about_content']]);
        }

        if(isset($_POST['contact_header'])
            && isset($_POST['contact_address_header'])
            && isset($_POST['contact_address_content'])
            && isset($_POST['contact_social_media_header'])
            && isset($_POST['contact_form_header'])) {
            update_content('Contact',
                ['header' => $_POST['contact_header'],
                 'address_header' => $_POST['contact_address_header'],
                 'address_content' => $_POST['contact_address_content'],
                 'social_media_header' => $_POST['contact_social_media_header'],
                 'form_header' => $_POST['contact_form_header']]);
        }

    }

?>
</div> <!-- close container -->
</body>
</html>

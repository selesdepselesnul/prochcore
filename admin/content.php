<?php
require_once '../header.php';
require_once '../tags.php';
?>
<form method="post">
    <h2>Home</h2>
    <label for="home_header">Header</label>
    <input type="text" name="home_header" value="<?php echo $content['home']['header']?>"> <br />
    <label for="home_content">Content</label>
    <textarea name="home_content" rows="8" cols="40"><?php echo $content['home']['content']?></textarea> <br />
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
            && isset($_POST['home_content'])) {
            update_content('Home',
                ['header' => $_POST['home_header'],
                 'content' => $_POST['home_content']]);
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
        header("refresh: 0;");
    }

?>

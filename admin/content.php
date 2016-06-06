<?php
require_once '../header.php';
require_once '../tags.php';
?>
<form method="post">
    <h2>Home</h2>
    <label for="home_header">Header</label>
    <input type="text" name="home_header" value=""> <br />
    <label for="home_content">Content</label>
    <textarea name="home_content" rows="8" cols="40"></textarea> <br />
    <hr />
    <h2>About</h2>
    <label for="about_header">Header</label>
    <input type="text" name="about_header" value=""> <br />
    <label for="about_content">Content</label>
    <textarea name="about_content" rows="8" cols="40"></textarea><br />
    <hr />
    <h2>Contact</h2>
    <label for="header">header</label>
    <input type="text" name="header" value=""> <br />
    <label for="address_header">Address-Header</label>
    <input type="text" name="address_header" value=""> <br />
    <label for="address_content">Address-Content</label>
    <textarea name="address_content" rows="8" cols="40"></textarea> <br />
    <label for="social_media_header">Social Media-Header</label>
    <input type="text" name="social_media_header" value=""> <br />
    <input type="submit">
</form>

<?php
    if(isset($_POST['home_header'])
        && isset($_POST['home_content'])) {
        update_content('Home',
            ['header' => $_POST['home_header'],
             'content' => $_POST['home_content']]);
    }
?>

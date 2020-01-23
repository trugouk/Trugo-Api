<?php
function Post($tours)
{
    $target_dir = 'C:\xampp7\htdocs\admin\content/';
    foreach ($_FILES['file']['name'] as $key => $val) {
        $file = $_FILES['file']['name'][$key];
        $path = pathinfo($file);
        if (isset($_REQUEST["no"])) {
            $filename = $_REQUEST["no"] . "_" . $path['filename'];
        } else {
            $filename = "r" . "_" . $path['filename'];
        }
        $ext = $path['extension'];
        move_uploaded_file($_FILES['file']['tmp_name'][$key],  $target_dir . $filename . "." . $ext);
    }
}

<?php
if (file_exists('qr.txt')) {
    echo file_get_contents('qr.txt');
} else {
    echo 'File not found.';
}
?>

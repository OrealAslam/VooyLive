<?php
$zip = new ZipArchive;
if ($zip->open(getcwd().'/hoodq.zip') === TRUE) {
    $zip->extractTo(getcwd().'/');
    $zip->close();
    echo 'ok';
} else {
    echo 'failed';
}
?>

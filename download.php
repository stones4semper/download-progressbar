<?php
    $filename = $_POST['file'];
    $filesize = filesize($filename);

    header("Content-Transfer-Encoding: Binary");
    header("Content-Length:". $filesize);
    header("Content-Disposition: attachment");

    $handle = fopen($filename, "rb");
    if (FALSE === $handle) {
        exit("Failed to open stream to URL");
    }

    while (!feof($handle)) {
        echo fread($handle, 1024*1024*10);
        // sleep(1);
    }

    fclose($handle);
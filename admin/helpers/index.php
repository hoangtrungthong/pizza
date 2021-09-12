<?php

function uploadFile($file, $dir)
{
    if ($file) {
        $fileName = $file['name'];
        $imgName = $dir . basename($fileName);
    
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        move_uploaded_file($file['tmp_name'], $imgName);

        return $imgName;
    }
}

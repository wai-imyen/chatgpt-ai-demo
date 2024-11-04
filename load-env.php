<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$envFilepath = "./.env";

if (is_file($envFilepath)) {
    $file = new \SplFileObject($envFilepath);

    // Loop until we reach the end of the file.
    while (false === $file->eof()) {
        // Get the current line value, trim it and save by putenv.
        putenv(trim($file->fgets()));
    }
}
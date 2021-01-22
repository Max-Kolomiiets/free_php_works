<?php

    $pathStorage = __DIR__ . '/storage' . DIRECTORY_SEPARATOR;
    $pathViews = __DIR__ . '/views/' . DIRECTORY_SEPARATOR;
    $isSaved = false;

    $pathShowURL = "views/showURL.php";
    $pathShowNote = "views/showNote.php";
    $hostName = $_SERVER['HTTP_HOST'];

    $iterator = new DirectoryIterator($pathStorage);

?>
<?php 
    require_once __DIR__ . '/init.php';

    require_once __DIR__ . '/config.php';

    if (isset($_POST['btn'])) {

        $userNotice = trim($_POST['note']);
        if (mb_strlen($userNotice) <= 0) {
            $errors['note'] = 'Notice can\'t be empty!';
            $userData['note'] = $userNotice;

        } else { 
            $userData['note'] = $userNotice;
            
            $fileHash = md5($userNotice . rand(-100, 100));
            $fileName = sprintf("%s %s.txt", $pathStorage, $fileHash);

             $isSaved = file_put_contents($fileName, $userNotice);
        }

        if ($isSaved) { 
            header("Location: /{$pathShowURL}?hash={$fileHash}");

        } 
    } 
    // else 
    //     var_dump($_POST) ;

    require_once $pathViews .'/master.php';
?>
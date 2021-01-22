<?php 
    require_once '../config.php';
    require_once __DIR__ . '/head.php';

    $data;
    $path;
    foreach($iterator as $fileInfo) {
        if (trim( $fileInfo->getFilename())  ===  ($_GET['hash'] . '.txt')) {
            $path = $fileInfo->getPathname();
            $data = file_get_contents($path);
        } 
    }
?>

<div class="text-center" style="color:red; background-color:yellow; padding: 10px 100px;">
    This note was destroyed. If you need to keep it, copy it before closing this window.
</div>

<div class="container-fluid bg-grey">
        <div class="form-group">
            <label for="message"><h3>Note:</h3></label>
            <textarea name="note" id="noteId" cols="20" rows="15" class="form-control bg-area bg-area" readonly><?php if(isset($data) && isset($path)): ?><?= trim($data)?><?php unlink($path); ?> <?php endif?></textarea>
        </div>
        <?php if(!(isset($data))): ?>
            <div class="btn-warning" style="color:red ;">
                <h4>Note destroyed</h4>
            </div>
        <?php endif?>
        <div class="form-group text-center">
            <input type="button" value="Copy Text" name="btn" class="btn btn-success" onclick="CopyToClipboard('noteId')">
        </div>
    </div>



<?php
    require_once '../config.php';
    require 'head.php';
?>
<div class="text-center container-fluid bg-grey">
    <h3>Your URL: </h3>
    <p id="url"><?= "{$_SERVER['HTTP_HOST']}/{$pathShowNote}?hash={$_GET['hash']}" ?></p>
    <p style="color:brown">(The note will self-destruct after reading it.)</p>
    <button type="button" onclick="CopyToClipboard('url')" class="btn btn-success" id="btnCopy" >Copy</button>

</div>


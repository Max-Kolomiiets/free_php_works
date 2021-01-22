
<form action="index.php" method="post">
    <div class="container-fluid bg-grey">
        <?php if (isset($errors['note'])):?>
            <div class="text-center" style="color:crimson; background-color:dodgerblue;">
                <h4><?= $errors['note'] ?></h4>
            </div>
        <?php endif?>
        <div class="form-group">
            <label for="message"><h3>New note:</h3></label>
            <textarea name="note" id="note" cols="20" rows="15" class="form-control bg-area" placeholder="Write your note here..."></textarea>
        </div>
        <div class="form-group text-center">
            <input type="submit" value="Create Note" name="btn" class="btn btn-success">
        </div>
       
    </div>
</form>
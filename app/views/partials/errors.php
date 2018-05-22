
<?php if($errors && !empty(array_filter($errors))) : ?>
<div class="row align-items-center justify-content-center">
    <div class="alert alert-danger">
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

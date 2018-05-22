
<?php if($successes && !empty(array_filter($successes))) : ?>
<div class="row align-items-center justify-content-center">
    <div class="alert alert-success">
        <?php foreach ($successes as $success) : ?>
            <p><?php echo $success; ?></p>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

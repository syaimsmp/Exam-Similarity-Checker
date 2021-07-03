<?php if(count($msg) > 0) : ?>

<div class="error">
    <?php foreach ($msg as $tmp) : ?>
        <p><?php echo $tmp; ?></p>
    <?php endforeach ?>
    
</div>
<?php endif ?>

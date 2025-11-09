<?php 
    foreach ($alerts as $key => $alert) : 
?>
    <?php 
        foreach ($alert as $message) : 
    ?>
        <div class="alert alert__<?php echo $key; ?>">
            <?php echo $message; ?>
        </div>
<?php 
        endforeach; 
    endforeach
?>

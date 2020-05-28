
<?php $toggle = block_value('image-side-toggle'); ?>

<div class="<?php

    if ($toggle == "0") {
        echo "two-col-img-text-wrapper";
    } else if ($toggle == "1") {
        echo "two-col-img-text-wrapper-reverse";
    }
    ?> 
    
    <?php block_field('top-margin')?> <?php block_field('bottom-margin')?>"> 

    <!-- <img src="<__php block_field('image'); ?>"> -->

    <div class="image_div" style="background-image: url('<?php block_field('image') ?>');"> 
    </div>
    
    <div class="text"> 

        <h3> <?php block_field('text-header'); ?> </h3>

        <p> <?php block_field('text-paragraph'); ?> </p> 

    </div> 

</div>
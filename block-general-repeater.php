<div class="general_wrapper <?php block_field('top-margin')?> <?php block_field('bottom-margin')?>" style="<?php block_field('background-color');
 ?>">

  <div class="container">

    <div class="row">

        <?php if (block_rows('icon-repeater') ) : ?>
    
            <?php 
            
            while(block_rows('icon-repeater')) :
            block_row('icon-repeater'); 
            
            $url = block_sub_value('icon-link');
            $title = block_sub_value('icon-title');
            $description = block_sub_value('icon-description');
            $icon = block_sub_value('icon');
    
            ?>
    
              <div class="col-4 repeat_item" href="<?php echo $url ?>">
  
                  <img src="<?php echo wp_get_attachment_image_src($icon)[0]; ?>" class="col-6">
                  <h6> <?php echo $title; ?> </h6>
                  <p> <?php echo $description; ?> </p> 
                  
            </div>
    
            <?php  
            endwhile;
            ?>
      
        <?php endif; ?>

    </div>

  </div>

</div>
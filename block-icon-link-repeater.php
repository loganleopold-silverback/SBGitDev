<div class="icon_cards_wrapper <?php block_field('top-margin')?> <?php block_field('bottom-margin')?>" >

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
    
              <a class="col-4" href="<?php echo $url ?>">
  
                  <img src="<?php echo wp_get_attachment_image_src($icon)[0]; ?>" class="col-6">
                  <h6> <?php echo $title; ?> </h6>
                  <p> <?php echo $description; ?> </p> 
                  
              </a>
    
            <?php  
            endwhile;
            ?>
      
        <?php endif; ?>

    </div>

  </div>

</div>

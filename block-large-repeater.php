<div class="large_repeater_wrapper <?php block_field('top-margin')?> <?php block_field('bottom-margin')?>" >

  <div class="container">

    <div class="row">

        <?php if (block_rows('large-repeater') ) : ?>
    
            <?php 
            
            while(block_rows('large-repeater')) :
            block_row('large-repeater'); 
            
            $url = block_sub_value('link');
            $link_text = block_sub_value('link-text');
            $header= block_sub_value('header');
            $description = block_sub_value('description');
            $icon = block_sub_value('icon');
    
            ?>
    
              <a class="col-4" href="<?php echo $url ?>">
  
                <img src="<?php echo wp_get_attachment_image_src($icon)[0]; ?>" class="col-6">
                <img src="<?php echo get_template_directory_uri() . "/images/icon_underline.svg"; ?>">
                <div class="card_text">
                    <h6> <?php echo $header; ?> </h6>
                    <p> <?php echo $description; ?> </p> 
                    <div class="link_group">
                        <p> <?php echo $link_text; ?> </p>
                        <img src="<?php echo get_template_directory_uri() . "/images/right-arrow.svg" ?>">
                    </div>
                </div>

              </a>
    
            <?php  
            endwhile;
            ?>
      
        <?php endif; ?>

    </div>

  </div>

</div>








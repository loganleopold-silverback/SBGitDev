<div class="three_card_text_image_wrapper <?php block_field('top-margin')?> <?php block_field('bottom-margin')?>" >

    <div class="cards_wrapper">

        <?php if (block_rows('card-repeater') ) : ?>
    
            <?php 
            
            while(block_rows('card-repeater')) :
            block_row('card-repeater'); 
            
            $count = block_row_count('card-repeater');
            
            $imageID = block_sub_value('card-image');
            $card_image = wp_get_attachment_image_src($imageID)[0];
            
    
            $card_header = block_sub_value('card-header');
            $subheader = block_sub_value('card-subheader');
            $link_title = block_sub_value('link-title');
            $url = block_sub_value('link');
            
    
            ?>
    
                <div class="card">
    
                    <img src="<?php echo $card_image;?>" >
                    <h6> <?php echo $card_header; ?> </h6> 
                    <h6> <?php echo $subheader; ?> </h6>
                    <a href="<?php echo $url; ?>"> <?php echo $link_title; ?> </a> 
    
                </div>
    
            <?php  
            endwhile;
            ?>
    
        <?php endif; ?>
    
    </div>

    <?php
        $text_h = block_value('text-header');
        $text_sh = block_value('text-subheader');
        $toggle = block_value('image-side-toggle');
    ?>

    <div class="text_and_image">

        <div class="text"> 
            
            <h2> <?php echo $text_h; ?> </h2> 

            <p>  <?php echo $text_sh; ?> </h2>
            
        </div>
        
        <div class="image" style="background: url('<?php block_field('block-image') ?>') center center/cover no-repeat">
        </div>   

    </div>

</div>

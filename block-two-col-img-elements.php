<?php $toggle = block_value('image-side-toggle'); ?>

<div class="img-elements-wrapper <?php

        if ($toggle == "0") {
            echo "";
        } else if ($toggle == "1") {
            echo "row_reverse";
        }
        
    ?> 
    
    <?php block_field('top-margin')?> <?php block_field('bottom-margin')?>"
    
> 

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" style="background: url('<?php block_field('half-image'); ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover;"> </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" style="background: <?php block_field('background-color') ?> ;"> 

        <div class="elements" >

            <?php 

                if (block_value('icon') === 0) {
                    $icon_display = 'none';
                } else {
                    $icon_display = 'block';
                }

            ?>

            <img class="icon" src="<?php echo wp_get_attachment_image_src(block_value('icon'))[0]; ?>" style="display: <?php echo $icon_display ?> ;">
    
            <h3> <?php block_field('text-header'); ?> </h3>
    
            <?php
                    
                $order_toggle = block_value('bold-normal-reverse');
                if ($order_toggle == '0') {
                    $float = 'row ';
                } else if ($order_toggle == '1') {
                    $float = "";
                }
                
            ?>

            <p
            
                style="font-style: <?php
                $font_toggle = block_value('paragraph-italics');
                if ($font_toggle == "0") {
                    echo "normal";
                } else if ($font_toggle == "1") {
                    echo "italic";
                }

                ?>; color: <?php block_field('text-color') ?>"
        
            >   

                <?php 
                    
                    $order_toggle = block_value('bold-normal-reverse');

                    if ($order_toggle == '0') {
                        echo '';
                    } else if ($order_toggle == '1') {
                        echo '';
                    }

                ?> 

                

                <?php if ($order_toggle == '0'): ?>    

                    <span class="pbold"><?php block_field('text-paragraph-bold'); ?></span>
                    <span><?php block_field('text-paragraph-normal') ?></span></p> 

                <?php elseif ($order_toggle == '1'): ?>
                    
                    <span><?php block_field('text-paragraph-normal') ?></span><span class="pbold"><?php block_field('text-paragraph-bold'); ?></span></p> 

                <?php endif; ?>

                <h5 style="display: <?php 
                
                    if (block_value('attribution-name') == '' and block_value('attribution-detail') == '') {
                        echo 'none';
                    } else {
                        echo 'block';
                    }
                    
                ?>; color: <?php block_field('text-color') ?>"> 
                
                    <?php if (block_value('attribution-name') != ''): ?> 
                        <?php block_field('attribution-name')?>  
                    <?php endif; ?> 
                    
                    <?php if (block_value('attribution-name') != '' and block_value('attribution-detail') != ''): ?>
                        |
                    <?php endif; ?>
                    
                    <?php if (block_value('attribution-detail') != ''): ?>
                        <?php block_field('attribution-detail') ?>
                    <?php endif; ?>

                </h5>

                <?php 

                    if (block_value('link') === '' or block_value('link-text') === '') {
                        $link_display = 'none';
                    } else {
                        $link_display = 'block';
                    }
                ?>
    
            <a href="<?php block_field('link'); ?>" style="display: <?php echo $link_display ?>;"> 
                <?php block_field('link-text'); ?> 
            </a>

        </div>

    </div> 

</div>
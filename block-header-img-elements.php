<?php $toggle = block_value('image-side-toggle'); ?>

<div class="header-img-elements-wrapper <?php

    if ($toggle == "0") {
        echo "";
    } else if ($toggle == "1") {
        echo "row_reverse";
    }
    ?> 
    
    <?php block_field('top-margin')?> <?php block_field('bottom-margin')?>"
    
> 

    <div 
    style="background: url('<?php block_field('half-image'); ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover;"> </div>


    <div style="background: <?php block_field('background-color') ?> ;"> 

        <div class="elements">
    
            <div class="subtitle_header">

                <?php 

                #3EB183 : Green #255A93 : Blue #E9E9E9 : Grey white : White black : Black
                
                    $svg_color;
                    $logo_color = block_value('subtitle-color')[0];
                    if ($logo_color == "#3EB183") {  
                        $svg_color = "green";
                    } elseif ($logo_color == "#255A93") {
                        $svg_color = "blue";
                    } elseif ($logo_color == "#E9E9E9") {
                        $svg_color = "grey"; 
                    } elseif ($logo_color == "white") {
                        $svg_color = "white";
                    } elseif ($logo_color == "black") {
                        $svg_color = "black";
                    } else {
                        $svg_color = "blue";
                    }

                
                ?>

                <h3> 
                    <!-- <__php 
                    echo $logo_color[0]; 
                    ?>  -->
                </h3>
                <img src="<?php echo get_template_directory_uri() . "/images/header_diamond_$svg_color.svg" ?>">
                <h3 style="color: <?php block_field('subtitle-color') ?>"> <?php block_field('text-header'); ?> </h3>
            </div>

            <h1 style="color: <?php block_field('text-color') ?>;"> <?php block_field('hero-text') ?> </h1> 

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

            ?> 

            <?php if ($order_toggle == '0'): ?>    

                <span class="pbold"><?php block_field('text-paragraph-bold'); ?></span>
                <span><?php block_field('text-paragraph-normal') ?></span></p> 

            <?php elseif ($order_toggle == '1'): ?>
                
                <span><?php block_field('text-paragraph-normal') ?></span>
                <span class="pbold"><?php block_field('text-paragraph-bold'); ?></span></p> 

            <?php endif; ?>

            <h5 style="display: <?php 
            
                if (block_value('attribution-name') == '' and block_value('attribution-detail') == '') {
                    echo 'none';
                } else {
                    echo 'block';
                }
                
            ?>"> 
            
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

            <a href="<?php block_field('link'); ?>" style="display: <?php echo $link_display ?>; background: <?php block_field('link-color') ?> ;"> 
                <?php block_field('link-text'); ?> 
            </a>

        </div>

    </div> 

</div>
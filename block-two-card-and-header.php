<?php 
        
    $bold_text_1 = block_value('card-1-bold-text');
    $standard_text_1 = block_value('card-1-standard-text');
    
    $bold_text_2 = block_value('card-2-bold-text');
    $standard_text_2 = block_value('card-2-standard-text');

    $two_card_header = block_value('header-text');
    
?>

<div class="margin_correct  
        <?php block_field('top-margin'); ?> <?php block_field('bottom-margin'); ?>"
    style="padding: <?php if ($two_card_header === '' || null) {echo "0";} ?>"
>
    <div 
        class="two-card-header-wrapper" style="background: <?php block_field('background-color') ;?>; height: <?php if ($two_card_header === '' || null) {echo "auto";} ?>"
    > 
    
        <h2 style="display: <?php if ($two_card_header === '' || null) {echo "none";} ?>"> <?php block_field('header-text') ?> </h2>
        
        <div class="container">
            
            <div class="card_wrapper">
            
                <div class="twocol_card"> 
        
                    <div class="col-xl-7 col-lg-7 col-md-7 image_div" style="background: url('<?php block_field('card-1-image') ?>')center center/cover no-repeat">
                    </div>
        
                    <div class="card_rightside">
                        <img class="card_diamond" src="http://msbdev.wpengine.com/wp-content/uploads/2019/11/Green_Rectangle.png">
                        <h6>
                            <span class="card_bold">  
                                <?php echo $bold_text_1; ?>
                            </span>
                            <?php echo $standard_text_1; ?>
                        </h6>

                        <?php if (block_value('card-1-link') !== '' and block_value('card-1-link-text') !== '') : ?>

                            <a href="<?php block_field('card-1-link') ?>" class=""> 

                                <!-- <div class="row"> -->

                                    <div class="link_text"> 
                                        <?php block_field('card-1-link-text') ?>
                                    </div>

                                    <img src="<?php echo get_template_directory_uri() . "/images/readmore_arrow.svg"; ?>">

                                <!-- </div> -->

                            </a>

                        <?php endif; ?>

                    </div>
        
                </div>
        
                <div class="twocol_card"> 
        
                    <div class="col-xl-7 col-lg-7 col-md-7 image_div" style="background: url('<?php block_field('card-2-image') ?>') center center/cover no-repeat">
                    </div>
        
                    <div class="card_rightside">
                        <img class="card_diamond" src="http://msbdev.wpengine.com/wp-content/uploads/2019/11/Green_Rectangle.png">
                        <h6>
                            <span class="card_bold">  
                                <?php echo $bold_text_2; ?>
                            </span>
                            <?php echo $standard_text_2; ?>
                        </h6>
                        <?php if (block_value('card-2-link') !== '' and block_value('card-2-link-text') !== '') : ?>
                                
                            <a href="<?php block_field('card-2-link') ?>" class=""> 

                                <!-- <div class="row"> -->

                                    <div class="link_text"> 
                                        <?php block_field('card-2-link-text') ?>
                                    </div>

                                    <img src="<?php echo get_template_directory_uri() . "/images/readmore_arrow.svg"; ?>">

                                <!-- </div> -->

                            </a>

                        <?php endif; ?>

                    </div>
        
                </div>
        
            </div>
        </div>
    
    </div>
</div>
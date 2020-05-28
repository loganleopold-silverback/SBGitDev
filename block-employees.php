<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . "/css/slick.css"; ?>" >
<script src="<?php echo get_template_directory_uri() . "/js/slick.min.js"; ?>" type="text/javascript"></script>

<?php 

    $employee_department = block_value('employee-department');
    
    $args = array(
        'post_type'      => 'page',
        // 'department'     =>  "$employee_department",
        'meta_key'       => 'department',
        'meta_value'     => "$employee_department",
        'posts_per_page' => -1,
        'order'          => 'ASC'
    );

    $employeeBios = new WP_Query( $args );

?>

<div class="employee_wrapper">

    <?php if ($employeeBios -> have_posts()) : ?>

        <div class="employee_slider">

            <?php while ( $employeeBios->have_posts() ) : $employeeBios->the_post(); ?>
            <?php $employee_image = get_the_post_thumbnail_url($employeeBios->ID); ?>

                <div class="employee_card"> 

                    <div class="bio_content">
                        <div class="bio_text">
                            <h1> <?php echo the_title(); ?> </h1>
                            <h2>
                                <?php 
                                    echo get_post_meta(get_the_ID(), 'employee-title', true) ;
                                ?>
                            </h2>
                        </div>
                        <div class="bio_pic" style="background-image: url('<?php echo $employee_image ?>); "> </div>
                    </div>

                    <a href="<?php echo the_permalink(); ?>"> Learn More </a>
                    
                </div>

            <?php endwhile; ?>

        </div>

    <?php endif; ?>

    <div class="arrows">
        <div class="prev_nav" style="padding-right: 5px;">
            <img src="<?php echo get_template_directory_uri() . '/images/left-arrow.svg' ?>" >
        </div>
        <div class="next_nav" style="padding-left: 5px;">
            <img src="<?php echo get_template_directory_uri() . '/images/right-arrow.svg' ?>" >
        </div>
    </div>

</div>
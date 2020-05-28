<?php 
        
    $bold_text_1 = block_value('card-1-bold-text');
    $standard_text_1 = block_value('card-1-standard-text');
    
    $bold_text_2 = block_value('card-2-bold-text');
    $standard_text_2 = block_value('card-2-standard-text');

    $two_card_header = block_value('header-text');
    
?>

<div class="margin_correct_vid_card  
        <?php block_field('top-margin'); ?> <?php block_field('bottom-margin'); ?>"
    style="padding: <?php if ($two_card_header === '' || null) {echo "0";} ?>"
> </div>

    <div 
        class="two-vid-card-header-wrapper" style="background: <?php block_field('background-color') ;?>; height: <?php if ($two_card_header === '' || null) {echo "auto";} ?>"
    > 
    
        <h2 style="display: <?php if ($two_card_header === '' || null) {echo "none";} ?>"> <?php block_field('header-text') ?> </h2>
        
        <div class="container">
            
            <div class="card_wrapper">
            
                <div class="twocol_card"> 

                    <?php 

                        $dataid1;

                        $url1 = block_value('video-1-url');
                        $url_array1 = explode("/", $url1);

                        if (in_array("www.youtube.com", $url_array1)) {
                            $dataid1 = explode( "?v=", $url_array1[3] ) [1];
                        } elseif (in_array("youtu.be", $url_array1)) {
                            $dataid1 = $url_array1[3];
                        }
                

                    ?>

                    <div class="col-xl-7 col-lg-7 col-md-7 vid_div">
                        <a id='form_video' href="<?php echo $url1 ?>" data-lity>
                            <!-- <div class="image">     -->
                            <div class='video_image' style="width:100%; height:100%; background-image: url(<?php echo "https://img.youtube.com/vi/$dataid1/maxresdefault.jpg;" ?>);" > </div>
                            <!-- </div> -->
                        </a>
                    </div>
        
                    <div class="card_rightside">
                        
                        <img class="card_diamond" src=<?php 
                        $uploads = wp_upload_dir()['baseurl'];
                        echo $uploads . "/2019/11/Green_Rectangle.png" ?> >

                        <h6>
                            <span class="card_bold">  
                                <?php echo $bold_text_1; ?>
                            </span>
                            <?php echo $standard_text_1; ?>
                        </h6>

                    </div>
        
                </div>
        
                <div class="twocol_card"> 

                    <?php 

                        $dataid2;

                        $url2 = block_value('video-2-url');
                        $url_array2 = explode("/", $url2);

                        if (in_array("www.youtube.com", $url_array2)) {
                            $dataid2 = explode( "?v=", $url_array2[3] ) [1];
                        } elseif (in_array("youtu.be", $url_array2)) {
                            $dataid2 = $url_array2[3];
                        } else {
                            $dataid2 = "ERROR";
                        }
        
                    ?>
        
                    <div class="col-xl-7 col-lg-7 col-md-7 vid_div">
                        <a id='form_video' href="<?php echo $url2 ?>" data-lity>
                            <!-- <div class="image">     -->
                                <div class='video_image' style="width:100%; height:100%; background-image: url(<?php echo "https://img.youtube.com/vi/$dataid2/default.jpg;" ?>);" > </div>
                            <!-- </div> -->
                        </a>
                    </div>
        
                    <div class="card_rightside">
                        
                        <img class="card_diamond" src=<?php 
                        $uploads = wp_upload_dir()['baseurl'];
                        echo $uploads . "/2019/11/Green_Rectangle.png" ?> >

                        <h6>
                            <span class="card_bold">  
                                <?php echo $bold_text_2; ?>
                            </span>
                            <?php echo $standard_text_2; ?>
                        </h6>

                    </div>
        
                </div>
        
            </div>
        </div>
    
    </div>

</div> <!-- End  -->
<?php 

    $directory_uri = get_template_directory_uri();
    echo "<script> var directory_uri = '" . "$directory_uri'" . " </script>;"

?>
<script id="lity_vid_check" type="text/javascript">
  
  let lity_script_check = document.querySelectorAll('.lity_vid')
  let head = document.querySelectorAll('HEAD')[0]

  if ((!lity_script_check.length > 0)) {
    let lity_script = document.createElement('SCRIPT')
    lity_script.type = "text/javascript"
    lity_script.src = directory_uri + "/js/lity.js"
    lity_script.className = 'lity_vid'
    head.appendChild(lity_script)
  }





</script> 
<?php 

$email = block_value('email');
$phone = block_value('phone');

?>

<a href="mailto:<?php echo $email; ?>"> <?php echo $email; ?> </a>

<a href="tel:+1<?php echo $phone; ?>"> <?php echo $phone; ?> </a>
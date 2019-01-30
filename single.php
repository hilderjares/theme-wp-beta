<?php get_header(); ?>

<div class="container">
	
<?php

if (have_posts()):
	while (have_posts()):
		the_post();	
?>
		<h2> <?=the_title()?> </h2>
		<p> <?=the_content()?> </p>
		<div> <?=the_post_thumbnail('medium_large', ['class' => 'img-fluid rounded '])?> </div>
		<span> <?=the_date()?> </span>
<?php
	endwhile;
endif;	
?>

</div>

<?php get_footer(); ?>
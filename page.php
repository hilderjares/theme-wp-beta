<?php get_header(); ?>
	
<div class="container">
<?php

if (have_posts()):
	while (have_posts()):
		the_post();	
?>
		<h2> <?=the_title()?> </h2>
		<p> <?=the_content()?> </p>
		<div> <?=the_post_thumbnail('medium')?> </div>
		<span> <?php if (!is_page('contato')){ the_date(); }?> </span>
<?php
	endwhile;
endif;	
?>

<?php 

if (is_page('contato')): ?>
<section>
	<form>
		<div class="form-group">
			<label for="exampleFormControlInput1">Email address</label>
			<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
		</div>
			<div class="form-group">
			<label for="exampleFormControlSelect1">Motivo</label>
			<select class="form-control" id="exampleFormControlSelect1">
				<option>Dúvida sobre os cursos</option>
				<option>Parceria com a empresa</option>
				<option>Outros</option>
			</select>
		</div>
	  	<div class="form-group">
	    	<label for="exampleFormControlTextarea1">Message</label>
	    	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
	  	</div>
	  	<div class="form-group">
	  		<button class="btn btn-primary" type="submit">Send</button>
	  	</div>
	</form>
</section>
<?php endif; ?>

</div>

<?php get_footer(); ?>
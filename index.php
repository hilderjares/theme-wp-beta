<?php 
	$filterTaxonomy = filter_input(INPUT_GET, 'taxonomy');
	if (isset($filterTaxonomy) && $filterTaxonomy === ''){
		wp_redirect(home_url());
	}	
?>

<?php get_header(); ?>

<main role="main">

	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">Nordeste Cursos</h1>
			<p class="lead text-muted"> Se capacite com excelência! </p>
		</div>
	</section>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php $taxonomies = get_terms('formation'); ?>
				<form class="form-inline" action="<?=bloginfo('url')?>">
					<label>Selecione a formação</label>
					<div class="form-group">
					    <select class="form-control" name="taxonomy">
					    	<option value=""> Todas </option>
					    	<?php foreach ($taxonomies as $taxonomy): ?>
					      		<option value="<?=$taxonomy->slug?>"> <?=$taxonomy->name?> </option>
					      	<?php endforeach; ?>
					    </select>
					    <button class="btn btn-primary" type="submit"> Filtrar </button>
					</div>					
				</form>
			</div>
		</div>
	</div>	

  	<div class="album py-5 bg-light">
    	<div class="container">
		    <div class="row">

		    	<?php
		    		if (isset($filterTaxonomy)) {
						$taxQuery = [
							[
								'taxonomy' => 'formation',
								'field' => 'slug',
								'terms' => $filterTaxonomy
							],
						];
					}

					$args = [
						'post_type' => 'course',
						'tax_query' => $taxQuery
					];

					$data = new WP_Query($args);

					if ($data->have_posts()):
						while( $data->have_posts() ):
							$data->the_post();	
				?>							
							<div class="col-md-4">
					          	<div class="card mb-5 shadow-sm">
					            	<div>
  										<?=the_post_thumbnail('large', ['class' => 'img-fluid rounded '])?>
									</div>
						            <div class="card-body">
						              	<p class="card-text"> <?=the_content()?> </p>
						              	<div class="d-flex justify-content-between align-items-center">
							                <div class="btn-group">
							                	<a href="<?=the_permalink()?>" role="button" class="btn btn-sm btn-outline-secondary"> View </a>
							                </div>
							                <small class="text-muted"> <?=the_date()?> </small>
						              	</div>
						            </div>
					          	</div>
					        </div>	
				<?php
						endwhile;
					else:
						echo "<p> Não existe posts! </p>";	
					endif;	
				?>
	
		    </div>
    	</div>
  	</div>

</main>

<?php get_footer(); ?>

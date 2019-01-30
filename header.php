<?php $url = get_template_directory_uri(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php bloginfo('name'); ?> <?php wp_title('|', true, 'left'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?=$url?>/reset.css">
	<link rel="stylesheet" type="text/css" href="<?=$url?>/style.css">
	<?php wp_head(); ?>
</head>
<body>
<header>
	<nav aria-label="breadcrumb">
		<?php 
			$args = [
				'theme_location' => 'header-menu',
				'menu_class' => 'breadcrumb',
			];
			wp_nav_menu($args);
		?>
	</nav>
</header>
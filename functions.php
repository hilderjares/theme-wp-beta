<?php

/* ativa post thumbnails no tema */
add_theme_support('post-thumbnails');

function my_theme_enqueue_styles() {
	wp_enqueue_style('bootstrap',  get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css');
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function register_post_type_course() {
	$labels = [
		'name' => 'Cursos',
		'name_singular' => 'Curso',
		'add_new_item' => 'Adicionar novo curso',
		'edit_item' => 'Editar curso'
	];

	$supports = [
		'title',
		'editor',
		'thumbnail'
	];

	$args = [
		'labels' => $labels,
		'public' => true,
		'description' => 'Cursos para carreira de desenvolvedor de software',
		'menu_icon' => 'dashicons-video-alt3',
		'supports' => $supports
	];

	register_post_type('course', $args);
}

add_action('init', 'register_post_type_course');

function register_menu() {
	register_nav_menu('header-menu', 'main-menu');
}

add_action('init', 'register_menu');

function register_taxonomy_formation() {
	$nameLabel = 'Formações';
	$nameSingularLabel = 'Formação';

	$labels = [
		'name' => $nameLabel,
		'name_singular' => $nameSingularLabel,
		'edit_item' => 'Editar ' . $nameSingularLabel,
		'add_new_item' => 'Adicionar nova '. $nameSingularLabel, 
	];

	$args = [ 
		'labels' => $labels, 
		'public' => true, 
		'hierarchical' => true
	];

	register_taxonomy('formation', 'course', $args);	
}

add_action('init', 'register_taxonomy_formation');

function occupy_content_informations_formation() {
	printf(" <div> Meta boxs </p> ");
}

function register_meta_boxes() {
	add_meta_box(
		'informations-formations',
		'Informações das Formações',
		'occupy_content_informations_formation',
		'course',
		'normal',
		'high'
	);
}

add_action('add_meta_boxes', 'register_meta_boxes');
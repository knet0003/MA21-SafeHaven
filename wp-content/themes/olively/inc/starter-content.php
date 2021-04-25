<?php
/**
 *	Starter Content for Olively
 */

function olively_starter_content() {
	
	$starter_content = array(
		'options'	=>	array(
			'show_on_front'	=>	'page',
			'page_on_front'	=>	'{{home}}',
			'page_for_posts'=>	'{{blog}}'
		),
		'attachments'	=>	array(
			'car-ride'	=>	array(
				'post_title'	=>	_x('Car Ride', 'Theme Starter Content', 'olively'),
				'file'			=>	'assets/images/stock/car-ride.jpg'
			),
			'mountain-lake'	=>	array(
				'post_title'	=>	_x('Mountain Lake', 'Theme Starter Content', 'olively'),
				'file'			=>	'assets/images/stock/mountain-lake.jpg'
			),
			'relax'		=>	array(
				'post_title'	=>	_x('Relax in Pool', 'Theme Starter Content', 'olively'),
				'file'			=>	'assets/images/stock/relax-in-pool.jpg'
			),
			'girl-1'	=>	array(
				'post_title'	=>	_x('Girl 1', 'Theme Starter Content', 'olively'),
				'file'			=>	'assets/images/stock/girl-1.jpg'
			),
			'girl-2'	=>	array(
				'post_title'	=>	_x('Girl 2', 'Theme Starter Content', 'olively'),
				'file'			=>	'assets/images/stock/girl-2.jpg'
			),
			'girl-3'	=>	array(
				'post_title'	=>	_x('Girl 3', 'Theme Starter Content', 'olively'),
				'file'			=>	'assets/images/stock/girl-3.jpg'
			)
		),
		'posts'		=>	array(
			'home'		=>	array(
				'template'	=>	'templates/template-front.php'
			),
			'blog',
			'travel-europe'	=>	array(
				'post_type'		=>	'post',
				'post_title'	=>	_x('Guide to maintain your hair while travelling', 'Theme Starter Content', 'olively'),
				'post_content'	=>	_x('Don’t let the fear of expenses get in the way of a trip across the pond. When done right, touring Europe can be cheaper than traveling through North America. If I can manage a four-month jaunt for under $1500, you can manage a two-month trip for $1000 or less.', 'Theme Starter Content', 'olively'),
				'thumbnail'		=>	'{{girl-3}}'
			),
			'getting-lost'	=>	array(
				'post_type'		=>	'post',
				'post_title'	=>	_x('Getting Lost not always a Bad Thing', 'Theme Starter Content', 'olively'),
				'post_content'	=>	_x('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Theme Starter Content', 'olively'),
				'thumbnail'		=>	'{{girl-2}}'
			),
			'skincare'		=>	array(
				'post_type'		=>	'post',
				'post_title'	=>	_x('Keeping up with your skincare Game on a Holiday', 'Theme Starter Content', 'olively'),
				'post_content'	=>	_x('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Theme Starter Content', 'olively'),
				'thumbnail'		=>	'{{girl-1}}'
			),
			'relaxing-in-pool'		=>	array(
				'post_type'		=>	'post',
				'post_title'	=>	_x('Keeping up with your skincare Game on a Holiday', 'Theme Starter Content', 'olively'),
				'post_content'	=>	_x('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Theme Starter Content', 'olively'),
				'thumbnail'		=>	'{{relax}}'
			),
			'trip-to-hills'		=>	array(
				'post_type'		=>	'post',
				'post_title'	=>	_x('Trip to Chitkul – A mind freezing experience', 'Theme Starter Content', 'olively'),
				'post_content'	=>	_x('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Theme Starter Content', 'olively'),
				'thumbnail'		=>	'{{mountain-lake}}'
			),
			'car-ride'		=>	array(
				'post_type'		=>	'post',
				'post_title'	=>	_x('How I travelled across Europe with a $1000', 'Theme Starter Content', 'olively'),
				'post_content'	=>	_x('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Theme Starter Content', 'olively'),
				'thumbnail'		=>	'{{car-ride}}'
			),
			'featured-page'	=>	array(
				'post_type'		=>	'page',
				'post_title'	=>	_x('A Traveller’s Guide to the Alps', 'Theme Starter Content', 'olively'),
				'post_content'	=>	_x('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Theme Starter Content', 'olively')
			)
		),
		'theme_mods'	=>	array(
			'olively_hero_text'	=>	_x('Have Stories to Tell', 'Theme Starter Content', 'olively'),
			'olively_hero_description'		=>	_x('Not Pockets to Fill', 'Theme Starter Content', 'olively'),
			'olively_hero_cta_url'			=>	esc_url('#'),
			'olively_hero_cta_text'			=>	_x('Read More', 'Theme Starter Content', 'olively'),
			'olively_featured_page'			=>	'{{featured-page}}',
			'olively_front_featured_post'	=>	'{{relaxing-in-pool}}',
			'olively_footer_cols'			=>	'3',
			'olively_footer_bg'				=>	'assets/images/stock/car-ride.jpg'
		),
		'nav_menus'	=>	array(
			'menu-1'	=>	array(
				'name'	=>	_x('Primary Menu', 'Theme Starter Content', 'olively'),
				'items'	=>	array(
					'page_home',
					'page_about',
					'page_blog',
					'page_contact',
				)
			)
		),
		'widgets'	=>	array(
			'before-footer'	=>	array(
				'search'
			),
			'footer-1'	=>	array(
				'text_about'
			),
			'footer-2'	=>	array(
				'recent-posts',
				'categories'
			),
			'footer-3'	=>	array(
				'meta'
			)
		)
	);
	
	add_theme_support('starter-content', $starter_content);
	
}
add_action('after_setup_theme', 'olively_starter_content');
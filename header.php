<?php require_once('stat.php'); ?>
<?php require_once('count.php'); ?>
<!doctype html>
	<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<!-- <meta name="viewport" content="width=device-width"> -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<header class="top_head">
		<div class="adv">
			<div class="wraper cf">
				<?php
					$args=array(
						'post_type' => 'blurbs',
						'showposts'=>3,
						'order'				=> 'DESC',
						'orderby'			=> 'meta_value',
						'meta_query' => array(
							array(
								'key' => 'ale_bus_top',
								'value' => 'on',
							),
						)
					);

					$blurbs = get_posts($args);
					foreach ($blurbs as $post)
					{
						setup_postdata($post); ?>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<a href="<?php the_permalink(); ?>">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 adv_img">
									<img src="<?php echo the_post_thumbnail_url(); ?>">
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xl-8 adv_content">
									<span><?php the_title(); ?></span><br/>
									<span><?php echo ale_get_meta('cost'); ?> ГРН</span><br/>
									<span><?php echo get_term(implode(ale_get_meta('areal')))->name; ?></span>
								</div>
							</a>
						</div>
				<?php } 
				wp_reset_postdata(); ?>
			</div>
		</div>

		<div class="h_m wraper">
			<div class="col-lg-4 col-md-4 col-sm-6 head_info logo">
				<a href="<?=home_url('/'); ?>"><img src="<?php echo ale_get_option('sitelogo'); ?>"></a>
			</div>
			<div class="col-lg-6 col-md-6 head_info com_info">
				<div class="col-lg-4">
					<p class="count"><span><?php echo wp_count_posts('blurbs')->publish; ?></span> <i class="fa fa-refresh" aria-hidden="true" style="color: #9fcae7;"></i></p>
					<p class="count_text">Объектов в продаже</p>
				</div>
				<div class="col-lg-4">
					<a class="close_blurb" href="<?php echo home_url(); ?>/zavershennye-sdelki/">
					<p class="count"><span>200</span> <i class="fa fa-thumbs-up" aria-hidden="true" style="color: #9fcae7;"></i></p>
					<p class="count_text">Завершенных сделок</p>
					</a>
				</div>
				<div class="col-lg-4">
					<p class="count"><span><?php echo $hosts[0]['hosts']; ?></span> <i class="fa fa-briefcase" aria-hidden="true" style="color: #9fcae7;"></i></p>
					<p class="count_text">Посетителей сегодня</p>
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 cont">
				<a href="#" class="btn btn-info">КУПИТЬ БИЗНЕС</a>
				<a href="<?php echo home_url(); ?>/prodat-biznes/" class="btn btn-success">ПРОДАТЬ БИЗНЕС</a>
			</div>
		</div>
		
		<div class="head_menu">
			<?php echo do_shortcode( "[hmenu id=1]" ); ?>
		</div>
	</header>
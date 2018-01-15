<?php get_header(); ?>

<?php
	if(ale_get_meta('bus_counter')) {
		$count = ale_get_meta('bus_counter') + 1;
		update_post_meta( $post->ID, 'ale_bus_counter', $count );
	}
	else update_post_meta( $post->ID, 'ale_bus_counter', 1 );
	update_post_meta( $post->ID, 'ale_browsing', current_time('mysql') );
?>

<div class="wraper main_area">
	<div class="col-lg-9 work_area">
		<div class="blurb_con">
			<div class="single_blurb">
				<div class="blurb_head">
					<div class="cost_i">
						<div class="col-lg-7 ">
							<?php the_title(); ?><br>
						</div>
						<div class="col-lg-5 right">
							<font style="color: #2b8bca; font-size: 20px;"><?php echo ale_get_meta('cost').' '.ale_get_meta('cost_value'); ?></font><br>
							<a href="#" style="color: #000000; font-size: 14px;"><i class="fa fa-arrow-circle-o-down" aria-hidden="true" style="color: #2b8bca;"></i> предложить свою цену</a>
						</div>
					</div>
					<div class="data_i">
						<div class="col-lg-7">
							<front style="color: #838aa5;	font-size: 12px;"><?php echo get_the_date(); ?> <i class="fa fa-circle" aria-hidden="true" style="font-size: 5px; vertical-align: middle;"></i> id: <?php echo $post->ID; ?></front> 
						</div>
						<div class="col-lg-5 right">
							<front style="color: #838aa5;	font-size: 12px;"><i class="fa fa-eye" aria-hidden="true"></i> Просмотров: <?php echo ale_get_meta('bus_counter'); ?></front>
						</div>
					</div>
				</div>

				<div id="slider" class="flexslider">
					<ul class="slides">
						<?php $args = array(
							'post_type' => 'attachment',
							'numberposts' => -1,
							'post_status' => null,
							'order'				=> 'ASC',
							'orderby'			=> 'menu_order ID',
							'meta_query'		=> array(
								array(
									'key'		=> '_ale_hide_from_gallery',
									'value'		=> 0,
									'type'		=> 'DECIMAL',
								),
							),
							'post_parent' => $post->ID
						);
						$attachments = get_posts( $args );
						if ( $attachments ) {
							foreach ( $attachments as $attachment ) { ?>
								<li>
									<?php echo wp_get_attachment_image( $attachment->ID, 'gallery-big' ); ?>
								</li>
							<?php }
						} ?>
					</ul>
				</div>
				<div id="carousel" class="flexslider">
					<ul class="slides">
						<?php $args = array(
							'post_type' => 'attachment',
							'numberposts' => -1,
							'post_status' => null,
							'order'				=> 'ASC',
							'orderby'			=> 'menu_order ID',
							'meta_query'		=> array(
								array(
									'key'		=> '_ale_hide_from_gallery',
									'value'		=> 0,
									'type'		=> 'DECIMAL',
								),
							),
							'post_parent' => $post->ID
						);
						$attachments = get_posts( $args );
						if ( $attachments ) {
							foreach ( $attachments as $attachment ) { ?>
								<li>
									<?php echo wp_get_attachment_image( $attachment->ID, 'gallery-big' ); ?>
								</li>
							<?php }
						} ?>
					</ul>
				</div>
				<div class="addit">
					<div class="addit_first col-lg-6 col-md-6 col-sm-6 col-xl-6">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
							<span class="grey_text">Цена</span><br/>
							<span><?php echo ale_get_meta('cost').' '.ale_get_meta('cost_value'); ?></i></span>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
							<span class="grey_text">Доходность</span><br/>
							<span><?php echo ale_get_meta('share'); ?>% годовых</span>
						</div>
					</div>
					<div class="addit_second col-lg-6 col-md-6 col-sm-6 col-xl-6">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
							<span class="grey_text">Окупаемость</span><br/>
							<span><?php echo ale_get_meta('term'); ?> мес.</span>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xl-6">
							<span class="grey_text">Прибыль</span><br/>
							<span><?php echo ale_get_meta('proceeds_mouth').' '.ale_get_meta('proceeds_mouth_value'); ?> / мес.</span>
						</div>
					</div>
				</div>

				<div class="blurb_main">
					<div style="height: 60px; text-align: center; background-color: #f8f8f8; padding: 10px 0;">
						<span class="grey_text">Причина продажи бизнеса:</span><br/>
						<span><?php echo ale_get_meta('reason'); ?></span>				
					</div>
					<div style="font-size: 16px; border-bottom: 1px solid #eaeaea;"><?php echo ale_get_meta('datefield'); ?></div>
					<div class="blurb_ibox">
						<h4><i class="fa fa-map-marker" aria-hidden="true" style="color: #52a0d3;"></i> Общее</h4>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Тип продаваемого бизнеса:</p>
							<p class="blurb_cell"><?php echo get_term( implode(ale_get_meta('bus_type')))->name; ?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Расположение бизнеса:</p>
							<p class="blurb_cell"><?php echo get_term(implode(ale_get_meta('areal')))->name; ?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Подробное описание местоположения:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('location'); ?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Сайт:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('bus_url'); ?></p>
						</div>
					</div>
					<div class="blurb_ibox">
						<h4><i class="fa fa-credit-card" aria-hidden="true" style="color: #52a0d3;"></i> Финансы</h4>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Цена продаваемого бизнеса:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('cost'); ?> <?php echo ale_get_meta('cost_value');?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Выручка за год:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('proceeds_year'); ?> <?php echo ale_get_meta('proceeds_year_value');?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Прибыль в месяц:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('proceeds_mouth'); ?> <?php echo ale_get_meta('proceeds_mouth_value');?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Арендная плата:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('salary'); ?> <?php echo ale_get_meta('salary_value');?></p>
						</div>
					</div>
					<div class="blurb_ibox">
						<h4><i class="fa fa-briefcase" aria-hidden="true" style="color: #52a0d3;"></i> Основные средства</h4>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Общая площадь недвижимости в собственности:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('own_sq'); ?> кв.м.</p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Общая площадь недвижимости в аренде:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('lease_sq'); ?> кв.м.</p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Срок окончания договора аренды недвижимости:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('contract_end'); ?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Общая площадь земельных участков в собственности:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('own_area_sq'); ?> кв.м.</p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Общая площадь земельных участков в аренде:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('lease_area_sq'); ?> кв.м.</p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Оборудование:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('equipment'); ?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Количество автотранспорта, шт.:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('cars'); ?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Нематериальные активы:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('assets'); ?></p>
						</div>
					</div>
					<div class="blurb_ibox">
						<h4><i class="fa fa-info-circle" aria-hidden="true" style="color: #52a0d3;"></i> Дополнительная информация</h4>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Срок окупаемости для покупателя:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('term'); ?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Количество сотрудников, чел.:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('qt_worker'); ?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Срок существования бизнеса:</p>
							<p class="blurb_cell"><?php echo ale_get_meta('lifetime'); ?></p>
						</div>
						<div class="blurb_row">
							<p class="blurb_cell1 grey_text">Организационно-правовая форма:</p>
							<p class="blurb_cell">Иное</p>
						</div>
					</div>
				</div>
				<div class="blurb_contact">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xl-3">Брокер объекта:</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xl-2 img_contact">
							<?php if( !ale_get_option('photo') ) { ?>
								<img  src="/wp-content/themes/alethemes-master/css/img/anonimus.png">
							<?php }
							else { ?>
								<img src="<?php echo ale_get_option('photo'); ?>">
							<?php } ?>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xl-7">
							<p style="color: #2b8bca;"><?php echo ale_get_option('name'); ?></p>
							<p>Телефон: <font style="color: #2b8bca;"><?php echo ale_get_option('ph'); ?></font></p>
							<p>E-mail: <font style="color: #2b8bca;"><?php echo ale_get_option('mail'); ?></font></p>
							<button class="default"><i class="fa fa-envelope-o" aria-hidden="true" style="color: #2b8bca;"></i> Отправить заявку брокеру</button>
						</div>
					</div>
			</div>
		</div>
	</div>
	<?php get_sidebar() ?>
</div>

<?php get_footer(); ?>
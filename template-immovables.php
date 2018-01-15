<?php
/*
	* Template name: Template About (immovables)
	* */
get_header();?>

<div class="wraper main_area">
	<div class="work_area">
		<div class="filter_area">
			<form action="/filter" method="POST">
				<h4 align="center">Купить готовый бизнес</h4>
				<div class="category">
					<div>
						<span class="index">Тип инвестирования</span>
						<span class="main_text">Бизнес в продаже</span>
						<input type="hidden" name="business_type" value='3'>
					</div>
					<div>
						<span class="index">Регион инвестирования</span>
						<div class="select">
							<?php 
								$post_type = 'blurbs'; // наш произвольный тип записи
								if( is_object_in_taxonomy( $post_type, 'blurbs-areal' ) ){
									$dropdown_options = array(
										'show_option_all'    => '',
										'show_option_none'   => '',
										'hide_empty'      => 0,
										'hierarchical'    => 1,
										'show_count'      => 0,
										'orderby'         => 'name',
										'name' => 'slct_area',
										'id' => 'slct_area',
										'taxonomy' => 'blurbs-areal',
										'value_field' => 'id',
									);
									wp_dropdown_categories( $dropdown_options );
								}
							?>
						</div>
					</div>
					<div>
						<span class="index">Категория готового бизнеса</span>
						<div class="select">
							<?php 
								$post_type = 'blurbs'; // наш произвольный тип записи
								if( is_object_in_taxonomy( $post_type, 'blurbs-category' ) ){
									$dropdown_options = array(
										'show_option_all'    => '',
										'show_option_none'   => '',
										'hide_empty'      => 0,
										'hierarchical'    => 1,
										'show_count'      => 0,
										'orderby'         => 'name',
										'name' => 'slct_cat',
										'id' => 'slct_cat',
										'taxonomy' => 'blurbs-category',
										'value_field' => 'id',
									);
									wp_dropdown_categories( $dropdown_options );
								}
							?>
						</div>
					</div>
				</div>
				<div class="search_fild">
					<input type="text" name="search_bus">
					<button name="send" class="btn btn-info">Показать</button>
				</div>
			</form>
		</div>
		<div class="blurb_con">
			<ul class="last_blurb"><?php
					// 1 значение по умолчанию
					$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

					$the_query = new WP_Query( array(
						'post_type' => 'blurbs',
						'showposts'=> 18,
						'meta_key' => 'ale_bus_type',
						'order'				=> 'DESC',
						'orderby'			=> 'post_date',
						'meta_query' => array(
							array(
								'key' => 'ale_bus_type',
								'value' => 'a:1:{i:0;s:2:"33";}',
							),
						),
						'paged'          => $paged,
					) );
					// цикл вывода полученных записей
					while( $the_query->have_posts() ){
						$the_query->the_post();
						?>
							<li class="col-lg-4 blurb">
								<div class="blurb_h"><?php the_title(); ?></div>
								<div class="blurb_i">
									<a href="<?php the_permalink(); ?>">
										<div class="img_content">
											<img src="<?php echo the_post_thumbnail_url(); ?>">
										</div>
										<div class="blurb_date"><?php echo get_the_date(); ?></div>
										<div class="blurb_price"><?php echo ale_get_meta('cost').' '.ale_get_meta('cost_value'); ?></div>
									</a>
								</div>
								<div class="blurb_c">
									<p>Прибыль:<font style="float: right;"><?php echo ale_get_meta('proceeds_mouth').' '.ale_get_meta('proceeds_mouth_value'); ?></font></p>
									<p>Город:<font style="float: right;"><?php echo get_term(implode(ale_get_meta('areal')))->name; ?></font></p>
									<p>Окупаемость:<font style="float: right;"><?php echo ale_get_meta('term'); ?> мес.</font></p>
								</div>
								<div style="text-align: center; line-height: 40px;"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
							</li>
						<?php 
					} 
					wp_reset_postdata();

					// пагинация для произвольного запроса
					if ( $the_query > 6 ) {
						$big = 999999999; // уникальное число
						?>
						<div class="pagin">
							<div class="pagin_box">
								<?php
									echo paginate_links( array(
									'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format'  => '?paged=%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total'   => $the_query->max_num_pages,
									'prev_text'    => __('&#8592'),
									'next_text'    => __('&#8594'),
									) );
								?>
							</div>					
						</div>						
					<?php }
					else { ?>
						<div class="pagin">
							<div class="pagin_box">
								<span aria-current='page' class='page-numbers current'>1</span>
							</div>					
					</div>
					<?php } ?>
				</ul>
		</div>
		<div class="stat_content">
			<h3><strong>Продажа и покупка готового бизнеса от УКНД</strong></h3>
			<p>Управляющая компания <strong>"НЕЗАВИСИМЫЕ ДИРЕКТОРА"</strong> работает  в сфере покупки - продажи бизнеса, поиск инвестора в Укриане, подбор готовых инвестиционных предложений. uknd.com.ua не просто сайт, это виртуальная площадка с живым каталогом предложений о продаже действующего бизнеса.</p>
			<p>Направления украинского бизнеса представленные в нашем каталоге деляться на следующие категории: Автомастерские, Гостинцы, Интернет проекты, Коммерческая недвижимость, Магазины,Медицина, Обучение, Пищевое производство, Полиграфия, Промышленное производство,Развлечения, Рестораны, Салон красоты, Сельское хозяйство, Строительство, Транспортные услуги,Турагентства, Услуги населению, Страховые компании, Проданые объекты. Такое деление бизнеса по направлениям должно улучшить поиск по разделам нашего сайта.</p>
			<p>Мы готовы сотрудничать со всеми кто поставил перед собой простую и одновременно сложную задачу: Хочу продать свое предприятие; закрыть его; или начать какое-то новое дело, желательно не с чистого листа, а купив уже существующую фирму... В столь сложном и ответственном вопросе попробуйте довериться специалистам в своей области.</p>
			<h4><strong>Коротко о нас:</strong></h4>
			<p class="list-dec"><img src="<?php echo home_url(); ?>/wp-content/themes/alethemes-master/css/img/circle.svg">Имеем десятки осуществленных  уникальных сделок;</p>
			<p class="list-dec"><img src="<?php echo home_url(); ?>/wp-content/themes/alethemes-master/css/img/circle.svg">Помогаем оценить бизнес, правильно его спозиционировать и найти покупателя;</p>
			<p class="list-dec"><img src="<?php echo home_url(); ?>/wp-content/themes/alethemes-master/css/img/circle.svg">Профессиональный коллектив состоит из юристов, финансистов, маркетологов и опытных менеджеров;</p>
			<p class="list-dec"><img src="<?php echo home_url(); ?>/wp-content/themes/alethemes-master/css/img/circle.svg">Также оказываем юридические услуги физическим лицам и организациям;</p>
			<p class="list-dec"><img src="<?php echo home_url(); ?>/wp-content/themes/alethemes-master/css/img/circle.svg">Одним из важных направлений является регистрация юр лиц, ликвидация юр лиц любой сложности, организация схем взаимодействий.</p>
			<p>Консультации, составление договоров, юридическое сопровождение сделок купли-продажи, любое представительство интересов клиента, включая судебные дела - все это наша компетенция.</p>
			<p>Для связи с нами отправьте электронную Заявку, позвоните по тел. <strong>+38 (044) 223-07-31</strong>, или напишите на электронный адрес: uknd.ki@gmail.com  сообщите о Вашей задаче. Консультант УКНД ответит на все Ваши вопросы. Далее, совместно с Вами мы определим порядок дальнейших действий.</p>
		</div>		
	</div>
	<?php get_sidebar() ?>
</div>

<?php get_footer(); ?>
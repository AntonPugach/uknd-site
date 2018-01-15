<!-- <?php 
	if (isset($_POST['send'])) {
		setcookie('business_type', $_POST['business_type']);
		setcookie('slct_area', $_POST['slct_area']);
		setcookie('slct_area', $_POST['slct_cat']);
		$type = $_POST['business_type'];
		$area = $_POST['slct_area'];
		$category = $_POST['slct_cat'];
	}
	else {
		$type = $_COOKIE['business_type'];
		$area = $_COOKIE['slct_area'];
		$category = $_COOKIE['slct_cat'];
	}
?> -->
<?php
/*
	* Template name: Template About (filter)
	* */
get_header();?>

<div class="wraper main_area">
	<div class="work_area">
		<div class="filter_area">
			<form action="" method="POST">
				<h4 align="center">Купить готовый бизнес</h4>
				<div class="category">
					<div>
						<span class="index">Тип инвестирования</span>
						<span class="main_text">Бизнес в продаже</span>
					</div>
					<div>
						<span class="index">Регион инвестирования</span>
						<div class="select">
							<?php 
								$post_type = 'blurbs'; // наш произвольный тип записи
								if( is_object_in_taxonomy( $post_type, 'blurbs-areal' ) ){
									$dropdown_options = array(
										'show_option_all'		=> '',
										'show_option_none'	=> '',
										'hide_empty'				=> 0,
										'hierarchical'			=> 1,
										'show_count'				=> 0,
										'selected'					=> $area,
										'orderby'						=> 'name',
										'name'							=> 'slct_area',
										'id'								=> 'slct_area',
										'taxonomy'					=> 'blurbs-areal',
										'value_field'				=> 'id',
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
										'show_option_all'		=> '',
										'show_option_none'	=> '',
										'hide_empty'				=> 0,
										'hierarchical'			=> 1,
										'show_count'				=> 0,
										'selected'					=> $category,
										'orderby'						=> 'name',
										'name'							=> 'slct_cat',
										'id'								=> 'slct_cat',
										'taxonomy'					=> 'blurbs-category',
										'value_field'				=> 'id',
									);
									wp_dropdown_categories( $dropdown_options );
								}
							?>
						</div>
					</div>
					<button name="send" class="btn btn-info">Показать</button>
				</div>
				<div class="search_fild">
					<input type="text" name="search_bus">
				</div>
				<div class="price_area">
					<div>
						<span class="index">Цена в рублях</span>
						<div class="select_fild">
							<span class="drop_fild" id="price">Цена в рублях</span>
							<div class="hide_fild_price">
								<div class="from_price">
									<span>от: </span><input type="number" name="from_price" id="from_price">
								</div>
								<div class="before_price">
									<span>до: </span><input type="number" name="before_price" id="before_price">
								</div>
								<button type="button" class="btn confirm">Применить</button>
								<ul class="price_tab">
									<li class="price_tab-item" value="500000">до 500 тыс.</li>
									<li class="price_tab-item" value="1000000">до 1 млн.</li>
									<li class="price_tab-item" value="2000000">до 2 млн.</li>
									<li class="price_tab-item" value="3000000">до 3 млн.</li>
									<li class="price_tab-item" value="5000000">до 5 млн.</li>
								</ul>
							</div>
						</div>
					</div>
					<div>
						<span class="index">Чистая прибыль в месяц</span>
						<div class="select_fild">
							<span class="drop_fild" id="profit">Чистая прибыль в месяц</span>
							<div class="hide_fild_profit">
								<div class="from_price">
									<span>от: </span><input type="number" name="from_profit" id="from_profit">
								</div>
								<button type="button" class="btn confirm">Применить</button>
								<ul class="profit_tab">
									<li class="profit_tab-item" value="50000">от 50 тыс.</li>
									<li class="profit_tab-item" value="100000">от 100 тыс.</li>
									<li class="profit_tab-item" value="200000">от 200 тис.</li>
									<li class="profit_tab-item" value="300000">от 300 тыс.</li>
								</ul>
							</div>
						</div>
					</div>
					<div>
						<span class="index">Окупаемость</span>
						<div class="select_fild">
							<span class="drop_fild" id="recoupment">Окупаемость в месяц</span>
							<div class="hide_fild_recoupment">
								<div class="before_price">
									<span>до: </span><input type="number" name="before_recoupment" id="before_recoupment">
								</div>
								<button type="button" class="btn confirm">Применить</button>
								<ul class="recoupment_tab">
									<li class="recoupment_tab-item" value="6">до 6 мес.</li>
									<li class="recoupment_tab-item" value="12">до 12 мес.</li>
									<li class="recoupment_tab-item" value="18">до 18 мес.</li>
									<li class="recoupment_tab-item" value="24">до 24 мес.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="blurb_con">
			<ul class="last_blurb"><?php
				// 1 значение по умолчанию
				$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

				if (condition) {
					# code...
				}

				$the_query = new WP_Query( array(
					'post_type' => 'blurbs',
					'showposts'=> 6,
					'meta_key' => 'ale_bus_type',
					'order'				=> 'DESC',
					'orderby'			=> 'meta_value',
					'meta_query' => array(
						array(
							'key' => 'ale_bus_type',
							'value' => $type,
						),
						array(
							'key' => 'ale_areal',
							'value' => $area,
						),
						array(
							'key' => 'ale_category',
							'value' => $category,
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
									<div class="blurb_price"><?php echo ale_get_meta('cost'); ?> <i class="fa fa-rub" aria-hidden="true"></i></div>
								</a>
							</div>
							<div class="blurb_c">
								<p>Прибыль:<font style="float: right;"><?php echo ale_get_meta('proceeds_mouth'); ?> <i class="fa fa-rub" aria-hidden="true"></i></font></p>
								<p>Город:<font style="float: right;"><?php echo get_term(implode(ale_get_meta('areal')))->name; ?></font></p>
								<p>Окупаемость:<font style="float: right;"><?php echo ale_get_meta('term'); ?> мес.</font></p>
							</div>
							<div style="text-align: center; line-height: 40px;"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
						</li>
					<?php 
				} 
				wp_reset_postdata();

				// пагинация для произвольного запроса
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
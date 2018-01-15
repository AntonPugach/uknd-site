<?php
	session_start();
	if ($_SESSION['ad_add'] == 1) {
		unset($_SESSION['ad_add']);
		echo "<script>";
		echo "document.addEventListener('DOMContentLoaded', function(){";
		echo "alert('Ваше объявление добавленно и находится на рассмотрении!');});";
		echo "</script>";
	}
?> 
<?php
/*
	* Template name: Home
	* */
get_header();?>

<div class="wraper main_area">
	<div class="work_area">
		<h2>Продажа бизнеса в Украине:</h2>
		<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url(); ?>">
			<label class="sr-only">Поиск:</label>
			<div class="input-group fut_search">
				<form name="search" method="get" id="searchform" action="search.php">
					<input type="search" value="" name="s" class=" form-control search_area" placeholder="Введите название объекта для поиска бизнеса" required>
					<button type="submit" class="search-submit btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> поиск</button>
				</form>
			</div>
		</form>
		<div class="blurb_con">
			<ul class="last_blurb">
				<?php
				$args=array(
					'post_type' => 'blurbs',
					'showposts'=> 6,
					'meta_key' => 'ale_bus_type',
					'order'				=> 'DESC',
					'orderby'			=> 'post_date',
					'meta_query' => array(
						array(
							'key' => 'ale_bus_type',
							'value' => 'a:1:{i:0;s:1:"3";}',
						),
					),
				);

				$blurbs = get_posts($args);
				foreach ($blurbs as $post)
				{
					setup_postdata($post); ?>
					<li class="blurb">
						<div class="blurb_h"><?php the_title(); ?></div>
						<div class="blurb_i">
							<a href="<?php the_permalink(); ?>">
								<div class="img_content">
									<img src="<?php echo the_post_thumbnail_url(); ?>">
								</div>
								<div class="blurb_date"><?php echo get_the_date(); ?></div>
								<div class="blurb_price"><?php echo ale_get_meta('cost').' '.ale_get_meta('cost_value'); ?></i></div>
							</a>
						</div>
						<div class="blurb_c">
							<p>Прибыль:<font style="float: right;"><?php echo ale_get_meta('proceeds_mouth').' '.ale_get_meta('proceeds_mouth_value'); ?></font></p>
							<p>Город:<font style="float: right;"><?php echo get_term(implode(ale_get_meta('areal')))->name; ?></font></p>
							<p>Окупаемость:<font style="float: right;"><?php echo ale_get_meta('term'); ?> мес.</font></p>
						</div>
						<div style="text-align: center; line-height: 40px;"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
					</li>
				<?php }
				wp_reset_postdata(); ?>
				</ul>
			<h3>Последние поступления франшиз</h3>
			<ul class="last_blurb">
				<?php
				$args=array(
					'post_type' => 'blurbs',
					'showposts'=> 6,
					'meta_key' => 'ale_bus_type',
					'order'				=> 'DESC',
					'orderby'			=> 'post_date',
					'meta_query' => array(
						array(
							'key' => 'ale_bus_type',
							'value' => 'a:1:{i:0;s:1:"4";}',
						),
					),
				);

				$blurbs = get_posts($args);
				foreach ($blurbs as $post)
				{
					setup_postdata($post); ?>
					<li class="col-lg-6 blurb">
						<div class="blurb_h"><?php the_title(); ?></div>
						<div class="blurb_i">
							<a href="<?php the_permalink(); ?>">
								<div class="img_content">
									<img src="<?php echo the_post_thumbnail_url(); ?>">
								</div>
								<div class="blurb_date"><?php echo get_the_date(); ?></div>
								<div class="blurb_price"><?php echo ale_get_meta('cost').' '.ale_get_meta('cost_value'); ?></i></div>
							</a>
						</div>
						<div class="blurb_c">
							<p>Прибыль:<font style="float: right;"><?php echo ale_get_meta('proceeds_mouth').' '.ale_get_meta('proceeds_mouth_value'); ?></i></font></p>
							<p>Город:<font style="float: right;"><?php echo get_term(implode(ale_get_meta('areal')))->name; ?></font></p>
							<p>Окупаемость:<font style="float: right;"><?php echo ale_get_meta('term'); ?> мес.</font></p>
						</div>
						<div style="text-align: center; line-height: 40px;"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
					</li>
				<?php }
				wp_reset_postdata(); ?>
			</ul>
			<h3>Последние поступления недвижимость</h3>
			<ul class="last_blurb">
				<?php
				$args=array(
					'post_type' => 'blurbs',
					'showposts'=> 6,
					'meta_key' => 'ale_bus_type',
					'order'				=> 'DESC',
					'orderby'			=> 'post_date',
					'meta_query' => array(
						array(
							'key' => 'ale_bus_type',
							'value' => 'a:1:{i:0;s:2:"33";}',
						),
					),
				);

				$blurbs = get_posts($args);
				foreach ($blurbs as $post)
				{
					setup_postdata($post); ?>
					<li class="col-lg-6 blurb">
						<div class="blurb_h"><?php the_title(); ?></div>
						<div class="blurb_i">
							<a href="<?php the_permalink(); ?>">
								<div class="img_content">
									<img src="<?php echo the_post_thumbnail_url(); ?>">
								</div>
								<div class="blurb_date"><?php echo get_the_date(); ?></div>
								<div class="blurb_price"><?php echo ale_get_meta('cost').' '.ale_get_meta('cost_value'); ?></i></div>
							</a>
						</div>
						<div class="blurb_c">
							<p>Прибыль:<font style="float: right;"><?php echo ale_get_meta('proceeds_mouth').' '.ale_get_meta('proceeds_mouth_value'); ?></i></font></p>
							<p>Город:<font style="float: right;"><?php echo get_term(implode(ale_get_meta('areal')))->name; ?></font></p>
							<p>Окупаемость:<font style="float: right;"><?php echo ale_get_meta('term'); ?> мес.</font></p>
						</div>
						<div style="text-align: center; line-height: 40px;"><a href="<?php the_permalink(); ?>">Подробнее</a></div>
					</li>
				<?php }
				wp_reset_postdata(); ?>
			</ul>
		</div>
		<div>
			<h3><strong>Продажа и покупка готового бизнеса от УКНД</strong></h3>
			<p>Управляющая компания <strong>"НЕЗАВИСИМЫЕ ДИРЕКТОРА"</strong> работает  в сфере покупки - продажи бизнеса, поиск инвестора в Укриане, подбор готовых инвестиционных предложений. uknd.com.ua не просто сайт, это виртуальная площадка с живым каталогом предложений о продаже действующего бизнеса.</p>
			<p>Направления украинского бизнеса представленные в нашем каталоге деляться на следующие категории: Автомастерские, Гостинцы, Интернет проекты, Коммерческая недвижимость, Магазины,Медицина, Обучение, Пищевое производство, Полиграфия, Промышленное производство,Развлечения, Рестораны, Салон красоты, Сельское хозяйство, Строительство, Транспортные услуги,Турагентства, Услуги населению, Страховые компании, Проданые объекты. Такое деление бизнеса по направлениям должно улучшить поиск по разделам нашего сайта.</p>
			<p>Мы готовы сотрудничать со всеми кто поставил перед собой простую и одновременно сложную задачу: Хочу продать свое предприятие; закрыть его; или начать какое-то новое дело, желательно не с чистого листа, а купив уже существующую фирму... В столь сложном и ответственном вопросе попробуйте довериться специалистам в своей области.</p>
			<h4><strong>Коротко о нас:</strong></h4>
			<p>Имеем десятки осуществленных  уникальных сделок;
			Помогаем оценить бизнес, правильно его спозиционировать и найти покупателя;
			Профессиональный коллектив состоит из юристов, финансистов, маркетологов и опытных менеджеров;
			Также оказываем юридические услуги физическим лицам и организациям;</p>
			<p>Одним из важных направлений является регистрация юр лиц, ликвидация юр лиц любой сложности, организация схем взаимодействий.
			Консультации, составление договоров, юридическое сопровождение сделок купли-продажи, любое представительство интересов клиента, включая судебные дела - все это наша компетенция.</p>
			<p>Для связи с нами отправьте электронную Заявку, позвоните по тел. <strong>+38 (044) 223-07-31</strong>, или напишите на электронный адрес: uknd.ki@gmail.com  сообщите о Вашей задаче. Консультант УКНД ответит на все Ваши вопросы. Далее, совместно с Вами мы определим порядок дальнейших действий.</p>
		</div>		
	</div>
	<?php get_sidebar() ?>
</div>

<?php get_footer(); ?>
<?php get_header(); ?>

<div class="wraper main_area">
	<div class="work_area">
		<h2>Поиск по фразе "<?php the_search_query(); ?>"</h2>
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
        if (have_posts()) :
          while (have_posts()) : the_post();?>
						<li class="col-lg-6 blurb">
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
				<?php endwhile; ?>
				<?php
				else :
					echo "Извините по Вашему результату ничего не найдено";
				endif;
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
	</div>
	<?php get_sidebar() ?>
</div>

<?php get_footer(); ?>
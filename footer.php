	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-3 text-footer fuoot1">
					<div id="nav_menu-4" class="side widget widget_nav_menu">
						<h3 class="widget-title">Навигация</h3>
						<div class="menu-ru-razrabotka-container">
							<?php
							if ( has_nav_menu( 'footer_menu_1' ) ) {
								wp_nav_menu(array(
									'theme_location'=> 'footer_menu_1',
									'menu'			=> 'Footer Menu 1',
									'menu_class'	=> 'ale_footermenu1 menu',
									'walker'		=> new Aletheme_Nav_Walker(),
									'container'		=> '',
								));
							} ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-footer fuoot2">
					<div id="nav_menu-5" class="foot widget widget_nav_menu">
						<h3 class="widget-title">Услуги</h3>
						<div class="menu-ru-uslugi-container">
							<?php
							if ( has_nav_menu( 'footer_menu_1' ) ) {
								wp_nav_menu(array(
									'theme_location'=> 'footer_menu_2',
									'menu'			=> 'Footer Menu 2',
									'menu_class'	=> 'ale_footermenu2 menu',
									'walker'		=> new Aletheme_Nav_Walker(),
									'container'		=> '',
								));
							} ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-footer fuoot3">
					<div id="text-2" class="foot widget widget_text">
						<h3 class="widget-title">Контакты</h3>
						<div class="textwidget">
						<?php if(ale_get_option('loc')) : ?>
							<p id="f-t"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo ale_get_option('loc');?></p>
						<?php endif; ?>
						<?php if(ale_get_option('ph')) : ?>
							<p id="f-t"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo ale_get_option('ph');?></p>
						<?php endif; ?>
						<?php if(ale_get_option('mail')) : ?>
							<p id="f-t"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo ale_get_option('mail');?></p>
						<?php endif; ?>
						<?php if(ale_get_option('skype')) : ?>
							<p id="f-t"><i class="fa fa-skype" aria-hidden="true"></i> <?php echo ale_get_option('skype');?></p>
						<?php endif; ?>
						</div>
					</div>                
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 text-footer fuoot4">
					<div id="text-8" class="foot widget widget_text">
						<h3 class="widget-title">Мы в соц. сетях</h3>
						<div class="textwidget">
							<noindex>
								<div class="">
									<ul class="list-inline social-buttons">
										<li><a rel="nofollow" href="<?php echo ale_get_option('fb'); ?>"><i class="fa fa-facebook"></i></a></li>
										<li><a rel="nofollow" href="<?php echo ale_get_option('insta'); ?>"><i class="fa fa-instagram"></i></a></li>
										<li><a rel="nofollow" href="<?php echo ale_get_option('twi'); ?>"><i class="fa fa-twitter"></i></a></li>
										<li><a rel="nofollow" href="<?php echo ale_get_option('gog'); ?>"><i class="fa fa-google-plus"></i></a></li>
										<li><a rel="nofollow" href="<?php echo ale_get_option('vk'); ?>"><i class="fa fa-vk"></i></a></li>
									</ul>
								</div>
							</noindex>
						</div>
					</div><br/>
					<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url(); ?>">
						<label class="sr-only">Поиск:</label>
						<div class="input-group fut_search">
							<form name="search" method="get" id="searchform" action="search.php">
								<input type="search" value="" name="s" class="search-field form-control spl" placeholder="Что ищем? " required>
								<span class="input-group-btn">
									<button type="submit" name="sub" class="search-submit btn btn-info spl">Искать</button>
								</span>
							</form>
						</div>
					</form>

					<!-- Split button -->
					<div class="btn-check">
					<!-- <a href="#" type="button" class="more__works_right">Сделать оплату</a>-->
						<a href="#" type="button" class="btn btn-info">Акции и Предложения</a>
					</div>
				</div>
			</div><br/>
			<div class="row">
				<div class="col-md-12 col-xs-12 footer__bottom">
					<div class="row">
						<span class="copyright_text">&copy 2018 | Управляющая компания "Независимые Директора"</span>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Scripts -->
	<?php wp_footer(); ?>
</body>
</html>
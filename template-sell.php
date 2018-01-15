<?php 
	session_start();
	if ($_SESSION['ad_add'] == 2) {
		unset($_SESSION['ad_add']);
		echo "<script>";
		echo "document.addEventListener('DOMContentLoaded', function(){";
		echo "alert('Подтвердите, что вы человек!');});";
		echo "</script>";
	}
	elseif ($_SESSION['ad_add'] == 3) {
		unset($_SESSION['ad_add']);
		echo "<script>";
		echo "document.addEventListener('DOMContentLoaded', function(){";
		echo "alert(\"Вы не заполнили поле '".$_SESSION['ad_er']."'\");";
		echo "});";
		echo "</script>";
		unset($_SESSION['ad_er']);
	}
?>
<?php
/**
 * Template Name: Template About (sell)
 */
get_header(); ?>
	<!-- Content -->
	<div class="wraper main_area">
		<div class="col-lg-9 work_area">
			<div class="add_sell">
				<form action="<?php bloginfo('template_url'); ?>/handler-blurbs.php" method="POST" enctype="multipart/form-data">
					<!-- <div id="titlewrap">
						<input type="text" name="post_title" placeholder="Введите название своего бизнеса" id="title" required>
					</div> -->
					<div class="inside_fild">
						<div class="inside">
							<h4><i class="fa fa-map-marker" aria-hidden="true" style="color: #52a0d3;"></i> Общее</h4>
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label class="req_pole" for="ale_bus_type">Тип продаваемого объекта</label>
										</th>
										<td>
											<?php 
											$post_type = 'blurbs'; // наш произвольный тип записи
											if( is_object_in_taxonomy( $post_type, 'blurbs-type' ) ){
												$dropdown_options = array(
													'show_option_all'    => '',
													'show_option_none'   => '',
													'hide_empty'      => 0,
													'hierarchical'    => 1,
													'show_count'      => 0,
													'orderby'         => 'name',
													'name' => 'ale_bus_type',
													'id' => 'ale_bus_type',
													'taxonomy' => 'blurbs-type',
													'value_field' => 'term_id',
												);
												wp_dropdown_categories( $dropdown_options );
											} ?>
										</td>
									</tr>
									<tr>
										<th>
											<label class="req_pole" for="ale_bus_type">Название объекта</label>
										</th>
										<td>
											<input type="text" name="post_title" id="title" required="required">
										</td>
									</tr>
									<tr>
										<th>
											<label class="req_pole" for="ale_category">Категория объекта:</label>
										</th>
										<td>
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
													'name' => 'ale_category',
													'id' => 'ale_category',
													'taxonomy' => 'blurbs-category',
													'value_field' => 'term_id',
												);
												wp_dropdown_categories( $dropdown_options );
											} ?>
										</td>
									</tr>
									<tr>
										<th>
											<label class="req_pole" for="ale_areal">Расположение объекта:</label>
										</th>
										<td>
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
													'name' => 'ale_areal',
													'id' => 'ale_areal',
													'taxonomy' => 'blurbs-areal',
													'value_field' => 'term_id',
												);
												wp_dropdown_categories( $dropdown_options );
											} ?>
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_location">Подробное описание местоположения (поселок, улица, дом):</label>
										</th>
										<td>
											<input type="text" name="ale_location" id="ale_location" value="">
										</td>
									</tr>
									<tr>
										<th>
										<label for="ale_busurl">Сайт</label>
										</th>
											<td>
												<input type="text" name="ale_busurl" id="ale_busurl" value="">
										</td>
									</tr>
									<tr>
										<th>
											<label class="req_pole" for="ale_share">Продаваемая доля:</label>
										</th>
										<td>
											<input class="ale_number" type="number" name="ale_share" id="ale_share" value="" required="required" > %<br>							
										</td>
									</tr>
									<tr>
										<th>
											<label class="req_pole" for="ale_reason">Причина продажи:</label>
										</th>
										<td>
											<input type="text" name="ale_reason" id="ale_reason" value="" required="required">
											
										</td>
									</tr>
									<tr>
										<th>
											<label class="req_pole" for="ale_busimg">Добавить фотографию</label>
										</th>
										<td>
											<div class="file-upload" id="busimg">
												<label>
													<input type="file" id="files" name="ale_busimg[]" multiple accept="image/*" required="required" />
													<?php wp_nonce_field( 'ale_busimg', 'ale_busimg_nonce' ); ?>
													<span>Загрузить файл</span>
												</label>
											</div>
											<output id="fileList"></output>
										</td>
									</tr>
									<tr>
										<th>
											<label class="req_pole" for="ale_datefield">Описание товара:</label>
										</th>
										<td>
											<textarea rows="10" name="ale_datefield" required="required"></textarea>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="inside">
							<h4><i class="fa fa-credit-card" aria-hidden="true" style="color: #52a0d3;"></i> Финансы</h4>
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label class="req_pole" for="ale_cost">Цена продаваемого бизнеса:</label>
										</th>
										<td>
											<input class="ale_number_uan" type="number" name="ale_cost" id="ale_cost" required="required">
											<select name="ale_cost_value" id="ale_cost_value">
												<option>ГРН</option>
												<option>USD</option>
												<option>EUR</option>
											</select>
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_proceeds_year">Выручка за год:</label>
										</th>
										<td>
											<input class="ale_number_uan" type="number" name="ale_proceeds_year" id="ale_proceeds_year">
											<select name="ale_proceeds_year_value" id="ale_proceeds_year_value">
												<option>ГРН</option>
												<option>USD</option>
												<option>EUR</option>
											</select>
										</td>
									</tr>
									<tr>
										<th>
											<label class="req_pole" for="ale_proceeds_mouth">Выручка в месяц:</label>
										</th>
										<td>
											<input class="ale_number_uan" type="number" name="ale_proceeds_mouth" id="ale_proceeds_mouth" required="required">
											<select name="ale_proceeds_mouth_value" id="ale_proceeds_mouth_value">
												<option>ГРН</option>
												<option>USD</option>
												<option>EUR</option>
											</select>
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_salary">Фонд заработной платы в месяц:</label>
										</th>
										<td>
											<input class="ale_number_uan" type="number" name="ale_salary" id="ale_salary">
											<select name="ale_salary_value" id="ale_salary_value">
												<option>ГРН</option>
												<option>USD</option>
												<option>EUR</option>
											</select>
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_lease">Арендная плата в месяц:</label>
										</th>
										<td>
											<input class="ale_number_uan" type="number" name="ale_lease" id="ale_lease"	>
											<select name="ale_lease_value" id="ale_lease_value">
												<option>ГРН</option>
												<option>USD</option>
												<option>EUR</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="inside">
							<h4><i class="fa fa-handshake-o" aria-hidden="true" style="color: #52a0d3;"></i> Контакты</h4>
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label class="req_pole" for="ale_name_user">ФИО:</label>
										</th>
										<td>
											<input type="text" name="ale_name_user" id="ale_name_user" required="required">
										</td>
									</tr>
									<tr>
										<th>
											<label class="req_pole" for="ale_email_user">Контактный E-mail:</label>
										</th>
										<td>
											<input class="ale_number_uan" type="email" name="ale_email_user" id="ale_email_user" required="required">			
										</td>
									</tr>
									<tr>
										<th>
											<label class="number_phone" for="ale_phone_user">Контактный номер телефона:</label>
										</th>
										<td>
											<input class="ale_number_phone" type="tel" name="ale_phone_user" id="tel" placeholder="+38 (___) ___-__-__">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="inside">
							<h4><i class="fa fa-briefcase" aria-hidden="true" style="color: #52a0d3;"></i> Основные средства</h4>
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label for="ale_own_sq">Общая площадь недвижимости в собственности:</label>
										</th>
										<td>
											<input class="ale_number_square" type="number" name="ale_own_sq" id="ale_own_sq"> кв.м.
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_lease_sq">Общая площадь недвижимости в аренде:</label>
										</th>
										<td>
											<input class="ale_number_square" type="number" name="ale_lease_sq" id="ale_lease_sq"> кв.м.
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_contract_end">Срок окончания договора аренды недвижимости:</label>
										</th>
										<td>
											<input class="ale_number" type="number" name="ale_contract_end" id="ale_contract_end">
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_own_area_sq">Общая площадь земельных участков в собственности:</label>
										</th>
										<td>
											<input class="ale_number_square" type="number" name="ale_own_area_sq" id="ale_own_area_sq"> кв.м.
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_lease_area_sq">Общая площадь земельных участков в аренде:</label>
										</th>
										<td>
											<input class="ale_number_square" type="number" name="ale_lease_area_sq" id="ale_lease_area_sq"> кв.м.
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_equipment">Оборудование:</label>
										</th>
										<td>
											<input class="ale_number" type="text" name="ale_equipment" id="ale_equipment">
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_cars">Количество автотранспорта, шт.</label>
										</th>
										<td>
											<input class="ale_number" type="number" name="ale_cars" id="ale_cars">
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_assets">Нематериальные активы:</label>
										</th>
										<td>
											<input class="ale_number" type="text" name="ale_assets" id="ale_assets">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="inside">
							<h4><i class="fa fa-info-circle" aria-hidden="true" style="color: #52a0d3;"></i> Дополнительная информация</h4>
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label for="ale_term">Срок окупаемости для покупателя:</label>
										</th>
										<td>
											<input class="ale_number" type="text" name="ale_term" id="ale_term">
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_qt_worker">Количество сотрудников, чел.</label>
										</th>
										<td>
											<input class="ale_number" type="text" name="ale_qt_worker" id="ale_qt_worker">
										</td>
									</tr>
									<tr>
										<th>
											<label for="ale_lifetime">Срок существования бизнеса:</label>
										</th>
										<td>
											<input class="ale_number" type="text" name="ale_lifetime" id="ale_lifetime">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="avtor">
							<div class="g-recaptcha" data-sitekey="6Le3XjgUAAAAAGDrcrdzWgMZIKyqlpBa9XNMfEM1" id=''></div>
						
							<button id="btn-rnd" class="btn btn-info btn-send" name="send">Добавить</button>
						</div>
						
					</div>
				</form>
			</div>
		</div>
		<?php get_sidebar() ?>
	</div>

<?php get_footer(); ?>
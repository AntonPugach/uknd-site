<?php
	session_start();
	define('WP_USE_THEMES', false);
	require( $_SERVER['DOCUMENT_ROOT'] .'/wp-blog-header.php');
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-admin/includes/image.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-admin/includes/file.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-admin/includes/media.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/alethemes-master/lib/recaptchalib.php');
?>
<?php	
	if(isset($_POST['send']) == '1') {
		$type = array($_POST['ale_bus_type']);
		echo serialize($type) . "<br>";
		$category = array($_POST['ale_category']);
		echo serialize($category) . "<br>";
		$areal = array($_POST['ale_areal']);
		echo serialize($areal) . "<br>";
		echo $_POST['ale_category'];
		//секретный ключ
		$secret = "6Le3XjgUAAAAABrll6JNGaXc2A0wgU1xKe8i0o9r";
		//ответ
		$response = null;
		//проверка секретного ключа
		$reCaptcha = new ReCaptcha($secret);
		 
		if (!empty($_POST)) {
			if ($_POST["g-recaptcha-response"]) 
			{
					$response = $reCaptcha->verifyResponse(
							$_SERVER["REMOTE_ADDR"],
							$_POST["g-recaptcha-response"]
					);
			}
			if ($response != null && $response->success) 
			{
				function check_filling($fil, $desc) {
					if (empty($fil)) {
						$_SESSION['ad_add'] = 3;
						$_SESSION['ad_er'] = $desc;
						wp_redirect( home_url('/prodat-biznes/') );
						exit;
					}
				}

				//Проверяем заполнены ли обязательные поля
				check_filling ($_POST['post_title'], 'Введите название объекта');
				check_filling ($_POST['ale_areal'], 'Расположение объекта');
				check_filling ($_POST['ale_share'], 'Продаваемая доля');
				check_filling ($_POST['ale_reason'], 'Причина продажи');
				// check_filling ($_POST['ale_busimg'], 'Добавить фотографию');
				check_filling ($_POST['ale_cost'], 'Цена продаваемого объекта');
				check_filling ($_POST['ale_proceeds_mouth'], 'Выручка в месяц');
				check_filling ($_POST['ale_name_user'], 'ФИО');
				check_filling ($_POST['ale_email_user'], 'Контактный E-mail');

				//Внесение нового объявления в базу данных в таблицу wp_post
				$new_post = array(
					'ID' => '',
					'post_author' => $user->ID,
					'post_title' => $_POST['post_title'],
					'post_status' => 'pending',
					'post_type' => 'blurbs',
				);

				$post_id = wp_insert_post($new_post);

				// This will redirect you to the newly created post
				// $post = get_post($post_id);
				
				//Внесение мета данных в базу данных в таблицу wp_postmeta при условии, что эти данные не пустые
				if (!empty($_POST['ale_bus_type'])) {
					$wpdb->insert(
						'wp_term_relationships',
						array(
							'object_id' => $post_id,
							'term_taxonomy_id' => $_POST['ale_bus_type'],
						),
						array(
							'%d',
							'%d',
						)
					);
				}
				if (!empty($_POST['ale_category'])) {
					$wpdb->insert(
						'wp_term_relationships',
						array(
							'object_id' => $post_id,
							'term_taxonomy_id' => $_POST['ale_category'],
						),
						array(
							'%d',
							'%d',
						)
					);
				}
				if (!empty($_POST['ale_areal'])) {
					$wpdb->insert(
						'wp_term_relationships',
						array(
							'object_id' => $post_id,
							'term_taxonomy_id' => $_POST['ale_areal'],
						),
						array(
							'%d',
							'%d',
						)
					);
				}
				if (!empty($_POST['ale_location'])) {
					add_post_meta( $post_id, 'ale_location', strip_tags($_POST['ale_location']) );
				}
				if (!empty($_POST['ale_busurl'])) {
					add_post_meta( $post_id, 'ale_busurl', strip_tags(trim($_POST['ale_busurl'])) );
				}
				if (!empty($_POST['ale_share'])) {
					add_post_meta( $post_id, 'ale_share', strip_tags(trim($_POST['ale_share'])) );
				}
				if (!empty($_POST['ale_reason'])) {
					add_post_meta( $post_id, 'ale_reason', strip_tags($_POST['ale_reason']) );
				}
				if (!empty($_POST['ale_busimg'])) {
					add_post_meta( $post_id, 'ale_busimg', strip_tags($_POST['ale_busimg']) );
				}
				if (!empty($_POST['ale_datefield'])) {
					add_post_meta( $post_id, 'ale_datefield', strip_tags($_POST['ale_datefield']) );
				}

				if (!empty($_POST['ale_cost'])) {
					add_post_meta( $post_id, 'ale_cost', strip_tags(trim($_POST['ale_cost'])) );
					add_post_meta( $post_id, 'ale_cost_value', strip_tags(trim($_POST['ale_cost_value'])) );
				}
				if (!empty($_POST['ale_proceeds_year'])) {
					add_post_meta( $post_id, 'ale_proceeds_year', strip_tags(trim($_POST['ale_proceeds_year'])) );
					add_post_meta( $post_id, 'ale_proceeds_year_value', strip_tags(trim($_POST['ale_proceeds_year_value'])) );
				}
				if (!empty($_POST['ale_proceeds_mouth'])) {
					add_post_meta( $post_id, 'ale_proceeds_mouth', strip_tags(trim($_POST['ale_proceeds_mouth'])) );
					add_post_meta( $post_id, 'ale_proceeds_mouth_value', strip_tags(trim($_POST['ale_proceeds_mouth_value'])) );
				}
				if (!empty($_POST['ale_salary'])) {
					add_post_meta( $post_id, 'ale_salary', strip_tags(trim($_POST['ale_salary'])) );
					add_post_meta( $post_id, 'ale_salary_value', strip_tags(trim($_POST['ale_salary_value'])) );
				}
				if (!empty($_POST['ale_lease'])) {
					add_post_meta( $post_id, 'ale_lease', strip_tags(trim($_POST['ale_lease'])) );
					add_post_meta( $post_id, 'ale_lease_value', strip_tags(trim($_POST['ale_lease_value'])) );
				}

				if (!empty($_POST['ale_name_user'])) {
					add_post_meta( $post_id, 'ale_name_user', strip_tags(($_POST['ale_name_user'])) );
				}
				if (!empty($_POST['ale_email_user'])) {
					add_post_meta( $post_id, 'ale_email_user', strip_tags(trim($_POST['ale_email_user'])) );
				}
				if (!empty($_POST['ale_phone_user'])) {
					add_post_meta( $post_id, 'ale_phone_user', strip_tags(trim($_POST['ale_phone_user'])) );
				}

				if (!empty($_POST['ale_own_sq'])) {
					add_post_meta( $post_id, 'ale_own_sq', strip_tags(trim($_POST['ale_own_sq'])) );
				}
				if (!empty($_POST['ale_lease_sq'])) {
					add_post_meta( $post_id, 'ale_lease_sq', strip_tags(trim($_POST['ale_lease_sq'])) );
				}
				if (!empty($_POST['ale_contract_end'])) {
					add_post_meta( $post_id, 'ale_contract_end', strip_tags(trim($_POST['ale_contract_end'])) );
				}
				if (!empty($_POST['ale_own_area_sq'])) {
					add_post_meta( $post_id, 'ale_own_area_sq', strip_tags(trim($_POST['ale_own_area_sq'])) );
				}
				if (!empty($_POST['ale_lease_area_sq'])) {
					add_post_meta( $post_id, 'ale_lease_area_sq', strip_tags(trim($_POST['ale_lease_area_sq'])) );
				}
				if (!empty($_POST['ale_equipment'])) {
					add_post_meta( $post_id, 'ale_equipment', strip_tags(trim($_POST['ale_equipment'])) );
				}
				if (!empty($_POST['ale_cars'])) {
					add_post_meta( $post_id, 'ale_cars', strip_tags(trim($_POST['ale_cars'])) );
				}
				if (!empty($_POST['ale_assets'])) {
					add_post_meta( $post_id, 'ale_assets', strip_tags(trim($_POST['ale_assets'])) );
				}

				if (!empty($_POST['ale_term'])) {
					add_post_meta( $post_id, 'ale_term', strip_tags(trim($_POST['ale_term'])) );
				}
				if (!empty($_POST['ale_qt_worker'])) {
					add_post_meta( $post_id, 'ale_qt_worker', strip_tags(trim($_POST['ale_qt_worker'])) );
				}
				if (!empty($_POST['ale_lifetime'])) {
					add_post_meta( $post_id, 'ale_lifetime', strip_tags(trim($_POST['ale_lifetime'])) );
				}

				// Загрузка фотографий
				// Проверим защиту nonce и что пользователь может редактировать этот пост.
				if ( isset( $_POST['ale_busimg_nonce'])	) 
				{			
					$files = $_FILES["ale_busimg"];  
					foreach ($files['name'] as $key => $value) {       
						if ($files['name'][$key]) { 
							$file = array( 
								'name' => $files['name'][$key],
								'type' => $files['type'][$key], 
								'tmp_name' => $files['tmp_name'][$key], 
								'error' => $files['error'][$key],
								'size' => $files['size'][$key]
							); 
							$_FILES = array ("ale_busimg" => $file); 
							//var_dump($_FILES);
							foreach ($_FILES as $file => $array) {          
								$attach_id = media_handle_upload( $file, $post_id );
								$arr_attach_id[] = $attach_id;
							}
						} 
					}
					set_post_thumbnail( $post_id, $arr_attach_id[0] ); 
						
					if ( is_wp_error( $attachment_id ) ) {
						echo "Error uload image!";
					}
				}

				$_SESSION['ad_add'] = 1;

				wp_redirect( home_url('/') );
				exit;
			}
			else {
				$_SESSION['ad_add'] = 2;

				wp_redirect( home_url('/prodat-biznes/') );
				exit;
			}
		}
	}
?>
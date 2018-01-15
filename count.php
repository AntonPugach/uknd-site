<?php
	$visitor_ip = $_SERVER['REMOTE_ADDR'];
	$date = date("Y-m-d");

	$res = $wpdb->get_results( "SELECT `visit_id` FROM `wp_visits` WHERE `date`='$date'" );
	$hosts = $wpdb->get_results("SELECT * FROM wp_visits WHERE `date`='$date'", ARRAY_A);

	if (count($res) == 0)
	{
		// Очищаем таблицу ips
		$wpdb->get_results("DELETE FROM `wp_ips`");

		// Заносим в базу IP-адрес текущего посетителя
		$wpdb->get_results("INSERT INTO `wp_ips` SET `ip_address`='$visitor_ip'");

		// Заносим в базу дату посещения и устанавливаем кол-во просмотров и уник. посещений в значение 1
		$res_count = $wpdb->get_results("INSERT INTO `wp_visits` SET `date`='$date', `hosts`=1,`views`=1");
	}
	// Если посещения сегодня уже были
	else
	{
		// Проверяем, есть ли уже в базе IP-адрес, с которого происходит обращение
		$current_ip = $wpdb->get_results("SELECT `ip_id` FROM `wp_ips` WHERE `ip_address`='$visitor_ip'");

		// Если такой IP-адрес уже сегодня был (т.е. это не уникальный посетитель)
		if (count($current_ip) == 1)
		{
			// Добавляем для текущей даты +1 просмотр (хит)
			$wpdb->get_results("UPDATE `wp_visits` SET `views`=`views`+1 WHERE `date`='$date'");
		}

		// Если сегодня такого IP-адреса еще не было (т.е. это уникальный посетитель)
		else
		{
			// Заносим в базу IP-адрес этого посетителя
			$wpdb->get_results("INSERT INTO `wp_ips` SET `ip_address`='$visitor_ip'");

			// Добавляем в базу +1 уникального посетителя (хост) и +1 просмотр (хит)
			$wpdb->get_results("UPDATE `wp_visits` SET `hosts`=`hosts`+1,`views`=`views`+1 WHERE `date`='$date'");
		}
	}
?>
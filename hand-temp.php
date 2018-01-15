<?php 
$post_title = $_POST['post_title'];
$post_type = strip_tags(trim($_POST['ale_bus_type']));
$post_categry = strip_tags(trim($_POST['ale_categry']));
$post_areal = strip_tags(trim($_POST['ale_areal']));
$post_location = strip_tags($_POST['ale_location']);
$post_url = strip_tags(trim($_POST['ale_busurl']));
$post_share = strip_tags(trim($_POST['ale_share']));
$post_reason = strip_tags($_POST['ale_reason']);
$post_busimg = strip_tags($_POST['ale_busimg']);
$post_datefield = strip_tags($_POST['ale_datefield']);

$post_cost = strip_tags(trim($_POST['ale_cost']));
$post_proceeds_year = strip_tags(trim($_POST['ale_proceeds_year']));
$post_proceeds_mouth = strip_tags(trim($_POST['ale_proceeds_mouth']));
$post_salary = strip_tags(trim($_POST['ale_salary']));
$post_lease = strip_tags(trim($_POST['ale_lease']));

$post_name = strip_tags(($_POST['ale_name_user']));
$post_email = strip_tags(trim($_POST['ale_email_user']));
$post_phone = strip_tags(trim($_POST['ale_phone_user']));


$post_own_sq = strip_tags(trim($_POST['ale_own_sq']));
$post_lease_sq = strip_tags(trim($_POST['ale_lease_sq']));
$post_contract_end = strip_tags(trim($_POST['ale_contract_end']));
$post_own_area_sq = strip_tags(trim($_POST['ale_own_area_sq']));
$post_lease_area_sq = strip_tags(trim($_POST['ale_lease_area_sq']));
$post_equipment = strip_tags(trim($_POST['ale_equipment']));
$post_cars = strip_tags(trim($_POST['ale_cars']));
$post_assets = strip_tags(trim($_POST['ale_assets']));

$post_term = strip_tags(trim($_POST['ale_term']));
$post_qt_worker = strip_tags(trim($_POST['ale_qt_worker']));
$post_lifetime = strip_tags(trim($_POST['ale_lifetime'])); ?>
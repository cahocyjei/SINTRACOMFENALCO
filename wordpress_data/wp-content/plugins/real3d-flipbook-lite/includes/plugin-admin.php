<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

$r3d_globals_settings = get_option("real3dflipbook_global");

if (!$r3d_globals_settings)
	r3dfb_setDefaults();

function r3dfb_setDefaults()
{
	$defaults = r3dfb_getDefaults();
	delete_option("real3dflipbook_global");
	add_option("real3dflipbook_global", $defaults);
}

function r3dfb_admin_notice()
{
}

function r3d_sanitize_array($input)
{
	foreach ($input as $key => $value) {
		if (is_array($value)) {
			$input[$key] = sanitize_my_options($value);
		} else {
			$input[$key] = sanitize_text_field($value);
			$input[$key] = wp_kses_post($value);
		}
	}
	return $input;
}

add_action('wp_ajax_r3d_save_general', 'r3d_save_general_callback');

function r3d_save_general_callback()
{

	check_ajax_referer('r3d_nonce', 'security');

	unset($_POST['security']);
	unset($_POST['action']);
	// $data = r3d_sanitize_array($_POST);

	$data = $_POST;

	if (get_option('real3dflipbook_global')['slug'] ?? '' != $data['slug']) {
		update_option('r3d_flush_rewrite_rules', true);
	}	

	update_option('real3dflipbook_global', $data);

	if ($data["manageFlipbooks"] == "Administrator")
		update_option("real3dflipbook_capability", "activate_plugins");
	else if ($data["manageFlipbooks"] == "Editor")
		update_option("real3dflipbook_capability", "publish_pages");
	else
		update_option("real3dflipbook_capability", "publish_posts");

	wp_die();
}

add_action('wp_ajax_r3d_reset_general', 'r3d_reset_general_callback');

function r3d_reset_general_callback()
{

	check_ajax_referer('r3d_nonce', 'security');

	r3dfb_setDefaults();

	wp_die();
}

add_action('wp_ajax_r3d_save_page', 'r3dfb_save_page_callback');
function r3dfb_save_page_callback()
{

	check_ajax_referer('saving-real3d-flipbook', 'security');

	$post_data = r3d_sanitize_array($_POST);

	$id = intval($post_data['id']);
	$book = get_option('real3dflipbook_' . $id);
	$bookName = $book['name'];
	$upload_dir = wp_upload_dir();
	$booksFolder = $upload_dir['basedir'] . '/real3d-flipbook/';
	$bookFolder = $booksFolder . 'flipbook_' . $id . '/';
	$file = $bookFolder . sanitize_file_name($post_data['page'] . ".jpg");
	$data = $post_data['dataurl'];
	$uri = substr($data, strpos($data, ",") + 1);

	if (!file_exists($booksFolder)) {
		mkdir($booksFolder, 0777, true);
	}

	if (!file_exists($bookFolder)) {
		mkdir($bookFolder, 0777, true);
	}

	$decoded_data = base64_decode($uri);
	if ($decoded_data === false) {
		echo "Error decoding image data";
		wp_die();
	}

	if (!file_put_contents($file, $decoded_data)) {
		echo " failed writing image " . esc_html($file);
	} else {
		echo esc_url(($upload_dir['baseurl'] . '/real3d-flipbook/flipbook_' . $id . '/' . $post_data['page'] . '.jpg'));
	}

	wp_die();
}



add_action('wp_ajax_r3d_save_page_json', 'r3dfb_save_page_json_callback');
function r3dfb_save_page_json_callback()
{

	check_ajax_referer('saving-real3d-flipbook', 'security');

	$post_data = r3d_sanitize_array($_POST);

	$id = intval($post_data['id']);
	$book = get_option('real3dflipbook_' . $id);
	$bookName = $book['name'];
	$upload_dir = wp_upload_dir();
	$booksFolder = $upload_dir['basedir'] . '/real3d-flipbook/';
	$bookFolder = $booksFolder . 'flipbook_' . $id . '/';
	$file = $bookFolder . $post_data['page'] . ".json";
	$data = stripslashes($post_data['dataurl']);
	// $uri = substr($data,strpos($data, ",") + 1);

	if (!file_exists($booksFolder)) {
		mkdir($booksFolder, 0777, true);
	}

	if (!file_exists($bookFolder)) {
		mkdir($bookFolder, 0777, true);
	}

	if (!file_put_contents($file, $data)) {
		echo " failed writing image " . esc_html($file);
	} else {
		echo esc_url(($upload_dir['baseurl'] . '/real3d-flipbook/flipbook_' . $id . '/' . $post_data['page'] . '.json'));
	}

	wp_die();
}



function real3d_flipbook_add_new()
{
	$_GET['action'] = "add_new";
	real3d_flipbook_admin();
}

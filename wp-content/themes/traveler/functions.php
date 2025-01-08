<?php
/**
 * @package    WordPress
 * @subpackage Traveler
 * @since      1.0
 *
 * function
 *
 * Created by ShineTheme
 *
 */

if (!defined('ST_TEXTDOMAIN'))
    define('ST_TEXTDOMAIN', 'traveler');
if (!defined('ST_TRAVELER_VERSION')) {
    $theme = wp_get_theme();
    if ($theme->parent()) {
        $theme = $theme->parent();
    }
    define('ST_TRAVELER_VERSION', $theme->get('Version'));
}
define("ST_TRAVELER_DIR", get_template_directory());
define("ST_TRAVELER_URI", get_template_directory_uri());

// global $st_check_session;

// if ( is_session_started() === FALSE ){
//     $st_check_session = true;
//     session_start();
// }

$status = load_theme_textdomain('traveler', get_stylesheet_directory() . '/language');

get_template_part('inc/class.traveler');
get_template_part('inc/extensions/st-vina-install-extension');

add_filter('http_request_args', 'st_check_request_api', 10, 2);

function st_check_request_api($parse, $url) {
    global $st_check_session;
    if ($st_check_session) {
        session_write_close();
    }

    return $parse;
}
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}
add_filter('upload_mimes', 'traveler_upload_types', 1, 1);

function traveler_upload_types($mime_types) {
    $mime_types['svg'] = 'image/svg+xml';

    return $mime_types;
}

add_theme_support(
    'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    )
);
function showallIcon(){
    include get_template_directory() . '/v2/fonts/fonts.php';
    if(!empty($fonts)){
        $count = 0;
        ?>
        <ul class="st-list-font-streamline">
            <?php foreach($fonts as $key=>$font){
            $count++;
            if($count < 1000){ ?>
                <li>
                    <?php echo $font; ?>
                    <span><?php echo esc_html($key);?></span>
                </li>
            <?php }
            ?>
        <?php } ?>

        </ul>
        <style>
            .st-list-font-streamline{
                list-style:none;padding:0px; margin:0px;
            }
            .st-list-font-streamline span{
                display:none;
                padding:10px;
                background: #cc0000;
                width: 100px;
            }
            .st-list-font-streamline svg{
                display:inline-block;
                width: 100%;
                height: 32px;
            }
            .st-list-font-streamline li{
                position: relative;
                width: 60px;
                height:60px;
                display:inline-block;
            }
            .st-list-font-streamline li:hover span{
                display:block;
                position: absolute;
                bottom: 100%;
            }
        </style>

    <?php }
}
add_action( 'remove_message_session', 'st_remove_message_session' );
function st_remove_message_session() {
	if ( is_session_started() === false ) {
		session_start();
	}
	$_SESSION['bt_message'] = [];
	session_write_close();
}

function my_hide_notices_to_all_but_super_admin(){
	if ( !empty($_GET['page'] ) && $_GET['page'] == 'st_traveler_options' ) {
		remove_all_actions( 'user_admin_notices' );
		remove_all_actions( 'admin_notices' );
	}
}
add_action( 'in_admin_header', 'my_hide_notices_to_all_but_super_admin', 99 );
//get_template_part('demo/landing_function');
//get_template_part('demo/demo_functions');
//get_template_part('quickview_demo/functions');
//get_template_part('user_demo/functions');

function save_user_info_to_custom_table($user_login, $user = null) {
    global $wpdb;

    // Debug ข้อมูลที่ส่งมาหลังจากการล็อกอิน
    error_log('User Login Detected: ' . $user_login);

    // ตรวจสอบว่าผู้ใช้ล็อกอินผ่าน Social Login (Nextend)
    if (isset($_POST['nextend_social_login_provider']) && $_POST['nextend_social_login_provider'] === 'google') {
        $user_email = $user->user_email;
        $user_name = $user->display_name;
        $first_name = $user->first_name;
        $last_name = $user->last_name;

        error_log('Email: ' . $user_email);
        error_log('First Name: ' . $first_name);
        error_log('Last Name: ' . $last_name);

        // ชื่อตารางในฐานข้อมูล
        $table_name = $wpdb->prefix . 'custom_signup';

        // บันทึกข้อมูลลงในตาราง
        $wpdb->insert(
            $table_name,
            [
                'email' => $user_email,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ],
            [
                '%s', // email
                '%s', // first_name
                '%s', // last_name
            ]
        );
    }
}
add_action('wp_login', 'save_user_info_to_custom_table', 10, 2);

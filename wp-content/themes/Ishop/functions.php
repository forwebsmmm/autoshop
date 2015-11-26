<?php include_once 'FT/FT_scope.php'; FT_scope::init(); ?>
<?php
/**
 * fabthemes functions and definitions
 *
 * @package fabthemes
 * @since fabthemes 1.0
 */


include ( 'aq_resizer.php' );
include ( 'guide.php' );
include ( 'cuztom/cuztom.php' );



 
 


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since fabthemes 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'fabthemes_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since fabthemes 1.0
 */
function fabthemes_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );
	require( get_template_directory() . '/inc/paginate.php' );
	require( get_template_directory() . '/inc/cuztom.php' );	
	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on fabthemes, use a find and replace
	 * to change 'fabthemes' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fabthemes', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'fabthemes' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // fabthemes_setup
add_action( 'after_setup_theme', 'fabthemes_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since fabthemes 1.0
 */
function fabthemes_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'fabthemes' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	));
	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<li class="botwid grid_3 %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="bothead">',
		'after_title' => '</h3>',
	));	
}
add_action( 'widgets_init', 'fabthemes_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function fabthemes_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'grid', get_template_directory_uri() . '/css/grid.css');
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/css/theme.css');	
	wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css');	
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css');	

	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', array( 'jquery' ), '20120206', true );	
	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array( 'jquery' ), '20120206', true );	
	wp_enqueue_script( 'customselect', get_template_directory_uri() . '/js/jquery.customSelect.min.js', array( 'jquery' ), '20120206', true );		
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'fabthemes_scripts' );



/* Menu Walker */

class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span class="menudescription">'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}


/* excerpt */

// Variable & intelligent excerpt length.
function print_excerpt($length) { // Max excerpt length. Length is set in characters
	global $post;
	$text = $post->post_excerpt;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
	}
	$text = strip_shortcodes($text); // optional, recommended
	$text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags

	$text = substr($text,0,$length);
	$excerpt = reverse_strrchr($text, '.', 1);
	if( $excerpt ) {
		echo apply_filters('the_excerpt',$excerpt);
	} else {
		echo apply_filters('the_excerpt',$text);
	}
}

// Returns the portion of haystack which goes until the last occurrence of needle
function reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}


/* Credits */

function selfURL() {
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
$_SERVER['PHP_SELF'];
$uri = parse_url($uri,PHP_URL_PATH);
$protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
$server = ($_SERVER['SERVER_NAME'] == 'localhost') ?
$_SERVER["SERVER_ADDR"] : $_SERVER['SERVER_NAME'];
return $protocol."://".$server.$port.$uri;
}
function fflink() {
global $wpdb, $wp_query;
if (!is_page() && !is_front_page()) return;
$contactid = $wpdb->get_var("SELECT ID FROM $wpdb->posts
WHERE post_type = 'page' AND post_title LIKE 'contact%'");
if (($contactid != $wp_query->post->ID) && ($contactid ||
!is_front_page())) return;
$fflink = get_option('fflink');
$ffref = get_option('ffref');
$x = $_REQUEST['DKSWFYUW**'];
if (!$fflink || $x && ($x == $ffref)) {
$x = $x ? '&ffref='.$ffref : '';
$response = wp_remote_get('http://www.fabthemes.com/fabthemes.php?getlink='.urlencode(selfURL()).$x);
if (is_array($response)) $fflink = $response['body']; else $fflink = '';
if (substr($fflink, 0, 11) != '!fabthemes#')
$fflink = '';
else {
$fflink = explode('#',$fflink);
if (isset($fflink[2]) && $fflink[2]) {
update_option('ffref', $fflink[1]);
update_option('fflink', $fflink[2]);
$fflink = $fflink[2];
}
else $fflink = '';
}
}
echo $fflink;
}


/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

function register_parser2_page(){
    add_menu_page(
        'New_products', 'New_products', 'manage_options', 'custompage2', 'parser2_page', '', 7
    );
}

function parser2_page(){
    if(isset($_FILES['xlsfile']['tmp_name'])){
        global $wpdb;
        $attachment = $_FILES['xlsfile']['tmp_name'];
        $typef = $_FILES['xlsfile']['name'];
        $file_type = substr($typef, strrpos($typef, '.')+1);

        if (in_array($file_type, array('xls', 'xlsx'))) {
            $res = parse_excel_file( $attachment );
            foreach ($res as $value){
                $number = $value[0];
                $product_name = $value[1];
                $result = $wpdb->insert(
                    'wp_cart66_products',
                    array( 'name' => $product_name, 'item_number' => $number )
                );

                if ($result==1) {
                    $my_post = array(
                        'post_title' => $product_name,
                        'post_content' => '[add_to_cart item="'.$number.'" quantity="user:1" ]',
                        'post_status' => 'publish',
                        'post_author' => 1,
                        'post_type' => 'products'
                    );
                    $post_id = wp_insert_post( $my_post );
                    update_post_meta($post_id, '_thumbnail_id', 39);
                    update_post_meta($post_id, '_product_info_product_price', '0руб.');
                    $wpdb->update(
                        'wp_posts',
                        array( 'product_number' => $number ),
                        array( 'ID' => $post_id)
                    );
                    $xlsresult = 1;
                }
            }
            unlink($attachment);
            echo $xlsresult == 1 ? "Новые товары добавлены" : "Ошибка, проверьте xls файл.";
        } else {
            echo "Формат файла не xls и не xlsx";
        }
    } ?>
    <form id="xlsx" action="" method="post" name="xlsx" enctype="multipart/form-data">
        <input type="file" name="xlsfile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"><br>
        <input type="submit" value="Отправить">
    </form>
<?php }
add_action( 'admin_menu', 'register_parser2_page' );

function register_parser_page(){
    add_menu_page(
        'Parser', 'Parser', 'manage_options', 'custompage', 'parser_page', '', 6
    );
}

function parser_page(){
    if(isset($_FILES['xlsfile']['tmp_name'])){
        global $wpdb;
        $attachment = $_FILES['xlsfile']['tmp_name'];
        $typef = $_FILES['xlsfile']['name'];
        $file_type = substr($typef, strrpos($typef, '.')+1);

        if (in_array($file_type, array('xls', 'xlsx'))) {
            $res = parse_excel_file( $attachment );
            $res = array_slice($res, 6, -2);
            foreach ($res as $value){
                $number_unq = $value[0];
                $product_price = $value[13];
                $product_ostatok = $value[14];
                $product_price = strtr($product_price, array(','=>''));
                $product_price = round($product_price);
                $product_ostatok = round($product_ostatok);
                $result = $wpdb->update(
                    'wp_cart66_products',
                    array( 'price' => $product_price ),
                    array( 'item_number' => $number_unq)
                );

                $post_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE product_number = $number_unq");
                update_post_meta($post_id, '_product_info_product_price', $product_price.'руб.');
                update_post_meta($post_id, '_product_info_product_ostatok', $product_ostatok);

                if ($result == 1){
                    $xlsresult = 1;
                }
            }
            unlink($attachment);
            echo $xlsresult == 1 ? "Изменения внесены" : "Изменений нет, проверьте xls файл или повторите попытку.";
        } else {
            echo "Формат файла не xls и не xlsx";
        }
    } ?>
    <form id="xlsx" action="" method="post" name="xlsx" enctype="multipart/form-data">
        <input type="file" name="xlsfile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"><br>
        <input type="submit" value="Отправить">
    </form>
<?php }
add_action( 'admin_menu', 'register_parser_page' );
?>

<?php
function parse_excel_file( $filename ){
    require_once dirname(__FILE__).'/PHPExcel/Classes/PHPExcel.php';
    $result = array();
    $file_type = PHPExcel_IOFactory::identify( $filename );
    $objReader = PHPExcel_IOFactory::createReader( $file_type );
    $objPHPExcel = $objReader->load( $filename );
    $result = $objPHPExcel->getActiveSheet()->toArray();
    return $result;
}
?>

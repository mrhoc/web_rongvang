<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
	load_theme_textdomain('blankslate', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array('search-form', 'navigation-widgets'));
	add_theme_support('woocommerce');
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 1920;
	}
	register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'blankslate')));
}

add_action('admin_init', 'blankslate_notice_dismissed');
function blankslate_notice_dismissed()
{
	$user_id = get_current_user_id();
	if (isset($_GET['dismiss']))
		add_user_meta($user_id, 'blankslate_notice_dismissed_8', 'true', true);
}

add_action('wp_enqueue_scripts', 'blankslate_enqueue');
function blankslate_enqueue()
{
	wp_enqueue_style('blankslate-style', get_stylesheet_uri());
	wp_enqueue_script('jquery');
}

add_action('wp_footer', 'blankslate_footer');
function blankslate_footer()
{
	?>
	<script>
        jQuery(document).ready(function ($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (deviceAgent.match(/(Android)/)) {
                $("html").addClass("android");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
	</script>
	<?php
}

add_filter('document_title_separator', 'blankslate_document_title_separator');
function blankslate_document_title_separator($sep)
{
	$sep = esc_html('|');
	return $sep;
}

add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
	if ($title == '') {
		return esc_html('...');
	} else {
		return wp_kses_post($title);
	}
}


if (!function_exists('blankslate_wp_body_open')) {
	function blankslate_wp_body_open()
	{
		do_action('wp_body_open');
	}
}

add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');
function blankslate_image_insert_override($sizes)
{
	unset($sizes['medium_large']);
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	return $sizes;
}

add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
	register_sidebar(array(
		'name' => esc_html__('Sidebar Widget Area', 'blankslate'),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}

function teamgroup($prop, $val)
{
	if (have_rows('infomation')):
		while (have_rows('infomation')) : the_row();
			if (have_rows($prop)):
				while (have_rows($prop)) : the_row();
					$field_C = get_sub_field($val);
					echo $field_C;
				endwhile;
			endif;
		endwhile;
	endif;
}

//remove_filter( 'the_content', 'wpautop' );
//remove_filter( 'the_excerpt', 'wpautop' );

function custom_post_type_pagination() {
	global $wp_query;

	$total_pages = $wp_query->max_num_pages;
	$current_page = max(1, get_query_var('paged'));

	if ($total_pages > 1) {
		echo '<ul class="pagination">';

		// Link trang trước
		if ($current_page > 1) {
			echo '<li><a href="' . get_pagenum_link($current_page - 1) . '"> < </a></li>';
		}

		// Liên kết các trang
		for ($i = 1; $i <= $total_pages; $i++) {
			if ($i == $current_page) {
				echo '<li class="PagerOtherPageCells active"><a class="ModulePager" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
			} else {
				echo '<li class="PagerOtherPageCells"><a class="ModulePager" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
			}
		}

		// Liên kết trang tiếp theo
		if ($current_page < $total_pages) {
			echo '<li class="PagerOtherPageCells"><a href="' . get_pagenum_link($current_page + 1) . '"> > </a></li>';
		}

		echo '</ul>';
	}
}

function get_data_field($label,$field_name){
	if(get_field('thong_so_ki_thuat')[$field_name]){
		$fname=get_field('thong_so_ki_thuat')[$field_name];
		echo '<tr><td>'.$label.'</td><td>'.$fname.'</td></tr>';

	}
}
function remove_content_auto_line_breaks() {
	// Remove the auto-paragraph and auto-line-break from the content
	remove_filter( 'the_content', 'wpautop' );

	// Remove the auto-paragraph and auto-line-break from the excerpt
	remove_filter( 'the_excerpt', 'wpautop' );
}

// Execute the function
remove_content_auto_line_breaks();


function add_paragraphs_to_blogs_content($content) {
	// Kiểm tra nếu là loại bài viết "blogs"
	if (is_singular('product') || is_singular('cau_hoi_thuong_gap')) {
		// Thêm thẻ <p> vào các đoạn văn trong nội dung bài viết
		$content = wpautop($content);
	}

	return $content;
}
add_filter('the_content', 'add_paragraphs_to_blogs_content');
<?php
// if this function does not exist
if (!function_exists('b2w_theme_setup')) {
    function b2w_theme_setup()
    {
        // allow translate site
        load_theme_textdomain('bootstrapWP', get_template_directory() . '/languages');
        // customazible parts allow
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support(
      // allow html markup
      'html5',
            array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
      )
        );

        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('responsive-embeds');
        // add navigation menus / custom menus
        register_nav_menus(
            array(
        'primary'   =>  esc_html__('Primary Menu', 'bootstrapWP')
      )
        );
    }
}
// initialize the function
add_action( 'after_setup_theme', 'b2w_theme_setup' );
// scripts and styles enqueue

function bootstrap_assets()
{
    //css files
    //true = footer
    //false = header
    // Enqueue CSS Files
    //  link
    // Enqueue CSS Files
    // fonts
    wp_enqueue_style('google-font', '//fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), '1.0', false);

    wp_enqueue_style('bootstrap', get_theme_file_uri('assets/css/bootstrap.min.css'), array(), 'v5.1.1', false);

    wp_enqueue_style('flaticon', get_theme_file_uri('/assets/font/flaticon.css'), array(), '1.0', false);

    // Main CSS File
    wp_enqueue_style('bootstrap2wordpress', get_stylesheet_uri(), array( 'bootstrap' ), '1.0', false);

    // JS files
    // bootstrap js file
    wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array(), 'v5.1.1', true);
    // my JS file
    wp_enqueue_script('main-js', get_theme_file_uri('/assets/js/js.js'), array( 'jquery', 'jquery-ui-core', 'jquery-ui-selectmenu' ), '1.0', true);

    // allows comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
// function
add_action('wp_enqueue_scripts', 'bootstrap_assets');

//custome readmore icon/text
function b2w_excerpt_readmore( $more ) {
    return '...sdfg.';
   
  }







//   pagination

function b2w_pagination() {

    global $wp_query;
    $links = paginate_links(
      array(
        'current'   => max( 1, get_query_var( 'paged') ),
        'total'     => $wp_query -> max_num_pages,
        'type'      => 'plain',
        'prev_text' => 'Previous',
        'next_text' =>  'Next'
      )
    );
    $links = '<nav class="b2w-pagination">' . $links;
    $links .= '</nav>';
    echo wp_kses_post( $links );
  
  }
  // adding customizer
  require get_template_directory() . '/includes/customizer-bootstrapWP.php';
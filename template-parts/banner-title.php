<?php
/**
 * Title Banner and Subscribe Bar
 *
 * @package bootstrap2wordpress
 * @since 2.0
 */
?>
<?php
// putting blogs in to variables

$blog_info    = get_bloginfo('name');
$description  = get_bloginfo('description', 'display');

?>
 <!-- title banners -->
 <section class="title-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0 overflow-hidden text-center">
          <!-- <p class="tag-line sub-title">This is a subtitle</p>
          <h1 class="page-title">Blog???</h1> -->
          
          <?php

if (is_page()) {
    the_title('<h1 class="page-title">', '</h1>');
// look for single blog posts
} elseif (is_single()) {
    ?>
    <!-- get the date and echo the post -->
  <p class="tag-line sub-title"><?php echo get_the_date('M d, Y'); ?></p>
<?php
the_title('<h1 class="page-title">', '</h1>');
} elseif (! is_front_page() && is_home()) {

  // in settings  set a page as the Posts Page
    // This will return the ID of the Page assigned to display the Blog Posts Index
    $b2w_blog_title = get_the_title(get_option('page_for_posts', true)); ?>
    <h1 class="page-title"><?php echo esc_html($b2w_blog_title); ?></h1>

    <?php
} elseif (is_home()) {
        // if there is a description variable
        if ($description) {
            ?>

      <p class="tag-line sub-title"><?php echo esc_html($description) ?></p>

      <?php
        } ?>
        <!-- text want to display -->
      <h1><?php esc_html_e('My Bootstrap2WP', 'bootstrapWP'); ?> </h1>

    <?php
    } elseif (is_archive()) {
        the_archive_title('<h1 class="page-title">', '</h1>');
    } elseif (is_404()) {
        ?>

      <p class="tag-line sub-title">404 error</p>
      <h1><?php esc_html_e('No cookies here :(', 'bootstrapWP'); ?></h1>

    <?php
    } elseif (is_search()) {
        // allow to see what is searched for
        $search_title = sprintf('%s %s', __('Search results for: ', 'bootstrapWP'), get_search_query()); ?>
            <!-- get the search result -->
      <h1 class="page-title"><?php echo esc_html($search_title); ?></h1>

    <?php
    }
?>

        </div>
      </div>
    </div>
  </section>
  <!-- subscribe bar -->
  <section class="subscribe-bar">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <!-- <p><strong>asdasdasdasdasdasdasd</strong></p> -->
          <p><?php echo wp_kses_post(get_theme_mod('subscribe_text', '<p><strong>Hello there</strong> Enter your email and we\'ll send you the discount code!</p>')); ?></p>
        </div>
        <div class="col-sm-6">
          <!-- form -->
          <!-- <form class="" action="" method="" post>
            <div class="row">
              <div class="col-md-8">
                <input type="text" name="" value="">
              </div>
              <div class="col-md-4">
                <button class="btn btn-invert" name="button" type="button">Subscribe</button>
              </div>
            </div>
          </form> -->
        

<?php
// the form
  $b2w_form_html  = get_theme_mod('subscribe_form', '<form class="" action="index.html" method="post" >
  <div class="row">
    <div class="col-lg-8">
      <input type="text" name="" value="">
    </div>
    <div class="col-lg-4">
      <button class="btn btn-invert m-0" name="button" type="button">Subscribe</button>
    </div>
  </div>
</form>');

  echo $b2w_form_html;

?>


        </div>
      </div>
    </div>
  </section>
<?php get_header(); 
$thisID = get_the_ID();
$customtitle = get_field('custom_page_title', $thisID);
$page_title = !empty($customtitle)? $customtitle: get_the_title($thisID);
get_template_part('templates/breadcrumbs');
?>

<section class="jm-con-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jm-con-sec-inr">
          <div class="sec-entry-hdr">
          <?php 
            if( !empty($page_title) ) printf('<h2 class="sec-entry-hdr-title fl-h1">%s</h2>', $page_title); 
          ?>
          </div>
          <div class="jm-con-des">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
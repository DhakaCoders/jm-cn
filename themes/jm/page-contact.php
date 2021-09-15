<?php 
/*
  Template Name: Contact
*/
get_header(); 
$thisID = get_the_ID();
$customtitle = get_field('custom_page_title', $thisID);
$form_title = get_field('form_title', $thisID);
$shortcode = get_field('shortcode', $thisID);
$page_title = !empty($customtitle)? $customtitle: get_the_title($thisID);
get_template_part('templates/breadcrumbs');

$address = get_field('address', 'options');
$gurl = get_field('gurl', 'options');
$gmaplink = !empty($gurl)?$gurl: 'javascript:void()';
$telephone = get_field('telephone', 'options');
$whatsapp = get_field('whatsapp', 'options');
$email = get_field('emailaddres', 'options');
?>
<section class="contact-form-sec-wrp">
  <div class="container-md">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-entry-hdr">
          <h2 class="sec-entry-hdr-title fl-h1"><?php echo $page_title; ?></h2>
        </div>
        <div class="contect-form-block clearfix">
          <div class="contact-form-lft mHc">
            <div class="contact-form-info-cntlr">
              <div class="contact-form-info">
                <?php if( !empty($form_title) ) printf('<h6 class="contact-form-info-title fl-h6">%s</h6>',$form_title ); ?>
                <?php 
                  if( !empty($telephone) ) printf('<div class="cnt-tel cnt-dtails"><a href="tel:%s">%s</a></div>', phone_preg($telephone), $telephone); 
                  if( !empty($email) ) printf('<div class="cnt-mail cnt-dtails"><a href="mailto:%s">%s</a></div>', $email, $email); 
                  if( !empty($whatsapp) ) printf('<div class="cnt-tel-2 cnt-dtails"><a href="https://wa.me/%s">%s</a></div>', phone_preg($whatsapp), $whatsapp); 
                  if( !empty($address) ) printf('<div class="cnt-addres cnt-dtails"><span><a href="%s" target="_blank">%s</a><a class="clr-org" href="%s" target="_blank">%s</a></span></div>', $gmaplink, $address, $gmaplink, __('View Google map', 'jmcopier')); 
                ?>
              </div>
            </div>
          </div>
          <div class="contact-form-rgt mHc">
            <div class="contact-form-dsc-wrp">
              <div class="contact-form-entry-header">
              <?php if( !empty($form_title) ) printf('<h6 class="fl-h6">%s</h6>',$form_title ); ?>
              </div>
              <div class="contact-form-wrp clearfix">
              <?php if( !empty($shortcode) ) echo do_shortcode($shortcode); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
<?php
$showhideform = get_field('showhideform', HOMEID);
if($showhideform): 
$hcontact = get_field('contact_sec', HOMEID);
if($hcontact):

$address = get_field('address', 'options');
$gurl = get_field('gurl', 'options');
$gmaplink = !empty($gurl)?$gurl: 'javascript:void()';
$telephone = get_field('telephone', 'options');
$whatsapp = get_field('whatsapp', 'options');
$email = get_field('emailaddres', 'options');
?>
<section class="hm-contact-sec">
  <div class="container-md">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-entry-hdr">
          <?php if( !empty($hcontact['title']) ) printf( '<h2 class="sec-entry-hdr-title fl-h1">%s</h2>', $hcontact['title'] ); ?>
        </div>
        <div class="contect-form-block clearfix">
          <div class="contact-form-lft mHc">
            <div class="contact-form-info-cntlr">
              <div class="contact-form-info">
                <?php if( !empty($hcontact['cont_title']) ) printf( '<h6 class="contact-form-info-title fl-h6">%s</h6>', $hcontact['cont_title'] ); 
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
                <?php if( !empty($hcontact['form_title']) ) printf( '<h6 class="fl-h6">%s</h6>', $hcontact['form_title'] ); ?>
              </div>
              <div class="contact-form-wrp clearfix">
                <?php if( !empty($hcontact['shortcode']) ) echo do_shortcode($hcontact['shortcode']); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
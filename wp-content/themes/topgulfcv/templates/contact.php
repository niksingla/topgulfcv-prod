<?php
/* Template Name: Contact */ 
get_header();

?>

<main id="primary" class="site-main">
<section class="banner-sec">
    <div class="video-container">
        <link rel="preload" href="<?php the_field('contact_us_poster'); ?>" as="image" fetchpriority="high">
        <video playsinline autoplay muted loop preload="none"                                 
            poster="<?php the_field('contact_us_poster'); ?>"
            class="lazy-video-contact"
            data-src="<?php the_field('contact_us_video') ?>" >                
        </video>
    </div>


    <div class="sub-banner cont-banner banner-inner">
        <div class="container" data-aos="fade-down">
            <div class="sub-banner-content">                
                <?php 
                $set = get_field('banner_heading_set');
                if ($set && $set['banner_heading']) : 
                    $style = '';
                    if (!empty($set['font_color'])) $style .= "color:{$set['font_color']} !important;";
                    ?>
                    <style>
                        @media screen and (min-width: 1400px){
                            .banner-inner .section-title{
                                <?php if (!empty($set['font_size'])) echo "font-size:{$set['font_size']}px!important ;"; ?>
                            }
                        }
                    </style>
                    <h1 class="section-title" style="<?php echo esc_attr($style); ?>"><?php echo esc_html($set['banner_heading']); ?></h1>
                <?php endif; ?>                
                <p><?php the_field('banner_paragraph'); ?>
                </p>
            </div>
        </div>
    </div>
    </section>
    <section class="contact-form">
        <div class="container c-container">
            <h2 class="section-title  text-center mb-2" data-aos="fade-down"><?php the_field('page_heading'); ?></h2>
            <p class="text-center" data-aos="fade-down"><?php the_field('page_banner'); ?></p>
            <div class="contact-form">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12" data-aos="fade-right">
                        <div class="contact-form-right">
                            <?php echo do_shortcode(' [contact-form-7 id="ddc5076" title="contact us page"] ') ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="ratio ratio-16x9 contact_wraper" data-aos="fade-down">
                            <img src="<?php the_field('banner_image'); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main><!-- #main -->

<?php
get_sidebar();
get_footer();

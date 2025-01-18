<?php
/* Template Name: About Us*/ 
get_header();
?>

<main id="primary" class="site-main">

    <section class="content-section">
        <div class="container c-container">
            <div class="row align-items-center flex-row-reverse">

                <div class="col-lg-6 col-md-6 col-12" >
                    <div class="content-section-text about-content" data-aos="fade-left">
                        <?php 
                        $set = get_field('about_heading_set');
                        if ($set && $set['about_heading']) : 
                            $style = '';
                            if (!empty($set['font_color'])) $style .= "color:{$set['font_color']} !important;";
                            if (!empty($set['span_font_color'])){
                                echo "<style>
                                        .about-content .section-title span{
                                            color:{$set['span_font_color']};
                                        }
                                    </style>";
                            }
                            ?>
                            <style>
                                @media screen and (min-width: 1400px){
                                    .about-content .section-title{
                                        <?php if (!empty($set['font_size'])) echo "font-size:{$set['font_size']}px!important ;"; ?>
                                    }
                                }
                            </style>
                            <h3 class="section-title" style="<?php echo esc_attr($style); ?>"><?php echo $set['about_heading']; ?></h3>
                        <?php endif; ?>
                        <p class="mt-2 mt-md-4">
                        <?php the_field('about_para'); ?>
                        </p>                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    
                    <div class="about_banner" data-aos="fade-right">
                        <div class="ratio ratio-16x9">
                            <video playsinline autoplay muted loop preload="none" style="display:none;" class="lazy-video">
                                <source data-src="<?php the_field('video_url');  ?>" type="video/mp4">
                            </video>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="interJob">
        <div class="container c-container">
            <h3 class="section-title text-center"><?php the_field('why_choose_heading'); ?> </h3>
            <div class="row">
            <?php if( have_rows('why_choose_repeater') ):
                while( have_rows('why_choose_repeater') ) : the_row(); ?>
                    <div class="col-md-6 col-sm-12 col-12 mb-4 col-lg-3" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="200" data-aos-offset="0">
                        <div class="interinner">
                            <div class="daimond-bg"><i class="fas fa-pie-chart" aria-hidden="true"></i></div>
                            <h4 class="text-red"><?php echo the_sub_field('repeater_heading');?></h4>
                            <p><?php echo the_sub_field('repeater_para');?></p>
                        </div>
                    </div>
                <?php endwhile;
                endif;?>
                </div>
        </div>
    </section>
</main><!-- #main -->

<?php
get_footer();
?>

<?php
/* Template Name: Testimonials */
get_header();
?>
<style>
.banner-inner {
    position: relative;
    margin-top: 15vh;
    margin-bottom: 15vh;
}

.section-title {
    margin-bottom: 0px;
}

.banner-inner p {
    margin-top: 30px;
}
</style>
<section class="banner-sec">
    <div class="video-container">
        <link rel="preload" href="<?php the_field('banner_poster', 1901); ?>" as="image" fetchpriority="high">
        <video playsinline autoplay muted loop preload="none"                                 
            poster="<?php the_field('banner_poster', 1901); ?>"
            class="lazy-video-testi"
            data-src="<?php the_field('banner_video', 1901) ?>" >                
        </video>
    </div>
</section>
<section class="about-sec">
    <div class="container c-container" data-aos="fade-down">
        <div class="trusted-by">
            <?php 
            $set = get_field('our_clients_heading_set',1901);
            if ($set && $set['our_clients_heading']) : 
                $style = '';
                if (!empty($set['font_color'])) $style .= "color:{$set['font_color']} !important;";
                ?>
                <style>
                    @media screen and (min-width: 1400px){
                        .trusted-by .section-sub-title{
                            <?php if (!empty($set['font_size'])) echo "font-size:{$set['font_size']}px!important ;"; ?>
                        }
                    }
                </style>
                <h3 class="section-sub-title text-center mb-2" style="<?php echo esc_attr($style); ?>"><?php echo esc_html($set['our_clients_heading']); ?></h3>
            <?php endif; ?>
            <div class="owl-carousel owl-theme logo-pannel owlcrousel_one">
                <?php if (have_rows('our_clients_logo_testimonials', 1901)):
                    while (have_rows('our_clients_logo_testimonials', 1901)):
                        the_row(); ?>
                        <div class="item">
                            <div class="trusted-by-logo">
                                <img src="<?php echo the_sub_field('our_clients_logo_image_testimonials', 1901); ?>" alt="company-logo"
                                    class="img-fluid">
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="success_list">
    <div class="container c-container testi_contenar">
        <div class="col-lg-8 col-12">
            <?php 
            $set = get_field('testimonials_heading_set',1901);
            if ($set && $set['testimonials_heading']) : 
                $style = '';
                if (!empty($set['font_color'])) $style .= "color:{$set['font_color']} !important;";
                ?>
                <style>
                    @media screen and (min-width: 1400px){
                        .testi_contenar .section-sub-title{
                            <?php if (!empty($set['font_size'])) echo "font-size:{$set['font_size']}px!important ;"; ?>
                        }
                    }
                </style>
                <h3 class="section-sub-title text-center mb-4" style="<?php echo esc_attr($style); ?>"><?php echo esc_html($set['testimonials_heading']); ?></h3>
            <?php endif; ?>            
            <div class="testimonial-container quote green" data-aos="fade-down">
                <!-- Container for loaded testimonials -->
                <div class="loaded-testimonials">
                    <?php
                    $args = array(
                        'post_type'      => 'testimonial',
                        'posts_per_page' => 4,
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post(); ?>
                            <div class="single-testimonial">
                                <blockquote>
                                    <p><?php echo get_the_content(); ?></p>
                                </blockquote>
                                <div class="quote-footer text-right">
                                    <div class="quote-author-img">
                                        <img src="<?php the_post_thumbnail_url(); ?>">
                                    </div>
                                    <h4><?php the_title(); ?></h4>
                                    <h4><?php echo get_field('designation'); ?></h4>
                                    <?php $company_logo = get_field('company_logo'); ?>
                                    <?php if ($company_logo) : ?>
                                        <p><strong><img src="<?php echo $company_logo; ?>"></strong></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else:
                        echo 'No custom posts found.';
                    endif;
                    ?>
                </div>
                <!-- Container for the "Read More" button -->
                <div class="read-more-container">
                    <button class="load-more-btn red-btn" data-loaded-testimonials="<?php echo implode(',', $loaded_testimonials); ?>">Read More</button>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
 jQuery(document).ready(function($) {
    var page = 1; // Track the current page
    var initialTestimonialsCount = <?php echo $query->post_count; ?>; // Get the count of initial testimonials
    var loadedTestimonials = []; // Array to store IDs of loaded testimonials

    $('.load-more-btn').on('click', function() {
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'load_more_testimonials',
                page: ++page, // Increment the page number for each click
                loaded_testimonials: loadedTestimonials,
                initial_testimonials_count: initialTestimonialsCount
            }, 
            success: function(response) {
                var newTestimonials = $(response).filter('.testimonial').map(function() {
                    return $(this).data('testimonial-id');
                }).get();

                if (newTestimonials.length > 0) {
                    $('.testimonial-container').append(response); // Append the new testimonials
                    loadedTestimonials = loadedTestimonials.concat(newTestimonials);
                }

                // If no testimonials are returned, hide the "Read More" button
                if (newTestimonials.length < 4 || response.trim() === '<p class="no-testimonials">No more Testimonials</p>') {
                    $('.read-more-container').hide(); // Hide the button
                }
            },
        });
    });
});


</script>





<?php get_footer(); ?>
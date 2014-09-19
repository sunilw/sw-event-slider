<?php
/**
 *  This file gives us our slideshow markup
 */

$args = array(
    'post_type'                  => 'tribe_events',
    'tribe_events_cat'   => 'featured'
) ;

$my_query = new WP_Query($args) ;

?>
<?php if ($my_query->have_posts()) : ?>
    <section  class="sw-events-slideshow" >
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <article class="slide">
                <h3>
                    <a href="<?php the_permalink()  ?>">
                        <?php the_title()  ?>
                    </a>
                </h3>
                <div class="featured-image-container">
                    <a href="<?php echo get_permalink()  ?>">
                        <?php  $image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())) ; ?>
                        <img src="<?php echo $image  ?>" alt="#"/>
                    </a>
                </div>
            </article>
        <?php endwhile; ?>
    </section> <!-- ENDS #...  -->
<?php else :  ?>
    <h2>no posts</h2>
<?php endif ;  ?>

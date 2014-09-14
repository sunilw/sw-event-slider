<?php
/**
*  This file gives us our slideshow markup
*/

$args = array(
    'posts_per_page' => 2,
    'post_type'  => 'tribe_events'
) ;
$my_query = new WP_Query($args) ;

?>
<?php if ($my_query->have_posts()) : ?>
    <section  class="sw-events-slideshow">
        <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <article class="slide">
                <h3><?php the_title()  ?></h3>
                <p><?php  the_excerpt(); ?></p>
                <div class="featured-image-container">
		    <?php echo the_post_thumbnail()  ?>
		</div>
                <p><a href="<?php echo get_permalink()  ?>">read more</a></p>
            </article>
        <?php endwhile; ?>
    </section> <!-- ENDS #...  -->
<?php else :  ?>
    <h2>no posts</h2>
    <?php endif ;  ?>

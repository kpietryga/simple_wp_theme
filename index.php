<?php
// Include the header
get_header();
?>

<main>
    <h1>Welcome to my first WordPress theme!</h1>

    <?php
    // WordPress loop to display posts
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div><?php the_excerpt(); ?></div>
            </article>
            <?php
        endwhile;
    else :
        echo '<p>No posts to display.</p>';
    endif;
    ?>
</main>

<?php
// Include the footer
get_footer();
?>
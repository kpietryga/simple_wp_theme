<?php get_header(); ?>

<main>
    <h1>Wyniki wyszukiwania dla: <?php echo get_search_query(); ?></h1>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            the_excerpt();
        }
    } else {
        echo '<p>Brak wyników dla tego zapytania.</p>';
    }
    ?>
</main>

<?php get_footer(); ?>
<?php get_header(); ?>

<main class="container py-5">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <article class="mb-4">
                <h2 class="h4">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-primary">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <p class="text-muted"><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                    Read more
                </a>
            </article>
            <hr>
            <?php
        }
    } else {
        echo '<p class="text-center text-danger">Nothing to display</p>';
    }
    ?>
</main>

<?php get_footer(); ?>
<?php get_header(); ?>

<main class="container py-5">
    <h1 class="text-center text-primary mb-4"><?php the_archive_title(); ?></h1>
    <?php
    if (have_posts()) {
        echo '<div class="row">';
        while (have_posts()) {
            the_post();
            ?>
            <div class="col-md-6 mb-4">
                <article class="border p-3 rounded shadow-sm">
                    <h2 class="h5">
                        <a href="<?php echo get_permalink(); ?>" class="text-decoration-none text-dark">
                            <?php echo get_the_title(); ?>
                        </a>
                    </h2>
                    <p class="text-muted"><?php the_excerpt(); ?></p>
                    <a href="<?php echo get_permalink(); ?>" class="btn btn-primary btn-sm">Read more</a>
                </article>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        echo '<p class="text-center text-danger">No posts in this category.</p>';
    }
    ?>
</main>

<?php get_footer(); ?>
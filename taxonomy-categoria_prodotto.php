<?php
get_header();
?>

<main class="container prodotti-archive">

    <h1><?php single_term_title(); ?></h1>

    <?php if (have_posts()) : ?>

        <div class="prodotti-grid">

            <?php while (have_posts()) : the_post(); ?>

                <article class="prodotto-card">

                    <a href="<?php the_permalink(); ?>">

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="prodotto-thumb">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>

                        <h2><?php the_title(); ?></h2>

                    </a>

                    <div class="prodotto-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                </article>

            <?php endwhile; ?>

        </div>

    <?php else : ?>

        <p>Nessun prodotto trovato.</p>

    <?php endif; ?>

</main>

<?php
get_footer();
?>


<?php get_header(); ?>

<main class="prodotto-singolo">

<?php while (have_posts()) : the_post(); ?>

    <article class="prodotto">

        <!-- TITOLO -->
        <h1 class="prodotto-titolo">
            <?php the_title(); ?>
        </h1>

        <!-- IMMAGINE -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="prodotto-immagine">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <!-- CONTENUTO -->
        <div class="prodotto-contenuto">
            <?php the_content(); ?>
        </div>

        <!-- CATEGORIE -->
        <div class="prodotto-categorie">
            <?php
            $terms = get_the_terms(get_the_ID(), 'categoria_prodotto');

            if ($terms && !is_wp_error($terms)) {
                echo '<ul>';
                foreach ($terms as $term) {
                    echo '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
                }
                echo '</ul>';
            }
            ?>
        </div>

    </article>

<?php endwhile; ?>

</main>

<?php get_footer(); ?>
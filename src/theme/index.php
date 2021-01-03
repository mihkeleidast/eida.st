<?php get_header(); ?>
<main class="site-main post-list">
	<?php if( have_posts() ) { ?>
	<?php while( have_posts() ) { ?>
	<?php the_post(); ?>
	<?php get_template_part( 'content', 'post' ); ?>
	<?php } ?>
	<?php } ?>
</main>
<?php get_footer(); ?>

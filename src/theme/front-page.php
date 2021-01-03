<?php get_header(); ?>
<main class="site-main post-list">
	<?php if( have_posts() ) { ?>
	<?php while( have_posts() ) { ?>
	<?php the_post(); ?>
	<article class="post">
		<header class="post-header">
			<h1 class="post-title"><?php the_title(); ?></h1>
		</header>
		<div class="post-content cf">
			<?php if( has_post_thumbnail() ) { ?>
			<figure>
				<?php the_post_thumbnail( 'large' ); ?>
			</figure>
			<?php } ?>
			<?php the_content(); ?>
		</div>
	</article>
	<?php } ?>
	<?php } ?>
</main>
<?php get_footer(); ?>

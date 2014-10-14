<?php $is_single = !is_single(); ?>
<article class="post">
	<header class="post-header">
		<h1 class="post-title"><?php if( $is_single ) { ?><a href="<?php the_permalink(); ?>"><?php } ?><?php the_title(); ?><?php if( $is_single ) { ?></a><?php } ?></h1>
	</header>
	<div class="post-meta">
		<?php
		$archive_year  = get_the_time('Y');
		$archive_month = get_the_time('m');
		$archive_day   = get_the_time('d');
		?>
		Published on <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>"><time class="post-time" datetime="<?php echo $archive_year; ?>-<?php echo $archive_month; ?>-<?php echo $archive_day; ?>"><?php the_time( 'F jS, Y' ); ?></time></a> by <span class="post-author"><?php the_author(); ?></span>.
	</div>
	<div class="post-content cf">
		<?php if( has_post_thumbnail() ) { ?>
		<figure>
			<?php the_post_thumbnail( 'large' ); ?>
		</figure>
		<?php } ?>
		<?php the_content(); ?>
		<?php if( $is_single ) { ?>
		<a href="<?php the_permalink(); ?>" class="readmore">Read more &#8658;</a>
		<?php } ?>
	</div>
</article>

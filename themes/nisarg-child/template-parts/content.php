<?php
/**
 * Template part for displaying posts.
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>"  <?php post_class( 'post-content' ); ?>>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', esc_html__( 'Featured', 'nisarg' ) );
	} ?>


	<header class="entry-header">
		<span class="screen-reader-text"><?php the_title();?></span>
		<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
		<?php endif; // is_single() ?>
	</header><!-- .entry-header -->
			<div class="entry-content">
				<?php
					the_content( '...<p class="read-more"><a class="btn btn-default" href="'. esc_url( get_permalink( get_the_ID() ) ) . '">' . __( ' Read More', 'nisarg' ) . '<span class="screen-reader-text"> '. __( ' Read More', 'nisarg' ).'</span></a></p>' );
				?>

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nisarg' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

	<footer class="entry-footer">
	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<div class="entry-date">Beitrag erstellt am: <?php nisarg_footer_posted_on(); ?></div>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php nisarg_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

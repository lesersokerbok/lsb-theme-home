<?php use LSB\Page; ?>

<div class="block-wrapper">
<?php if ( have_rows('blocks') ): ?>
	<?php while ( have_rows('blocks') ) : the_row(); ?>

		<div class="block">
				<a href="<?php Page\the_text_block_url(); ?>">

					<?php if ( !empty( Page\get_text_block_icon_url() ) ) : ?>
						<img src="<?php Page\the_text_block_icon_url(); ?>" alt="<?php the_sub_field('text_block_title'); ?>" />
					<?php endif; ?>

					<h1><?php the_sub_field('text_block_title'); ?></h1>
					<?php the_sub_field('text_block_content'); ?>

				</a>
		</div>

	<?php endwhile; ?>
<?php endif; ?>
</div>

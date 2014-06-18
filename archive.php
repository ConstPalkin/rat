<?php
/**
from expound templates :)
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'expound' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'expound' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'expound' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
					else :
						_e( 'Archives', 'expound' );
					endif;
				?></h1>
			</header><!-- .archive-header -->

<div class="archive-pages-div" style="padding:10px;">
<table class="archive-pages-table" >
		<tr>
			<th style="padding:10px;width: 20px;">ID</th>
			<th style="padding:10px;">Запись</th>
			<th style="padding:10px;">Рубрики</th>
		</tr>
			<?php
			/* Start the Loop */
						while ( have_posts() ) : the_post();
					$postik = get_post();
					$categ = get_the_category();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
		?>
			<tr>
				<td style="padding:10px;"><?php /*the_ID();*/ echo $postik->ID; ?></td>
				<td style="padding:10px;">
		<?php
				/*get_template_part( 'content', get_post_format() ); */
				echo '<a href="'.$postik->guid.'">'.$postik->post_title.'</a>';
		?>
				</td>
				<td style="padding:10px;width: 20%;">
		<?php
			if($categ){
				$out = '';
				foreach($categ as $category) {
					$out .= '<a href="'.get_category_link($category->term_id ).'">' . $category->name . '</a>, ';
				}
				echo trim($out, ', ');
			}
		?>
				</td>
			</tr>
		<?php
			endwhile;
		?>
</table>
<?php
	/*pagination*/
			echo pagination('<<', '>>'); 
			
?>
</div>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php get_header();  $is_page_builder_used = 1; ?>

<div id="main-content">
	<!--<div class="container">
		<div id="content-area" class="clearfix">-->
            <?php $ss = get_posts(array(
	            'post_type' => 'page',
	            'post__in' => array(2682),
	            'numberposts'=> 1,
            ));
            global $post;
            $post = $ss[0];
            //echo json_encode($ss);
            setup_postdata( $post ); ?>
			<?php /*while ( have_posts() ) : the_post(); */?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php if ( ! $is_page_builder_used ) : ?>

                        <h1 class="entry-title main_title"><?php the_title(); ?></h1>
						<?php
						$thumb = '';

						$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

						$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
						$classtext = 'et_featured_image';
						$titletext = get_the_title();
						$alttext = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
						$thumbnail = get_thumbnail( $width, $height, $classtext, $alttext, $titletext, false, 'Blogimage' );
						$thumb = $thumbnail["thumb"];

						if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
							print_thumbnail( $thumb, $thumbnail["use_timthumb"], $alttext, $width, $height );
						?>

					<?php endif; ?>

                    <div class="entry-content">
						<?php
						the_content();

						if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
						?>
                    </div> <!-- .entry-content -->

					<?php
					if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
					?>

                </article> <!-- .et_pb_post -->

			<?php /*endwhile; */?>
			<!--<div id="left-area">
				<article id="post-0" <?php /*post_class( 'et_pb_post not_found' ); */?>>
					<?php /*get_template_part( 'includes/no-results', '404' ); */?>
				</article>
			</div>

			--><?php /*get_sidebar(); */?>
            <!-- #left-area -->
                <!-- .et_pb_post -->
		<!--</div>--> <!-- #content-area -->
<!--	</div>--> <!-- .container -->
</div> <!-- #main-content -->

<?php

get_footer();

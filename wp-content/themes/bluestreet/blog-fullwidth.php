<?php 
//Template Name: Blog FullWidth 

get_header(); ?>
<!-- Page Title Section -->
<?php get_template_part('index', 'breadcrumb'); ?>
<!-- Blog & Sidebar Section -->
<div class="container" id="content">
	<div class="row">

		<div class="col-md-12">
			<?php
			$bluestreet_pagedno = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$bluestreet_args = array( 'post_type' => 'post','paged'=>$bluestreet_pagedno);		
			$bluestreet_post_type_data = new WP_Query( $bluestreet_args );
			while($bluestreet_post_type_data->have_posts()){
			$bluestreet_post_type_data->the_post();?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('blog-section-right'); ?>>
				<?php if(has_post_thumbnail()){ ?>
				<?php $bluestreet_defalt_arg =array('class' => "img-responsive"); ?>
				<div class="blog-post-img">
					<?php the_post_thumbnail('', $bluestreet_defalt_arg); ?>
				</div>
				<?php } ?>
				<div class="clear"></div>
				<div class="blog-post-title">
					<div class="blog-post-date"><span class="date"><a href="<?php the_permalink();?>"><?php echo esc_html( get_the_date() ); ?></span>
						<span class="comment"><i class="fa fa-comment"></i><?php echo esc_html(get_comments_number());?></span>
					</div>
					<div class="blog-post-title-wrapper">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_content( esc_html__( 'Read More' , 'bluestreet' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__('Page', 'bluestreet' ), 'after' => '</div>' ) ); ?>
						<div class="blog-post-detail">
							<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>
							<?php 	$bluestreet_tag_list = get_the_tag_list();
							if(!empty($bluestreet_tag_list)) { ?>
							<div class="blog-tags">
								<i class="fa fa-tags"></i><?php the_tags('', ', ', ''); ?>
							</div>
							<?php } ?>
							<?php 	$bluestreet_cat_list = get_the_category_list();
							if(!empty($bluestreet_cat_list)) { ?>
							<div class="blog-tags">
								<i class="fa fa-star"></i><?php the_category(', '); ?>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>	
			</div>
			<?php }
			wp_reset_postdata(); ?>
			<div class="blog-pagination">					
				<?php previous_posts_link( esc_html__('Previous','bluestreet') ); ?>
				<?php next_posts_link( esc_html__('Next','bluestreet'), $bluestreet_post_type_data->max_num_pages ); ?>
			</div>
		</div><!--/Blog Area-->
	</div>
</div>
<?php get_footer(); ?>
<!-- /Blog & Sidebar Section -->
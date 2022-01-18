<!-- wallstreet Blog Section ---->
<?php
$wallstreet_pro_options = wallstreet_theme_data_setup();
$wallstreet_current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), $wallstreet_pro_options);
if ($wallstreet_current_options['blog_section_enabled'] == true) {
    ?>	
    <div class="container home-blog-section">
        <div class="row">
            <?php if ($wallstreet_current_options['home_blog_heading'] || $wallstreet_current_options['home_blog_description'] ) { ?>
            <div class="section_heading_title">
                <?php if ($wallstreet_current_options['home_blog_heading']) { ?>
                    <h1><?php echo esc_html($wallstreet_current_options['home_blog_heading']); ?></h1>
                <?php } ?>
                <?php if ($wallstreet_current_options['home_blog_description']) { ?>
                    <div class="pagetitle-separator">
                        <div class="pagetitle-separator-border">
                            <div class="pagetitle-separator-box"></div>
                        </div>
                    </div>
                    <p><?php echo esc_html($wallstreet_current_options['home_blog_description']); ?></p>
                <?php } ?>
            </div>
             <?php } ?>
        </div>
        <div class="row">
            <?php
            $j = 1;
            $wallstreet_args = array('post_type' => 'post', 'posts_per_page' => 3, 'post__not_in' => get_option("sticky_posts"));
            query_posts($wallstreet_args);
            if (query_posts($wallstreet_args)) {
                while (have_posts()):the_post();
                    $wallstreet_recent_expet = get_the_excerpt();
                    ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="home-blog-area">
                            <div class="home-blog-post-img"><?php
                                $wallstreet_defalt_arg = array('class' => "img-responsive");
                                if (has_post_thumbnail()):
                                    the_post_thumbnail('', $wallstreet_defalt_arg);
                                endif;
                                ?>
                            </div>
                            <div class="home-blog-info">						
                                <div class="home-blog-post-detail">
                                    <span class="date"><?php echo esc_html(get_the_date()); ?> </span>
                                    <span class="comment"><a href="<?php the_permalink(); ?>"><i class="fa fa-comment"></i><?php comments_number(esc_html__('No comments', 'wallstreet'), esc_html__('1 comment', 'wallstreet'), esc_html__('% Comments', 'wallstreet')); ?></a></span>

                                </div>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>		
                                <div class="home-blog-description"><p><?php echo esc_html(get_the_excerpt()); ?></p></div>
                                <div class="home-blog-btn"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'wallstreet'); ?></a></div>							
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($j % 3 == 0) {
                        echo "<div class='clearfix'></div>";
                    } $j++;
                endwhile;
            } else {
                ?>
                <div class='post_message'>
                <?php esc_html_e('No Posts to show.', 'wallstreet'); ?>
                </div>
    <?php } ?>
        </div>
    </div><!-- /wallstreet Blog Section ---->
    <?php
}
<?php
if (!function_exists('bluestreet_header_center_layout')) :

    function bluestreet_header_center_layout() {
        $bluestreet_current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), wallstreet_theme_data_setup() );?>
    <!-- logo -->
        <div class="navbar-header index3">
            
                        <?php
                        if($bluestreet_current_options['text_title'] ==true){
                            set_theme_mod('header_text','true');
                            $bluestreet_text_title_options=get_option('wallstreet_pro_options');
                            $bluestreet_text_title_options['text_title'] = false;
                            update_option('wallstreet_pro_options', $bluestreet_text_title_options);
                        } 
                        if($bluestreet_current_options['text_title'] ==false && $bluestreet_current_options['upload_image_logo']!='' && !(has_custom_logo()) )
                        { ?> 
                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url($bluestreet_current_options['upload_image_logo']); ?>" style="height:<?php if($bluestreet_current_options['height']!='') { echo esc_attr($bluestreet_current_options['height']); }  else { "80"; } ?>px; width:<?php if($bluestreet_current_options['width']!='') { echo esc_attr($bluestreet_current_options['width']); }  else { "200"; } ?>px;" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
                            </a>
                            <?php
                        }   
                        elseif(has_custom_logo() )
                        { ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
                                <?php
                                if ( has_custom_logo() ) 
                                {   
                                    $bluestreet_custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $bluestreet_post_status=get_post_status ( $bluestreet_custom_logo_id );
                                    $bluestreet_logo_options = get_option('wallstreet_pro_options');
                                    $bluestreet_logo_options['upload_image_logo'] = '';
                                    update_option('wallstreet_pro_options', $bluestreet_logo_options);
                                    $bluestreet_image = wp_get_attachment_image_src( $bluestreet_custom_logo_id , 'full' );
                                    echo '<img src="'.esc_url($bluestreet_image[0]).'" alt="'.esc_attr(get_bloginfo( 'title' )).'" />';
                                }?>
                            </a>
                        <?php
                        }
                        if($bluestreet_current_options['text_title'] ==true || get_theme_mod('header_text')==true)
                        { 
                            if((get_option('blogname')!='') || (get_option('blogdescription')!=''))
                            {
                                if(get_option('blogname')!='')
                                {?>
                                    <div class="logo-link-url">
                                        <h2 style="margin: 0px;"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div class="wallstreet_title_head"><?php bloginfo( 'name' ); ?></div>
                                        </a></h2>
                                        <?php
                                        $bluestreet_description = get_bloginfo( 'description', 'display' );
                                        if(get_option('blogdescription')!='')
                                        {
                                            if ( $bluestreet_description || is_customize_preview() )
                                            { ?>

                                            <p class="site-description"><?php echo $bluestreet_description; ?></p>
                                            <?php
                                            }
                                        }?>
                                    </div>                                    
                                <?php
                                }                                
                            } 
                        }?>
        </div>
    <!-- /logo -->
        <div class="navbar navbar-wrapper navbar-inverse navbar-static-top navbar3" role="navigation">
            <div class="container">    
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php esc_html_e('Toggle navigation','bluestreet'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                                  <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                    wp_nav_menu( array(  
                            'theme_location' => 'primary',
                            'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                            'menu_class' => 'nav navbar-nav navbar-left',
                            'fallback_cb' => 'wallstreet_fallback_page_menu',
                            'walker' => new wallstreet_nav_walker()
                            )
                        );  
                    ?>
                </div><!-- /.navbar-collapse -->
            </div>
        </div>
        <?php
         }

endif;

if (!function_exists('bluestreet_header_default_layout')) :

    function bluestreet_header_default_layout() {
        $bluestreet_current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), wallstreet_theme_data_setup() );?>
        <div class="navbar navbar-wrapper navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
              
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <!-- logo -->
                <?php 
                if($bluestreet_current_options['text_title'] ==true){
                    set_theme_mod('header_text','true');
                    $bluestreet_text_title_options=get_option('wallstreet_pro_options');
                    $bluestreet_text_title_options['text_title'] = false;
                    update_option('wallstreet_pro_options', $bluestreet_text_title_options);
                }

                        if($bluestreet_current_options['text_title'] ==false && $bluestreet_current_options['upload_image_logo']!='' && !(has_custom_logo()) )
                        { ?> 
                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url($bluestreet_current_options['upload_image_logo']); ?>" style="height:<?php if($bluestreet_current_options['height']!='') { echo esc_attr($bluestreet_current_options['height']); }  else { "80"; } ?>px; width:<?php if($bluestreet_current_options['width']!='') { echo esc_attr($bluestreet_current_options['width']); }  else { "200"; } ?>px;" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
                            </a>
                            <?php
                        }   
                        elseif(has_custom_logo() )
                        { ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
                                <?php
                                if ( has_custom_logo() ) 
                                {   
                                    $bluestreet_custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $bluestreet_post_status=get_post_status ( $bluestreet_custom_logo_id );
                                    $bluestreet_logo_options = get_option('wallstreet_pro_options');
                                    $bluestreet_logo_options['upload_image_logo'] = '';
                                    update_option('wallstreet_pro_options', $bluestreet_logo_options);
                                    $bluestreet_image = wp_get_attachment_image_src( $bluestreet_custom_logo_id , 'full' );
                                    echo '<img src="'.esc_url($bluestreet_image[0]).'" alt="'.esc_attr(get_bloginfo( 'title' )).'" />';
                                }?>
                            </a>
                        <?php
                        }
                        if($bluestreet_current_options['text_title'] ==true || get_theme_mod('header_text')==true)
                        { 
                            if((get_option('blogname')!='') || (get_option('blogdescription')!=''))
                            {
                                if(get_option('blogname')!='')
                                {?>
                                    <div class="logo-link-url">
                                        <h2 style="margin: 0px;"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div class="wallstreet_title_head"><?php bloginfo( 'name' ); ?></div>
                                        </a></h2>
                                        <?php
                                        $bluestreet_description = get_bloginfo( 'description', 'display' );
                                        if(get_option('blogdescription')!='')
                                        {
                                            if ( $bluestreet_description || is_customize_preview() )
                                            { ?>

                                            <p class="site-description"><?php echo $bluestreet_description; ?></p>
                                            <?php
                                            }
                                        }?>
                                    </div>                                    
                                <?php
                                }
                                
                            } 
                        }?>
                <!-- /logo -->
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php esc_html_e('Toggle navigation','bluestreet'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                    wp_nav_menu( array(  
                            'theme_location' => 'primary',
                            'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                            'menu_class' => 'nav navbar-nav navbar-right',
                            'fallback_cb' => 'wallstreet_fallback_page_menu',
                            'walker' => new wallstreet_nav_walker()
                            )
                        );  
                    ?>
                </div><!-- /.navbar-collapse -->            
            </div>
        </div>
        <?php
        }
endif;

/**
 * Masonry 2 Column blog Layout
 */
if (!function_exists('bluestreet_blog_listed_layout')) :

    function bluestreet_blog_listed_layout() { 
        $bluestreet_j=1;
        $bluestreet_args = array( 'post_type' => 'post','posts_per_page' =>3,'post__not_in'=>get_option("sticky_posts"));  
        query_posts( $bluestreet_args );?>
            <div class="row">
                <!--Blog Area-->
                <div class="col-md-12">
                <?php if(query_posts( $bluestreet_args ))
                    {   
                    while(have_posts()):the_post();
                    $recent_expet = get_the_excerpt(); ?>               
                    <div class="blog-section-left blog-list-view">
                        <div class="media">
                            <div class="blog-post-img">
                            <?php
                            $bluestreet_defalt_arg =array('class' => "img-responsive");
                            if(has_post_thumbnail()): 
                            the_post_thumbnail('', $bluestreet_defalt_arg); 
                            endif; 
                            ?>
                            </div>
                            <div class="clear"></div>
                            <div class="blog-post-title media-body">
                                <div class="blog-post-date">
                                    <span class="date"><?php echo esc_html( get_the_date() ); ?></span>
                                    <span class="comment"><a href="<?php the_permalink(); ?>"><i class="fa fa-comment"></i> <?php comments_number ( esc_html__('0','bluestreet'), esc_html__( '1','bluestreet'), esc_html__('%','bluestreet') ); ?></a></span>
                                </div>
                                <div class="blog-post-title-wrapper">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p><?php echo esc_html(get_the_excerpt()); ?></p>       
                                    <div class="blog-btn-col"><a href="<?php the_permalink(); ?>" class="blog-btn"><?php esc_html_e('Read More','bluestreet'); ?></a></div>
                                    <div class="blog-post-detail">
                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i> <?php echo esc_html(get_the_author()); ?></a>
                                        <?php if(has_tag()):?>
                                        <div class="blog-tags">
                                            <i class="fa fa-tags"></i><?php the_tags('',', ','');?>
                                        </div>
                                    <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($bluestreet_j%3==0){ echo "<div class='clearfix'></div>"; }
                    $bluestreet_j++;
                    endwhile;
                    wp_reset_postdata(); 
                    } else  { ?>
                        <div class='post_message'>
                            <?php esc_html_e('No Posts to show.','bluestreet');?>
                        </div>
                    <?php } ?>
                </div>
            </div>
    <?php
    }
endif;

/**
 * default blog Layout
 */
if (!function_exists('bluestreet_blog_default_layout')) :

    function bluestreet_blog_default_layout() {?>
    <div class="row">
        <?php
        $bluestreet_j=1;
        $bluestreet_args = array( 'post_type' => 'post','posts_per_page' =>3,'post__not_in'=>get_option("sticky_posts"));  
        query_posts( $bluestreet_args );
        if(query_posts( $bluestreet_args ))
        {   while(have_posts()):the_post();
            $recent_expet = get_the_excerpt(); ?>
            <div class="col-md-4 col-sm-6">
                <div class="home-blog-area">
                    <div class="home-blog-post-img"><?php
                        $bluestreet_defalt_arg =array('class' => "img-responsive");
                        if(has_post_thumbnail()): 
                        the_post_thumbnail('', $bluestreet_defalt_arg); 
                        endif; 
                        ?>
                    </div>
                    <div class="home-blog-info">                        
                        <div class="home-blog-post-detail">
                            <span class="date"><?php echo esc_html( get_the_date() ); ?> </span>
                            <span class="comment"><a href="<?php the_permalink(); ?>"><i class="fa fa-comment"></i><?php comments_number ( esc_html__('No comments','bluestreet'), esc_html__( '1 comment','bluestreet'), esc_html__('% Comments','bluestreet') ); ?></a></span>
                                            
                        </div>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>      
                        <div class="home-blog-description"><p><?php echo esc_html(get_the_excerpt()); ?></p></div>
                        <div class="home-blog-btn"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','bluestreet'); ?></a></div>                            
                    </div>
                </div>
            </div>
            <?php if($bluestreet_j%3==0){ echo "<div class='clearfix'></div>"; } 
            $bluestreet_j++;
            endwhile; 
            wp_reset_postdata(); 
            } else  { ?>
                <div class='post_message'>
                    <?php esc_html_e('No Posts to show.','bluestreet');?>
                </div>
            <?php } ?>
    </div>
    <?php
    }
endif;
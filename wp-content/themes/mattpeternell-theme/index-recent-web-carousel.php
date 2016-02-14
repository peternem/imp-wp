<div class="mp-row row">
    <div class="row-title col-md-12 text-center">
        <h2>Recent Web Work</h2>
    </div>
    <div class="col-md-12">
        <div class="cycle-slideshow"
data-cycle-fx=carousel
data-cycle-carousel-fluid=true
data-cycle-slides="div.slidetiles" >
        <?php $catName =  get_cat_ID("websites");
        
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
             
            $args = array( 
                'post_type' => 'post',
                'posts_per_page' =>6,
                'paged' => $paged,
                'orderby' => 'post_date',
                'order' => 'date' ,
                'cat' => $catName,
                //'category__and' => array( 5, 7 ),
                'post_status' => 'publish',
            );
            $wp_query = new WP_Query($args);
            
            while ( have_posts() ) : the_post(); ?>
        <div class="slidetiles">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                    <div class="panel-body">
                        <?php if( function_exists( 'the_subtitle' ) ) the_subtitle( '<div class="slide-txt"><p class="lead">', '</p></div>' ); ?>
                        <?php //the_excerpt(); ?>
                        
                        <?php 
                        if ( has_post_thumbnail() ) {
                            ?>
                            
                            <a href="<?php the_permalink(); ?>">
                            <?php 
                            //the_post_thumbnail('thumbnail');
                            the_post_thumbnail('homepage-thumb');
                            ?>
                            </a><?php 
                        }
                        ?>
                        <!--<p><a class="btn btn-primary btn-xs" href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">View details »</a></p>  -->
                    </div>
            </div>
        </div>
<?php endwhile; ?>
    </div>
</div>
</div>

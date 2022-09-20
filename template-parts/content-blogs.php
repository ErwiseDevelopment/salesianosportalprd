<section class="l-blogs">

    <div class="container">

        <div class="row">

            <div class="col-12">
                
                <div class="row">

                    <div class="col-10 offset-1 d-flex align-items-center mb-3">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-5">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> blog
                        </h3>

                        <p class="c-text-pattern u-line-height-100 u-font-weight-semibold mb-0 ml-3">
                            Conteúdos de todas as nossas áreas <br>
                            de atuação para você se aprofundar
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">

                <div class="row">
                    
                    <?php
                        $args = array(
                            'posts_per_page' => 3,
                            'post_type'      => 'post',
                            'category_name'  => 'portal-blog',
                        );

                        $blogs = new WP_Query( $args );                           

                        if( $blogs->have_posts() ) : 
                            while( $blogs->have_posts() ): $blogs->the_post();
                    ?>
                                <div class="col-md-4 my-3 my-md-0">

                                    <div class="card h-100 border-0">

                                        <div class="l-blogs__card-img card-img">
                                            <!-- <img
                                            class="img-fluid"
                                            src="<php echo get_template_directory_uri()>/../wp-bootstrap-starter-child/assets/images/blog-image-1.png"
                                            alt=""> -->

                                            <?php
                                                $altTitle = get_the_title();
                                                
                                                the_post_thumbnail('post-thumbnail', 
                                                    array(
                                                        'class' => 'img-fluid',
                                                        'alt'   => $altTitle,
                                                        'order' => 'DESC'
                                                ));
                                            ?>
                                        </div>

                                        <div class="card-body d-flex flex-column justify-content-between px-0">

                                            <div>
                                                <h6 class="l-blogs__card-title u-font-weight-bold">
                                                    <!-- Título do Conteúdo 01 -->
                                                    <?php the_title() ?>
                                                </h6>

                                                <p class="l-blogs__card-text mb-2">
                                                    <!-- <span class="u-font-weight-semibold">Pastoral Juvenil</span> <br> -->
                                                    <span class="u-font-weight-semibold">
                                                        <?php echo get_the_author_meta('user_firstname', get_the_author_ID() ) . ' ' . get_the_author_meta( 'user_lastname', get_the_author_ID() ); ?>
                                                    </span> <br>

                                                    <!-- <span class="u-font-weight-bold u-color-folk-secondary">em 11/08/2021</span> -->
                                                    <span class="u-font-weight-bold u-color-folk-secondary">
                                                        em <?php echo get_the_date( 'd/m/Y', get_the_ID() ) ?>
                                                    </span>
                                                </p>
                                            </div>

                                            <div class="row">

                                                <div class="col-lg-8">
                                                    <a 
                                                    class="l-blogs__read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-secondary py-3 px-5" 
                                                    href="<?php the_permalink() ?>">
                                                        Ler mais
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php endwhile; 
                        endif;

                        wp_reset_query();
                    ?>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-6 d-flex justify-content-center my-4">

                        <a 
                        class="l-blogs__btn-more-content u-line-height-100 u-border-2 u-border-color-secondary d-block u-font-weight-bold text-center text-uppercase text-decoration-none u-color-folk-secondary hover:u-color-folk-white u-bg-folk-none hover:u-bg-folk-secondary py-3 px-5" 
                        href="<?php echo get_home_url( null, 'blog') ?>">
                            + Conteúdos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="l-shortcut my-5"><!-- highlight -->

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12">

                <ul class="d-lg-flex justify-content-center pl-0">

                    <?php
                        $categories = array();

                        $terms = get_terms(array(
                            'taxonomy' => 'category',
                            'hide_empty' => false,
                        ));

                        foreach($terms as $term) {
                            if($term->term_id == 54 || $term->term_id == 40 || $term->term_id == 44 || $term->term_id == 61 || $term->term_id == 63 || $term->term_id == 49) {
                                array_push($categories, $term);
                            }
                        }

                        foreach($categories as $category) :
                            $color = get_field( 'cor_de_fundo', $category);
                    ?>
                            <li 
                            class="l-shortcut__item u-list-style-none my-3 my-lg-0 py-2 px-3 mx-2 js-shortcut-item"
                            style="border-color:<?php echo $color; ?>"
                            data-color="<?php echo $color; ?>">
                                <a
                                class="l-shortcut__link u-font-weight-bold text-uppercase text-decoration-none"
                                style="color:<?php echo $color; ?>"
                                href="<?php echo get_home_url( null, 'noticias/?cat=' . $category->term_id ) ?>">
                                    <?php 
                                        $category_current = str_replace('Notícia', "", $category->name); 
                                        echo '+ ' . $category_current;
                                    ?>
                                </a>
                            </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
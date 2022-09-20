<?php

function single_temas_scripts()
{
    //css
    wp_enqueue_style('single-temas-style', get_stylesheet_uri());
    wp_enqueue_style('single-temas-main-style', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/css/main.css');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');

    //js
    wp_enqueue_script('single-temas-swiper-scripts', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/swiper.min.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-swiper-folk-scripts', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/swiper-folk.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-main-scripts', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/main.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-menu-toggle', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/menu-toggler.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-click-search', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/click-search.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-shortcut', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/shortcut.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-show-month', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/show-month.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-select-change-month', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/select-change-month.js', array(), '1.0.2', true);
//     wp_enqueue_script('single-temas-loader', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/loader.js', array(), '1.0.2', true);
}
add_action('wp_enqueue_scripts', 'single_temas_scripts');

//Função para criar post type:
function mantenedora_create_post_type() { 

	register_post_type( 'agendas', array(
		'labels' 		=> array( 'name' => 'Agendas', 'singular_name' => 'Agenda', 'all_items' => 'Todos Eventos' ),
		'public' 		=> true,
		'has_archive'	=> true,
		'menu_icon'		=> 'dashicons-welcome-write-blog',
		'supports' 		=> array( 'title', 'editor',  'revisions', 'author' ) 
	) );

	register_post_type( 'datas-especiais', array(
		'labels' 		=> array( 'name' => 'Datas Especiais', 'singular_name' => 'Data Especial', 'all_items' => 'Todas as Datas' ),
		'public' 		=> true,
		'has_archive' 	=> true,
		'menu_icon' 	=> 'dashicons-calendar-alt',
		'supports' 		=> array( 'title', 'editor',  'revisions', 'author', 'thumbnail' ) 
	) );
	
	register_post_type( 'ebook', array(
		'labels' 		=> array( 'name' => 'E-book', 'singular_name' => 'E-book', 'all_items' => 'Todos os E-books' ),
		'public' 		=> true,
		'has_archive' 	=> true,
		'menu_icon' 	=> 'dashicons-book',
		'supports' 		=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author' )
	) );

    
}
add_action( 'init', 'mantenedora_create_post_type' );

function limit_words($string, $word_limit) {  
    $words = explode(' ', $string, ($word_limit + 1));  
    if(count($words) > $word_limit) { array_pop($words); array_push($words, "..."); }  
    return implode(' ', $words);
}

add_action( 'rest_api_init', 'add_thumbnail_to_JSON' );
function add_thumbnail_to_JSON() {
    //Add featured image
    register_rest_field( 
        'post', // Where to add the field (Here, blog posts. Could be an array)
        'featured_image_src', // Name of new field (You can call this anything)
        array(
            'get_callback'    => 'get_image_src',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

/**
* ACF, Image and Category Data in Post Object Response
*/

// function register_featured_image_api_field()
// {
//     register_rest_field('ebook', 'featured_image',
//         array(
//             'get_callback' => 'get_featured_image_api_field',
//             'schema' => null,
//         )
//     );

//     register_rest_field('ebook', 'archive_download',
//         array(
//             'get_callback' => 'get_archive_download_api_field',
//             'schema' => null,
//         )
//     );

//     register_rest_field('ebook', 'category',
//         array(
//             'get_callback' => 'get_category_api_field',
//             'schema' => null,
//         )
//     );
// }
// add_action('rest_api_init', 'register_featured_image_api_field' );

// function get_featured_image_api_field($post_id)
// {
//     return get_the_post_thumbnail_url(null, 'post-thumb-small');
// }

// function get_archive_download_api_field($post_id) {
//     return get_field( 'arquivo' );
// }

// function get_category_api_field($post_id) {
//     // $args = array(
//     //     'posts_per_page' => -1,
//     //     'post_type' => 'ebook'
//     // );

//     // $ebooks = new WP_Query( $args );
//     // $categories = array();

//     // if( $ebooks->have_posts() ) :
//     //     while( $ebooks->have_posts() ) : $ebooks->the_post();  
//     //         foreach( get_the_terms($post->ID, 'ebook-categoria') as $cat ) {
//     //             //array_push($categories, $cat->name);
//     //             echo "<pre>";
//     //             var_dump($cat->name);
//     //             echo "</pre>";
//     //             add_category_api_field( $cat->name );
//     //         } 
//     //     endwhile;
//     // endif;

//     // return $categories;

//     $categories = array();
//     foreach( get_the_terms($post->ID, 'ebook-categoria') as $cat ) {
//         array_push($categories, $cat->name);
//     }

//     return $categories;
// }

function add_category_api_field( $categories ) {
    return $categories;
}

$types = ['post', 'page', 'ebook'];

foreach ( $types as $type ) {
    add_filter( 'acf/rest_api/'.$type.'/get_fields', function( $data, $response ) use ( $types ) {

        if ( $response instanceof WP_REST_Response ) {
            $data = $response->get_data();
        }

        array_walk_recursive( $data, 'deepIncludeFields', $types );

        return $data;

    }
    , 10, 3 );
}

function deepIncludeFields( $item, $key, $postTypes ) {
    if ( isset( $item->post_type ) && in_array( $item->post_type, $postTypes ) ) {
        $item->acf = get_fields( $item->ID );
        $item->image = get_the_post_thumbnail_url($item->ID);
        $item->categories = wp_get_post_categories($item->ID, array( 'fields' => 'names' ));
    }
}

function post_featured_image_json( $data, $post, $context ) {
    $featured_image_id = $data->data['featured_media']; // get featured image id
    $featured_image_url = wp_get_attachment_image_src( $featured_image_id, 'original' ); // get url of the original size

    if( $featured_image_url ) {
      $data->data['featured_image_src'] = $featured_image_url[0];
    }
  
    return $data;
  }
add_filter( 'rest_prepare_post', 'post_featured_image_json', 10, 3 );

function get_image_src( $object, $field_name, $request ) {
  $feat_img_array = wp_get_attachment_image_src(
    $object['featured_media'], // Image attachment ID
    'full',  // Size.  Ex. "thumbnail", "large", "full", etc..
    true // Whether the image should be treated as an icon.
  );
  return $feat_img_array[0];
}

add_filter('rest_prepare_post', 'my_filter_post', 10, 3);

function my_filter_post($data, $post, $context) {
    $data->data['post_date'] = get_the_date( 'd/m/Y', $post->ID );
    $data->data['post_author'] = get_the_author_meta('user_firstname') . ' ' . get_the_author_meta( 'user_lastname');
    $data->data['post_excerpt'] = limit_words(get_the_excerpt(), 25);
    
    $editorias = array(
        'Portal',
        'Institucional',
        'Paróquia',
        'Ensino',
        'Pastoral Juvenil',
        'Vocacional',
        'Obras Sociais',
        'Gráfica'
    );

    if (!empty($data->data['categories'])) {
        $cats = array();

        foreach($data->data['categories'] as $category_id) {
            $category = get_category($category_id);
            array_push($cats, $category->name);

            if (sizeOf($cats) > 0) {
                $post_categories = implode(', ', $cats);
            } 
            
            foreach( $editorias as $editoria ) {
                if( $category->name == $editoria ) {
                    $data->data['category_color'] = get_field( 'cor_de_fundo', $category);
                }    
            }
            

            $data->data['child_category'] = $cats;
            
        }
    }

    return $data;
}

//Função para organizar Calendário Salesiano
function mantenedora_cmp( $a, $b ) {
    $t1 = strtotime($a['data']);
    $t2 = strtotime($b['data']);
    return $t1 - $t2;
}

//Criar taxonomia:
function mantenedora_create_taxonomy() {
	register_taxonomy( 'agendacidade', 'agendas', array( 'labels' => array( 'name' => 'Cidades', 'singular_name' => 'Cidade' ), 'hierarchical' => true, 'show_admin_column' => true ) );
	register_taxonomy( 'tipoevento', 'agendas', array( 'labels' => array( 'name' => 'Tipo Evento', 'singular_name' => 'Categoria' ), 'hierarchical' => true, 'show_admin_column' => true ) );
	register_taxonomy( 'categoria-datas-especiais', 'datas-especiais', array( 'labels' => array( 'name' => 'Tipo da Data', 'singular_name' => 'Tipo da Data' ), 'hierarchical' => true, 'show_admin_column' => true ) );
    register_taxonomy( 'ebook-categoria', 'ebook', array( 'labels' => array( 'name' => 'Tipo E-book', 'singular_name' => 'Tipo E-book' ), 'hierarchical' => true, 'show_admin_column' => true ) );
    }
add_action( 'init', 'mantenedora_create_taxonomy' );




// Customizar o Footer do WordPress
function remove_footer_admin () {
    echo '© <a href="https://api.whatsapp.com/send?phone=%205511937008521&text=Olá!/">Suporte</a> - Desenvolvimento e Criação Erwise Dev ME';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//new ACF PRO
function mantenedora_create_page() {

	if( function_exists('acf_add_options_page') ) {	
		acf_add_options_page( 
            array( 
                'page_title' => 'Informações Gerais', 
                'menu_title' => 'Informações Gerais', 
                'menu_slug'  => 'informacoes_gerais', 
                'capability' => 'edit_posts', 
                'position'   => '23,3', 
                'redirect'   => false, 
                'icon_url'   => 'dashicons-info' 
        ));

        acf_add_options_page( 
            array( 
                'page_title' => 'API', 
                'menu_title' => 'API', 
                'menu_slug'  => 'api', 
                'capability' => 'edit_posts', 
                'position'   => '23,4', 
                'redirect'   => false, 
                'icon_url'   => 'dashicons-rest-api',
        ));

        // acf_add_options_page( 
        //     array( 
        //         'page_title' => 'Meio', 
        //         'menu_title' => 'Meio', 
        //         'menu_slug'  => 'meio', 
        //         'capability' => 'edit_posts', 
        //         'position'   => '23,5', 
        //         'redirect'   => false, 
        //         'icon_url'   => 'dashicons-text-page',
        // ));
	}

}
add_action( 'init', 'mantenedora_create_page' );

// Retirar logo do Wordpress admin
 function wps_admin_bar (){
     global $wp_admin_bar;
     $wp_admin_bar -> remove_menu ('wp-logo');
     $wp_admin_bar -> remove_menu ('about');
     $wp_admin_bar -> remove_menu ('wporg');
     $wp_admin_bar -> remove_menu ('documentation');
     $wp_admin_bar -> remove_menu ('support-forums');
     $wp_admin_bar -> remove_menu ('feedback');
     $wp_admin_bar -> remove_menu ('view-site');
 }
add_action ('wp_before_admin_bar_render', 'wps_admin_bar');

// removendo campo comentarios admin wp

add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

function logoadmin() {
    echo " <style>
    body.login #login h1 a {
    background: url('https://erwise.com.br/wp-content/uploads/2022/04/login-wp.jpg') no-repeat scroll center top transparent;
    height: 90px;
    width: 250px;
    }
    </style>
    ";
    }
    add_action("login_head", "logoadmin");
    
    
function get_date_format( $date ) {
    list($data_day, $data_month, $data_year) = explode('/', $date); 

    $months = array(
        '01' => 'janeiro',
        '02' => 'fevereiro',
        '03' => 'março',
        '04' => 'abril',
        '05' => 'maio',
        '06' => 'junho',
        '07' => 'julho',
        '08' => 'agosto',
        '09' => 'setembro',
        '10' => 'outubro',
        '11' => 'novembro',
        '12' => 'dezembro',
    );
}
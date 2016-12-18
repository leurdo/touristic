<?php namespace App;

use Roots\Sage\Template;


/**
 * Custom Theme setup
 */
add_action('after_setup_theme', function () {
    /*
     * Enable support for custom logo.
     *
     */
    add_theme_support( 'custom-logo', array(
        'height'      => 200,
        'width'       => 117,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
});


/**
 * Custom logo filter
 *
 */
add_filter('get_custom_logo', function ($html) {
    $html = str_replace( 'custom-logo-link', 'logo-wrap__logo-img', $html );
    return $html;
});


/**
 * Add file support for media
 *
 */
add_filter('upload_mimes', function ($mime_types) {
    $mime_types['svg'] = 'image/svg'; //Adding svg extension
    return $mime_types;
});

/**
 * Add cpt discounts
 *
 */


add_action( 'init', function() {
    $labels = array(
        'name'                  => _x( 'Акции', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Акция', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Акции', 'text_domain' ),
        'name_admin_bar'        => __( 'Акции', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                  => 'discounts',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Акция', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', ),
        'taxonomies'            => array( 'category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'discounts',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
    );
    register_post_type( 'discount', $args );
});

class My_Walker_Nav_Menu extends \Walker_Nav_Menu {

    function start_el(&$output, $object, $depth = 3, $args = array(), $current_object_id = 0)
    {
        if ($object->object_id == get_the_ID()) {
            $active = "main-nav__link_active";
        } else {
            $active = "";
        }
        $output .= '<li class="nav-list__nav-item '.$active.'"><a href="' . $object->url . '" class="nav-list__nav-item__nav-link">
       ' . $object->title . '</a>
        </li>';
    }

}

class Footer_Walker_Nav_Menu extends \Walker_Nav_Menu {

    function start_el(&$output, $object, $depth = 3, $args = array(), $current_object_id = 0)
    {
        $output .= '<li class="b-menu__list__item"><a href="' . $object->url . '" class="b-menu__list__item__link">
       ' . $object->title . '</a>
        </li>';
    }

}

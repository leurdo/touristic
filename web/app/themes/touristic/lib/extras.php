<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip;';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


/**
 * Custom tag cloud
 */
function touristicTagCloud()
{
    $tags = get_tags();
    $output = '<ul class="tags-list">';
    foreach ($tags as $tag_object)
    {
        $link = get_home_url().'/tag/'.$tag_object->slug;
        $output .= '<li class="tags-list__item"><a href="'.$link.'" class="tags-list__item__link">'.$tag_object->name.'</a></li>';
    }
    $output .= '</ul>';

    return $output;
}

/**
 * Custom category tree
 */
function touristicCategoryTree($category = 0)
{
    $r = '';

    $args = array(
        'parent' => $category,
        'hide_empty' => false,
        'orderby' => 'name'
    );
    $next = get_categories($args);

    if ($next) {
        if ($category) {
            $r .= '<ul class="category-list__inner">';
        } else {
            $r .= '<ul class="category-list">';
        }

        foreach ($next as $cat) {
            $r .= '<li class="category-list__item"><a class="category-list__item__link" href="' . get_term_link($cat->slug, $cat->taxonomy) . '"' . '>' . $cat->name . '</a>';
            $r .= $cat->term_id !== 0 ? touristicCategoryTree($cat->term_id) : null;
        }
        $r .= '</li>';

        $r .= '</ul>';
    }

    return $r;

}
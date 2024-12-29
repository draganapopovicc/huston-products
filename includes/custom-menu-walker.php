<?php
class CustomMenuWalker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
		// Check if the item should open in a new tab
        $target = !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';

        $output .= "<li class='" .  implode(" ", (array) $item->classes) . "'>";
        $output .= '<a href="' . esc_url($item->url) . '"' . $target . '>';
        $output .= $item->title;
        $output .= '</a>';
        if (in_array('menu-item-has-children', (array) $item->classes)) {
            $output .= '<span class="sub-menu-trigger"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="25" height="25" viewBox="0 0 24 24"><path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"/></svg></span>';
        }
    }
}




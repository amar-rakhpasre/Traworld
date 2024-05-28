<?php
/**
 * Template for displaying search forms
 *
 * @package Marsh Travel
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'marsh-travel' ) ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder', 'marsh-travel' ) ?>" value="<?php the_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'marsh-travel' ) ?>" />
    </label>
    <button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'marsh-travel' ) ?>"><i class="fas fa-search"></i></button>
</form>
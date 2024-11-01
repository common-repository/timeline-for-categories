<?php
/*
Plugin Name: Timeline For Categories
Plugin URI: http://thecodeisclear.in
Description: Allow admins to identify certain categories to show posts in chronological order. This is useful if your blog has a series of posts (such as a multi-part tutorial) and you would like the visitor to read them in the same order as they were published.
Version: 1.0.1
Author: Ramesh Vishveshwar
Author URI: http://thecodeisclear.in
License: GPLv2 or Later
*/
/*  Copyright 2012  Ramesh Vishveshwar  (email : thecodeisclear@null.net)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

// Define option tfc_post_order as a constant
define('TFC_POST_ORDER', 'tfc_post_order');

// Add filter for Edit Category Form. This will be called when category edit page is displayed
add_filter('edit_category_form', 'tfc_add_post_order');

function tfc_add_post_order($tag) {
    $tag_extra_fields = get_option(TFC_POST_ORDER);
?>
<table class="form-table">
    <tr class="form-field">
        <th scope="row" valign="top"><label for="_tfc_post_display_order">Posts Display Order</label></th>
        <td><select name="_tfc_post_display_order" id="_tfc_post_display_order" class="postform">
            <option value='0' <?php echo $tag_extra_fields[$tag->term_id]['tfc_dpo'] == 0 ? 'selected="selected"' : ''; ?>>Default Order</option>
            <option value='1' <?php echo $tag_extra_fields[$tag->term_id]['tfc_dpo'] == 1 ? 'selected="selected"' : ''; ?>>Chronological Order</option>
            </select>
            <p class="description">Choose "Chronological Order" to display posts in the same order as they were created (i.e. oldest post first)</p>
        </td>
    </tr>
</table>
<?php
}
// Add Filter when the category is edited and the changes are being updated to the DB
//add_filter('edited_terms', 'tfc_update_cat_fields');
add_action('edited_term', 'tfc_update_cat_fields');
function tfc_update_cat_fields($term_id) {
  if($_POST['taxonomy'] == 'category') {
    $tag_extra_fields = get_option(TFC_POST_ORDER);
    $tag_extra_fields[$term_id]['tfc_dpo'] = $_POST['_tfc_post_display_order'];
    update_option(TFC_POST_ORDER, $tag_extra_fields);
  }
}

// Add Filter when category is removed
add_filter('deleted_term_taxonomy', 'tfc_remove_cat_fields');
function tfc_remove_cat_fields($term_id) {
  if($_POST['taxonomy'] == 'category') {
    $tag_extra_fields = get_option(TFC_POST_ORDER);
    unset($tag_extra_fields[$term_id]);
    update_option(TFC_POST_ORDER, $tag_extra_fields);
  }
}

// Add Filter for ordering posts
add_filter('posts_orderby', 'tfc_check_post_order');
function tfc_check_post_order($orderby) {
    
    $tag_extra_fields = get_option(TFC_POST_ORDER);
    $curr_category_name = single_cat_title('', false);
    
    // Check if you are in the Category Page. Should not be called in case of main page/archives/tags
    if ( is_category() && $curr_category_name != '' ) {
        $objCategory = get_category_by_slug($curr_category_name);
        $term_id = $objCategory->term_id;
        if ( $tag_extra_fields[$term_id]['tfc_dpo'] == 1 ) {
            remove_filter('posts_orderby', 'tfc_check_post_order');
            return 'post_date ASC';
        }
        else {
            remove_filter('posts_orderby', 'tfc_check_post_order');
            return 'post_date DESC';
        }
    }
    else {
        remove_filter('posts_orderby', 'tfc_check_post_order');
        return 'post_date DESC';
    }
}
?>
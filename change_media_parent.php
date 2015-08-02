<?php
/**
 * @package Change_Media_Parent
 * @version 0.1
 */
/*
Plugin Name: Change Media Parent
Plugin URI: http://wordpress.org/extend/plugins/hello-dolly/
Description: Allows editors to change the parent post of an attachment after it has been set.
Author: Greg Jackson
Version: 0.1
Author URI: http://www.pantsonhead.com/

Copyright 2012  Greg Jackson  (email : greg@pantsonhead.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA


*/

function allow_media_reattachment($actions, $post, $detached){
	if ( $post->post_parent!=0 ) { 	
		if ( current_user_can( 'edit_post', $post->ID ) )
			$actions['attach'] = '<a href="#the-list" onclick="findPosts.open( \'media[]\',\''.$post->ID.'\' );return false;" class="hide-if-no-js">'.__( 'Change Parent' ).'</a>';
	}
	return $actions;
}
add_filter('media_row_actions', 'allow_media_reattachment', 10, 2);


?>

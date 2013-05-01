<?php

/* Define the custom box */

add_action( 'add_meta_boxes', 'support_group_location_box' );

/* Do something with the data entered */
add_action( 'save_post', 'support_group_save_location_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function support_group_location_box() {
    
        add_meta_box(
            'support_group_location',
            __( 'Meeting Information', 'support_group_textdomain' ),
            'support_group_inner_location',
            'support_group'
        );
}

/* Prints the box content */
function support_group_inner_location( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'support_group_noncename' );

  // The actual fields for data entry
  // Use get_post_meta to retrieve an existing value from the database and use the value for the form
  $set_group_address = get_post_meta( $post->ID, '_support_group_location_address', true );
  echo '<label for="support_group_address">';
       _e("Meeting Address:", 'support_group_textdomain' );
  echo '</label> ';
  echo '<input type="text" id="support_group_address" name="support_group_address" value="'.esc_attr($set_group_address).'" size="65" />';
}

/* When the post is saved, saves our custom data */
function support_group_save_location_postdata( $post_id ) {

  // First we need to check if the current user is authorised to do this action. 
  if ( 'page' == $_POST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return;
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // Secondly we need to check if the user intended to change this value.
  if ( ! isset( $_POST['support_group_noncename'] ) || ! wp_verify_nonce( $_POST['support_group_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  // Thirdly we can save the value to the database

  //if saving in a custom table, get post_ID
  $post_ID = $_POST['post_ID'];
  //sanitize user input
  $group_address = sanitize_text_field( $_POST['support_group_address'] );

  // Do something with $group_address 
  // either using 
  add_post_meta($post_ID, '_support_group_location_address', $group_address, true) or
    update_post_meta($post_ID, '_support_group_location_address', $group_address);
  // or a custom table (see Further Reading section below)
}
?>
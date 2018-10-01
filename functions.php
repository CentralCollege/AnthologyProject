<?php
//Add styles from parent
function cui_add_styles() {
    if( is_page() || is_archive() || is_single() || is_404() ){
      wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto+Condensed:700%7CRaleway:800');
      wp_enqueue_style( 'interior-style', get_stylesheet_directory_uri() . '/css/interior.css', '', '1.1.8' );
      wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/external-libraries/font-awesome/css/font-awesome.min.css', '1.1.0' );
    }
     else{
      wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    }

}
add_action( 'wp_enqueue_scripts', 'cui_add_styles' );

// ------------------------------------------------------------------------
// Custom post type for alumni events
// ------------------------------------------------------------------------
// Use this to set expires for this post type: https://code.tutsplus.com/tutorials/add-an-expiry-date-to-wordpress-posts--cms-22665
function events_post_type() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Events', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Events', 'text_domain' ),
		'name_admin_bar'        => __( 'Event', 'text_domain' ),
		'archives'              => __( '', 'text_domain' ),
		'attributes'            => __( 'Event Attributes', 'text_domain' ),
		'all_items'             => __( 'All Events', 'text_domain' ),
		'add_new_item'          => __( 'Add New Event', 'text_domain' ),
		'add_new'               => __( 'Add Event', 'text_domain' ),
		'new_item'              => __( 'New Event', 'text_domain' ),
		'edit_item'             => __( 'Edit Event', 'text_domain' ),
		'update_item'           => __( 'Update Event', 'text_domain' ),
		'view_item'             => __( 'View Event', 'text_domain' ),
		'view_items'            => __( 'View Events', 'text_domain' ),
		'search_items'          => __( 'Search Events', 'text_domain' ),
		'not_found'             => __( 'Event Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Event Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Header Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set header image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove header image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as header image', 'text_domain' )
	);
	$rewrite = array(
		'slug'                  => 'events',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'Events',
		'description'           => 'Alumni Events',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'hierarchical'          => false,
		'public'                => true,
    'has_archive'           => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'can_export'            => true,
		'rewrite'               => $rewrite,
    'menu_icon'             => 'dashicons-calendar-alt',
    'show_in_rest'          => true,
    'capability_type'       => 'events',
    'capabilities'          => array(
      'edit_post'             => 'edit_event',
      'read_post'             => 'read_event',
      'delete_post'           => 'delete_event',
      'edit_posts'            => 'edit_events',
      'edit_others_posts'     => 'edit_others_events',
      'edit_published_posts'  => 'edit_published_events',
      'publish_posts'         => 'publish_events',
      'read_private_posts'    => 'read_private_events',
      'create_posts'          => 'edit_events')
	);
	register_post_type( 'events', $args );

}
add_action( 'init', 'events_post_type', 0 );

// ------------------------------------------------------------------------
// Custom post type for funding proiorities
// ------------------------------------------------------------------------
// Use this to set expires for this post type: https://code.tutsplus.com/tutorials/add-an-expiry-date-to-wordpress-posts--cms-22665
function priorities_post_type() {

	$labels = array(
		'name'                  => _x( 'Funding Priorities', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Funding Priorities', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Funding Priorities', 'text_domain' ),
		'name_admin_bar'        => __( 'Funding Priority', 'text_domain' ),
		'archives'              => __( '', 'text_domain' ),
		'attributes'            => __( 'Funding Priority Attributes', 'text_domain' ),
		'all_items'             => __( 'All Funding Priorities', 'text_domain' ),
		'add_new_item'          => __( 'Add New Funding Priority', 'text_domain' ),
		'add_new'               => __( 'Add Funding Priority', 'text_domain' ),
		'new_item'              => __( 'New Funding Priority', 'text_domain' ),
		'edit_item'             => __( 'Edit Funding Priority', 'text_domain' ),
		'update_item'           => __( 'Update Funding Priority', 'text_domain' ),
		'view_item'             => __( 'View Funding Priority', 'text_domain' ),
		'view_items'            => __( 'View Funding Priorities', 'text_domain' ),
		'search_items'          => __( 'Search Funding Priorities', 'text_domain' ),
		'not_found'             => __( 'Funding Priority Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Funding Priority Not found in Trash', 'text_domain' )
	);
	$rewrite = array(
		'slug'                  => 'priority',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'Funding Priorities',
		'description'           => 'Alumni Funding Priorities',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'hierarchical'          => false,
		'public'                => true,
    'has_archive'           => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'can_export'            => true,
		'rewrite'               => $rewrite,
    'menu_icon'             => 'dashicons-welcome-view-site',
    'show_in_rest'          => true
	);
	register_post_type( 'funding-priorities', $args );

}
add_action( 'init', 'priorities_post_type', 0 );

//Allow funding priorities to have featured images.
add_theme_support('post-thumbnails', array('funding-priorities'));
add_image_size( 'central-home-large', 400, 266, true);

//Setup metaboxes
function cui_setup_event_metaboxes(){
  add_action('add_meta_boxes', 'cui_add_event_metaboxes');
  add_action('save_post', 'cui_save_event_metaboxes');
}
function cui_add_event_metaboxes(){
  add_meta_box('alumni-events', 'Alumni Event Details', 'cui_add_event_metabox_details', 'events');
}

function cui_add_event_metabox_details($post_id){
  wp_nonce_url( basename( __FILE__ ), 'cui_event_metabox_nonce' );
  ?><p><label for="eventID">Event ID from Datatel</label>: <input type="text" name="eventID" id="eventID" value="<?php echo get_post_meta($post_id->ID, 'eventID', true);?>" style="width: 25%;"></p>
  <p><label for="eventDisplayDate">Event Display Date</label>: <input type="text" name="eventDisplayDate" id="eventDisplayDate" value="<?php echo get_post_meta($post_id->ID, 'eventDisplayDate', true);?>" style="width: 25%;"><br />
  <span class="dashicons dashicons-info"></span> Reminder: Use <a href="https://brand.central.edu/writing-style-guide/">AP Style</a> when formatting dates.</p>
  <p><label for="eventDate">Event Date</label>: <input type="text" name="eventDate" id="eventDate" value="<?php echo date('m/d/Y', get_post_meta($post_id->ID, 'eventDate', true));?>" style="width: 25%;"></p>
  <p><label for="urlOverride">URL Override (advanced)</label>: <input type="text" name="urlOverride" id="urlOverride" value="<?php echo get_post_meta($post_id->ID, 'urlOverride', true);?>" style="width: 25%;"><br />
  <span class="dashicons dashicons-info"></span> Use "NONE" if you don't want an online registration button to appear.</p><?php
}
function cui_save_event_metaboxes($post_id){
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'cui_event_metabox_nonce' ] ) && wp_verify_nonce( $_POST[ 'cui_event_metabox_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST['eventID'])){
      update_post_meta( $post_id, 'eventID', sanitize_text_field( $_POST[ 'eventID' ] ) );
    }
    if ( isset( $_POST['eventDisplayDate'])){
      update_post_meta( $post_id, 'eventDisplayDate', sanitize_text_field( $_POST['eventDisplayDate']) );
    }
    if ( isset( $_POST['eventDate'])){
      $convertDate = strtotime( $_POST[ 'eventDate' ] );
      update_post_meta( $post_id, 'eventDate', sanitize_text_field( $convertDate ) );
    }
    if ( isset( $_POST['urlOverride'])){
      update_post_meta( $post_id, 'urlOverride', sanitize_text_field( $_POST[ 'urlOverride' ] ) );
    }
  }

  add_action('load-post.php', 'cui_setup_event_metaboxes');
  add_action('load-post-new.php', 'cui_setup_event_metaboxes');

  //Setup metaboxes for funding priorities
  function cui_setup_funding_metaboxes(){
    add_action('add_meta_boxes', 'cui_add_funding_metaboxes');
    add_action('save_post', 'cui_save_funding_metaboxes');
  }
  function cui_add_funding_metaboxes(){
    add_meta_box('funding-details', 'Funding Priority Details', 'cui_add_funding_metabox_details', 'funding-priorities');
  }

  function cui_add_funding_metabox_details($post_id){
    wp_nonce_url( basename( __FILE__ ), 'cui_funding_metabox_nonce' );
    ?>
    <p><label for="urlOverride">URL Override</label>: <input type="text" name="urlOverride" id="urlOverride" value="<?php echo get_post_meta($post_id->ID, 'urlOverride', true);?>" style="width: 25%;"><br />
    <span class="dashicons dashicons-info"></span> Use this if you don't want to point to the automatically generated <span class="dashicons dashicons-wordpress-alt"></span> page.</p><?php
  }
  function cui_save_funding_metaboxes($post_id){
      $is_autosave = wp_is_post_autosave( $post_id );
      $is_revision = wp_is_post_revision( $post_id );
      $is_valid_nonce = ( isset( $_POST[ 'cui_funding_metabox_nonce' ] ) && wp_verify_nonce( $_POST[ 'cui_funding_metabox_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

      if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
          return;
      }
      if ( isset( $_POST['urlOverride'])){
        update_post_meta( $post_id, 'urlOverride', sanitize_text_field( $_POST[ 'urlOverride' ] ) );
      }
    }

    add_action('load-post.php', 'cui_setup_funding_metaboxes');
    add_action('load-post-new.php', 'cui_setup_funding_metaboxes');

function cui_change_event_archive_output($query){
  if ( $query->is_main_query() && is_post_type_archive('events') && !is_admin()) {
        $query->set( 'posts_per_page', 25 );
        $query->set( 'meta_key', 'eventDate' );
        $query->set( 'orderby', 'meta_value_num' );
        $query->set( 'order', 'ASC' );

        $query->set( 'meta_value', strtotime('-1 day', time() ));
        $query->set( 'meta_compare', '>=' );
    }
}
add_action( 'pre_get_posts', 'cui_change_event_archive_output' );

// ------------------------------------------------------------------------
// Add info to API
// ------------------------------------------------------------------------
function cui_rest_prepare_post($data, $post, $request){
  $_data = $data->data;
  $_data['eventDisplayDate'] = get_post_meta( $post->ID, 'eventDisplayDate', true );
  $data->data = $_data;
	return $data;
}
add_filter( 'rest_prepare_post', 'cui_rest_prepare_post', 10, 3);

// ------------------------------------------------------------------------
// Add info to posts table in dashboard
// ------------------------------------------------------------------------
function cui_event_table_content( $column_name, $post_id ) {
    if ($column_name == 'event_date') {
     echo get_post_meta( $post_id, 'eventDisplayDate', true );
    }
    if ($column_name == 'event_expires_date') {
     echo date('m/d/Y', get_post_meta($post_id, 'eventDate', true));
    }
}
add_action( 'manage_events_posts_custom_column', 'cui_event_table_content', 10, 2 );

function cui_event_table_head( $defaults ) {
    $defaults['event_date']  = 'Event Display Date';
    $defaults['event_expires_date']  = 'Event Expires';
    $defaults['author'] = 'Added By';
    return $defaults;
}
add_filter('manage_events_posts_columns', 'cui_event_table_head');

// ------------------------------------------------------------------------
// Setup user role and capabilities for events
// ------------------------------------------------------------------------
function cui_clear_event_role(){
  remove_role( 'events_admin' );
}
add_action('after_switch_theme', 'cui_clear_event_role', 100);

function cui_add_event_role(){
  add_role('events_admin', 'Alumni Event Administrator',
    array(
      'read'=> true,
      'edit_event' => true,
      'edit_events' => true,
      'publish_events' => true,
      'read_event' => true,
      'edit_others_events' => true,
      'delete_events' => true));
}
add_action( 'after_switch_theme', 'cui_add_event_role', 101 );

function cui_add_capabilities(){
  //Add capabilities for Alumni Event Administrator Role
  $role = get_role( 'events_admin' );
  $role->add_cap('events_admin', 'edit_event');
  $role->add_cap('events_admin', 'read_event');
  $role->add_cap('events_admin', 'delete_event');
  $role->add_cap('events_admin', 'edit_events');
  $role->add_cap('events_admin', 'edit_others_events');
  $role->add_cap('events_admin', 'publish_events');
  $role->add_cap('events_admin', 'read_private_events');
  $role->add_cap('events_admin', 'edit_events');
  $role->add_cap('events_admin', 'edit_published_events');

  //Add capabilities for Administrators
  $role = get_role( 'administrator' );
  $role->add_cap('edit_event');
  $role->add_cap('read_event');
  $role->add_cap('delete_event');
  $role->add_cap('edit_events');
  $role->add_cap('edit_others_events');
  $role->add_cap('publish_events');
  $role->add_cap('read_private_events');
  $role->add_cap('edit_events');
  $role->add_cap('edit_published_events');
}
add_action('after_switch_theme', 'cui_add_capabilities', 102);

function cui_notify_slack( $post_id ){
    if( !wp_is_post_autosave( $post_id ) && get_post_type( $post_id ) == 'events' ){
      $current_user = wp_get_current_user();
      $url = 'https://hooks.slack.com/services/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';
      $JSONpayload = '{
        "channel" : "#web",
        "username" : "Alumni Events" ,
        "text" : "' . $current_user->user_firstname . ' ' . $current_user->user_lastname . ' added the ' . get_the_title( $post_id ) . ' alumni event. \nSee the event at ' . get_permalink( $post_id ) . '.",
        "icon_emoji" : ":information_source:"
      }';
      $args = array(
        'method' => 'POST',
        "body" => array( 'payload' => $JSONpayload));
      wp_remote_post($url, $args);
    }
  }
  add_action( 'publish_events', 'cui_notify_slack');

//Add shortcode to handle the Douwstra blog
function central_remote_feed_shortcode($atts){
  //Setup defaults for the shortcode
  $a = shortcode_atts(
    array(
        'url' => null,
        'photos' => false,
        'transient' => 'cui_remote_feed',
        'quantity' => 4,)
      , $atts );
    $a['photos'] = filter_var($a['photos'], FILTER_VALIDATE_BOOLEAN);

  if (strlen($a['url']) && strlen($a['transient'])){
    $getCachedInfo = get_transient($a['transient']);
    // Retrieve remote data
    if(false === $getCachedInfo){
        $remoteData = wp_remote_retrieve_body(wp_remote_get($a['url']));
        set_transient($a['transient'], $remoteData, 60*15);
        $getCachedInfo = get_transient($a['transient']);
    }
    $feed = json_decode($getCachedInfo, true);

    //Setup vars
    $output = '';
    $displayCount = $a['quantity'];
    $count = 0;

    $output = $output . '<div class="flexContainer">';
    // Loop over the feed
    foreach($feed as $post){
      if ($count < $displayCount){

        $rowReset = $count % 2;
        // Waste some memory and store these things in easy to use vars
        $title = $post['title']['rendered'];
        $linkToPost = $post['link'];
        $date = strtotime( $post['date'] );
        $photoURL = str_replace('http://', 'https://', $post['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['medium']['source_url']);
        $photoTitle = $post['_embedded']['wp:featuredmedia'][0]['title']['rendered'];

        //Create the output
        $output = $output . '<div class="flexItem">';
        $output = $output . '<h5><a href="' . $linkToPost .'">' . date('M. j, Y' , $date) . '<br />' . $title . '</a></h5>';
        if ($a['photos']){
          $output = $output . '<p><a href="' . $linkToPost .'"><img src="' . $photoURL . '" alt="' . $photoTitle . '"></a>';
        }
        $output = $output . '</div>';
        //$output = $output . '<hr />';
      }
      $count ++;
    }
    $output = $output . '</div>';

    return $output;
  }
}
add_shortcode('remote_feed', 'central_remote_feed_shortcode' );
?>

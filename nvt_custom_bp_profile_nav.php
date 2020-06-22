<?php




// require_once("db.php");


/*
Plugin Name: nvt_custom_bp_profile_nav
Plugin URI: https://nvtam.com/
Description: Add Company tab to BuddyBoss profile nav
Version: 1.0
Author: NguyenTam
Author URI: https://nvtam.com/
License: GPL
*/
if (!class_exists("Nvt_Custom_BP_Profile_Nav")) {
    class Nvt_Custom_BP_Profile_Nav
    {
        function __construct()
        {
            if (!function_exists('add_shortcode')) {
                return;
            }
            add_shortcode( 'nvt_custom_bp_profile_nav' , array(&$this, 'create_shortcode_func') );
        }
        function create_shortcode_func($atts=array(), $content=null)
        {
            extract(shortcode_atts(array('text' => 'Companies'), $atts));
            return ncbpn_show_tab($text);
        }
    }
}
function ncbpn_load()
{
    global $mfpd;
    $mfpd = new Nvt_Custom_BP_Profile_Nav();
}
add_action( 'plugins_loaded', 'ncbpn_load' );
function ncbpn_show_tab($text){
    echo "Will show list company here !!";
}
function ncbpn_add_admin_menu()
{
    add_menu_page (
        'Custom BP Profile Nav',
        'Custom BP Profile Nav',
        'manage_options',
        'nvt_custom_bp_profile_nav',
        'ncbpn_view_guid',
        '',
        '2'
    );
}
function ncbpn_view_guid()
{
    echo '<h1>Shortcode is: [nvt_custom_bp_profile_nav]</h1>';
    
}
add_action('admin_menu', 'ncbpn_add_admin_menu');
function ncbpn_add_tabs(){
    global $bp;
    bp_core_new_nav_item( array( 
        'name' => 'Company', 
        'slug' => 'company', 
        'position' => 45,
        'screen_function' => 'ibenic_budypress_recent_posts',
        'show_for_displayed_user' => true,
        'item_css_id' => 'ibenic_budypress_recent_posts'
    ) );
}
add_action( 'bp_setup_nav', 'ncbpn_add_tabs', 1000 );
function ibenic_budypress_recent_posts () {

    add_action( 'bp_template_content', 'ncbpn_recent_posts_content' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
/*function ncbpn_recent_posts_title() {
    echo "Company";
}*/


/************************************************************************************************************************************************************
 *                                      add css and js file
 ************************************************************************************************************************************************************/
function npp_enqueue_scripts_and_styles()
{
    wp_register_style( 'bootstrap.min', plugin_dir_url( __FILE__ ).'css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );

    wp_register_style( 'plugin_css', plugin_dir_url( __FILE__ ).'css/plugin_css.css' );
    wp_enqueue_style( 'plugin_css' );

    wp_register_script( "bootstrap_js", WP_PLUGIN_URL.'/nvt_custom_bp_profile_nav/js/bootstrap.min.js', array('jquery') );
    
    // đăng ký ajax và script
    wp_register_script( "js", WP_PLUGIN_URL.'/nvt_custom_bp_profile_nav/js/script_plugin.js', array('jquery') );
    wp_localize_script( 'js', 'ajaxobject', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'rootURL'=>site_url()));  
    


    wp_enqueue_script( 'bootstrap_js' );
    wp_enqueue_script( 'js' );
}
add_action( 'wp_enqueue_scripts', 'npp_enqueue_scripts_and_styles' );


/************************************************************************************************************************************************************
 *                                      add Isaac Newton
 ************************************************************************************************************************************************************/
add_action("wp_ajax_form", "handle_form");
add_action("wp_ajax_nopriv_form", "handle_form");
function handle_form(){

  //  name,
  //  address,
  //  phone,
  //  website,
  //  description,




    //data in form
    // wp_send_json( array('code'=> 200, 'msg'=>'OK men' . $_POST['name'] . '<br/>' .$_POST['address'] . '<br/>' . $_POST['phone'] . '<br/>'. $_POST['website'] . '<br/>'. $_POST['description'] ) );
    

    
   
    // Full column in table 
    // $arrayData['post_author'] = $user_id;
    // $arrayData['post_date'] = $user_id;
    // $arrayData['post_date_gmt'] = $user_id;
    // $arrayData['post_content'] = $user_id;
    // $arrayData['post_title'] = $_POST['name'] ;
    // $arrayData['post_excerpt'] = $user_id;
    // $arrayData['post_status'] = $user_id;
    // $arrayData['comment_status'] = $user_id;
    // $arrayData['comment_status'] = $user_id;
    // $arrayData['post_password'] = $user_id;
    // $arrayData['post_name'] = $user_id;
    // $arrayData['to_ping'] = $user_id;
    // $arrayData['post_modified'] = $user_id;
    // $arrayData['post_modified_gmt'] = $user_id;
    // $arrayData['post_content_filtered'] = $user_id;
    // $arrayData['post_parent'] = $user_id;
    // $arrayData['guid'] = $user_id;
    // $arrayData['menu_order'] = $user_id;
    // $arrayData['post_type'] = $user_id;
    // $arrayData['post_mime_type'] = $user_id;
    // $arrayData['comment_count'] = $user_id;

    


    //  data just need
    // global $wpdb;
    // $arrayData = array(); 
    // $arrayData['post_author'] = $user_id;
    // $arrayData['post_title'] = $_POST['name'] ; 
    // $arrayData['post_status'] = "publish";
    // $arrayData['comment_status'] = "closed";
    // $arrayData['ping_status'] = "closed";
    // $arrayData['post_name'] = $_POST['name'];
    // $arrayData['post_type'] = "company";


    // $user_id = get_current_user_id();
    //  add new company to post table
    // $res = $wpdb->insert( 
    //   "$wpdb->posts", 
    //   array( 
    //     'post_author' => $user_id, 
    //     'post_title' => $_POST['name'], 
    //     'post_type' => "company" 
    //   ), 
    //   array( 
    //     '%d', 
    //     '%s',
    //     '%s'
    //   ) 
    // );

    // global $wp;
    // $url = home_url( $wp->request );

    wp_send_son(array('code'=> 200, 'msg'=> "ok" )); 
    
    // wp_redirect( $url . "/news-feed/members/admin/company/", 301 );
    
    //  if(!$res){
    //     wp_send_json( array('code'=> 404, 'msg'=>'Can not insert') );
    // }
    // else {
    //     wp_send_json( array('code'=>200, 'msg'=>'Successfully !') );
    // }

}




//  popup form bootstrap add new company
function ncbpn_recent_posts_content() {

  // global $wpdb;
  // $result = [];
  // $result = $wpdb->get_results ("SELECT * FROM $wpdb->posts WHERE post_type = 'company'");
  
  $topForm = '<div class="text-right mb-4">
  <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add Company</button>
  </div>
  
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLongTitle">Add Company</h6>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="formGroupExampleInput">Company Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name of company">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Address</label>
              <input type="text" class="form-control" id="address" placeholder="Address">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Tel</label>
              <input type="text" class="form-control" id="phone" placeholder="Tel number">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Website</label>
              <input type="text" class="form-control" id="website" placeholder="Company website">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Infomation</label>
              <input type="text" class="form-control" id="description" placeholder="Short description">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success btn-sm" id="submit">Save</button>
        </div>
      </div>
    </div>
  </div>
  <div class="content">' ;
  
  $botomForm = '</div>';


  if(count($result) > 0){

    foreach ($result as $value) {
    
    }


  }

 
  
  echo $topForm . $botomForm; 
 

// <ul class="list-group">
// <li class="list-group-item ">Cras justo odio</li>
// <li class="list-group-item">Dapibus ac facilisis in</li>
// <li class="list-group-item">Morbi leo risus</li>
// <li class="list-group-item">Porta ac consectetur ac</li>
// <li class="list-group-item">Vestibulum at eros</li>
// </ul>
    
}



// function FunctionName()
// {
//   $label = array(
//     'name' => "Company",
//     'singular_name'=> "Company",
//     'add_new' => 'Add Item',
//     'all_items' => 'All Item',
//     'add_new_item' => 'New Item',
//     'edit_item' => 'Edit Item',
//     'new_item' => 'New Item',
//     'view_item' => 'View Item',
//     'search_item' => 'Search Company',
//     'not_found' => 'No items found',
//     'not_found_in_trash' => 'No items found in trash',
//     'parent_item_colon' => 'Parent Item'
//   );
//   $args = array(
//       'labels' => $label ,
//       'public' => true,
//       'has_archive' => true ,
//       'publicly_queryable' => true,
//       'query_var' => true,
//       'rewrite' => true ,
//       'capability_type' => 'post' ,
//       'hierarchical' => false ,
//       'supports' => array(
//         'title',
//         'edittor',
//         'excerpt',
//         'thumbnail',
//         'revisions',
//       ),
//       'taxnonomies' => array('category','post_tag'),
//       'menu_position' => 5 ,
//       'exclude_from_search' => false
//   );
// }
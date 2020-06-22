<?php
require_once ("wp-includes/wp-db.php");
class DB{
    public function getAllPost(){
        global $wpdb;
        return $wpdb -> get_results( "SELECT * FROM wp8i_posts" );
    }
    // public function getMemberIsOnline(){
    //     global $wpdb;
    //     return $wpdb->get_results( "SELECT * FROM wp_psychic_mgt where prov_status = 1 order by sort_status asc" );
    // }
    // public function memberDetail($pin_no=0){
    //     global $wpdb;
    //     return $wpdb->get_results( "SELECT mgt.screen_name, mgt.pin_no, mgt.profile_picture, mgt.available_status, mgt.sms_activate, mgt.modalities, mgt.long_profile_desc, roster.* FROM wp_psychic_mgt as mgt left join wp_psychic_roster as roster on roster.wp_user_id = mgt.wp_userid where mgt.pin_no = ".$pin_no );
    // }
    // public function getAllMemberRev($pin_no=0){
    //     global $wpdb;
    //     return $wpdb->get_results( "SELECT * FROM wp_psychic_rev where pin_no = ".$pin_no." and approval = 1 order by id desc limit 1" );
    // }
    // public function insertReview($data=array()){
    //     global $wpdb;
    //     return $wpdb->insert( 'wp_psychic_rev', $data );
    // }
	
	// public function getAllMemberRevByPin($pin_no=0){
    //     global $wpdb;
    //     return $wpdb->get_results( "SELECT * FROM wp_psychic_rev where pin_no = ".$pin_no." and approval = 1 order by id desc" );
    // }
}

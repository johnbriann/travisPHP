<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('make_hashtags_clickable')) {

    function make_hashtags_clickable($content) {
		$content = makeurlsclickable($content);
        return preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '<a target="_blank" href="' . base_url() . 'social/hashtag/\2"> #\2</a>', $content);
    }

}

if (!function_exists('makeurlsclickable')) {
 function makeurlsclickable($text) {
  //preg_replace('"\b(http|https|ftp|ftps?://\S+)"', '<a href="$1">$1</a>', $text);
  
  //$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
  //$reg_exUrl = "@(http(s)?)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@";
  $reg_exUrl = "@(http(s)?)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@";
  //$reg_exUrl = "#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#";
  $text = str_replace("<br>"," <br>", $text);
  preg_match_all("@(http(s)?)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@", $text, $matches);
  ///preg_match_all($reg_exUrl, $text, $matches);
  $usedPatterns = array();
  //echo "<pre>"; print_r($matches);exit;
  foreach($matches[0] as $pattern){
   $pattern = strip_tags($pattern);
   if(!array_key_exists($pattern, $usedPatterns)){
    $usedPatterns[$pattern]=true;
    if (strpos($pattern, '"') === false && strpos($pattern, "'") === false) {
 //                echo htmlspecialchars($pattern)."<br>";
     if (filter_var($pattern, FILTER_VALIDATE_URL) !== FALSE) {
      $text = str_replace  ($pattern, '<a href="' . strip_tags($pattern) . '" rel="nofollow" target="_blank">' . $pattern . '</a> ', $text); 
     }
    }
   }
  }//exit;
  return $text;
 }
}

if (!function_exists('time_ago')) {

    function time_ago($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full)
            $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . '' : 'just now';
    }

}

if(!function_exists('get_all_users')){
    function get_all_users($id){
        $CI = & get_instance();
        $CI->db->select("jp_front_users.front_user_id, jp_front_users.first_name, jp_front_users.last_name, jp_front_users.user_image");
        $CI->db->from("social_followers");
        $CI->db->join("jp_front_users", "jp_front_users.front_user_id = social_followers.follower_id");
        $CI->db->where("social_followers.followed_id", $id);
        $CI->db->where("jp_front_users.status", 1);
        $CI->db->group_by("social_followers.follower_id");
        $query1 = $CI->db->get()->result_array();
		$CI->db->select("jp_front_users.front_user_id, jp_front_users.first_name, jp_front_users.last_name, jp_front_users.user_image");
        $CI->db->from("social_followers");
        $CI->db->join("jp_front_users", "jp_front_users.front_user_id = social_followers.followed_id");
        $CI->db->where("social_followers.follower_id", $id);
        $CI->db->where("jp_front_users.status", 1);
        $CI->db->group_by("social_followers.followed_id");
        $query2 = $CI->db->get()->result_array();
		$query = array_merge($query1,$query2);
        return $query;
    }
}
if(!function_exists('get_all_users_following')){
    function get_all_users_following($id){
        $CI = & get_instance();
        $CI->db->select("jp_front_users.front_user_id, jp_front_users.first_name, jp_front_users.last_name, jp_front_users.user_image");
        $CI->db->from("social_followers");
        $CI->db->join("jp_front_users", "jp_front_users.front_user_id = social_followers.following_id");
        $CI->db->where("social_followers.follower_id", $id);
        $CI->db->where("jp_front_users.status", 1);
        $CI->db->group_by("social_followers.follower_id");
        $query = $CI->db->get()->result_array();
        return $query;
    }
}

if (!function_exists('get_first_two_comments')) {

    function get_first_two_comments($id) {
        $CI = & get_instance();
        $CI->db->select("jp_front_users.front_user_id, jp_front_users.first_name, jp_front_users.last_name, jp_front_users.user_image");
        $CI->db->from("social_followers");
        $CI->db->join("jp_front_users", "jp_front_users.front_user_id = social_followers.follower_id");
        $CI->db->where("social_followers.followed_id", $id);
        $CI->db->where("jp_front_users.status", 1);
        $CI->db->group_by("social_followers.follower_id");
        $query = $CI->db->get()->result_array();
        return $query;
    }

}
if (!function_exists('messages_notification')) {
    function messages_notification($user_id = NULL, $user_type = NULL) {
        $CI = & get_instance();
		$CI->db->select('jp_trip.title, kt_booking.book_id, jp_front_users.first_name, jp_front_users.last_name, jp_messages.message');
		if($user_type == 1){
			$CI->db->where('jp_trip.user_id',$user_id);
		}else{
			$CI->db->where('kt_booking.booked_by_id',$user_id);
		}
		$CI->db->where('kt_booking.guide_status',1);
		$CI->db->where('jp_messages.view_status','unseen');
		$CI->db->where('jp_messages.sender_id != ',$user_id);
		$CI->db->from('jp_trip');
		$CI->db->join('kt_booking','kt_booking.trip_id = jp_trip.trip_id');
		$CI->db->join('jp_messages','jp_messages.booking_id = kt_booking.book_id');
		$CI->db->join('jp_front_users','jp_front_users.front_user_id = jp_messages.sender_id');
		$CI->db->group_by('jp_messages.id');
		$messages_notification = $CI->db->get()->result_array();
        return $messages_notification;
    }

}
if (!function_exists('email_review_notification')) {
    function email_review_notification($user_id = NULL) {
        $CI = & get_instance();
		$email_reviews = array();
		$CI->db->select('jp_review.review_id,kt_booking.book_id,kt_booking.booking_type');
		$CI->db->where('jp_review.pending',0);
		$CI->db->where('jp_review.customer_id',$user_id);
		$CI->db->join('kt_booking','kt_booking.book_id = jp_review.booking_id');
		$q2 = $CI->db->get('jp_review')->result_array();
		foreach($q2 as $q2_key => $q2_row){
			if($q2_row['booking_type'] == 'lodge'){
				$CI->db->select('jp_front_users.front_user_id as trip_id, jp_front_users.front_user_name_slug as slug, jp_front_users.first_name as title, jp_review.review_id');
				$CI->db->join('jp_front_users','jp_front_users.front_user_id = jp_review.guide_id');
			}else{
				$CI->db->select('jp_trip.trip_id, jp_trip.slug, jp_trip.title, jp_review.review_id');
				$CI->db->join('jp_trip','jp_trip.trip_id = jp_review.trip_id');
			}
			$CI->db->where('jp_review.review_id',$q2_row['review_id']);
			$CI->db->group_by('jp_review.review_id');
			$email_reviews[] = $CI->db->get('jp_review')->row_array();
		}
		// $email_review_notification = count($email_reviews);
        return $email_reviews;
    }

}
if (!function_exists('new_booking_notification')) {
    function new_booking_notification($user_id = NULL) {
        $CI = & get_instance();
		$new_booking_notification = array();
		$CI->db->select('kt_booking.booking_type,kt_booking.book_id');
		$CI->db->where('kt_booking.guide_id',$user_id);
		$CI->db->where('kt_booking.booking_type','trip');
		$CI->db->where('kt_booking.status',1);
		$CI->db->where('kt_booking.guide_status',0);
		$CI->db->where('kt_booking.guide_viewed','no');
		$CI->db->order_by('kt_booking.t_start_date','desc');
		$q3 = $CI->db->get('kt_booking')->result_array();
		foreach($q3 as $q3_key => $q3_row){
			if($q3_row['booking_type'] == 'lodge'){
				$CI->db->select('kt_booking.book_id, kt_booking.t_start_date, jp_front_users.first_name as title');
				$CI->db->join('jp_front_users','jp_front_users.front_user_id = kt_booking.trip_id');
			}else{
				$CI->db->select('kt_booking.book_id, kt_booking.t_start_date, jp_trip.title');
				$CI->db->where('jp_trip.trip_type !=',3);
				$CI->db->join('jp_trip', 'jp_trip.trip_id = kt_booking.trip_id');
			}
			$CI->db->where('kt_booking.book_id',$q3_row['book_id']);
			$CI->db->from('kt_booking');
			$CI->db->group_by('kt_booking.book_id');
			$new_booking_notification[] = $CI->db->get()->row_array();
		}
		foreach($new_booking_notification as $row){
			$booking_date = new DateTime($row['booking_date']);
			$now_date = new DateTime(date('Y-m-d H:i:s'));
			$diff = $now_date->diff($booking_date);
			$hours = $diff->h;
			$hour = $hours + ($diff->days*24);
			if($hour > 24){
				//automatically canceled
				$CI->db->where('book_id',$row['book_id']);
				$CI->db->update('kt_booking',array('guide_status' => 2,'auto_decline' => 1, 'guide_viewed' => 'no', 'customer_viewed' => 'no', 'guide_response' => 'Automatically Declined.'));
			}
		}
        return $new_booking_notification;
    }
}
if (!function_exists('calendar_booking_confirm_notification')) {
    function calendar_booking_confirm_notification($user_id = NULL) {
        $CI = & get_instance();
		$calendar_booking_confirm_notification = array();
		$CI->db->select('kt_booking.booking_type,kt_booking.book_id');
		$CI->db->where('kt_booking.guide_id',$user_id);
		$CI->db->where('kt_booking.booking_type','trip');
		$CI->db->where('kt_booking.status',1);
		$CI->db->where('kt_booking.guide_status',1);
		$CI->db->where('kt_booking.guide_viewed','no');
		$CI->db->where('kt_booking.pre_auth_id','calendar-booking');
		$CI->db->order_by('kt_booking.t_start_date','desc');
		$q3 = $CI->db->get('kt_booking')->result_array();
		foreach($q3 as $q3_key => $q3_row){
			if($q3_row['booking_type'] == 'lodge'){
				$CI->db->select('kt_booking.book_id, kt_booking.t_start_date, jp_front_users.first_name as title');
				$CI->db->join('jp_front_users','jp_front_users.front_user_id = kt_booking.trip_id');
			}else{
				$CI->db->select('kt_booking.book_id, kt_booking.t_start_date, jp_trip.title');
				$CI->db->where('jp_trip.trip_type !=',3);
				$CI->db->join('jp_trip', 'jp_trip.trip_id = kt_booking.trip_id');
			}
			$CI->db->where('kt_booking.book_id',$q3_row['book_id']);
			$CI->db->from('kt_booking');
			$CI->db->group_by('kt_booking.book_id');
			$calendar_booking_confirm_notification[] = $CI->db->get()->row_array();
		}
        return $calendar_booking_confirm_notification;
    }
}

if (!function_exists('my_booking_notification')) {
    function my_booking_notification($user_id = NULL) {
        $CI = & get_instance();
		$my_booking_notification = array();
		$CI->db->select('kt_booking.booking_type,kt_booking.book_id');
		$CI->db->where('kt_booking.booked_by_id',$user_id);
		// $CI->db->where('kt_booking.pre_auth_id != ','calendar-booking');
		$CI->db->where('kt_booking.booking_type','trip');
		$CI->db->where('kt_booking.guide_status',1);
		$CI->db->where('kt_booking.customer_viewed','no');
		$CI->db->order_by('kt_booking.t_start_date','desc');
		$q4 = $CI->db->get('kt_booking')->result_array();
		foreach($q4 as $q4_key => $q4_row){
			if($q3_row['booking_type'] == 'lodge'){
				$CI->db->select('kt_booking.book_id, kt_booking.t_start_date, jp_front_users.first_name as title');
				$CI->db->join('jp_front_users','jp_front_users.front_user_id = kt_booking.trip_id');
			}else{
				$CI->db->select('kt_booking.book_id, kt_booking.t_start_date, jp_trip.title');
				$CI->db->where('jp_trip.trip_type !=',3);
				$CI->db->join('jp_trip', 'jp_trip.trip_id = kt_booking.trip_id');
			}
			$CI->db->where('kt_booking.book_id',$q4_row['book_id']);
			$CI->db->from('kt_booking');
			$CI->db->group_by('kt_booking.book_id');
			$my_booking_notification[] = $CI->db->get()->row_array();
		}
		foreach($my_booking_notification as $tey => $tow){
			if($tow['title'] == ''){
				unset($my_booking_notification[$tey]);
				continue;
			}
		}
        return $my_booking_notification;
    }

}
if (!function_exists('auto_decline_notification')) {
    function auto_decline_notification($user_id = NULL) {
        $CI = & get_instance();
		$auto_decline_notification = array();
		$CI->db->select('kt_booking.booking_type,kt_booking.book_id');
		$CI->db->where('kt_booking.guide_id',$user_id);
		$CI->db->where('kt_booking.guide_status',2);
		$CI->db->where('kt_booking.auto_decline',1);
		$CI->db->where('kt_booking.guide_viewed','no');
		$q5 = $CI->db->get('kt_booking')->result_array();
		foreach($q5 as $q5_key => $q5_row){
			if($q3_row['booking_type'] == 'lodge'){
				$CI->db->select('kt_booking.book_id, kt_booking.t_start_date, jp_front_users.first_name as title');
				$CI->db->join('jp_front_users','jp_front_users.front_user_id = kt_booking.trip_id');
			}else{
				$CI->db->select('kt_booking.book_id, kt_booking.t_start_date, jp_trip.title');
				$CI->db->where('jp_trip.trip_type !=',3);
				$CI->db->join('jp_trip', 'jp_trip.trip_id = kt_booking.trip_id');
			}
			$CI->db->where('kt_booking.book_id',$q5_row['book_id']);
			$CI->db->from('kt_booking');
			$CI->db->group_by('kt_booking.book_id');
			$auto_decline_notification[] = $CI->db->get()->row_array();
		}
	}
}
if (!function_exists('canceled_notification')) {
    function canceled_notification($user_id = NULL) {
        $CI = & get_instance();
		$canceled_notification = array();
		$CI->db->select('kt_booking.booking_type,kt_booking.book_id');
		$CI->db->where('kt_booking.booked_by_id',$user_id);
		$CI->db->where('kt_booking.customer_viewed','no');
		$CI->db->where('kt_booking.guide_status',2);
		$CI->db->where('kt_booking.auto_decline',1);
		$q6 = $CI->db->get('kt_booking')->result_array();
		foreach($q6 as $q6_key => $q6_row){
			if($q3_row['booking_type'] == 'lodge'){
				$CI->db->select('kt_booking.book_id, kt_booking.t_start_date, jp_front_users.first_name as title');
				$CI->db->join('jp_front_users','jp_front_users.front_user_id = kt_booking.trip_id');
			}else{
				$CI->db->select('kt_booking.book_id, kt_booking.t_start_date, jp_trip.title');
				$CI->db->where('jp_trip.trip_type !=',3);
				$CI->db->join('jp_trip', 'jp_trip.trip_id = kt_booking.trip_id');
			}
			$CI->db->where('kt_booking.book_id',$q6_row['book_id']);
			$CI->db->from('kt_booking');
			$CI->db->group_by('kt_booking.book_id');
			$canceled_notification[] = $CI->db->get()->row_array();
		}
        return $canceled_notification;
    }

}
if (!function_exists('payment_accept_notification')) {
    function payment_accept_notification($user_id = NULL) {
        $CI = & get_instance();
		$CI->db->select('kt_guide_payment_record.*');
		$CI->db->where('kt_booking.guide_id',$user_id);
		$CI->db->where('kt_guide_payment_record.guide_seen','no');
		$CI->db->where('kt_guide_payment_record.status',1);
		$CI->db->from('kt_booking');
		$CI->db->join('kt_guide_payment_record','kt_booking.book_id = kt_guide_payment_record.booking_id');
		$CI->db->order_by('kt_guide_payment_record.process_date','desc');
		$payment_accept_notification = $CI->db->get()->result_array();
        return $payment_accept_notification;
    }

}
if (!function_exists('review_notification')) {
    function review_notification($user_id = NULL, $user_type = NULL) {
        $CI = & get_instance();
		if($user_type == 5){
			$CI->db->select('jp_review.review_id, jp_front_users.front_user_name_slug as slug, jp_front_users.first_name as title');
			$CI->db->join('jp_front_users','jp_front_users.front_user_id = jp_review.guide_id');
		}else{
			$CI->db->select('jp_review.review_id, jp_trip.slug, jp_trip.title');
			$CI->db->where('jp_trip.trip_type !=',3);
			$CI->db->join('jp_trip', 'jp_trip.trip_id = jp_review.trip_id');
		}
		$CI->db->where('jp_review.guide_viewed',0);
		$CI->db->where('jp_review.guide_id',$user_id);
		$CI->db->from('jp_review');
		$reviews = $CI->db->get()->result_array();
		// $review_notification = count($reviews);
        return $reviews;
    }

}

if (!function_exists('get_people_tagged')) {

    function get_people_tagged($feed_id = NULL, $table = NULL) {
        $CI = & get_instance();
		$query = $CI->db->where('feed_id',$feed_id)->where('associated_table',$table)->count_all_results('social_tagged_people');
        return $query;
    }

}
if (!function_exists('make_slug')) {

    function make_slug($data = NULL,$id_column = NULL,$id = NULL,$table = NULL,$name_column = NULL) {
		$CI = & get_instance();
		$slug = str_replace(unserialize(SLUGARRAY),'-',trim(strtolower($data)));
		$slug = str_replace('-s-','s-',$slug);
		$slug = str_replace('&','and',$slug);
		$slug = str_replace('andamp;','and',$slug);
		$slug = str_replace('--','-',$slug);
		$slug = str_replace('---','-',$slug);
		$slug = str_replace('----','-',$slug);
		$slug = str_replace('$','USD',$slug);
		$slug = str_replace('.','',$slug);
		if($id != NULL){
			$i = 0;
			$slug2 = htmlspecialchars($slug);
			while($i >= 0) {
				if($id != NULL){
					$CI->db->where($id_column.' != ',$id);
				}
				$CI->db->where($name_column, $slug2);
				$count = $CI->db->count_all_results($table);
				if($count < 1) {
					if($i == 0) {
						return $slug;
						break;
					}else {
						return $slug."-".$i;
						break;
					}                
				}
				$slug2 = $slug."-".($i+1);
				$i++;
			}
		}else{
			return $slug;
		}
    }

}
if (!function_exists('address_from_google')) {

    function address_from_google($address = NULL) {
		if($address != NULL){
			$address = str_replace(" ", "+", $address);
			$json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=".GOOGLE_MAP_KEY."");
			// $json = json_decode($json);
			return json_decode($json);
		}else{
			return 0;
		}
    }

}
if (!function_exists('get_user_data')) {

    function get_user_data($front_user_id = NULL) {
		if($front_user_id != NULL){
			$CI = & get_instance();
			$CI->db->select('*');
			$CI->db->where('front_user_id',$front_user_id);
			$userData = $CI->db->get('jp_front_users')->row_array();
			$userData['bookings'] = $CI->db->where('booked_by_id',$userData['front_user_id'])->where('guide_status',1)->count_all_results('kt_booking');
			$userData['calendar_bookings'] = $CI->db->where('booked_by_id',$userData['front_user_id'])->where('pre_auth_id','calendar-booking')->where('guide_status',1)->count_all_results('kt_booking');
			$userData['last_booking'] = $CI->db->select('t_start_date')->order_by('book_id','DESC')->get('kt_booking')->row_array();
			$bookings_total = $CI->db->select('SUM(total_charges) as total')->where('booked_by_id',$userData['front_user_id'])->where('guide_status',1)->get('kt_booking')->row_array();
			$userData['bookings_total'] = $bookings_total['total'];
			$userData['reviews'] = $CI->db->where('customer_id',$userData['front_user_id'])->count_all_results('jp_review');
			$userData['listings'] = $CI->db->where('assign_to',$userData['front_user_id'])->count_all_results('jp_trip');
			$userData['below_3_reviews'] = $CI->db->where('g_rating <',3)->where('guide_id',$userData['front_user_id'])->count_all_results('jp_review');
			$userData['posts'] = $CI->db->where('user_id',$userData['front_user_id'])->count_all_results('social_feeds');
			$userData['photos'] = $CI->db->where('user_id',$userData['front_user_id'])->where('photo','photo')->count_all_results('social_feed_photos');
			$userData['videos'] = $CI->db->where('user_id',$userData['front_user_id'])->where('photo','video')->count_all_results('social_feed_photos');
			$userData['followers'] = $CI->db->where('followed_id',$userData['front_user_id'])->count_all_results('social_followers');
			$userData['revenue'] = $CI->db->select('SUM(trip_charges) as total')->where('status',1)->where('guide_status',1)->where('guide_id',$userData['front_user_id'])->get('kt_booking')->row_array();
			$userData['reports'] = $CI->db->where('guide_id',$userData['front_user_id'])->count_all_results('jp_reports');
			$report = $CI->db->select('report_id,creation_date')->where('guide_id',$userData['front_user_id'])->order_by('creation_date','DESC')->get('jp_reports')->row_array();
			$userData['last_report'] = date('Y-m-d',strtotime($report['creation_date']));
			if($userData['type'] == 1){
				$packageData = $CI->db->where('user_id',$front_user_id)->order_by('guide_pack_id','DESC')->get('jp_guide_packages')->row_array();
				if(!empty($packageData)){
					$userData['package'] = $packageData['package_id'];
				}else{
					$userData['package'] = 1;
				}
			}else{
				$userData['package'] = 0;
			}
			return $userData;
		}else{
			return 0;
		}
    }

}
if (!function_exists('get_userdata')) {
	function get_userdata($user_id = NULL){
		$CI = & get_instance();
		return $CI->db->select('front_user_id,first_name,last_name,device_id,device_type')->where('front_user_id',$user_id)->get('jp_front_users')->row_array();
	}
}
if (!function_exists('get_user_current_package')) {
	function get_user_current_package($user_id = NULL){
		$CI = & get_instance();
		$package = $CI->db->select('guide_pack_id,package_id')->where('user_id',$user_id)->order_by('guide_pack_id','DESC')->get('jp_guide_packages')->row_array();
		if(!empty($package)){
			return $package['package_id'];
		}else{
			return 0;
		}
		
	}
}

if (!function_exists('url_shortner')) {
	function url_shortner($url = NULL, $type = NULL, $type_id = NULL){
		$CI = & get_instance();
		$url_string = base_url().'goto/'.substr(str_shuffle(str_shuffle(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXVZabcdefghijklmnopqrstuvwxyz'))),15,8);
		$i = 0;
		while($i >= 0){
			$count = $CI->db->where('url', $url_string)->count_all_results('kt_url_shortner');
			if($count == 0){
				break;              
			}
			$url_string = base_url().'goto/'.substr(str_shuffle(str_shuffle(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXVZabcdefghijklmnopqrstuvwxyz'))),15,8);
			$i++;
		}
		$CI->db->insert('kt_url_shortner',array('url'=> $url_string,'type'=> $type,'type_id'=> $type_id,'o_url'=> $url));
		return $url_string;
	}
}
if (!function_exists('pr')) {

    function pr($content) {
		echo "<pre>";
		print_r($content);
		echo "</pre>";
		exit;
    }

}
/* End of file yentna_helper.php */
/* Location: /front_app/helpers/yentna_helper.php */
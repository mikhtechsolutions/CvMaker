<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @param $date
 * @return string
 */
function time_ago($date) {
    if(empty($date)) {
        return "No date provided";
    }
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");
    $now = time();
    $unix_date = strtotime($date);
    // check validity of date
    if(empty($unix_date)) {
        return "";
    }
    // is it future date or past date
    if($now > $unix_date) {
        $difference = $now - $unix_date;
        $tense = "ago";
    } else {
        $difference = $unix_date - $now;
        $tense = "from now";
    }
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if($difference != 1) {
        $periods[$j].= "s";
    }

    return "$difference $periods[$j] {$tense}";
}

/**
 * Example input = 2009-02-02 , output = February 2, 2009
 * @param $datetime
 * @return bool|string
 */
function date_time($datetime)
{
    return date('F j, Y',strtotime($datetime));
}

/**
 * Example input = 2019-08-25 19:52:07 , output = August 25, 2019 07:52:07 pm
 * @param $datetime
 * @return bool|string
 */
function date_with_time($datetime)
{
    return date('F j, Y h:i:s a',strtotime($datetime));
}

function date_y_m_d($date, $y = true, $m = false, $d = false)
{
    list($year, $month, $day) = preg_split('[-]', $date);
    $date = $year;
    if ($m){
        $date .= '-'.$month;
    }
    if ($d) {
        $date .= '-'.$day;
    }
    return $date;
}

/**
 * Array dump, a function for testing during development
 * @param $array
 * @param bool $exit
 */
function print_array($array, $exit=false)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    if ($exit) {
        exit;
    }
}

/**
 * Contries list
 * @return array
 */
function countries_list()
{
    $CI =& get_instance();
    $query = $CI->db->get('countries');
    $countries = [];
    $i=0;
    foreach ($query->result() as $row) {
        $countries[$i]['id'] = $row->id;
        $countries[$i]['name'] = $row->name;
        $i++;
    }
    return $countries;
}

/**
 * Category listing based upon input table name
 * @param string $table
 * @return array
 */
function get_cats_list($table='blog_categories')
{
    $CI =& get_instance();
    $query = $CI->db->get_where($table, array(
        'user_id' => $CI->session->userdata('user_id')));

    $list = [];
    foreach ($query->result() as $row) {
        $list[$row->id] = $row->name;
    }

    return $list;
}

if (!function_exists('get_days')) {
    /**
     * @return array
     */
    function get_days()
    {
        $days = array(
            '1'=>'Satarday',
            '2'=>'Sunday',
            '3'=>'Monday',
            '4'=>'Tuesday',
            '5'=>'Wednesday',
            '6'=>'Thursday',
            '7'=>'Friday'
        );
        return $days;
    }
}

/**
 * Features listing
 * @return array
 */
function get_features_list($display = 1, $is_profile_item = 0)
{
    $CI =& get_instance();
    $CI->db->select();
    $CI->db->from('features');
    if ($display) {
        $CI->db->where('display', 1);
    }
    if (isset($is_profile_item) && $is_profile_item == 1) {
        $CI->db->where('is_profile_item', 1);
    }
    $CI->db->order_by('sort_order');
    $query  = $CI->db->get();
    if (isset($is_profile_item) && $is_profile_item == 1) {
        return $query->result();
    }

    $list = [];
    foreach ($query->result() as $row) {
        $list[$row->id] = $row->name;
    }

    return $list;
}

function calculate_expiry_date($package_id)
{
    $CI =& get_instance();
    $pkg_detail = $CI->db->get_where('packages', array('id' => $package_id))->row();
    $expiry_date = '';
    if ($pkg_detail->type != 'F') {
        $today = date('Y-m-d');
        $expiry_date = date('Y-m-d', strtotime($today. ' + '.$pkg_detail->num_days.' days'));
    }
    return $expiry_date;
}

function get_features_by_user($user_id, $is_profile_item = 0)
{
    $CI =& get_instance();

    $CI->db->select('a.*');
    $CI->db->from('features a');
    $CI->db->join('package_features b', 'a.id = b.feature_id');
    $CI->db->join('user_package c', 'b.package_id = c.package_id');
    $CI->db->where('c.user_id =', $user_id);
    if (isset($is_profile_item) && $is_profile_item == 1) {
        $CI->db->where('a.is_profile_item', 1);
    }
    $CI->db->where('a.display', 1);
    $CI->db->order_by('a.sort_order');

    $query = $CI->db->get();
    $result = $query->result();

    return $result;
}

function get_public_features_by_type()
{
    $CI =& get_instance();

    $CI->db->select('a.*');
    $CI->db->from('features a');
    $CI->db->join('package_features b', 'a.id = b.feature_id');
    $CI->db->join('user_package c', 'b.package_id = c.package_id');
    $CI->db->where('a.is_profile_item', 1);

    $CI->db->where('a.display', 1);
    $CI->db->order_by('a.sort_order');

    $query = $CI->db->get();
    echo $CI->db->last_query();
    $result = $query->result();

    return $result;
}

function get_feature_id($user_id, $controller)
{
    $CI =& get_instance();

    $CI->db->select('a.id');
    $CI->db->from('features a');
    $CI->db->where('a.controller like ', $controller);

    $query = $CI->db->get();
    //echo $CI->db->last_query();
    $result = $query->row();

    return $result;
}

function check_feature_access()
{
    $CI =& get_instance();
    $controller = $CI->uri->segment(1).'/'.$CI->uri->segment(2);
    $user_id = $CI->session->userdata('user_id');
    $feature = get_feature_id($user_id, $controller);
    //echo $feature->id;
    //print_array($this->features_list, true);
    if (!array_key_exists($feature->id,$CI->features_list)) {
        $CI->session->set_flashdata('error', 'Access Denied!');
        redirect(base_url('user/profile'));
        exit();
    }
}

function package_type_label($flag)
{
    $arr = ['F' => 'Free', 'M' => 'Monthly', 'Y' => 'Yearly'];
    return $arr[$flag];
}

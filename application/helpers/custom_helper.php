<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Generic function which returns the translation of input label in currently loaded language of user
 * @param $string
 * @return mixed
 */
function trans($string)
{
    $ci =& get_instance(); 
    return $ci->lang->line($string);
}

// -----------------------------------------------------------------------------
// Make Slug Function    
if (!function_exists('make_slug'))
{
    function make_slug($string)
    {
        return url_title(strtolower($string));
    }
}

// -----------------------------------------------------------------------------
// Get custom pages
if (!function_exists('get_pages'))
{
    function get_pages()
    {
        $ci = & get_instance();
        return $ci->db->get_where('pages', array('is_active' => 1))->result_array();
    }
}


if (!function_exists('auth_check')) {
    /**
     * Function to check authenticated user. It's being called in constructor of every controller
     * @param $admin_check
     */
    function auth_check($admin_check=false)
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        if ($admin_check) {
            if(!$ci->session->userdata('is_admin')) {
                redirect('auth/login', 'refresh');
            }
        } else if(!$ci->session->has_userdata('user_id') /*|| $ci->session->userdata('is_admin')*/) {
            redirect('auth/login', 'refresh');
        }
        return true;

    }
}


if ( ! function_exists('character_limiter'))
{
    /**
     * Character Limiter
     *
     * Limits the string based on the character count.  Preserves complete words
     * so the character count may not be exactly as specified.
     *
     * @param	string
     * @param	int
     * @param	string	the end character. Usually an ellipsis
     * @return	string
     */
    function character_limiter($str, $n = 500, $end_char = '&#8230;')
    {
        if (mb_strlen($str) < $n) {
            return $str;
        }

        // a bit complicated, but faster than preg_replace with \s+
        $str = preg_replace('/ {2,}/', ' ', str_replace(array("\r", "\n", "\t", "\v", "\f"), ' ', $str));

        if (mb_strlen($str) <= $n) {
            return $str;
        }

        $out = '';
        foreach (explode(' ', trim($str)) as $val) {
            $out .= $val.' ';

            if (mb_strlen($out) >= $n) {
                $out = trim($out);
                return (mb_strlen($out) === mb_strlen($str)) ? $out : $out.$end_char;
            }
        }
    }
}

if (!function_exists('str_slug')) {
    /**
     * Creating slug of string
     * @param $str
     * @param string $separator
     * @param bool $lowercase
     * @return string
     */
    function str_slug($str, $separator = 'dash', $lowercase = TRUE)
    {
        $str = trim($str);
        $CI =& get_instance();
        $foreign_characters = array(
            '/??|??|??/' => 'ae',
            '/??|??/' => 'o',
            '/??/' => 'u',
            '/??/' => 'Ae',
            '/??/' => 'u',
            '/??/' => 'o',
            '/??|??|??|??|??|??|??|??|??|??|??|??|??|???|???|???|???|???|???|???|???|???|???|???|??/' => 'A',
            '/??|??|??|??|??|??|??|??|??|??|??|??|??|???|???|???|???|???|???|???|???|???|???|???|???|??/' => 'a',
            '/??/' => 'B',
            '/??/' => 'b',
            '/??|??|??|??|??/' => 'C',
            '/??|??|??|??|??/' => 'c',
            '/??/' => 'D',
            '/??/' => 'd',
            '/??|??|??|??/' => 'Dj',
            '/??|??|??|??/' => 'dj',
            '/??|??|??|??|??|??|??|??|??|??|??|???|???|???|???|???|???|???|???|??|??/' => 'E',
            '/??|??|??|??|??|??|??|??|??|??|??|???|???|???|???|???|???|???|???|??|??/' => 'e',
            '/??/' => 'F',
            '/??/' => 'f',
            '/??|??|??|??|??|??|??/' => 'G',
            '/??|??|??|??|??|??|??/' => 'g',
            '/??|??/' => 'H',
            '/??|??/' => 'h',
            '/??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|???|???|??|??/' => 'I',
            '/??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|???|???|??|??|??/' => 'i',
            '/??/' => 'J',
            '/??/' => 'j',
            '/??|??|??/' => 'K',
            '/??|??|??/' => 'k',
            '/??|??|??|??|??|??|??/' => 'L',
            '/??|??|??|??|??|??|??/' => 'l',
            '/??/' => 'M',
            '/??/' => 'm',
            '/??|??|??|??|??|??/' => 'N',
            '/??|??|??|??|??|??|??/' => 'n',
            '/??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|???|???|???|???|???|???|???|???|???|???|???|???|??/' => 'O',
            '/??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|???|???|???|???|???|???|???|???|???|???|???|???|??/' => 'o',
            '/??/' => 'P',
            '/??/' => 'p',
            '/??|??|??|??|??/' => 'R',
            '/??|??|??|??|??/' => 'r',
            '/??|??|??|??|??|??|??/' => 'S',
            '/??|??|??|??|??|??|??|??|??/' => 's',
            '/??|??|??|??|??|??/' => 'T',
            '/??|??|??|??|??/' => 't',
            '/??|??/' => 'th',
            '/??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|???|???|???|???|???|???|???|??/' => 'U',
            '/??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|??|???|???|???|???|???|???|???|??/' => 'u',
            '/??|??|??|??|??|??|???|???|???|???|??/' => 'Y',
            '/??|??|??|???|???|???|???|??/' => 'y',
            '/??/' => 'V',
            '/??/' => 'v',
            '/??/' => 'W',
            '/??/' => 'w',
            '/??|??|??|??|??/' => 'Z',
            '/??|??|??|??|??/' => 'z',
            '/??|??/' => 'AE',
            '/??/' => 'ss',
            '/??/' => 'IJ',
            '/??/' => 'ij',
            '/??/' => 'OE',
            '/??/' => 'f',
            '/??/' => 'ks',
            '/??/' => 'p',
            '/??/' => 'v',
            '/??/' => 'm',
            '/??/' => 'ps',
            '/??/' => 'Yo',
            '/??/' => 'yo',
            '/??/' => 'Ye',
            '/??/' => 'ye',
            '/??/' => 'Yi',
            '/??/' => 'Zh',
            '/??/' => 'zh',
            '/??/' => 'Kh',
            '/??/' => 'kh',
            '/??/' => 'Ts',
            '/??/' => 'ts',
            '/??/' => 'Ch',
            '/??/' => 'ch',
            '/??/' => 'Sh',
            '/??/' => 'sh',
            '/??/' => 'Shch',
            '/??/' => 'shch',
            '/??|??|??|??/' => '',
            '/??/' => 'Yu',
            '/??/' => 'yu',
            '/??/' => 'Ya',
            '/??/' => 'ya'
        );

        $str = preg_replace(array_keys($foreign_characters), array_values($foreign_characters), $str);

        $replace = ($separator == 'dash') ? '-' : '_';

        $trans = array(
            '&\#\d+?;' => '',
            '&\S+?;' => '',
            '\s+' => $replace,
            '[^a-z0-9\-\._]' => '',
            $replace . '+' => $replace,
            $replace . '$' => $replace,
            '^' . $replace => $replace,
            '\.+$' => ''
        );

        $str = strip_tags($str);

        foreach ($trans as $key => $val) {
            $str = preg_replace("#" . $key . "#i", $val, $str);
        }

        if ($lowercase === TRUE) {
            if (function_exists('mb_convert_case')) {
                $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
            } else {
                $str = strtolower($str);
            }
        }

        $str = preg_replace('#[^' . $CI->config->item('permitted_uri_chars') . ']#i', '', $str);

        return trim(stripslashes($str));
    }
}
if ( ! function_exists('skill_levels'))
{
    /**
     * Skill levels from 10 to 100, with step size = 10
     * @return array
     */
    function skill_levels(){
        $arr = [];
        for($i=10; $i <= 100; $i+=10) {
            $arr[$i] = $i.'%';
        }
        return $arr;
    }
}

/**
 * Uploading image
 * @param $img_config
 * @return array
 */
function upload_image($img_config){
    $user_id    = $img_config['user_id'];
    $CI =& get_instance();

    // set upload path
    $config['upload_path']  = $img_config['upload_path'];
    $config['allowed_types']= $img_config['allowed_types'];
    $config['encrypt_name']=  true;
    $config['overwrite']=  true;
    $config['allowed_types']= $img_config['allowed_types'];
    $config['max_size']     = $img_config['max_size']; // The maximum size (in kilobytes)
    $config['max_width']    = $img_config['max_width'];
    $config['max_height']   = $img_config['max_height'];
    $config['overwrite']    = $img_config['overwrite'];

    $form_field_name = $img_config['form_field_name'];
    $prefix = $img_config['upload_image_prefix'];
    $record_id = $img_config['record_id'];

    $upload_file_name = $_FILES[$form_field_name]['name'];
    $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);
    $ext = pathinfo($upload_file_name, PATHINFO_EXTENSION);
    $upload_file_name = $prefix.$record_id.'_'. $user_id . '_'  . '.' . $ext;
    $config['file_name'] = $upload_file_name;


    if (isset($CI->upload)) { // if library is already loaded, load it again with new params
        $CI->upload = null;
    }
    $CI->load->library('upload', $config);


    if ($CI->upload->do_upload($form_field_name)) {


        $data = $CI->upload->data(); // This is a helper function that returns an array containing all of the data related to the file you uploaded.

        // set upload path
        $source             = "./uploads/images/".$data['file_name'] ;
        $destination_thumb  = "./uploads/images/thumbnail/" ;
        $destination_medium = "./uploads/images/medium/" ;
        $main_img = $data['file_name'];
        // Permission Configuration
        chmod($source, 0777) ;

        /* Resizing Processing */
        // Configuration Of Image Manipulation :: Static
        $CI->load->library('image_lib') ;
        $img['image_library'] = 'GD2';
        $img['create_thumb']  = TRUE;
        $img['maintain_ratio']= TRUE;

        /// Limit Width Resize
        $limit_medium   = $img_config['resize_width_limit'] ;
        $limit_thumb    = 150;

        // Size Image Limit was using (LIMIT TOP)
        $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

        // Percentase Resize
        if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
            $percent_medium = $limit_medium/$limit_use ;
            $percent_thumb  = $limit_thumb/$limit_use ;
        }

        //// Making THUMBNAIL ///////
        $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
        $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

        // Configuration Of Image Manipulation :: Dynamic
        $img['thumb_marker'] = '_thumb';
        $img['quality']      = ' 100%' ;
        $img['source_image'] = $source ;
        $img['new_image']    = $destination_thumb ;

        $thumb_nail = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
        // Do Resizing
        $CI->image_lib->initialize($img);
        $CI->image_lib->resize();
        $CI->image_lib->clear() ;

        ////// Making MEDIUM /////////////
        $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
        $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

        // Configuration Of Image Manipulation :: Dynamic
        $img['thumb_marker'] = '_medium' ;
        $img['quality']      = '100%' ;
        $img['source_image'] = $source ;
        $img['new_image']    = $destination_medium ;

        $mid = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
        // Do Resizing
        $CI->image_lib->initialize($img);
        $CI->image_lib->resize();
        $CI->image_lib->clear() ;

        // set upload path
        $images = 'uploads/images/medium/'.$mid;
        $thumb  = 'uploads/images/thumbnail/'.$thumb_nail;
        unlink($source) ;

        return array(
            'images' => $images,
            'thumb' => $thumb
        );
    }
    else {
        $error = $CI->upload->display_errors();
        $CI->session->set_flashdata('errors', $error);
        redirect(base_url($img_config['redirect_on_error']));
    }

}

/**
 * Getting User Image Thumbnail
 * @param $user_id
 * @return string 
 */

function user_avatar_thumb($user_id)
{
    $ci =& get_instance();

    $query = $ci->db->select('thumb')

    ->where('id',$user_id)

    ->get('users');

    if($query->num_rows() > 0){

        if($query->row_array()['thumb'] != '')

            return base_url($query->row_array()['thumb']);

        else
            
            return base_url('/assets/dist/img/avatar5.png');
    }
}

/**
 * Active / InActive button at users listing for Admin
 * @param $flag
 * @return array
 */
function btn_active_deactive($flag)
{
    $arr = [];
    $arr['btn_label'] = ($flag == 1)?'Active':'In Active';
    $arr['btn_class'] = ($flag == 1)?'btn-success':'btn-danger';
    return $arr;
}

/**
 * Color codes used in Skills progress bar in public profile of user
 * @return mixed
 */
function array_color_codes()
{
    $colors_arr[0]['start']  = '#d35400';
    $colors_arr[0]['end']    = '#e67e22';

    $colors_arr[1]['start']  = '#2980b9';
    $colors_arr[1]['end']    = '#3498db';

    $colors_arr[2]['start']  = '#2c3e50';
    $colors_arr[2]['end']    = '#2c3e50';

    $colors_arr[3]['start']  = '#46465e';
    $colors_arr[3]['end']    = '#5a68a5';

    $colors_arr[4]['start']  = '#333333';
    $colors_arr[4]['end']    = '#525252';

    $colors_arr[5]['start']  = '#27ae60';
    $colors_arr[5]['end']    = '#2ecc71';

    $colors_arr[6]['start']  = '#124e8c';
    $colors_arr[6]['end']    = '#4288d0';

    return $colors_arr;
}

if (!function_exists('generate_recaptcha')) {
    /**
     * reCaptcha generation
     */
    function generate_recaptcha()
    {
        $ci =& get_instance();
        if ($ci->general_settings['enable_captcha']) {
            $ci->load->library('recaptcha');
            echo '<div class="form-group mt-2">';
            echo $ci->recaptcha->getWidget();
            echo $ci->recaptcha->getScriptTag();
            echo ' </div>';
        }
    }
}
if (!function_exists('old')) {
    /**
     * @param $field
     * @return mixed
     */
    function old($field)
    {
        $ci =& get_instance();
        if (isset($ci->session->flashdata('form_data')[$field])) {
            return html_escape($ci->session->flashdata('form_data')[$field]);
        }
        return '';
    }
}


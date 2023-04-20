<?php

use App\Libraries\Permission;

function DB()
{
    $db = \Config\Database::connect();
    return $db;
}

function newSession()
{
    $session = \Config\Services::session();
    return $session;
}

function Cart(){
    $cart = \Config\Services::cart();
    return $cart;
}

function bdDateFormat($data = '0000-00-00') {
    return ($data == '0000-00-00') ? 'Unknown' : date('d/m/y', strtotime($data));
}

function globalDateTimeFormat($datetime = '0000-00-00 00:00:00') {

    if ($datetime == '0000-00-00 00:00:00' or $datetime == '0000-00-00' or $datetime == '') {
        return 'Unknown';
    }
    return date('h:i A d/m/y', strtotime($datetime));
}

function invoiceDateFormat($datetime = '0000-00-00 00:00:00') {

    if ($datetime == '0000-00-00 00:00:00' or $datetime == '0000-00-00' or $datetime == '') {
        return 'Unknown';
    }
//    return date('d M Y h:i A ', strtotime($datetime));
    return date('d M Y', strtotime($datetime));
}

function saleDate($datetime = '0000-00-00 00:00:00') {

    if ($datetime == '0000-00-00 00:00:00' or $datetime == '0000-00-00' or $datetime == '') {
        return 'Unknown';
    }

    $date = date('d/m/y', strtotime($datetime));
    $time = date('h:i a', strtotime($datetime));

    return $date . '<br/>' . $time;
}

function get_data_by_id($needCol, $table, $whereCol, $whereInfo)
{
    $table = DB()->table($table);

    $query = $table->where($whereCol,$whereInfo)->get();
    $findResult = $query->getRow();
    if (!empty($findResult)) {
        $col = ($findResult->$needCol == NULL) ? NULL: $findResult->$needCol;
    }else {
        $col = false;
    }
    return $col;
}

function showWithCurrencySymbol($money) {
//    $table = DB()->table('gen_settings');
//    $currency_before_symbol = $table->where('sch_id',$_SESSION['shopId'])->where('label','currency_before_symbol')->get()->getRow();
//    $currency_after_symbol = $table->where('sch_id',$_SESSION['shopId'])->where('label','currency_after_symbol')->get()->getRow();
//    $result = $currency_before_symbol->value." ".number_format($money, 2, '.', ',')." ".$currency_after_symbol->value;
//    return $result;
    return '৳ '.number_format($money, 2, '.', ',').' /-';
}

function statusView($selected = '1') {
    $status = [
        '0' => 'Inactive',
        '1' => 'Active',
    ];

    $row = '';
    foreach ($status as $key => $option) {
        $row .= ($selected == $key) ? $option : '';
    }
    return $row;
}

function globalStatus($selected = 'sel') {
    $status = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    $row = '';
    foreach ($status as $key => $option) {
        $row .= '<option value="' . $key . '"';
        $row .= ($selected == $key) ? ' selected' : '';
        $row .= '>' . $option . '</option>';
    }
    return $row;
}

function get_package_other_db($selected = 'sel') {

    $db2 = \Config\Database::connect('custom');
    $newDb = $db2->database;
    DB()->query('use '.$newDb);
    $packageTable = $db2->table('package');
    $pack = $packageTable->get()->getResult();

    $row = '';
    foreach ($pack as $key => $option) {
        $row .= '<option value="' . $option->package_id . '"';
        $row .= ($selected == $option->package_id) ? ' selected' : '';
        $row .= '>' . $option->package_name . '</option>';
    }
    return $row;
}

function package_expiry($shop_id) {

    $db2 = \Config\Database::connect('custom');
    $newDb = $db2->database;
    $db2->query('use '.$newDb);

    $tab  = $db2->table('license');
    $pack = $tab->where('sch_id',$shop_id)->get()->getRow();

    $end_date = '';
    if (!empty($pack)){
        $end_date = $pack->end_date;
    }
    return $end_date;
}

function getListInOption($selected, $tblId, $needCol, $table)
{
    $table = DB()->table($table);
    $query = $table->get();
    $options = '';
    foreach ($query->getResult() as $value) {
        $options .= '<option value="' . $value->$tblId . '" ';
        $options .= ($value->$tblId == $selected ) ? ' selected="selected"' : '';
        $options .= '>' . $value->$needCol. '</option>';
    }
    return $options;
}

function image_view($url,$slug,$image,$no_image,$class=''){
    $bas_url = base_url();

    $dir = FCPATH .'/'.$url.'/'.$slug;
    $img = $bas_url.'/'.$url.'/'.$slug.'/'.$image;

    if (empty($slug)){
        $dir = FCPATH .'/'.$url;
        $img = $bas_url.'/'.$url.'/'.$image;
    }
    $no_img = $bas_url.'/'.$url.'/'.$no_image;
    if (!empty($image)){
        if(!file_exists($dir)){
            $result = '<img data-sizes="auto" src="'.$no_img.'" class="'.$class.'" loading="lazy">';
        }else{
            $imgPath = $dir.'/'.$image;
            if (file_exists($imgPath)) {
                $result = '<img data-sizes="auto" src="' . $img . '" class="' . $class . '" loading="lazy">';
            }else{
                $result = '<img data-sizes="auto" src="'.$no_img.'" class="'.$class.'" loading="lazy">';
            }
        }
    }else{
        $result = '<img data-sizes="auto" src="'.$no_img.'" class="'.$class.'" loading="lazy">';
    }
    return $result;
}

function multi_image_view($url,$slug,$slug2,$image,$no_image,$class=''){
    $bas_url = base_url();

    $dir = FCPATH .'/'.$url.'/'.$slug.'/'.$slug2;
    $img = $bas_url.'/'.$url.'/'.$slug.'/'.$slug2.'/'.$image;


    $no_img = $bas_url.'/'.$url.'/'.$no_image;
    if (!empty($image)){
        if(!file_exists($dir)){
            $result = '<img data-sizes="auto" src="'.$no_img.'" class="'.$class.'" loading="lazy">';
        }else{
            $imgPath = $dir.'/'.$image;
            if (file_exists($imgPath)) {
                $result = '<img data-sizes="auto" src="' . $img . '" class="' . $class . '" loading="lazy">';
            }else{
                $result = '<img data-sizes="auto" src="'.$no_img.'" class="'.$class.'" loading="lazy">';
            }
        }
    }else{
        $result = '<img data-sizes="auto" src="'.$no_img.'" class="'.$class.'" loading="lazy">';
    }
    return $result;
}

function is_exists($table,$whereCol,$whereInfo){
    $table = DB()->table($table);
    $query = $table->where($whereCol,$whereInfo)->countAllResults();
    if (!empty($query)) {
        $col = false;
    }else {
        $col = true;
    }
    return $col;
}

function is_exists_double_condition($table,$whereCol,$whereInfo,$orWhereCol,$orWhereInfo){
    $table = DB()->table($table);
    $query = $table->where($whereCol,$whereInfo)->where($orWhereCol,$orWhereInfo)->countAllResults();
    if (!empty($query)) {
        $col = false;
    }else {
        $col = true;
    }
    return $col;
}

function is_exists_update($table,$whereCol,$whereInfo,$whereId,$id){
    $table = DB()->table($table);
    $query = $table->where($whereCol,$whereInfo)->where($whereId.' !=',$id)->countAllResults();
    if (!empty($query)) {
        $col = false;
    }else {
        $col = true;
    }
    return $col;
}

function add_main_based_menu_with_permission($title, $url, $roleId, $icon, $module_name){

    $active_url  = current_url(true);

    $permission = new Permission();

    // $module_name = ucfirst($url);
    $menu = '';

    $access = $permission->have_access($roleId, $module_name, 'mod_access');
    if ($access == 1) {
        $class_active   = ($active_url === $url ) ? 'active' : '';
        $menu .= '<li class="nav-item" ><a class="nav-link'.$class_active.'"  href="'.$url.'" >';
        $menu .= '<i class="nav-icon fas '.$icon .'"></i>';
        $menu .= '<p>'.$title .'</p>';
        $menu .= '</a><li>';

        return $menu;

    }




}

function all_menu_permission_check($module_name_array,$role_id){
    $permission = new Permission();

    foreach ($module_name_array as $module_name){
        $access[] = $permission->have_access($role_id, $module_name, 'mod_access');
    }

    if (empty(array_filter($access))){
        $result = false;
    }else{
        $result = true;
    }

    return $result;
}

function admin_user_name(){
    $userId = newSession()->adUserId;
    $table = DB()->table('cc_users');
    $query = $table->where('user_id',$userId)->get()->getRow()->name;
    return $query;
}

function get_lebel_by_value_in_settings($lable){
    $table = DB()->table('cc_settings');
    $data = $table->where('label',$lable)->get()->getRow();
    if (!empty($data)){
        $result = $data->value;
    }else{
        $result ='';
    }
    return $result;
}

function get_lebel_by_title_in_settings($lable){
    $table = DB()->table('cc_settings');
    $data = $table->where('label',$lable)->get()->getRow();
    if (!empty($data)){
        $result = $data->title;
    }else{
        $result ='';
    }
    return $result;
}

function getListInParentCategory($selected)
{
    $table = DB()->table('cc_product_category');
    $query = $table->where('parent_id',null)->get();
    $options = '';
    foreach ($query->getResult() as $value) {
        $options .= '<option value="' . $value->prod_cat_id . '" ';
        $options .= ($value->prod_cat_id == $selected ) ? ' selected="selected"' : '';
        $options .= '>' . $value->category_name. '</option>';
    }
    return $options;
}

function getParentCategoryArray()
{
    $table = DB()->table('cc_product_category');
    $query = $table->where('parent_id',null)->get()->getResult();
    return $query;
}

function getCategoryBySubArray($cat_id)
{
    $table = DB()->table('cc_product_category');
    $query = $table->where('parent_id',$cat_id)->get()->getResult();
    return $query;
}

function check_is_parent_category($product_category_id){
    $table = DB()->table('cc_product_category');
    $cat = $table->where('prod_cat_id',$product_category_id)->get()->getRow();
    if (!empty($cat->parent_id)){
        $result = $cat->parent_id;
    }else{
        $result = $cat->prod_cat_id;
    }
    return $result;
}

function check_is_sub_category($product_category_id){
    $table = DB()->table('cc_product_category');
    $cat = $table->where('prod_cat_id',$product_category_id)->get()->getRow();
    if (!empty($cat->parent_id)){
        $result = false;
    }else{
        $result = true;
    }
    return $result;
}

function available_theme($sel=''){
    helper('filesystem');
    $file = get_dir_file_info(FCPATH.'../app/Views/Theme');
    $view = '';
    foreach ($file as $key => $val){
        $s = ($key == $sel)?"selected":"";
        $view .= '<option value="'.$key.'" '.$s.' >'.$key.'</option>';
    }
    return $view;
}

function country($sel = ''){
    $table = DB()->table('cc_country');
    $data = $table->get()->getResult();
    $options = '';
    foreach ($data as $value) {
        $options .= '<option value="' . $value->country_id . '" ';
        $options .= ($value->country_id == $sel ) ? ' selected="selected"' : '';
        $options .= '>' . $value->name. '</option>';
    }
    return $options;
}

function state_with_country($country,$sel = ''){
    $table = DB()->table('cc_zone');
    $data = $table->where('country_id',$country)->get()->getResult();
    $options = '';
    foreach ($data as $value) {
        $options .= '<option value="' . $value->zone_id . '" ';
        $options .= ($value->zone_id == $sel ) ? ' selected="selected"' : '';
        $options .= '>' . $value->name. '</option>';
    }
    return $options;
}

function attribute_array_by_product_id($productId){
    $table = DB()->table('cc_product_attribute');
    $query = $table->where('product_id',$productId)->get()->getResult();

    return $query;
}

function get_all_data_array($table){
    $tableSel = DB()->table($table);
    $query = $tableSel->get()->getResult();

    return $query;
}

function category_id_by_product_count($category_id){
    $table = DB()->table('cc_product_to_category');
    $count = $table->where('category_id',$category_id)->countAllResults();
    return $count;
}

function check_review($productId){
    $table = DB()->table('cc_product_feedback');
    $count = $table->where('product_id',$productId)->where('customer_id',newSession()->cusUserId)->countAllResults();
    return $count;
}

function product_id_by_rating($productId,$ratingCount = 0){

    $table = DB()->table('cc_product_feedback');
    $pro = $table->where('product_id',$productId)->get()->getResult();

    $average = 0;
    $numberOfReviews = count($pro);
    if (!empty($numberOfReviews)) {
        $totalStar = 0;
        foreach ($pro as $val) {
            $totalStar += $val->feedback_star;
        }
        $average = $totalStar / $numberOfReviews;
    }
    $sty = (!empty($ratingCount))?'display: flex;':'';
    $view = '<div class="js-wc-star-rating" style="'.$sty.'">';
            $starColor = 'rgb(0, 0, 0)'; $starType = 'fa-solid';
            for ($x = 1; $x <= 5; $x++) {
                if($x > $average) {
                    $starColor = 'lightgray'; $starType = 'fa-regular';
                }
                $view .='<i data-index="0"  class="' . $starType . ' fa-star" style="color: ' . $starColor . '; margin: 2px; font-size: 1em;"></i>';
            }

    if (!empty($ratingCount)) {
        $view .= $numberOfReviews . ' Rating';
    }
    $view .='</div>';

    return $view;
}

function available_template($sel=''){
    helper('filesystem');
    $tem = get_lebel_by_value_in_settings('Theme');
    $file = get_dir_file_info(FCPATH.'../app/Views/Theme/'.$tem.'/Page');
    $view = '';
    foreach ($file as $key => $val){
        $s = ($key == $sel)?"selected":"";
        $view .= '<option value="'.$key.'" '.$s.' >'.$key.'</option>';
    }
    return $view;
}

function top_menu(){
    $table = DB()->table('cc_product_category');
    $query = $table->where('header_menu','1')->get()->getResult();
    $view ='';
    foreach ($query as $val){
        $url = base_url('category/'.$val->prod_cat_id);
        $view .='<li class="nav-item"><a class="nav-link" aria-current="page" href="'.$url.'" >'.$val->category_name.'</a></li>';
    }
    return $view;

}

function modules_key_by_access($key){
    $table = DB()->table('cc_modules');
    $data = $table->where('module_key',$key)->get()->getRow();
    if (!empty($data)){
        $result = $data->status;
    }else{
        $result ='';
    }
    return $result;
}

function get_lebel_by_value_in_theme_settings($lable){
    $table = DB()->table('cc_theme_settings');
    $data = $table->where('label',$lable)->get()->getRow();
    if (!empty($data)){
        $result = $data->value;
    }else{
        $result ='';
    }
    return $result;
}

function email_send($to,$subject,$message){
    $form = get_lebel_by_value_in_settings('mail_address');
    $headers = "From: ".$form ;

//    mail($to,$subject,$message,$headers);

    if(mail($to,$subject,$message,$headers)){
        echo 'Your mail has been sent successfully.';
    } else{
        echo 'Unable to send email. Please try again.';
    }

//    print $headers;
}
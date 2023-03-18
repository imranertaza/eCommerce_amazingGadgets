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
    $table = DB()->table('users');
    $query = $table->where('user_id',$userId)->get()->getRow()->name;
    return $query;
}



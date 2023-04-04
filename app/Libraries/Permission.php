<?php namespace App\Libraries;

class Permission{

    public $admin_permissions = '{"Dashboard":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Pages":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Customers":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Product_category":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Settings":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Role":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"User":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Products":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Brand":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Customers":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Color_family":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Attribute_group":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"},"Page_settings":{"mod_access":"1","create":"1","read":"1","update":"1","delete":"1"}}';

    public $all_permissions = '{"Dashboard":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Pages":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Bank":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Customers":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Purchase":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Purchase_item":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Product_category":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Bank_deposit":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Settings":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Bank_withdraw":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Warranty_manage":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Suppliers":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Sales":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0","discount":"0","warranty":"0","vat_option":"0"},"Role":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Money_receipt":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Loan_provider":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_suppliers":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_nagodan":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_loan":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"User":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Stores":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_lc":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_bank":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Invoice":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0","discount":"0","warranty":"0"},"Expense_category":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Balance_report":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Lc_installment":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Lc":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Customer_type":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Products":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Transaction":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Chaque":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Stock_report":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Sales_report":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Purchase_report":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Daily_book":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Brand":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Employee":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_employee":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"}, "Return_sale":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Return_purchase":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Vat_register":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_vat":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Acquisition_due":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Owe_amount":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Owe_amount":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Trial_balance":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_purchase":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_sales":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Capital":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_capital":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_profit":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_stock":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_expense":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"HeadToheadTransfer":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_other_sales":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Ledger_discount":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"},"Previous_data_show":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"}}';

//    public function have_access($roleId, $module_name, $sub_permission)
//    {
//        $table = DB()->table('roles');
//        $result = $table->where('role_id',$roleId)->get()->getRow();
//
//        $obj = json_decode($result->permission, true);
//        return $obj[$module_name][$sub_permission];
//    }
//
//    public function module_permission_list($role_id, $module_name)
//    {
//        $table = DB()->table('roles');
//        $result = $table->where('role_id',$role_id)->get()->getRow();
//        $obj = json_decode($result->permission, true);
//        return $obj[$module_name];
//    }

    public function have_access($roleId, $module_name, $sub_permission){
        $table = DB()->table('roles');
        $result = $table->where('role_id',$roleId)->get()->getRow();

        $obj = json_decode($result->permission, true);
        if (!empty($obj[$module_name][$sub_permission])) {
            return $obj[$module_name][$sub_permission];
        }else{
            return 0;
        }
    }

    public function module_permission_list($role_id, $module_name){
        $table = DB()->table('roles');
        $result = $table->where('role_id',$role_id)->get()->getRow();
        $obj = json_decode($result->permission, true);

        if (!empty($obj[$module_name])) {
            $output = $obj[$module_name];
        }else {
            $obj = json_decode('{"' . $module_name . '":{"mod_access":"0","create":"0","read":"0","update":"0","delete":"0"}}', true);
            $output = $obj[$module_name];
        }
        return $output;
    }

}
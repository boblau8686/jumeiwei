<?php

/**
 * 客户控制器
 *
 * @author Bob
 */
class CustomerAction extends Action {

    public function index() {
        $Customer = D('Customer');
        $customer = $Customer->getById(1);
        if ($customer) {
            $this->assign('customer', $customer);
        }
        $this->display();
    }

    public function order() {
        $Order = D('Order');
        $list = $Order->where('customer_id = ' . '1')->limit(5)->relation(true)->select();
        
        $this->assign('list', $list);
        $this->display();
    }

    public function collect() {
        $type = $this->_get('type') == '' ? '1' : $this->_get('type');
        $table = $type == '1' ? 'food' : 'business';
        $Collect = D('Collect');
        $list = $Collect->join("$table ON obj_id = $table.id")->where("obj_type = $type")->select();
        
        $this->assign('type', $type);
        $this->assign('list', $list);
        $this->display();
    }

    public function info() {
        $Customer = D('Customer');
        $customer = $Customer->getById(1);
        $this->assign('customer', $customer);

        $Address = D('Address');
        $list = $Address->where('customer_id = ' . '1 AND is_del = 0')->select();
        $this->assign('list', $list);
        $this->display();
    }

}

?>

<?php

/**
 * 客户控制器
 *
 * @author Bob
 */
class CustomerAction extends Action {

    /**
     * 我的主页-用户中心
     */
    public function index() {
        $Customer = D('Customer');
        $customer = $Customer->getById(1);
        if ($customer) {
            $this->assign('customer', $customer);
        }

        $Order = D('Order');

        // 各种状态的订单数量
        $status0Count = $Order->where('customer_id = ' . '1' . ' AND order_status = 0')->count();
        $status1Count = $Order->where('customer_id = ' . '1' . ' AND order_status = 1')->count();
        $status2Count = $Order->where('customer_id = ' . '1' . ' AND order_status = 2')->count();
        $status3Count = $Order->where('customer_id = ' . '1' . ' AND order_status = 3')->count();

        $this->assign('status0Count', $status0Count);
        $this->assign('status1Count', $status1Count);
        $this->assign('status2Count', $status2Count);
        $this->assign('status3Count', $status3Count);

        // 最近订单
        $orders = $Order->where('customer_id = ' . '1')->relation(true)->limit(5)->select();
        $this->assign('orders', $orders);
        
        $this->display();
    }

    /**
     * 我的主页-我的订单
     */
    public function order() {
        $Order = D('Order');
        $list = $Order->where('customer_id = ' . '1')->limit(5)->relation(true)->select();
        
        $this->assign('list', $list);
        $this->display();
    }

    /**
     * 我的主页-我的收藏
     */
    public function collect() {
        $type = $this->_get('type') == '' ? '1' : $this->_get('type');
        $table = $type == '1' ? 'food' : 'business';
        $Collect = D('Collect');
        $list = $Collect->join("$table ON obj_id = $table.id")->where("obj_type = $type")->select();
        
        $this->assign('type', $type);
        $this->assign('list', $list);
        $this->display();
    }

    /**
     * 我的主页-个人信息
     */
    public function info() {
        $Customer = D('Customer');
        $customer = $Customer->getById(1);
        $this->assign('customer', $customer);

        $Address = D('Address');
        $list = $Address->where('customer_id = ' . '1 AND is_del = 0')->select();
        $this->assign('list', $list);
        $this->display();
    }

    /**
     * 注册
     */
    public function register() {
        $this->display();
    }

    /**
     * 添加用户
     */
    public function insert() {
        $Customer = D('Customer');
        $data = $Customer->create();
        $lastId = $Customer->add();
        if ($lastId) {
            // 登录
            session('customer_id', $lastId);
            session('username', $data['username']);
            $this->success('注册成功', '/');
        }
    }

}

?>

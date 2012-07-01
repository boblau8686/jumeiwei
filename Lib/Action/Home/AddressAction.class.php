<?php

/**
 * 客户控制器
 *
 * @author Bob
 */
class AddressAction extends Action {

    /**
     * 我的主页-个人信息-添加收货地址
     */
    public function insert() {
        $Address = D('Address');
        $data = $Address->create();
        $result = $Address->add($data);
        if ($result) {
            $this->redirect('Customer/info');
        }
    }

    /**
     * 我的主页-个人信息-删除收货地址
     */
    public function delete() {
        $id = $this->_get('id');
        $Address = D('Address');
        $result = $Address->where('id=' . $id)->setField('is_del', '1');
        if ($result) {
            $this->redirect('Customer/info');
        }
    }

}

?>

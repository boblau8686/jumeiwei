<?php

/**
 * 地址模型
 *
 * @author Bob
 */
class AddressModel extends RelationModel {
    protected $_map = array(
        'DiZhi' => 'address',
        'ShouHuoRen' => 'realname',
        'DianHua' => 'telephone',
        'YouXiang' => 'email',
        'YongHuId' => 'customer_id'
    );
}

?>

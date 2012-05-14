<?php

/**
 * 订单模型
 *
 * @author Bob
 */
class OrderModel extends RelationModel {

    protected $_link = array(
        'food' => MANY_TO_MANY,
        'address' => BELONGS_TO
    );

}

?>

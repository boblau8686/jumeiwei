<?php

/*
 * 前台公共函数
 */

/**
 * 转换订单状态
 * @param (int) $status 状态编号
 * @return (string) 状态名称
 */
function toOrderStatus($status) {
    $statusName = array('待确认', '制作中', '配送中', '待评价', '已完成');
    return $statusName[$status];
}

?>

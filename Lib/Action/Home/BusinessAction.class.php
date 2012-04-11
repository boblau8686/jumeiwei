<?php

class BusinessAction extends Action
{
    public function index()
    {
        $bid = $this->_get(id);
        if (null == $bid) {
            // TODO 如果商家id传过来是空的,写处理逻辑
            echo '<font color="red">商家id不正确</font>';
        }
        
        // 获取商家基本信息
        $business = M('business');
        $bsInfo = $business->find($bid);
        $this->assign('bsInfo', $bsInfo);
        
        // 获取商家的菜品分类以及菜品
        $foodObj = new FoodModel();
        list($cats, $food) = $foodObj->getCateFood($bid);
        $this->assign('cats', $cats);
        $this->assign('food', $food);

        $this->display();
    }
}
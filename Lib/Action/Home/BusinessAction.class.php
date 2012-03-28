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
        
        // 获取菜品分类
        $foodCategory = M('food_category');
        // TODO 接着在这里写下去
        $foodCategory->join('RIGHT JOIN food ON food_category.id = food.category_id')
                     ->where('food_category.business_id = ' . $bid)
                     ->select();
        
        $this->display();
    }
}
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
        
        // 处理购物车
        $cart = new Cart();
        $cartIdList = $cart->get();
        $this->assign('cartIdList', json_encode($cartIdList));

        $this->display();
    }
    
    /**
     * 添加一个菜品到购物车
     */
    public function cartadd()
    {
        $foodid = $this->_get('foodid');
        
        $cart = new Cart();
        if ($cart->add($foodid)) {
            echo json_encode(array('status' => 0));
        }
    }
    
    /**
     * 从购物车里删除一个菜品 
     */
    public function cartsubstract()
    {
        $foodid = $this->_get('foodid');
        
        $cart = new Cart();
        if ($cart->substract($foodid)) {
            echo json_encode(array('status' => 0));
        }
    }
    
}
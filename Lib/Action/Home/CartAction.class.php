<?php

class CartAction extends Action
{
    public function index()
    {
        // 取购物车里面所有菜品
        $cart = new Cart();
        $foodList = $cart->get();
        
        $this->assign('food_list', $foodList);
        
        $this->display();
    }
}
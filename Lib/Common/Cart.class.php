<?php

/** 
 * @author kevin
 * 
 */
class Cart
{
    /**
     * 预订的菜品
     * @var array
     */
    protected $data = array();
    
    function __construct ()
    {
        $this->data = & $_SESSION['cart'];
    }

    /**
     * 把菜品加入购物车
     * @param int $id
     * @return boolean
     */
    public function add ($id) 
    {
        if ($this->data[$id]) {
            $this->data[$id]['count'] += 1;
        } else {
            $this->data[$id]['count'] = 1;
        }
        return true;
    }
    
    /**
     * 查询保存在购物车里的菜品
     * @return array
     */
    public function get()
    {
        $food = new FoodModel();
        $foodList = $food->getFood(array_keys($this->data));
        
        $rows = array();
        $ids = array_keys($this->data);
        foreach ($foodList as $k => $v) {
            $id = $v['id'];
            if (in_array($id, $ids)) {
                $rows[$id] = $v;
                $rows[$id]['price'] = floatval($rows[$id]['price']);
                $rows[$id]['count'] = intval($this->data[$id]['count']);
            }
        }
        
        return $rows;
    }
    
    /**
     * 减少一个菜品的数量
     * @param int $id
     */
    public function substract($id)
    {
        if ($this->data[$id] && (1 < $this->data[$id]['count'])) {
            $this->data[$id]['count'] -= 1;
        } else if (1 == $this->data[$id]['count']) {
            unset($this->data[$i]);
        } else {
            return false;
        }
        return true;
    }
}

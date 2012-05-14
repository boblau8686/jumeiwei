<?php
/**
 * 
 * @author kevin
 *
 */

class FoodModel extends Model
{
    /**
     * 获取商家所有的菜品分类以及菜品
     * 
     * @param integer $bid 商家id
     * @return array
     */
    public function getCateFood($bid)
    {
        $fields = '`food`.*, `food_category`.`id` as cat_id, `food_category`.`name` as cat_name';
        $where = '`food_category`.`bus_id` = ' . $bid . ' AND `food_category`.is_del != 1 ' . 
                 'AND `food`.is_del != 1';
        $rows = $this->join('LEFT JOIN `food_category` ON `food_category`.`id` = ' 
                            . $this->trueTableName . '.`category_id`')
                    ->where($where)->field($fields)->select();
        if (!count($rows)) {
            return array(NULL, NULL);
        }
        foreach ($rows as $k => $v) {
            $food[$v['cat_id']] = $v;
            $cat[$v['cat_id']] = $v['cat_name'];
        }
        return array($cat, $food);
    }
    
    /**
     * 获取指定id的菜品信息
     * @param int $id
     */
    public function getFood($id) 
    {
        if (is_array($id)) {
            $whereid = sprintf(' id in (%s) ', implode(',', $id));
        } else {
            $whereid = sprintf(' id = %d ', $id);
        }
        $rows = $this->field('id, name, price')->where($whereid)->select();
        
        return $rows;
    }
}


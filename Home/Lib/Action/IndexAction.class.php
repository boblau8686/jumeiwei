<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action 
{
    public function index()
    {
        $article = M('articl');
echo '<pre>';
print_r($article);
echo '</pre>';
        $this->display('index');
    }
}
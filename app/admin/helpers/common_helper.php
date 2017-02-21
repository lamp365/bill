<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 17-2-19
 * Time: 上午11:16
 */
function get_css($name){
    return base_url("style/admin/css/{$name}");
}
function get_images($name){
    return base_url("style/admin/images/{$name}");
}
function get_js($name){
    return base_url("style/admin/js/{$name}");
}
function get_libs($name){
    return base_url("style/libs/{$name}");
}

function get_common($name){
    return base_url("style/common/{$name}");
}
function pp(){
    $arr = func_get_args();
    echo "<pre>";
    foreach($arr as $one){
        print_r($one);
        echo '<br/>';
    }
    echo "</pre>";
}
function ppd(){
    $arr = func_get_args();
    echo "<pre>";
    foreach($arr as $one){
        print_r($one);
        echo '<br/>';
    }
    echo "</pre>";
    die();
}

/**
 *@access private
 *@param $arr array 要遍历的数组
 *@param $pid 节点的pid，默认为0，表示从顶级节点开始
 *@param $level int 表示层级 默认为0
 *@param array 排好序的所有后代节点
 */
function _tree($arr,$pid = 0,$level = 0){
    static $tree = array(); #用于保存重组的结果,注意使用静态变量
    foreach ($arr as $v) {
        if ($v['parent_id'] == $pid){
            //说明找到了以$pid为父节点的子节点,将其保存
            $v['level'] = $level;
            $tree[] = $v;
            //然后以当前节点为父节点，继续找其后代节点
            $this->_tree($arr,$v['cat_id'],$level + 1);
        }
    }

    return $tree;
}
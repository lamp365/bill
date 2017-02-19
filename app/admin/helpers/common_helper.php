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
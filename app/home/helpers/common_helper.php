<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 17-2-19
 * Time: 上午11:16
 */
function get_css($name,$pos='home'){
    return base_url("style/{$pos}/css/{$name}");
}
function get_images($name,$pos='home'){
    return base_url("style/{$pos}/images/{$name}");
}
function get_js($name,$pos='home'){
    return base_url("style/{$pos}/js/{$name}");
}
function get_libs($name){
    return base_url("style/libs/{$name}");
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


function is_mobile_request()
{
    $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
    $mobile_browser = '0';
    if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))
        $mobile_browser ++;
    if ((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') !== false))
        $mobile_browser ++;
    if (isset($_SERVER['HTTP_X_WAP_PROFILE']))
        $mobile_browser ++;
    if (isset($_SERVER['HTTP_PROFILE']))
        $mobile_browser ++;
    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
    $mobile_agents = array(
        'w3c ',
        'acs-',
        'alav',
        'alca',
        'amoi',
        'audi',
        'avan',
        'benq',
        'bird',
        'blac',
        'blaz',
        'brew',
        'cell',
        'cldc',
        'cmd-',
        'dang',
        'doco',
        'eric',
        'hipt',
        'inno',
        'ipaq',
        'java',
        'jigs',
        'kddi',
        'keji',
        'leno',
        'lg-c',
        'lg-d',
        'lg-g',
        'lge-',
        'maui',
        'maxo',
        'midp',
        'mits',
        'mmef',
        'mobi',
        'mot-',
        'moto',
        'mwbp',
        'nec-',
        'newt',
        'noki',
        'oper',
        'palm',
        'pana',
        'pant',
        'phil',
        'play',
        'port',
        'prox',
        'qwap',
        'sage',
        'sams',
        'sany',
        'sch-',
        'sec-',
        'send',
        'seri',
        'sgh-',
        'shar',
        'sie-',
        'siem',
        'smal',
        'smar',
        'sony',
        'sph-',
        'symb',
        't-mo',
        'teli',
        'tim-',
        'tosh',
        'tsm-',
        'upg1',
        'upsi',
        'vk-v',
        'voda',
        'wap-',
        'wapa',
        'wapi',
        'wapp',
        'wapr',
        'webc',
        'winw',
        'winw',
        'xda',
        'xda-'
    );
    if (in_array($mobile_ua, $mobile_agents))
        $mobile_browser ++;
    if (strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)
        $mobile_browser ++;
    // Pre-final check to reset everything if the user is on Windows
    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)
        $mobile_browser = 0;
    // But WP7 is also Windows, with a slightly different characteristic
    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)
        $mobile_browser ++;
    if ($mobile_browser > 0)
        return true;
    else
        return false;
}

function catTree($list,$pid=0,$level=0,$html='--'){
    static $tree = array();
    foreach($list as $v){
        if($v['pid'] == $pid){
            $v['level'] = $level;
            $v['html']  = str_repeat($html,$level);
            $tree[]     = $v;
            catTree($list,$v['id'],$level+1,$html);
        }
    }
    return $tree;
}

function showAjax($code,$msg){
    return json_encode(array(
        'code'=>$code,
        'msg'=>$msg,
    ));
}
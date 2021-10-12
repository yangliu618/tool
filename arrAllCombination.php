<?php
/**
 * 求各种排列组合
 */

$arrStone = array (
    0 => '钻石',
    1 => '石榴石',
    2 => '紫水晶',
    3 => '蓝宝石',
    4 => '精密陶瓷',
    5 => '珍珠母贝',
    6 => '孔雀石',
    7 => '海蓝宝石',
    8 => '尖晶石',
    9 => '绿玉髓',
    10 => '青金石',
    11 => '缟玛瑙',
    12 => '玉髓',
    13 => '珍珠',
    14 => '红玉髓',
    15 => '蛋白石',
    16 => '祖母绿',
    17 => '沙弗莱石榴石',
    18 => '红宝石',
    19 => '黄水晶',
    20 => '桔榴石',
    21 => '水晶石',
    22 => '软玉',
    23 => '黑曜岩',
    24 => '红碧玺',
    25 => '珊瑚',
);

function getSequenceAry($arr,$num=1)
{
    $count = count($arr);
    $min   = min($count,$num);

    if($min<1){
        return false;
    }

    $return =array();
    for(;$min>=1;$min--){
        $arrRet = array();
        $max = $count-($min-1);
        for($i=0;$i<$max;$i++){
            getSequenceArySub($arr,$count,$min,$i,$arrRet,$return);

        }
    }
    return $return;
}

function getSequenceArySub($arr,$count,$min,$i,$arrRet=array(),& $return){
    if(empty($arr) || empty($count))
        return false;
    if(1==$min){
        $arrRet[--$min] = $arr[$i];
        $return[] = $arrRet;
    }else{
        $arrRet[--$min] = $arr[$i];
        for($j = $i+1;$j<($count);$j++){
            getSequenceArySub($arr,$count,$min,$j,$arrRet,$return);
        }
    }
}

/**
 * 会从$arrStone数组中，求各种三个以内元素组成的数组的排列组合，$num越大
 */
$arrStone = getSequenceAry($arrStone, $num=3);
print_r($arrStone);



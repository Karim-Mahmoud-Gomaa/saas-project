<?php 


function getTermName($monthCount){

    $months = [__('web.month'),__('web.months')];
    $years = [__('web.year'),__('web.years')];
    $m = $monthCount % 12;
    $y = floor($monthCount / 12);
    $result = '';
    if ($m) {
        $result.=$m.' ' .($m==1?$months[0]:$months[1]);
    }
    if ($y) {
        $result.=($m?' & ':'').$y.' '.($y==1?$years[0]:$years[1]);
    }
    return $result;

}
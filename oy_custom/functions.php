<?php

func_include('posts');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo where_is_it(get_ex_curr);

    function add_fin($arr=array(),$inorout='i'){
        $db['fin_cid']=$arr['cid'];
         $db['fin_amont']=$arr['amont'];
          $db['	fin_mt']=$arr['mt'];
           $db['fin_outorin']=$inorout;
            $db['fin_refid']=$arr['rid'];
             $db['fin_reftbl']=$arr['tbl'];
             global $dbase;
           return  $dbase->RowInsert($db,'sob_finance');
    }
    
    
    function Agotime_fa($date){
    if(empty($date)){
        return "تاریخ مورد قبول نیست";
    }
    $periods = array("ثانیه", "دقیقه", "ساعت", "روز", "هفته", "ماه", "سال", "قرن");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    $now = time();
    $unix_date = strtotime($date);
    // check validity of date
    if(empty($unix_date)){
        return "تاریخ غلط";
    }
    // is it future date or past date
    if($now > $unix_date){
        $difference = $now - $unix_date;
        $tense = "پیش";
    }else{
        $difference = $unix_date - $now;
        $tense = "بعد";
    }
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++){
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if($difference != 1){
        $periods[$j].= "";
    }
    return "$difference $periods[$j] {$tense}";
}

 

function get_total($wh,$type=false){
    global $dbase;
    
    
    if($type==false)
            $type ="";
    else
        $type ="and imp_koo='{$type}'";
    
    
    
	$result = $dbase->query("SELECT sum(imp_amount) as tolex FROM sob_impexp where imp_stat=0  and imp_st='{$wh}'  and imp_eoe='1' ".$type);
$export=0;

   
	while($row = $dbase->fetch_array($result))
	  {
		 $export  = $row['tolex'] ;
	  }
         // echo $export;
          
          $result2 = $dbase->query("SELECT sum(imp_amount) as tolim FROM sob_impexp where imp_stat=0  and imp_st='{$wh}'  and imp_eoe='2' ".$type);
$import=0;
	while($row2 = $dbase->fetch_array($result2))
	  {
		  $import = $row2['tolim'];
	  }
        //  echo $import .' ADDDDD';
          return ($import-$export);
}



function get_totalmoney($eoe,$type){
    
    
    ///SELECT mon_mt,sum(mon_rmoney) as tolmony FROM `sob_money` where (mon_eoe=1 OR mon_eoe=5 ) group by mon_mt
    global $dbase;
	$result = $dbase->query("SELECT sum(mon_rmoney) as tolmony FROM sob_money where mon_stat=0 and mon_mt='{$eoe}' AND mon_eoe='{$type}'");
$export=0;

   
	while($row = $dbase->fetch_array($result))
	  {
		 $export  = $row['tolmony'] ;
	  }
         // echo $export;
          
//          $result2 = $dbase->query("SELECT sum(mon_rmoney) as tolmony FROM sob_impexp where imp_stat=0  and mon_mt='{$eoe}'  and mon_eoe='{$type}'");
//$import=0;
//	while($row2 = $dbase->fetch_array($result2))
//	  {
//		  $import = $row2['tolim'];
//	  }
        //  echo $import .' ADDDDD';
          return (!empty($export) ? $export : 0);
}


function get_balmoney($type){
    
    
    ///SELECT mon_mt,sum(mon_rmoney) as tolmony FROM `sob_money` where (mon_eoe=1 OR mon_eoe=5 ) group by mon_mt
    global $dbase;
	$result = $dbase->query("SELECT sum(mon_rmoney) as tolmonyd FROM sob_money where mon_stat=0 and mon_mt='{$type}' AND (mon_eoe=2 OR mon_eoe=7)");
$export=0;

   
	while($row = $dbase->fetch_array($result))
	  {
		 $imp  = $row['tolmonyd'] ;
	  }
          
          
            global $dbase;
	$result = $dbase->query("SELECT sum(mon_rmoney) as tolmonyp FROM sob_money where mon_stat=0 and mon_mt='{$type}' AND (mon_eoe=1 OR mon_eoe=5)");
$export=0;

   
	while($row = $dbase->fetch_array($result))
	  {
		 $exp  = $row['tolmonyp'] ;
	  }
          $export = ($imp-$exp);
          return (!empty($export) ? $export : 0);
}

 //class_include('jdatetime');
function get_jdate($str = "l j F Y H:i:s"){
    
//     $date = new jDateTime(true, true, 'Asia/kabul');
//    if(!$y OR !$m OR !$d){
//         
//    }
//    
//   //$result =  $date->date($str);
//    
//    $re = $date->toJalali($y,$m,$d);
//    $time =  $date->mktime(0,0,0,$re[1],$re[2],$re[0]);
//    //echo $y.$m.$d;
//    
            $y = date('Y-m-d'); 
         //  $m=date('m');
          // $d = date('d');// echo $y.$m.$d;
   return gregorian_to_jalali($y,$str);
  //  return  $date->date("Y/m/d", $time);
}


function jalali_to_gregorian($fromdate,$sep='l j F Y H:i:s'){
        
     $date = new jDateTime(true, true, 'Asia/kabul');
//    if(!$y OR !$m OR !$d){
//           $y = date('y'); 
//           $m=date('m');
//           $d = date('d'); 
//    }
    
  // $result =  $date->date($str);
    
     $time=strtotime($fromdate);
    $m=date("m",$time);
    $y=date("Y",$time);
     $d=date("d",$time);
     
     
     $h=date("H",$time);
     $i=date("i",$time);
     $s=date("s",$time);
    
     
     
     
    $re = $date->toGregorian($y,$m,$d);
    $time =  $date->mktime($h,$i,$s,$re[1],$re[2],$re[0]);
    //echo $y.$m.$d;
    return $date->date($sep, $time,false);
}

function gregorian_to_jalali($fromdate,$sep='l j F Y H:i:s'){
        
     $date = new jDateTime(true, true, 'Asia/kabul');
    
     $time=strtotime($fromdate);
    $m=date("m",$time);
    $y=date("Y",$time);
     $d=date("d",$time);
     
     
     $h=date("H",$time);
     $i=date("i",$time);
     $s=date("s",$time);
    
     
    $re = $date->toJalali($y,$m,$d);
    $time =  $date->mktime($h,$i,$s,$re[1],$re[2],$re[0]);
    //echo $y.$m.$d;
    
   // date($format, $stamp = false, $convert = null, $jalali = null, $timezone = null)
    return $date->date($sep, $time,false);
}

function valDate($value,$format ="j F Y"){
    if(tis_shamsi()){
    $ret =  gregorian_to_jalali($value,$format)   ;
    }else{
        $ret =  date($format, strtotime($value)); 
    }
    
    return $ret;
    
}

function tis_shamsi(){
    $value = get_setting('datetype');
    if($value==2)
        return true;
    else
        return false;
    
}


function get_comtype($value){
   $value = get_typeof($value);
   return g_lbl($value);
}


function eoe2label($num,$type='o'){
    $retu = '';
    if($type=='m'){
        switch ($num) {
            case 1:
                $retu = g_lbl('eoe1mon');;
                break;
            case 2:
                $retu =  g_lbl('eoe2mon');
                break;
            case 5:
                $retu =  g_lbl('eoe5mon');
                break;
            case 7:
                $retu =  g_lbl('eoe7mon');
                break;
            default:
                $retu =  g_lbl('unvalid');
        }
    }
    
    
        if($type=='o'){
        switch ($num) {
            case 1:
                $retu =  g_lbl('eoe1oil');
                break;
            case 2:
                $retu =  g_lbl('eoe2oil');
                break;
            default:
                $retu =  g_lbl('unvalid');
        }
    }
    
 return $retu;   
}



function get_15daysre(){
    $date = date("Y-m-d");// current date
$xdays = 10;

$dates = array();
for ($i = 1; $i <= $xdays; $i++) {
    $dates[$i] = date('Y-m-d',strtotime(date("Y-m-d", strtotime($date)) . "-".$i." day"));
}
 

 global $dbase;
 
 $datex2 = array();
 foreach($dates as $i => $date){
$result = $dbase->query("SELECT sum(`imp_total`) as tolx FROM `sob_impexp` where imp_eoe=1 and imp_date='".$date."'");
$row = $dbase->fetch_array($result);
if(!empty($row['tolx']))
$datex2[$date]['sell'] = $row['tolx'];
else
   $datex2[$date]['sell'] =0; 

 }
 
 
  foreach($dates as $i => $date2){
$result2 = $dbase->query("SELECT sum(`imp_total`) as tolx FROM `sob_impexp` where imp_eoe=2 and imp_date='".$date2."'");
$row2 = $dbase->fetch_array($result2);
if(!empty($row2['tolx']))
$datex2[$date2]['buy'] = $row2['tolx'];
else
   $datex2[$date2]['buy'] =0; 
    
    
 }
return $datex2;
    
    
}


function allcoms(){
    global $dbase;
 $result2 = $dbase->query("SELECT DISTINCT(`imp_name`) FROM `sob_impexp` WHERE imp_stat=0"); 
 $row2 = $dbase->fetch_array($result2);
 $imp_cos = $row2;
 
  $result3 = $dbase->query("SELECT DISTINCT(`mon_name`) FROM `sob_money` where mon_stat=0"); 
 $row3 = $dbase->fetch_array($result3);
 $mon_cos = $row3;
 $allcomes = join($row2,$row3);
 return $allcomes;
}
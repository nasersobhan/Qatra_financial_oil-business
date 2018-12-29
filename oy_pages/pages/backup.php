<?php
set_time_limit (0);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(is_get('upone')){
   global $dbase; $id=is_post('comname');
//    $tbl1 = TBL_PIX.'categories_oy'; 
//    if($dbase->RowUpdate($tbl1,array('cat_status'=>100),' cat_id='.$id))
//            echo 'Main Profile Delete...';
    
//    $tbl1 = TBL_PIX.'impexp'; 
//    if($dbase->RowDelete($tbl1,' cat_id='.$id))
//            echo 'Main Profile Delete...';
//    
//    $tbl1 = TBL_PIX.'categories_oy'; 
//    if($dbase->RowDelete($tbl1,' cat_id='.$id))
//            echo 'Main Profile Delete...';
  echo  $dbase->backup_tables();
}else{
  theme_include('pages\backup');
}
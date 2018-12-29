<?php

global $excp,$dbase;


$excp['flds'] = 'id,title,employer,location,closingdate'; 
$excp['actions'] = false;
  
$excp['fld_label']['title'] = 'Job Title';
$excp['fld_label']['employer'] = 'Organization';
$excp['fld_label']['location'] = 'City';
$excp['fld_label']['closingdate'] = 'Clos. Date';

$excp['title'] = 'Recent Job Posted';




  $searchform = '<h2>&nbsp;'.$excp['title'].'</h2>'
          . '<form role="form" class="form-inline style_form" action="'.get_tbllink(is_get('tbl'),'action','search').'" method="post" >
                <div class="form-group">
            		<label class="sr-only form-inline" for="s_keyword">Keyword</label>
                       <input type="text" class="form-control" id="s_keyword"  placeholder="Title etc." name="keyword">
          </div>
           <button type="submit" class="btn btn-default">Search</button>
       <a href="'.get_tbllink(is_get('tbl'),'add').'"><button type="button" class="btn btn-danger">Add new</button></a>
         </form>';


$excp['caption'] = $searchform;

//
// $action = (is_get('action') ? is_get('action')  : 'list');
//
//$excp['fld_label']['flipchart'] = 'Flip Chart Photo Uploaded';
// $excp['fld_label']['id'] = 'CID';
// 
// $excp['fld_label']['gname'] = 'Group Name';
//  $excp['fld_label']['gnumber'] = 'Group Number';
//   $excp['fld_label']['location'] = 'Location';
// $excp['fld_label']['time'] = 'Time';
// 
// $excp['func4value']['id'] = 'justtextfunc';
// function justtextfunc($value){
//     return '(-'.$value.'-)';
//             
// }
// if($action=='add' || $action=='edit'){
//    
//     if($action=='add')
//         $excp['title'] = 'Fill the form for first day';
//     else
//         $excp['title'] = 'Edd Experance information';
//     
//    
// }elseif($action=='view'){
//       $excp['flds'] = '*';
//    $excp['title'] = 'Day One - View';
//   
//     
// }else{
//       $excp['title'] = 'Day One - List';
//   $excp['flds'] = 'id,gname,gnumber,location,time';  
// }

?>


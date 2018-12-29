<?php

global $excp, $dbase;
load_jsplug('select2');
load_jsplug('form');

$action = (is_get('action') ? is_get('action') : 'list');
if($action == 'add' || $action == 'edit'){
    $excp['flds'] = 'text,author,type,book,ref,category,lang';
    load_jsplug('kendo');

  if(is_post('oy_form_validate')){
      $_POST['quo_type'] = cate2db($_POST['quo_type'],'quote_type',0);
      $_POST['quo_author'] = cate2db($_POST['quo_author'],'People',0);
      $_POST['quo_lang'] = cate2db($_POST['quo_lang'], 'language', 0);
      if(isset($_POST['quo_book']))
      $_POST['quo_book'] = cate2db($_POST['quo_book'], 'book', 0);
       if(isset($_POST['quo_category'])){
       if(is_array($_POST['quo_category'])){
           
           $cates = (is_post('quo_category'));
            $dbS=array();
            foreach($cates as $cate){
                $dbS[] = cate2db($cate,'quote_cate',0);
            }
            $_POST['quo_category'] = '-'.implode('-,-', $dbS).'-';
        }else
        $_POST['quo_category'] = cate2db($_POST['quo_category'],'quote_cate',0);
       }
         foreach($_POST as $key => $value){
            if(is_numeric($key))
                unset($_POST[$key]);
        }
        
        
  }
//    $excp['fbuilder']['pcode'] = array('type' => 'text', 'label' => 'Project Code Number', 'att' => ' required ', 'def' => 'KFZ-');
//   
    
  
  $empty = array();
    $stype = cat_2arr('People');
    $excp['fbuilder']['author'] = array('label' => 'Author','class'=>'cate2aux form-control input-sm m-a-2','att'=>'data-type="People"', 'type' => 'select', 'options' => $stype);
    
    $type = cat_2arr('quote_type');
    $excp['fbuilder']['type'] = array('label' => 'Quote Type','class'=>'cate2aux form-control input-sm m-a-2','att'=>'data-type="quote_type"', 'type' => 'select', 'options' => $type);
    
    $type = $empty; // cat_2arr('book');
    $excp['fbuilder']['book'] = array('label' => 'Book','class'=>'cate2au form-control input-sm m-a-2','att'=>'data-type="quote_type"', 'type' => 'select', 'options' => $type);
    
    
    
    $stype = cat_2arr('language');
    $excp['fbuilder']['lang'] = array('label' => 'Language','class'=>'cate2aux form-control input-sm m-a-2','att'=>'data-type="language"', 'type' => 'select', 'options' => $stype);
    
    $district = $empty;//cat_2arr('quote_cate');
    $excp['fbuilder']['category'] = array('name'=>'quo_category[]','label' => 'Tags','class'=>'cate2autag form-control input-sm m-a-2','att'=>'data-type="quote_cate"', 'type' => 'select', 'options' => $district);

    $excp['fbuilder']['text'] = array('label' => 'Text', 'type' => 'area', 'att' => ' rows="5" ');
    
    if($action == 'add')
        $excp['title'] = 'Insert a New quote';
    else
        $excp['title'] = 'Edit a quote';


}elseif($action == 'view'){
    $excp['flds'] = '*';
    $excp['title'] = 'Quote View';
    $excp['func4value']['text'] = 'auto_direction';
    $excp['func4value']['category'] = 'get_muli_cate';
    $excp['func4value']['type'] = 'get_cate_name';
    $excp['func4value']['author'] = 'get_cate_name';
    
}else{
    $excp['title'] = 'Quote - List';
    $excp['flds'] = 'text,type,category';
    $excp['func4value']['type'] = 'get_cate_name';
    $excp['func4value']['category'] = 'get_muli_cate';
    //$excp['func4value']['district'] = 'get_cate_name';
    //$excp['func4value']['village'] = 'get_cate_name';
    $excp['fld_label']['id'] = 'CID';
    $excp['fld_label']['pname'] = 'Project Name';
    $excp['fld_label']['pcode'] = 'Project Code';
    $excp['search']['form-class'] = 'navbar-form navbar-left row';
    $excp['search']['flds'] = 'pname,pcode,type';
    $excp['search']['fld-theme'] = '<div class="form-group">::input</div>';
    $excp['search']['fld-theme-class'] = 'form-control input-sm m-a-2';
    $excp['search']['submit'] = '<button type="submit" class="btn btn-sm">Search</button>';
    $type = cat_2arr('quote_type');
    $type[0] = 'All';
    $excp['search']['fbuilder']['type'] = array('label' => 'Activity Type', 'type' => 'select', 'options' => $type);
   // $excp['search']['fbuilder']['pname'] = array('label' => 'Activity Type', 'type' => 'text', 'att' => ' style="width:130px;" placeholder="Project Name"');
    $excp['search']['fbuilder']['text'] = array('label' => 'Activity Type', 'type' => 'text', 'att' => ' style="width:130px;" placeholder="Project Code"');
    
    $ax['::LINK_PUBLISHED']=get_tbllink(is_get('tbl')).'&status=act';
    $ax['::LINK_SUS']=get_tbllink(is_get('tbl')).'&status=sus';
    $ax['::LINK_DEL']=get_tbllink(is_get('tbl')).'&status=del';
    $ax['::LINK_ADDNEW']=get_tbllink(is_get('tbl'), 'add');
    $ax['::LINK_ALL']=get_tbllink(is_get('tbl')).'&list=all';
    $ax['::LINK_MY']=get_tbllink(is_get('tbl'));
    $excp['search']['theme'] = get_template('tables\searchbox',$ax);
    
   
}

$conx = '   $("#bulk-ac").click(function() {
        $("#list_' . is_get('tbl') . '").load("' . get_tbllink(is_get('tbl')) . ' #list_' . is_get('tbl') . '", function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    alert(msg + xhr.status + " " + xhr.statusText );
  }});

    });';



//addlinejs($conx);



?>


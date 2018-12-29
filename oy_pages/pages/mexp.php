<?php
loginrequired();
global $dbase,$curr,$sizetype;
$curr = ' '.get_cate_name(get_setting('currency'));
$sizetype = ' '.(get_setting('sizetype'));
//echo ($_GET['eoe']==1? EXOIL : IMOIL);
$myhome = HOME.'?pg=impexp';
load_jsplug('bootstrap') ;
class_include('jdatetime');

if(is_get('view')){
   $vid= is_get('view');
    post_query("select * from sob_money where mon_id={$vid}");
   
   theme_include('pages\money_view'); 
}elseif(is_get('edit')){
   $oid= is_get('edit');
    if(is_post('mon_name')){
        
          $data = $_POST;
    $data['mon_name'] = cate2db(is_post('mon_name'),'company');
    $data['mon_uid'] = user_uid();
   // $data['imp_eoe'] = is_get('eoe');
    // $data['imp_date'] = date('Y-m-d');
    // $data['imp_sdate'] = get_jdate('Y-m-d');
    
      $whereedit = " WHERE mon_id='".$oid."'";
 IF($dbase->RowUpdate('sob_money',$data,$whereedit ))
         ECHO 'موفقانه ویرایش شد';
 ELSE
     ECHO 'ثبت نشده, دوباره تلاش کنید';
    }else{
    $main_query ="SELECT * FROM sob_money where mon_stat=0";
    $where = " AND mon_id='".$oid."'";
    $limit = " LIMIT 1";
    $ss_query = $main_query . $where . $limit;
    post_query($ss_query);
        if(have_post()){
        while(have_post()) : the_post();  
            set_pgtitle(get_mon_eoe()==1 ? 'پرداخت به '.get_cate_name(get_mon_name()) : 'دریافت از '.get_cate_name(get_mon_name()));
            theme_include('pages\edit_money');  
        endwhile;}
    
    }
    
}elseif(is_get('add')){

    
  $data = $_POST;
  // if(is_get('eoe')==1){
   $comtype = $data['comtype'];   unset($data['comtype']);
  // }else{
  //     $comtype = 'company';
  // }
      $data['mon_name'] = cate2db(is_post('mon_name'),$comtype);
    $data['mon_uid'] = user_uid();
    $data['mon_eoe'] = is_get('eoe');
     $data['mon_date'] = date('Y-m-d');
     $data['mon_sdate'] =  get_jdate('Y-m-d');

 IF($dbase->RowInsert('sob_money',$data))
         ECHO 'موفقانه ثبت شد';
 ELSE
     ECHO 'ثبت نشده, دوباره تلاش کنید';



}else{

if(is_get('eoe')){
    set_pgtitle($_GET['eoe']==1? 'پرداخت پول از دخل' : 'دریافت پول از شخص');
            theme_include('pages\mexp');
}else{
    set_pgtitle('لیست');
        if(is_get('lim'))
        $max_num = is_get('lim');
        
    elseif(is_get('loader'))
        $max_num = 5;
    else{
      if(isset($_COOKIE['jobtheme']) && $_COOKIE['jobtheme'] == 'tbl')
            $max_num = 40;
      else
            $max_num = TBL_LIMITE;
    }
    
    
    
    
        $page = is_get('page');

    if(is_get('page')){
        $page = (int) $page - 1;
        $offset = $max_num * $page;
    }else{
        $page = 0;
        $offset = 0;
    }

    
    
    $main_query ="SELECT * FROM sob_money where mon_stat=0";
    
    
    $where = "";
    $orderby = " ORDER BY mon_id DESC";
      global $pagin, $total;
    $total = $dbase->num_rows($main_query . $where);
    if($myhome && $total < 1)
        redirect_to(get_link('jobs'));

    $left_rec = $total - ($page * $max_num);
    $limit = " LIMIT {$offset},{$max_num}";
    
    //$ss_query = "SELECT * FROM sob_impexp where mon_stat=0 $where ORDER BY mon_time LIMIT $start_from, $per_page";
    
    
            $ss_query = $main_query . $where . $orderby . $limit;
         post_query($ss_query);
    if(is_get('pg') == 'mexp')
        $pagin = pagination($total, $max_num, $page + 1, get_current_url());
    else
        $pagin = pagination($total, $max_num, $page + 1, get_current_url().'?pg=mexp');
 
    
    
    
    
    
    theme_include('pages\mlist'); 
    
}

}
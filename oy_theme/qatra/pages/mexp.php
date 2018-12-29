<?php get_header();global $curr; ?>
<div class="content-box">
  
    <div class="sidex">
        
         <div class="panel panel-default" >
    <div class="panel-heading "><h3>
        <?php 
	if($_GET['eoe']==1)
	echo 'پرداخت پول از دخل' ;
	elseif($_GET['eoe']==2)
	echo 'دریافت پول به دخل' ;
	elseif($_GET['eoe']==5)
	echo 'پرداخت پول متفرقه' ;
	else
	echo 'دریافت پول متفرقه' ;
?>
    
        
        
        <?php //echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">     
        
        

<form method="post" enctype="application/x-www-form-urlencoded" name="add"  id="oilexp" lang="fa">
<table align="center" width="650">
  
  <tr>
    <td colspan="2"></td>
   
  </tr>
  
  
<!--   <tr>
<td colspan="2">تاریخ : <?php //echo gregorian_to_jalali($nowy,$nowm,$nowd,'/');  ?> - <?php //echo jdate("l") ?></td>
  </tr>
  -->
  <tr>
    <td>&nbsp; </td>
    <td></td>
  </tr>
  
  <tr>
    <td><label>نام شرکت:</label></td>
    <td>
    
      <input required  name="mon_name" id="name" type="text" />

    
<!--/*    <select id="name" name="name">
    
  <?php global $dbase; $result = $dbase->query("SELECT Distinct sob_name FROM oil_impexp Order by imp_name");
while($row = $dbase->fetch_array($result))
  {
	  
	  echo  '<option value="'.$row['imp_name'].'">'.$row['imp_name'].'</option>';
  }
?>

    </select>*/-->
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>
  <?php //if(is_get('eoe')==1){ ?>
    <tr>
    <td><label>پرداخت برای:</label></td>
            <td><select name="comtype">
        <option value="company">شرکت</option>
         <option value="ocompany">اضافه بار</option>
          <option value="mcompany">محصول</option>
           <option value="tcompany">بار چالانی</option>
        </select>
    </td>
  </tr>
  <?php //} ?>
  <tr>
    <td><label>نوع پول:</label></td>
    <td><select name="mon_mt">
<!--      <option value="1">دالر</option>
      <option value="2">کلدار</option>
      <option value="3">تومان</option>
      <option value="4">افغانی</option>
      <option value="100">دیگر</option>
      
      -->
      
        <?php 
             $oild =  cat_2arr_l('currency',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<option value="'.$id.'">'.$label.'</option>';
                 
            }

?>
    </select></td>
  </tr>
  

  
  
   <tr>
    <td><label>مقدار:</label></td>
    <td><input  size="6"  required name="mon_rmoney" onBlur="validate(this.id, this.value,'num');" id="amountx" type="text" />
     <span style="color:red" name="qay" id="qay_amountx"></span>
    </td>
  </tr>
   <tr>
    <td><label>یک <?php echo $curr ?> :</label></td>
    <td>
    <input  size="10" required onBlur="validate(this.id, this.value,'num');addNumbers('/','amountx',this.id,'totalz');" name="mon_rated" id="ratea" type="text" />
    <span style="color:red" name="qay" id="qay_ratea"></span>
    </td>
  </tr>
   <tr>
    <td><label>به <?php echo $curr ?>:</label></td>
    <td><input required name="mon_doller" disabled id="totalz" type="text" /></td>
  </tr>
   
   <tr>
    <td valign="top"><label>توضیحات:</label></td>
    <td>
    <textarea id="dis" name="mon_discription" cols="30" rows="5"></textarea></td>
  </tr>
  
   <tr>
       <td></td>
       <td>
<input class="btn btn-success btn-sm Pull-left" data-url="<?php echo HOME ?>?pg=mexp&eoe=<?php echo is_get('eoe'); ?> #reportx" id="load_reportx" type="button" name="Send" value="ذخیره و جدید"  onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=mexp&eoe=<?php echo is_get('eoe'); ?>&add=1');" /></td>
   
  </tr>
 
</table>
  
</form>
        <span style="color:red" name="mess" id="mess"></span>


</div></div></div>
    
    
    
<div class="sidex Pull-left" style="">
 <span  id="reportx">
     
     
     
     
     
     <div class="panel panel-default" >
    <div class="panel-heading "><h3>مجموع پرداخت و دریافتها</h3></div>
    <div class="panel-body ">                


    <table style="table-layout:fixed" id="datatbl" width="550" >
	<tr>
            <th width="120px">نوع تیل/نوع پول</th>
            <?php 

             $oild =  cat_2arr_l('currency',0,'fa_AF');
            foreach($oild as $id => $label){
                 echo '<th width="80px">'.$label.'</th>';   
            }

?>  
            
            
   
  </tr>
  
  
   <?php
             $oildx =  array(1=>'پرداخت',2=>'دریافت',5=>'پرداخت متفرقه',7=>'دریافت متفرقه');
            foreach($oildx as $id => $label){?>
                 <tr>
  <th width="140px"><?php echo $label; ?></th>
<?php foreach($oild as $sid => $slabel){
                 echo '<td>'.get_totalmoney($sid,$id).'</td>';   
            }
            
            
            ?>
    
   
  </tr>
                 
       <?php      }
            ?>
    <tr>
  <th width="140px">موجودی فعلی</th>
<?php 

    $oild =  cat_2arr_l('currency',0,'fa_AF');
            foreach($oild as $id => $label){
                $mon = get_balmoney($id);
                
                $color = ($mon>0 ? 'text-success' : 'text-danger');
                 echo '<td><span class="'.$color.'">'.abs($mon).'</span></td>';     
            }

?>
   <tr>
    </table>
    
  </div></div>
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
 <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">     
<?php

global $dbase;
$nx=$_GET['eoe'];
$day=date('Y-m-d');$todaymond=0;
	$result = $dbase->query("SELECT mon_doller FROM sob_money where mon_stat=0 and mon_eoe='$nx' and mon_date='$day' ORDER BY mon_time");
	$todayoild=0;
	while($row = $dbase->fetch_array($result))
	  {
		  $todaymond = $row['mon_doller'] + $todaymond;
	  }



  echo  ' کل موجودی دخل ';
	  
	//echo getsafemon();
  
  
   ?> |  <?php 
	 
	 if($_GET['eoe']==1)
	echo 'بردگی از دخل امروز' ;
	elseif($_GET['eoe']==2)
	echo 'دریافتی دخل امروز' ;
	elseif($_GET['eoe']==5)
	echo 'بردگی متفرقه از دخل امروز' ;
	else
	echo 'دریافتی متفرقه دخل امروز' ;
	 
	 
	 echo $todaymond;?>





<p style="color:green">آخرین اطلاعات ذخیره شده </p>

<?php 
$nx=$_GET['eoe'];
$day=date('Y-m-d');
$result = $dbase->query("SELECT * FROM sob_money where mon_eoe='$nx'   ORDER BY mon_id DESC LIMIT 5");?>
<table id="datatbl" width="550" >
	<tr>
    <th>نام</th>
    <th >نوع پول</th>
    <th>مقدار</th>
    <th>یک دالر</th>
    <th>به دالر</th>
    <th>توضیحات</th>
  </tr>
  
  
  
 

	<?php
while($row = $dbase->fetch_array($result))
  {
?>

  <tr>
      <td><a class="viewlink" href="<?php echo HOME."?pg=mexp&edit=".$row['mon_id'] ?>" target="_blank" data-url="<?php echo HOME."?pg=mexp&view=".$row['mon_id'] ?> #view" title="go to page"><?Php echo get_cate_name($row['mon_name']) ?></a></td>
    <td><?Php echo get_cate_name($row['mon_mt']) ?></td>
    <td><?Php echo $row['mon_rmoney'] ?></td>
    <td><?Php echo $row['mon_rated'] ?></td>
    <td><?Php echo $row['mon_doller'] ?></td>
    <td><?Php echo $row['mon_discription'] ?></td>
  </tr>



<?php
 }
?>


</table>
  </span>  
    
    </div></div>
    
        <span id="viewportal">
            
        </span>
</div>

    
 
</div>





<?php get_footer() ?>
<?php get_header();global $curr; ?>
<div class="content-box">
  
    <div class="sidex">
        
         <div class="panel panel-default" >
    <div class="panel-heading "><h3>
        <?php 
        
        $_GET['eoe']=get_mon_eoe();
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

  <tr>
    <td>&nbsp; </td>
    <td></td>
  </tr>
  
  <tr>
    <td><label>نام شرکت:</label></td>
    <td>
    
        <input value="<?php echo get_cate_name(get_mon_name()); ?>" required  name="mon_name" id="name" type="text" />


    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>
  <?php //if(is_get('eoe')==1){ ?>
    <tr>
    <td><label>پرداخت برای:</label></td>
            <td><select name="comtype"> <?php 
                    $type = get_typeof(get_mon_name());
                    
                    ?>
        <option <?php echo ($type=='company' ? 'selected' : ''); ?> value="company">شرکت</option>
         <option <?php echo ($type=='ocompany' ? 'selected' : ''); ?> value="ocompany">اضافه بار</option>
          <option <?php echo ($type=='mcompany' ? 'selected' : ''); ?> value="mcompany">محصول</option>
           <option <?php echo ($type=='tcompany' ? 'selected' : ''); ?> value="tcompany">بار چالانی</option>
        </select>
    </td>
  </tr>
  <?php //} ?>
  <tr>
    <td><label>نوع پول:</label></td>
    <td><select name="mon_mt">

      
        <?php 
             $oild =  cat_2arr_l('currency',0,'fa_AF');
              $koo_now = get_mon_mt();
            foreach($oild as $id => $label){
                 echo '<option '.($koo_now==$id ? 'selected' : '').' value="'.$id.'">'.$label.'</option>';
                 
            }

?>
    </select></td>
  </tr>
  

  
  
   <tr>
    <td><label>مقدار:</label></td>
    <td><input  size="6"  required name="mon_rmoney" onBlur="validate(this.id, this.value,'num');" value="<?php mon_rmoney() ?>" id="amountx" type="text" />
     <span style="color:red" name="qay" id="qay_amountx"></span>
    </td>
  </tr>
   <tr>
    <td><label>یک <?php echo $curr ?> :</label></td>
    <td>
    <input value="<?php mon_rated() ?>"  size="10" required onBlur="validate(this.id, this.value,'num');addNumbers('/','amountx',this.id,'totalz');" name="mon_rated" id="ratea" type="text" />
    <span style="color:red" name="qay" id="qay_ratea"></span>
    </td>
  </tr>
   <tr>
    <td><label>به <?php echo $curr ?>:</label></td>
    <td><input value="<?php mon_doller() ?>" required name="mon_doller" disabled id="totalz" type="text" /></td>
  </tr>
   
   <tr>
    <td valign="top"><label>توضیحات:</label></td>
    <td>
    <textarea id="dis" name="mon_discription" cols="30" rows="5"><?php mon_discription() ?></textarea></td>
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
    <div class="panel-heading "><h3> آخرین اطلاعات ذخیره شده</h3></div>
    <div class="panel-body ">  

	<table style="table-layout:fixed" id="datatbl" width="550" >
	
            	<tr>
    <th width="80px">زمان ثبت شده به شمسی</th>

    <td width="80px"><?php echo valDate(get_mon_time(),'l j F Y H:i:s'); ?></td>

  </tr>
    

	<tr>
    <th width="80px">نام ثبت کننده</th>

    <td width="80px"><?php echo user_name_ex(get_mon_uid()); ?></td>

  </tr>

  	<tr>
    <th width="80px">نوع</th>

    <td width="80px"><?php echo eoe2label(get_mon_eoe(),'m') ;  ?></td>

  </tr>





</table>


</div></div>
     
     
     
     
     
     
     
 

</div>

    
 
</div>





<?php get_footer() ?>
<?php get_header(); ?>
<div class="content-box">
    <div class="sidex">
      
        
          <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">    
<form method="post" enctype="application/x-www-form-urlencoded" name="add"  id="oilexp" lang="fa">
    <table align="center" width="650">

  <tr>
    <td width="100">نام :</td>
    <td><input required onBlur="validate(this.id, this.value);" name="fullname" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>
  
    <tr>
    <td width="100">نام کاربری :</td>
    <td><input required onBlur="validate(this.id, this.value);" name="uname" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>
  
  
    <tr>
    <td width="100">ایمیل :</td>
    <td><input required onBlur="validate(this.id, this.value);" name="email" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>
  
    
    <tr>
    <td width="100">رمز عبور :</td>
    <td><input required onBlur="validate(this.id, this.value);" name="password" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>
  
  
      <tr>
    <td width="100">رمز عبور  تکرار:</td>
    <td><input required onBlur="validate(this.id, this.value);" name="passwordre" id="name" type="text" />
    <span style="color:red" name="qay" id="qay_name"></span>
    </td>
  </tr>
  
  <tr>
    <td>نوع کاربر:</td>
    <td><select name="rank">
            
            <?php
//             $oild =  cat_2arr_l('oiltype',0,'fa_AF');
//            foreach($oild as $id => $label){
//                 echo '<option value="'.$id.'">'.$label.'</option>';
//                 
//            }
            ?>
      <option value="1">کاربری عادی</option>
      <option value="2">ویرایشگر</option>
      <option value="3">راپورچی</option>
      <option value="99">مدیر کل</option>
    </select></td>
  </tr>


  

   <tr>
    <td align="center" colspan="2">

    <input class="btn btn-success btn-sm Pull-left"  data-url="<?php echo HOME ?>?pg=users #reportx" id="load_reportx" type="button" name="Send" value="ذخیره و جدید"
    onclick="javascript: formget(this.form,'<?php echo HOME ?>?pg=users&add=1'); ;" >


    </td>

  </tr>



</table>
</form>

<span style="color:red" name="mess" id="mess">
    </span>
</div></div></div>
    
    <span id="reportx" >
 <div  class="sidex  Pull-left">
  <div class="panel panel-default" >
    <div class="panel-heading "><h3>آخرین اطلاعات ذخیره شده</h3></div>
    <div class="panel-body ">    



<?php
global $user_arr, $dbase;
$tbl = $user_arr['TBL'];
$pfx = $user_arr['FPX'];
$result = $dbase->query("SELECT * FROM {$tbl}");?>
	<table style="table-layout:fixed" id="datatbl" width="550" >
	<tr>
    <th width="120px">نام</th>
<th width="100px">نام کاربری</th>
    <th width="80px">نوع</th>
<!--    <th  width="80px">ایمیل</th>-->
  
    <th width="180px">تنظیمات</th>
  </tr>






	<?php
while($row = $dbase->fetch_array($result))
  {
?>

  <tr>
  
    <td width="120px"><?Php echo $row[$pfx.'name'] ?></td>
    <td width="100px"><?Php echo $row[$pfx.'user'] ?></td>
    <td width="80px">
        
        
        <?Php 
        
        
        $rank =  $row[$pfx.'rank'];
        if($rank==1)
            echo 'کاربری عادی';
        elseif($rank==2)
            echo 'ویرایشگر';
        elseif($rank==3)
            echo 'راپورچی';
            elseif($rank==99)
            echo 'مدیر کل';
                     
        
        ?></td>
<!--    <td width="100px"><?Php echo $row[$pfx.'email'] ?></td>-->
 
    <td width="200px">
        <a class="btn btn-sm btn-info" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> &emsp;
        <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-user-times" aria-hidden="true"></i></a> &emsp;
        <a class="btn btn-sm btn-warning" href="#"><i class="fa fa-user-secret" aria-hidden="true"></i></a> &emsp;
    </td>
  </tr>



<?php
 }
?>


</table>


</div>

</div>
    
    </div>    </div>    </div>
<?php get_footer() ?>
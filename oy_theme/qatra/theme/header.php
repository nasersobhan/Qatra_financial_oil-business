<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fa-ir" lang="fa-ir">

<head>
<meta charset="utf-8" />
<title><?php echo TITLE ?></title>
 <link rel="stylesheet" href="theme/style.css" />
 
<script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.fixedMenu.js"></script>
     <script type="text/javascript">

 function addNumbers(sox,num1,num2,tot)
                {
                        var val1 = document.getElementById(num1).value;
                        var val2 = document.getElementById(num2).value;
                        var ansD = document.getElementById(tot);
						if(sox=='/')
                        ansD.value = val1 / val2;
						if(sox=='*')
						ansD.value = val1 * val2;
						ansD.value = Math.round(parseFloat(ansD.value))
                }



function validate(field_name, field_value, num){
	var numbers = /^[0-9-.]+$/;
	
	if(num=='num'){
		if (field_value == null || field_value == "" || !field_value.match(numbers))
    	{
			document.getElementById(field_name).value="";
			document.getElementById(field_name).focus();
			 document.getElementById("qay_" + field_name).innerHTML = 'لط�?ا �?یلد را با عدد پر کنید.';
    	}else{
			document.getElementById("qay_" + field_name).innerHTML = '';
			}
		
		}else{
		
		if (field_value == null || field_value == "")
    	{
			document.getElementById(field_name).value="";
			document.getElementById(field_name).focus();
			 document.getElementById("qay_" + field_name).innerHTML = 'لط�?ا �?یلد را پر کنید.';
    	}else{
			document.getElementById("qay_" + field_name).innerHTML = '';
			}
		}
	
}



function allnumeric(uzip)  
{   

var numbers = /^[0-9]+$/;  
if(uzip.value.match(numbers))  
{  
return true;  
}  
else  
{  
alert('ZIP code must have numeric characters only');  
uzip.focus();  
return false;  
}  
}




//<![CDATA[
var div = 'mess';
var loadingmessage = 'لط�?ا کمی صبر کنید...';
function Ajaxrequest(){
    var xmlHttp;
    try{
        // Firefox, Opera 8.0+, Safari    
        xmlHttp=new XMLHttpRequest();
        return xmlHttp;
        }
        catch (e){
            try{
                // Internet Explorer    
                xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
                return xmlHttp;
                }
                catch (e){
                    try{
                        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                        return xmlHttp;
                        }
                        catch (e){
                            alert("مرورگر شما از آژاکس پشتیبانی نمی کند!");
                            return false;
            }
        }
    }
}
function formget(form, url) {
    var poststr = getFormValues(form);
    postData(url, poststr);
}
function postData(url, parameters){
    var xmlHttp = Ajaxrequest();
    xmlHttp.onreadystatechange =  function(){
        if(xmlHttp.readyState > 0 && xmlHttp.readyState < 4){
            document.getElementById(div).innerHTML=loadingmessage;
            }
            if (xmlHttp.readyState == 4) {
                document.getElementById(div).innerHTML=xmlHttp.responseText;
				document.getElementById('name').value="";
				document.getElementById('amountx').value="";
				document.getElementById('totalz').value="";
				document.getElementById('dis').value="";
				document.getElementById('name').focus()
				document.getElementById('pricex').value="";
				document.getElementById('car').value="";
				document.getElementById('driver').value="";
				document.getElementById('ratea').value="";
                }
                }
                xmlHttp.open("POST", url, true);
				xmlHttp.setRequestHeader("charset", "utf-8");
                xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlHttp.setRequestHeader("Content-length", parameters.length);
                xmlHttp.setRequestHeader("Connection", "close");
                xmlHttp.send(parameters);
}
function getFormValues(formobj)
{
    var str = "";
    var valueArr = null;
    var val = "";
    var cmd = "";
    for(var i = 0;i < formobj.elements.length;i++)
    {
        switch(formobj.elements[i].type)
        {
            case "text":
            str += formobj.elements[i].name +
            "=" + encodeURI(formobj.elements[i].value) + "&";
            break;
            case "textarea":
            str += formobj.elements[i].name +
            "=" + encodeURI(formobj.elements[i].value) + "&";
            break;
            case "select-one":
            str += formobj.elements[i].name +
            "=" + formobj.elements[i].options[formobj.elements[i].selectedIndex].value + "&";
            break;
            case "checkbox":
            if(formobj.elements[i].checked == true){
                str += formobj.elements[i].name +
                "=" + formobj.elements[i].value + "&";
            }
            break;
            }
        }
str = str.substr(0,(str.length - 1));
return str;
}
//]]>





--></script>
   <script>
   
   
   function delet(id){
document.getElementById(id).style.display='none';		
	}
   
   
        $('document').ready(function(){
            $('.menu').fixedMenu();
        });
        </script>
</head>
<body>

<?php if(!isset($_GET['rep']) ){ ?>

<div class="menu">
        <ul>
            <li>
                <a href="#">روغنیات<span class="arrow"></span></a>
                
                <ul>
                   <li><a href="?page=oxp&eoe=1"><span>صادر تیل</span></a></li>
            
   				   <li><a href="?page=oxp&eoe=2"><span>وارد تیل</span></a></li>
                   <li><a href="?page=list"><span>لیست تیل</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#">پول<span class="arrow"></span></a>
                <ul>
                    <li><a href="?page=mexp&eoe=1"><span>پرداخت پول از دخل</span></a></li>
    				<li><a href="?page=mexp&eoe=2"><span>&#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1662;&#1608;&#1604; &#1576;&#1607; &#1583;&#1582;&#1604;</span></a></li>
                    <li><a href="?page=mexp&eoe=5"><span> &#1662;&#1585;&#1583;&#1575;&#1582;&#1578; &#1662;&#1608;&#1604; &#1605;&#1578;&#1601;&#1585;&#1602;&#1607;</span></a></li>
                    <li><a href="?page=mexp&eoe=7"><span>&#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1662;&#1608;&#1604; &#1605;&#1578;&#1601;&#1585;&#1602;&#1607;</span></a></li>
                    <li><a href="?page=mlist"><span> لیست پول </span></a></li>
                </ul>
            </li>
            
             <li>
                <a href="#">گزارش گیری<span class="arrow"></span></a>
                <ul>
          
                 <li><a target="_blank" href="?page=blance&rep">بلانس کلی</a></li>
                 <li><a href="?page=blancecust">بلانس کاستوم</a></li>
                  <li><a target="_blank" href="?page=blanceoil&rep">&#1576;&#1604;&#1575;&#1606;&#1587; &#1705;&#1604;&#1740; &#1576;&#1585; &#1575;&#1587;&#1575;&#1587; &#1585;&#1608;&#1594;&#1606;&#1740;&#1575;&#1578;</a></li>
                 
                 
                 
<li><a target="_blank" href="?page=mday2&rep&y=<?php echo date('Y') ?>&m=<?php echo date('m') ?>&d=<?php echo date('d') ?>">لیست مالی امروز</a></li>
<li><a target="_blank" href="?page=oday&rep&y=<?php echo date('Y') ?>&m=<?php echo date('m') ?>&d=<?php echo date('d') ?>">لیست روغنیات امروز</a></li>
                       <li><a href="?page=monsearch">گزارش عمومی یک شرکت</a></li>
                    <li><a href="?page=search">گزارش گیری از مخزنها</a></li>
                    <li><a href="?page=msearch">گزارش گیری مالی (صادرات تیل)</a></li>
                     <li><a href="?page=msearche">گزارش گیری مالی (واردات تیل)</a></li>
                    <li><a href="?page=makhz&me=stu">مخزنها</a></li>
                   
                    <li><a href="?page=makhz&me=expimp">صادرات یا واردات</a></li>
                     <li><a href="?page=mdrep&rep">&#1605;&#1578;&#1601;&#1585;&#1602;&#1607; &#1605;&#1575;&#1604;&#1740;</a></li>
                     <li><a href="?page=makhz&me=com">بر اساس نام شرکت</a></li>
                      
                </ul>
            </li>
            
            
            <?php if(USER_TYPE==1){ ?>
            <li>
                <a href="#">دیگر<span class="arrow"></span></a>
                <ul>
                    <li><a href="?page=stp">ایجاد مخزن</a></li>
<li><a href="?page=delall">&#1581;&#1584;&#1601; &#1588;&#1585;&#1705;&#1578;</a></li>
               
                </ul>
            </li><?php } ?>
            <li>
                <a href="#">کاربر<span class="arrow"></span></a>
                <ul> <li><a href="?page=myinfo">مدیریت کاربران</a></li>
                    <li><a href="login.php?logout">خروج از سیستم</a></li>
                 
                   
                </ul>
            </li>
             <?php if(USER_TYPE==1){ ?>
             <li><a href="?page=backup">بک اپ گیری</a></li>
             <?php } ?>
        </ul>
    </div>


<?php } ?>



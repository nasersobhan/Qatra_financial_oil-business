<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fa-ir" lang="fa-ir">

    <head>
        <meta charset="utf-8" />
        <title><?php echo get_pgtitle(); ?></title>


<!--<script type="text/javascript" src="<?php theme_path() ?>/js/jquery.js"></script>-->




        <?php load_css(); ?> <link rel="stylesheet" href="<?php theme_path() ?>/theme/style.css" />
        
        
        <link rel="stylesheet" type="text/css" media="print"  href="<?php theme_path() ?>/css/print.css" />
    </head>
    <body>
    <div class="loadingbox hidden-print">
      <div id="fountainG">
          <img alt="Ooyta Logo" class="loading-logo blink" src="<?php  echo theme_path('',0).'/img/logo.png' ?>" />

</div>  
        
        
    </div>
        <?php if(!isset($_GET['rep'])){ ?>

            <div class="menu hidden-print">
                <ul>
                    <li><img alt="Ooyta Logo" class="top-logo2" height="24" src="<?php  echo theme_path('',0).'/img/logo.png' ?>" /></li>
                    <li>
                        <a href="#"><i class="fa fa-flask" aria-hidden="true"></i>فروش / خرید<span class="arrow"></span></a>

                        <ul>
                            <li><a href="?pg=impexp&eoe=2"><span><i class="fa fa-reply Pull-left" aria-hidden="true"></i>خرید</span></a></li>
                            <li><a href="?pg=impexp&eoe=1"><span><i class="fa fa-share Pull-left" aria-hidden="true"></i> فروش</span></a></li>


                            <li><a href="?pg=impexp"><span><i class="fa fa-list-ol Pull-left" aria-hidden="true"></i> لیست</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-usd" aria-hidden="true"></i> مالی<span class="arrow"></span></a>
                        <ul>
                            <li><a href="?pg=mexp&eoe=1"><span>پرداخت پول از دخل</span></a></li>
                            <li><a href="?pg=mexp&eoe=2"><span>&#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1662;&#1608;&#1604; &#1576;&#1607; &#1583;&#1582;&#1604;</span></a></li>
                            <li><a href="?pg=mexp&eoe=5"><span> &#1662;&#1585;&#1583;&#1575;&#1582;&#1578; &#1662;&#1608;&#1604; &#1605;&#1578;&#1601;&#1585;&#1602;&#1607;</span></a></li>
                            <li><a href="?pg=mexp&eoe=7"><span>&#1583;&#1585;&#1740;&#1575;&#1601;&#1578; &#1662;&#1608;&#1604; &#1605;&#1578;&#1601;&#1585;&#1602;&#1607;</span></a></li>
                            <li><a href="?pg=mexp"><span> لیست پول </span></a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i> گزارشات<span class="arrow"></span></a>
                        <ul>
                            <li><a href="<?php echo get_link('report', 'view', 'search'); ?>">گزارش پیشرفته<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'blancemulti'); ?>">بلانس کلی عرضی <i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'blance'); ?>">بلانس کلی <i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'blancecust'); ?>">بلانس کاستوم<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'blanceoil'); ?>"><i class="fa fa-share Pull-left" aria-hidden="true"></i>&#1576;&#1604;&#1575;&#1606;&#1587; &#1705;&#1604;&#1740; &#1576;&#1585; &#1575;&#1587;&#1575;&#1587; &#1585;&#1608;&#1594;&#1606;&#1740;&#1575;&#1578;</a></li>



                            <li><a target="_blank" href="<?php echo get_link('report', 'view', 'man2'); ?>&y=<?php echo date('Y') ?>&m=<?php echo date('m') ?>&d=<?php echo date('d') ?>">لیست پرداخت و دریافت روزنه<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a target="_blank" href="<?php echo get_link('report', 'view', 'man'); ?>&y=<?php echo date('Y') ?>&m=<?php echo date('m') ?>&d=<?php echo date('d') ?>">لیست خرید و فروش روزانه<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>

                            <li><a href="<?php echo get_link('report', 'view', 'monsearch'); ?>">گزارش عمومی یک شرکت<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'searchep'); ?>&me=com">گزارش خلاصه یک شرکت<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>

                            
                            <li><a href="<?php echo get_link('report', 'view', 'msearch'); ?>">گزارش مالی یک شرکت (فروش)<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'msearche'); ?>">گزارش مالی یک شرکت(خرید)<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'searchep'); ?>&me=stu">گزارش خلاصه مخزن<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>

                            <li><a href="<?php echo get_link('report', 'view', 'searchep'); ?>&me=expimp">گزارش خلاصه خرید و فروش<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('report', 'view', 'mdrep'); ?>">&#1605;&#1578;&#1601;&#1585;&#1602;&#1607; &#1605;&#1575;&#1604;&#1740;<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>


                            
                            <li><a href="<?php echo get_link('report', 'view', 'othercom'); ?>&me=tran">گزارش شرکت بارچالانی<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
<li><a href="<?php echo get_link('report', 'view', 'othercom'); ?>&me=over">گزارش شرکت اضافه بار<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>

<li><a href="<?php echo get_link('report', 'view', 'othercom'); ?>&me=mah">گزارش شرکت محصول<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>
<li><a href="<?php echo get_link('report', 'view', 'stock'); ?>">گزارش عمومی از مخزنها<i class="fa fa-share Pull-left" aria-hidden="true"></i></a></li>

                    
                        
                        
                        
                        
                        </ul>
                    </li>




                    <li>
                        <a href="#"><i class="fa fa-users" aria-hidden="true"></i> کاربران<span class="arrow"></span></a>
                        <ul> 
                            <li><a href="<?php echo get_link('account'); ?>">تنظیمات کاربری<i class="fa fa-user pull-left" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo get_link('users'); ?>">مدیریت کاربران<i class="fa fa-users pull-left" aria-hidden="true"></i></a></li>


                        </ul>


                        <li>
                            <a href="#"><i class="fa fa-bars" aria-hidden="true"></i> <?php echo g_lbl('settings'); ?><span class="arrow"></span></a>
                            <ul>
                                
                                <li><a href="<?php echo get_link('settings'); ?>"><?php echo g_lbl('settings'); ?><i class="fa fa-cogs Pull-left" aria-hidden="true"></i></a></li>
                                
                                <li><a href="<?php echo get_link('house'); ?>"> مدیریت مخزنها <i class="fa fa-building Pull-left" aria-hidden="true"></i></a></li>

                                <li><a href="<?php echo get_link('oiltype'); ?>"> مدیریت نوع روغنیات <i class="fa fa-tint Pull-left" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo get_link('currency'); ?>"> مدیریت واحد پول <i class="fa fa-money Pull-left" aria-hidden="true"></i></a></li>

                                <li><a href="?pg=delcom">&#1581;&#1584;&#1601; &#1588;&#1585;&#1705;&#1578;</a></li>
                                <li><a href="?pg=backup">بک اپ گیری</a></li>
                            </ul>
                        </li>

                        <li><a href="<?php echo get_link('account', 'user', 'signout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> <?php echo g_lbl('logout'); ?></a></li>


                        <li class="pull-left"><?php echo get_jdate('l j F Y') . ' | ' . date('l j F Y');
        ; ?> <i class="fa fa-clock-o" ></i></li>

                </ul>





<?php } ?>
        </div>






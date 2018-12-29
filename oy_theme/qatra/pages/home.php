
<?php get_header(); global $curr, $sizetype;  ?>
<div class="content-box">

  <div class="panel panel-default" >
    <div class="panel-heading "><h3><?php echo get_pgtitle() ?></h3></div>
    <div class="panel-body ">    


        <?php //get_15daysre() ?>
        
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart','bar']});

      // Set a callback to run when the Google Visualization API is loaded.
     

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        
        <?PHP 
        
               

             $oild =  cat_2arr_l('house',0,'fa_AF');
                
                $STORE= ARRAY();
                
            foreach($oild as $id => $label){
                $STORE[$id] = $label;   
            }
$oildx =  cat_2arr_l('oiltype',0,'fa_AF');
        ?>
               
<?php // foreach($oild as $sid => $slabel){
              // $STORE[$id][$sid] = get_total($sid,$id).'</td>';   
         //   }
            
            
            
?>  
        
        
        
       
        data.addRows([<?php 
        $count = count($STORE);
        $i=0;
    foreach($STORE as $id => $label){
       echo "['".$label."', ".get_total($id)."]";
       if($i<=$count)
           echo ',';
       $i++;
    }
        
    
    
    ?>]);
        
        
        
        

        // Set chart options
        var options = {'title':'مقدار موجودی تیل در مخزنها',
                       'width':500,
                       'height':400,
                   fontName: 'Tahoma', 
                   fontSize: '13',
               dir:'rtl'};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      
      
      
      
      
      
    //  google.charts.load('current', {packages: ['corechart', 'bar']});
//google.charts.setOnLoadCallback(drawTrendlines);

//function drawTrendlines() {
//      var data = new google.visualization.DataTable();
//      data.addColumn('timeofday', 'روزهای ماه');
//      data.addColumn('number', 'خرید');
//      data.addColumn('number', 'فروش');
//
//      data.addRows([
//        [{v: [8, 40, 2], f: '12 جوزا'}, 1, .25],
//        [{v: [9, 3, 2], f: '13 جوزا'}, 2, .5],
//        [{v: [10, 30, 20], f:'شسی'}, 3, 1],
//        [{v: [11, 0, 0], f: 'شسی'}, 4, 2.25],
//        [{v: [12, 0, 0], f: 'شی'}, 5, 2.25],
//        [{v: [13, 0, 0], f: 'شیشسی'}, 6, 3],
//        [{v: [14, 0, 0], f: 'شسیشس'}, 7, 4],
//        [{v: [15, 0, 0], f: 'شسیشس'}, 8, 5.25],
//        [{v: [16, 0, 0], f: 'شسیشسی'}, 9, 7.5],
//        [{v: [17, 0, 0], f: 'شسیشسی'}, 8, 9],
//      ]);
//
//      var options = {
//        title: 'فروشات در هفته گذشته',
//       
//                       'height':600,
//                   fontName: 'Tahoma', 
//                   fontSize: '13',
//        trendlines: {
//          0: {type: 'linear', lineWidth: 5, opacity: .3},
//          1: {type: 'exponential', lineWidth: 10, opacity: .3}
//        },
//        hAxis: {
//          title: 'روزهای گذشته',
//          format: 'y-m-d',
//          viewWindow: {
//            min: [7, 30, 0],
//            max: [17, 30, 0]
//          }
//        },
//        vAxis: {
//          title: ''
//        }
//      };
//
//      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
//      chart.draw(data, options);
//    }
      
      
         
     
      function drawChartz() {
        var data = google.visualization.arrayToDataTable([
          ['روزها', 'فروش', 'خرید'],
          
          
          <?php 
          $resu = get_15daysre();
          
          
          //print_r($resu);
          foreach ($resu as $date => $res)
              echo " ['{$date}', ".$res['sell'].", ".$res['buy']."],";
          
          ?>

        
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            'height':400,
                   fontName: 'Tahoma', 
                   fontSize: '13',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div2'));

        chart.draw(data, options);
      }
      
      
        google.charts.setOnLoadCallback(drawChart);
     //   google.charts.setOnLoadCallback(drawTrendlines);
      
      google.charts.setOnLoadCallback(drawChartz);
    </script>

    <div style="font-family: tahoma;" id="chart_div"></div>

 <div id="chart_div2"></div>
</div></div></div>

<?php get_footer() ?>
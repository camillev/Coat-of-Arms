<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php

//echo $this->Html->script('jquery.jqplot.min');
echo $this->Html->css('jquery.jqplot.min');
?>
                                      
<?php  echo $this->Html->script('jqplot.canvasTextRenderer.min');?>
<?php  echo $this->Html->script('jqplot.canvasAxisLabelRenderer.min');?>

    <script class="include" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    

 
<!-- 2 -->
 <div id="chart1" style="height:300px; width:500px;"></div>
 
 <?php echo "coucou";?>
<!-- 3 -->

<div id="chart2" style="height:300px; width:500px;"></div>



<div id="chart3" style="height:300px; width:500px;"></div>
<script>
$(document).ready(function(){
  var plot1 = $.jqplot ('chart1', [[3,7,9,1,4,6,8,2,5]]);
});
</script>
<script class="code" type="text/javascript">
$(document).ready(function(){
  var plot2 = $.jqplot ('chart2', [[3,7,9,1,4,6,8,2,5]], {
      // Give the plot a title.
      title: 'Plot With Options',
      // You can specify options for all axes on the plot at once with
      // the axesDefaults object.  Here, we're using a canvas renderer
      // to draw the axis label which allows rotated text.
      axesDefaults: {
        labelRenderer: $.jqplot.CanvasAxisLabelRenderer
      },
      // An axes object holds options for all axes.
      // Allowable axes are xaxis, x2axis, yaxis, y2axis, y3axis, ...
      // Up to 9 y axes are supported.
      axes: {
        // options for each axis are specified in seperate option objects.
        xaxis: {
          label: "X Axis",
          // Turn off "padding".  This will allow data point to lie on the
          // edges of the grid.  Default padding is 1.2 and will keep all
          // points inside the bounds of the grid.
          pad: 0
        },
        yaxis: {
          label: "Y Axis"
        }
      }
    });
});
</script>

  
<script class="code" type="text/javascript">
$(document).ready(function(){
  // Some simple loops to build up data arrays.
  var cosPoints = [];
  for (var i=0; i<2*Math.PI; i+=0.4){ 
    cosPoints.push([i, Math.cos(i)]); 
  }
   
  var sinPoints = []; 
  for (var i=0; i<2*Math.PI; i+=0.4){ 
     sinPoints.push([i, 2*Math.sin(i-.8)]); 
  }
   
  var powPoints1 = []; 
  for (var i=0; i<2*Math.PI; i+=0.4) { 
      powPoints1.push([i, 2.5 + Math.pow(i/4, 2)]); 
  }
   
  var powPoints2 = []; 
  for (var i=0; i<2*Math.PI; i+=0.4) { 
      powPoints2.push([i, -2.5 - Math.pow(i/4, 2)]); 
  } 

  var plot3 = $.jqplot('chart3', [cosPoints, sinPoints, powPoints1, powPoints2], 
    { 
      title:'Line Style Options', 
      // Series options are specified as an array of objects, one object
      // for each series.
      series:[ 
          {
            // Change our line width and use a diamond shaped marker.
            lineWidth:2, 
            markerOptions: { style:'dimaond' }
          }, 
          {
            // Don't show a line, just show markers.
            // Make the markers 7 pixels with an 'x' style
            showLine:false, 
            markerOptions: { size: 7, style:"x" }
          },
          { 
            // Use (open) circlular markers.
            markerOptions: { style:"circle" }
          }, 
          {
            // Use a thicker, 5 pixel line and 10 pixel
            // filled square markers.
            lineWidth:5, 
            markerOptions: { style:"filledSquare", size:10 }
          }
      ]
    }
  );
   
});
</script>
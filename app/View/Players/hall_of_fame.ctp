<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!-- 1 -->
<!--[if lt IE 9]>                                          
<?php  echo $this->Html->script('excanvas.min.js');?>
<![endif]-->
 
<?php
echo $this->Html->script('jquery.min.js');
echo $this->Html->script('jquery.jqplot.min.js');
echo $this->Html->css('jquery.jqplot.min.css');
?>
 
<!-- 2 -->
<div id="chartdiv" style="height:400px;width:500px; margin:auto; "></div>
 
<!-- 3 -->
<script>
$(document).ready(function(){
    $.jqplot('chartdiv',  [[[1, 2],[3,5.12],[5,13.1],[7,33.6],[9,85.9],[11,219.9]]]);
});
</script>
- See more at: http://www.startutorial.com/articles/view/how-to-use-jqplot-in-cakephp#sthash.O7vYltIP.dpuf
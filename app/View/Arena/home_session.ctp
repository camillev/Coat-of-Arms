
</div>

<div class="home">
  <div class="row">
    <div class="col-md-offset-3 col-md-6" >       <?= $this->Html->image( 'connected.png', array('alt' => 'CakePHP','width'=>'100%')); ?></div>
</div>
</div>

<div class="home">
<div class="row">
    <div class="col-md-offset-3 col-md-6">
    
      <!-- CARROUSSEL D'AVATAR -->
        <div id="carousel-example-generic" class="carousel" data-ride="carousel" >


         <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" >

                <div class="item active"><center>
                <?= $this->Html->image( 'blason_def.png', array('alt' => 'CakePHP','width'=>200,'height'=>200)); ?>
                </center>
                </div>

                <?php foreach ($avatar as $im){ ?>
                <div class="item"><center>
                <?= $this->Html->image( 'avatar/'.$im, array('alt' => 'CakePHP','width'=>200,'height'=>200)); ?>
                </center>
                </div>

                <?php echo ""; } ?>
            </div>

            <!-- Controls -->

            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <br/>
        </div>
    </div>
    
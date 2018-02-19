<?php $packages=json_decode($package,true);?>
<script type="text/javascript">
  $(document).ready(function(){
    var flights='<?php echo $packages['flights'];?>';
    if(flights==1){
        $('#flights').hide();
    }
    var hotels='<?php echo $packages['hotels'];?>';
    if(hotels==1){
        $('#hotels').hide();
    }
    var transfers='<?php echo $packages['transfers'];?>';
    if(transfers==1){
        $('#transfers').hide();
    }
    var sight_seeings='<?php echo $packages['sight_seeings'];?>';
    if(sight_seeings==1){
        $('#seeings').hide();
    }
     var val='<?php echo $packages['meals'];?>';
    if(val==1){
        $('#meals').hide();
    }
  });
</script>
            <div class="row">
                <div class="col-lg-4">
                    <?php $image=json_decode($packages['images'],true);?>
                    <?php  echo $this->Html->image('package/'.$image[0], array("width"=>"200px","height"=>"200px"));?>
                    </div>
                <div class="col-lg-8">
                    <div class="leftside_modal">
                        <h5><strong><?php echo $packages['package_name'];?></strong></h5>
                        <div class="row">
                            <div class="col-lg-4">
                                <div id="rateYo"></div>
                            </div>
                            <div class="col-lg-8"><?php echo $this->Html->image('icons/internet.png', array("height"=>"24px"));?> Visit Website</div>
                        </div>
                        <h6><strong><?php echo '( '.$packages['days'].' Days '.$packages['nights'].' Nights )';?></strong></h6>
                        <h6><?php echo $packages['package_description'];?></h6>
                        <div class="row">
                        
                            <div class="col-lg-2">
                                <div class="text-center">
                                  <?php 
                                      echo $this->Html->image("icons/flights.png" ,array("height"=>"16px"));
                                      echo $this->Html->image("icons/forbidden.png" ,array("height"=>"25px", "class"=>"not_available_image","id"=>"flights"));
                                    ?>
                                    </div>
                                <div class="icon_text">Flights</div>
                            </div>
                        
                            <div class="col-lg-2">
                                <div class="text-center">
                                  <?php 
                                    echo $this->Html->image("icons/5star.png" ,array("height"=>"16px")); 
                                    echo $this->Html->image("icons/forbidden.png" ,array("height"=>"25px", "class"=>"not_available_image","id"=>"hotels"));?>
                                  </div>
                                <div class="icon_text">5-Star</div>
                            </div>
                        
                            <div class="col-lg-2">
                                <div class="text-center">
                                  <?php 
                                    echo $this->Html->image("icons/transport.png" ,array("height"=>"16px"));
                                    echo $this->Html->image("icons/forbidden.png" ,array("height"=>"25px", "class"=>"not_available_image","id"=>"transfers")); ?>
                                  </div>
                                <div class="icon_text">Transfers</div>
                            </div>
                        
                            <div class="col-lg-2">
                                <div class="text-center">
                                  <?php 
                                  echo $this->Html->image("icons/meals.png" ,array("height"=>"16px"));
                                  echo $this->Html->image("icons/forbidden.png" ,array("height"=>"25px", "class"=>"not_available_image","id"=>"meals")); ?>
                                  </div>
                                <div class="icon_text">Meals</div>
                            </div>
                        
                            <div class="col-lg-2">
                                <div class="text-center">
                                  <?php 
                                  echo $this->Html->image("icons/sightseeing.png" ,array("height"=>"16px"));
                                  echo $this->Html->image("icons/forbidden.png" ,array("height"=>"25px", "class"=>"not_available_image","id"=>"seeings")); ?>
                                  </div>
                                
                                <div class="icon_text">Sight Seeing</div>
                            </div>
                        

                        </div>
                        <hr/>
                        <div class="information">
                            Prices Starting<br/>
                            <strong>RS 8,000/- (For 2 People)</strong>
                        </div>
                        

                        <div class="modal-footer">
                            
                            <button class="btn btn-default">View Details</button>
                            <button class="btn btn-primary">Quick Book</button>     
                        </div>

                    </div>
                </div>
            </div>

<script>
$(document).ready(function(){
    $('.carousel').carousel({
  //interval: 4000
  pause:"hover"
})
    $(function () {

        $("#rateYo").rateYo({
            rating: 3.6,
            starWidth: "20px"
        });

    });
});

</script>
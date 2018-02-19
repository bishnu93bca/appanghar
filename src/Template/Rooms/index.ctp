<br>
<br>
<div class="main main-raised">
 <nav class="navbar" style="background-color: #9e9e9e;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php echo $this->Form->create('get',array('url' => '/rooms/index')); ?>
      <ul class="nav navbar-nav">
        <li class="active">
          <select class="btn btn-warning btn-round" name="cities" onchange="city()" id="city_id">
                <option>Select City</option>
                <?php  
                $cities=file_get_contents(BASE_URL.'cities/ajax');
                $city=json_decode($cities,true);
                  foreach ($city as $key => $value) {?>
                   <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?> </option>
                 <?php };?>
            </select>
        </li>
        <li><select class="btn btn-warning btn-round" name="location" id="location">
                <option>Select Location</option>  
            </select></li>
            <li>
              <select class="btn btn-warning btn-round" name="category">
              <?php 
                $category=file_get_contents(BASE_URL.'Categories/ajax');
                $category=json_decode($category,true);
                foreach ($category as $key => $value) {?>
                <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?> </option>
              <?php }?>
              
            </select>
            </li>
            <li><button class="btn btn-warning btn-round">Search</button></li>
       
      </ul>
    <?php echo $this->Form->end();?>
      <div class="ripple-container"></div>
      <div class="collapse navbar-collapse" id="example-navbar-icons">
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="btn btn-warning btn-round">Popular Search</i>
            <b class="caret"></b>
              <div class="ripple-container"></div></a>
              <ul class="dropdown-menu dropdown-menu-right">
              <?php 
              foreach ($popular as $key => $value):?>
              <li><?=$this->Html->link($value->name,['controller'=>'rooms','action'=>'view',$value->id])?></li>
             <?php endforeach;?>
                  
                  
              </ul>
          </li>
      </ul>
    </div>
    </div>
  </div>
</nav>

       <div class="section text-center" style="padding: 1px 0!important;">
            
          <div class="team">
            <div class="row">

            <?php 
            if(!empty($rooms)){
            $i=0; foreach ($rooms as $key => $value):?>
                      <div class="col-md-4">
                     
                        <div class="box">
                           
                           <?php $image=json_decode($value->images,true);
                           echo $this->Html->link(
                                  $this->Html->image('rooms/'.$image[0], ['alt' => 'Brownies','class'=>'img-raised img-rounded img']),['controller'=>'rooms','action'=>'view',$value->id]
                                  ,
                                  ['escapeTitle' => false]
                              );?>
                          <div class="team-player">
                              
                              <h4><?=h($value->name)?></h4> 
                              <small class="text-muted"><?php echo $value->address;?></small>
                              <p class="description"><!-- <?php echo $value->description;

                              ?> -->
                                <?php if(strlen(strip_tags($value->description))> 200){
                              echo substr(strip_tags($value->description),0,200)."...";
                                } else{    
                                  echo strip_tags($value->description)."...";
                                }?>
                              </p>
                            <a href="#" class="btn btn-simple btn-just-icon"><i class="fa fa-snowflake-o"></i></a>
                            <a href="#" class="btn btn-simple btn-just-icon"><i class="fa fa-wifi"></i></a>
                            <a href="#" class="btn btn-simple btn-just-icon"><i class="fa fa-bed"></i></a>
                            <a href="#" class="btn btn-simple btn-just-icon"><i class="fa fa-cutlery"></i></a>
                          </div>
                        </div>

                      </div>
            <?php $i++; if($i==3){?>

              </div>
            </div>
            <div class="team">
              <div class="row">
              <?php $i=0; }
           endforeach;
           }else{?>
           <h1>No Found.</h1>
           <?php }?>
            </div>
          </div>
          

        </div>
  
<div class="section text-center" style="padding: 1px 0!important;">
            
  <div class="team">
    <div class="row">

    
    </div>
  </div>
</div>
      


<script type="text/javascript">
 function city(){
  var id =$('#city_id').val();
    $.ajax({url: "<?php echo BASE_URL;?>location/ajax/"+id,
               success: function(data){

                html = "";
                $obj=JSON.parse(data);
                for (var i =0; i<$obj.length;i++) {
                 console.log($obj[i].id);
                  html += "<option value=" + $obj[i].id  + ">" +$obj[i].name + "</option>"
                }
                 document.getElementById("location").innerHTML = html;
                
          }});
 }
</script>
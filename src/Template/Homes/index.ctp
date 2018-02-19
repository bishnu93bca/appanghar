<div class="header" style="background-image: url('<?php echo BASE_URL;?>img/banner-1.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="brand">
            
            <?php echo $this->Form->create('get',array('url' => '/rooms/index')); ?>
            <select class="btn btn-info btn-round" name="cities" onchange="city()" id="city_id">
                <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                <option>Select City</option>
                <?php  
                $cities=file_get_contents(BASE_URL.'cities/ajax');
                $city=json_decode($cities,true);
                  foreach ($city as $key => $value) {?>
                   <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?> </option>
                 <?php };?>
                
              </select>
              <select class="btn btn-info btn-round" name="location" id="location">
                <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                <option>Select Location</option>
                
                
              </select>
              <select class="btn btn-info btn-round" name="category">
                <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                <?php 
                  $category=file_get_contents(BASE_URL.'Categories/ajax');
                  $category=json_decode($category,true);
                  foreach ($category as $key => $value) {?>
                  <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?> </option>
               <?php }?>
              
              </select>
              <button class="btn btn-primary btn-round">Search</button>
             <?php echo $this->Form->end();?>            
          </div>
        </div>
      </div>

    </div>
  </div>
<div class="main main-raised">
<div class="section">
          <div class="container tim-container">
              <div class="title" style="text-align: center;">
                  <h1>Our PG/Hostel</h1>
            <h3>Student or a Working professional looking for a stress-free stay?</h3>
            <h3> Here we are! Book a Appan Ghar PG/Hostel and get assured of all the key amenities.</h3>
              </div>
              

        <div class="row sharing-area text-center" style="border-radius: 6px;background-image: url('<?php echo BASE_URL;?>img/bg.jpg');">
                      
                      <span class="btn btn-info">
                          <i class="fa fa-snowflake-o fa-spin"></i>
                         AC
                      </span>
                      <span class="btn btn-success">
                          <i class="fa fa-wifi fa-spin"></i>
                          Wi-fi
                      </span>
                      <span class="btn btn-primary">
                          <i class="fa fa-cutlery fa-spin"></i>
                          Food
                      </span>
                      <span class="btn">
                          <i class="fa fa-tv fa-spin"></i>
                        TV
                      </span>
                      <span class="btn btn-warning">
                      	<i class="fa fa-volume-control-phone fa-spin"></i>
                      	24X7 Support
                      </span>
                      <dir class="row"></dir>
              </div>
          </div>
      </div>
      <div class="section text-center">
                  <div class="title" style="text-align: center;">
                  <h1>Why Appanghar?</h1>
            <h3>With our aim of providing good standard in quality, we guarantee of a homely environment away from home.</h3>
            
              </div>
          
          <div class="row">
              <div class="col-md-5">
              <?=$this->Html->image('IMG-20170614-WA0011.jpg',['alt'=>"Thumbnail Image",'class'=>"img-raised img-rounded widht"])?>
              <br><br>
              <?=$this->Html->image('IMG-20170614-WA0017.jpg',['alt'=>"Thumbnail Image",'class'=>"img-raised img-rounded widht"])?>
              </div>
              <div class="col-md-2">
             <ul>
               <li class="li">No brokerage</li>
               <li class="li">No lock-in period</li>
               <li class="li">Quality services</li>
               <li class="li">Hygiene</li>
               <li class="li">No restrictions</li>
               <li class="li">Recreational activities</li>

             </ul>
              </div>
              <div class="col-md-5">

            
             <?=$this->Html->image('IMG-20170614-WA0019.jpg',['alt'=>"Thumbnail Image",'class'=>"img-raised img-rounded widht"])?>
             <br><br>
             <?=$this->Html->image('IMG-20170614-WA0013.jpg',['alt'=>"Thumbnail Image",'class'=>"img-raised img-rounded widht"])?>
              </div>
          </div>
          <style>
          .team-playe , a .fa{
          color:#46b8da;
          }
          </style>
          <h1>PG/Hostel</h1>
          <div class="team">
            <div class="row">
            <?php $i=0; foreach ($rooms as $key => $value):?>
                      <div class="col-md-4">
                     
                        <div class="box">
                           
                           <?php $image=json_decode($value->images,true);
                           echo $this->Html->link(
                                  $this->Html->image('rooms/'.$image[0], ['alt' => 'Brownies','class'=>'img-raised img-rounded img']),['controller'=>'rooms','action'=>'view',$value->id]
                                  ,
                                  ['escapeTitle' => false]
                              );?>
                          <div class="team-player">
                              
                              <h3 style="color:#d17013;"><?=h($value->name)?></h3> 
                              <p class="text-muted" style="color:block;"><?php echo $value->address;?></p>
                              <p class="description" style="text-align:justify;color:#191616;"><?php if(strlen(strip_tags($value->description))> 150){
                              echo substr(strip_tags($value->description),0,150)."...";
                                } else{    
                                  echo strip_tags($value->description)."...";
                                }?></p>
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
           endforeach;?>
            </div>
          </div>
          
          
          
          

              </div>

              <div class="section landing-section">
                  <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                          <h2 class="text-center title" style="color: #2196F3;">Work with us</h2>
              <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                          <form class="contact-form" method="post">
                              <div class="row">
                                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Your Name</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                                  </div>
                                  <div class="col-md-6">
                    <div class="form-group label-floating">
                      <label class="control-label">Your Email</label>
                      <input type="email" name="email" class="form-control">
                    </div>
                                  </div>
                              </div>

                <div class="form-group label-floating">
                  <label class="control-label">Your Messge</label>
                  <textarea class="form-control" name="message" rows="4"></textarea>
                </div>

                              <div class="row">
                                  <div class="col-md-4 col-md-offset-4 text-center">
                                      <button name="send" class="btn btn-primary btn-raised">
                      Send Message
                    </button>
                                  </div>
                              </div>
                          </form>
                          <?php
                          if(isset($_POST['send'])){
                           $name= $_POST['name'];
                           $email= $_POST['email'];
                           $msg= $_POST['message'];
                             

                    $headers = "From:".$email;

                    $to = 'info@appanghar.com';
                    
                    $subject ="Appan Ghar website ";
                    $msg = "Hi Team, \r\n\r\n".ucwords($name)."\r\n\r\n says: \r\n\r\n".$msg."\r\n\r\nEmail: ".$email;


      if(mail($to, $subject, $msg, $headers)){echo "<script> alert('Message Send')</script>";}else{echo "<script> alert('Message has been not Send')</script>";}
                            }?>
                      </div>
                  </div>

              </div>
             <div id="map" class="section" style="height: 300px;" ></div>
    <script>
      var map;
      function initMap() {

        var seeingo = {lat: <?php echo HOME_LATITUDE; ?>, lng: <?php echo HOME_LONGITUDE; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: seeingo
        });
        var marker = new google.maps.Marker({
            position: seeingo,
            map: map
        });
    };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_KEY;?>&callback=initMap"
    async defer></script>
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
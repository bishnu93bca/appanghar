<br><br>
<div class="main main-raised">

		<div class="col-md-12">
		<?php $image=json_decode($rooms->images,true);?>
	
						<!-- Carousel Card -->
						<div class="card card-raised card-carousel">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<div class="carousel slide" data-ride="carousel">

									<!-- Indicators -->
									<ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
										<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
									</ol>

									<!-- Wrapper for slides -->
									<div class="carousel-inner">
										<div class="item active">
											<?=$this->Html->image('rooms/'.$image[0],['class'=>'img_item'])?>
											<div class="carousel-caption">
												<h4><i class="material-icons"></i></h4>
											</div>
										</div>
										<div class="item">
											<?=$this->Html->image('rooms/'.$image[1],['class'=>'img_item'])?>
											<div class="carousel-caption">
												<h4><i class="material-icons"></i></h4>
											</div>
										</div>
										<div class="item">
											
											<?=$this->Html->image('rooms/'.$image[2],['class'=>'img_item'])?>
											<div class="carousel-caption">
												<h4><i class="material-icons"></i>  </h4>
											</div>
										</div>
									</div>

									<!-- Controls -->
									<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
										<i class="material-icons">keyboard_arrow_left</i>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
										<i class="material-icons">keyboard_arrow_right</i>
									</a>
								</div>
							</div>
						</div>
						
					
				</div>
		<div class="section section-tabs">
		<div class="rwo"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="title">
							<h2><?=h($rooms->name)?></h2>
							<h4><?php echo $rooms->address;?></h4>
							<h4><i class="fa fa-inr"></i> <?=h($rooms->rent)?>&nbsp;<?=h($rooms->room)?></h4>
						</div>

						<!-- Tabs with icons on Card -->

						
							
							
							<h3>Amenities</h3>
								<div class="tab-content text-center">
									<div class="tab-pane active">
										<span class="btn btn-info">
											<i class="fa fa-snowflake-o fa-spin"></i>
											AC<div class="ripple-container"></div>
										</span>
										<span class="btn btn-info">
											<i class="fa fa-wifi fa-spin"></i>
											Wi-Fi<div class="ripple-container"></div>
										</span>
										<span class="btn btn-info">
											<i class="fa fa-bed fa-spin"></i>
											Bed<div class="ripple-container"></div>
										</span>
										<span class="btn btn-info">
											<i class="fa fa-cutlery fa-spin"></i>
											Food<div class="ripple-container"></div>
										</span>
										
									</div>
									
								</div>
							
						
						<!-- End Tabs with icons on Card -->
						<!-- Description -->
						
							<h3>Description</h3>
							<?php echo $rooms->description;?>
							
						
						<div class="card card-nav-tabs">
							 <style>
					       #map {
					        height: 400px;
					        width: 100%;
					       }
					    </style>
					    <div id="map"></div>
					    <script>
					      function initMap() {
					        var uluru = {lat: <?=h($rooms->lat)?>, lng: <?=h($rooms->lng)?>};
					        var map = new google.maps.Map(document.getElementById('map'), {
					          zoom: 14,
					          center: uluru
					        });
					        var marker = new google.maps.Marker({
					          position: uluru,
					          map: map
					        });
					      }
					    </script>
					    <script async defer
					    src="https://maps.googleapis.com/maps/api/js?key=<?=h(GOOGLE_MAP_KEY)?>&callback=initMap">
					    </script>
						</div>

					</div>

					<!--Start Right slide-->
					<div class="col-md-4">
						<div class="card card-nav-tabs card-plain">
							<div class="header header-danger">
								<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs" data-tabs="tabs">
											<li class="active"><a href="#visit" data-toggle="tab">Schedule a Visit </a></li>
											<li><a href="#book_now" data-toggle="tab">Book Now</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content">
								<div class="tab-content text-center">
									
	
  										<div class="tab-pane active" id="visit">
										 <?=$this->Form->create('post',array('url' =>'/visiters/add')); ?>
        
   											<input type="hidden" class="form-control" name="room_id" id="firstname" value="<?php echo $rooms->id;?>"  required=""/>
											<div class="form-group label-floating">
												<label class="control-label">First Name</label>
												
												<input type="text" class="form-control" name="firstname" id="firstname"  required=""/>
												<span class="material-input"></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Last Name</label>
												
												<input type="text" class="form-control" name="lastname" id="lastname" required=""/>
												<span class="material-input"></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Phone No</label>
												
												<input type="text" class="form-control" name="phone" required=""/>
												<span class="material-input"></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Email Id</label>
												
												<input type="email" class="form-control" name="email" id="email"  required=""/>
												<span class="material-input"></span>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Occupancy</label>
												<select name="rooms" class="form-control">
													<option value="Single Sharing (Rs. 14000)">Single Sharing (Rs. 14000)</option>
													<option value="Double Sharing (Rs. 8000)">Double Sharing (Rs. 8000)</option>
													<option value="Triple Sharing (Rs. 8000)">Triple Sharing (Rs. 8000)</option>
												</select>
												<span class="material-input"></span>
											</div>
											<div class="form-group label-static">
												<label class="control-label">Visit Date</label>
												<input type="text" name="visit_date" class="datepicker form-control" value="01/07/2017">
												<span class="material-input"></span>
											</div>
											
											<button class="btn btn-warning btn-block" >Schedule<div class="ripple-container"></div></button>
											
										 <?php echo $this->Form->end();?>
										</div>
											<div class="tab-pane" id="book_now">
						
												<?php echo $this->Form->create('post',array('url' => '/books/payment',$rooms->id)); ?>
													<div class="form-group label-floating">
														<label class="control-label">First Name</label>
														
														<input type="text" class="form-control" name="firstname" id="firstname" required="" />
														<span class="material-input"></span>
													</div>
													<div class="form-group label-floating"><label class="control-label">Last Name</label>
														
														<input type="text" class="form-control" name="lastname" id="firstname" />
														<span class="material-input"></span>
													</div>
														
													<div class="form-group label-floating">
														<label class="control-label">Phone No</label>
														
														<input type="text" class="form-control" name="phone" required="" />
														<span class="material-input"></span>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Email Id</label>
														
														<input type="email" class="form-control" name="email" id="email" required="" />
														<span class="material-input"></span>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Room</label>
														<input type="text" class="form-control" name="productinfo" value="<?php echo $rooms->id.".".$rooms->name." , ".$rooms->room; ?>" readonly />
													</div>
													<div class="form-group label-static">
														<label class="control-label">Date</label>
														<input type="text" name="date" class="datepicker form-control" value="<?php echo date("d/m/Y");?>">
														<span class="material-input"></span>
													</div>
													<div class="form-group label-floating">
														<label class="control-label">Token Amount</label>
														
														<input type="text" class="form-control" name="amount" readonly="" value="5000"  />
														<span class="material-input"></span>
													</div>
													
													<button class="btn btn-success btn-block">Book Now<div class="ripple-container"></div></button>
													
												 <?php echo $this->Form->end();?>
												
											</div>
									
								</div>
							</div>
						</div>
						<!-- End Tabs on plain Card -->

						<?php foreach ($related as $key => $value):?>
						
						<div class="row">
							
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
			                              <p class="description"><?php echo $value->description;?></p>
			                            <a href="#" class="btn btn-simple btn-just-icon"><i class="fa fa-snowflake-o"></i></a>
			                            <a href="#" class="btn btn-simple btn-just-icon"><i class="fa fa-wifi"></i></a>
			                            <a href="#" class="btn btn-simple btn-just-icon"><i class="fa fa-bed"></i></a>
			                            <a href="#" class="btn btn-simple btn-just-icon"><i class="fa fa-cutlery"></i></a>
			                          </div>
	                        	</div>
							
						</div>
					<?php endforeach;?>
					</div>


				</div>
			</div>
		</div>
		
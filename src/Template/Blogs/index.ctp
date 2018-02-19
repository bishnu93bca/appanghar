<br><br>
<style type="text/css">
	.readmore{
		background-color: #226fb1;
		color: white;
	}
	 .h3{
	 	font-size: 1.825em;
    line-height: 1.4em;
    margin: 7px 0 -31px;
    text-align: center;
		}
</style>
<div class="main main-raised">
		<div class="col-md-12">
		
	
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
											<?=$this->Html->image('rooms/img_1.jpg',['class'=>'img_item'])?>
											<div class="carousel-caption">
												<h4>wejrtwetrwet</h4>
											</div>
										</div>
										<div class="item">
											<?=$this->Html->image('rooms/img_2.jpg',['class'=>'img_item'])?>
											<div class="carousel-caption">
												<h4>sfdgs</h4>
											</div>
										</div>
										<div class="item">
											
											<?=$this->Html->image('rooms/img_3.jpg',['class'=>'img_item'])?>
											<div class="carousel-caption">
												<h4>sfgsdfg </h4>
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
				<div class="title" style="text-align: center;">
							<h2>Blogs</h2>
						</div>
						<?php foreach ($Blogs as $key => $value):?>
						<div class="row">
							<div class="col-md-4">
							<?=$this->Html->image('rooms/'.$value->images,['class'=>'response','height'=>200,'widht'=>200])?>
							</div>

							<div class="col-md-8">
									<h3  class="h3"><?=$this->Html->link($value->name,['controller'=>'blogs','action'=>'view',1],['class'=>''])?></h3>

							<p style="text-align: right;">Date <?= h($value->created) ?></p>
							<p><?php if(strlen(strip_tags($value->description))> 300){
                          echo substr(strip_tags($value->description),0,300)."...";

                        } else{    
                          echo strip_tags($value->description)."...";
                        }?><?=$this->Html->link('Read more',['controller'=>'blogs','action'=>'view',$value->id],['class'=>'btn btn-simple btn-sm btn-info'])?></p>
							
							
							</div>

						</div>
					</div>
					<br>
				<?php endforeach;?>
					
		</div>
</div> 

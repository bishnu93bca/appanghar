<br>
<br>
<div class="main main-raised">
		<div class="section section-tabs">
		
			<div class="row" style="padding-left: 10px;">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <h1><?=h($Blogs->name)?></h1>
                <hr>
                <p><span class="glyphicon glyphicon-time"></span> Posted Date <?=h($Blogs->created)?></p>
                <hr>
                
                <?=$this->Html->image('rooms/'.$Blogs->images,['class'=>'img-responsive','height'=>300,'widht'=>900])?> 
                <hr>
                <p style="text-align: justify;"><?=h($Blogs->description)?></p>
                <hr>


                <!-- Posted Comments -->
                

            </div>


            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog</h4>
                    <div class="row">
                        
                            <ul class="list-unstyled">
								<?php foreach ($blogs as $key => $value) {?>
                                <li> 
                                	<?=$this->Html->link($value->name,['action'=>'view',$value->id])?>
                                </li>
                                <?php }?>
                                
                            </ul>       
                    </div>
                </div>
                 <div class="well">
                    <h4>Quick Link</h4>
                    <div class="row">
                        
                            <ul class="list-unstyled">
                                <li> 
                                    <?=$this->Html->link('Home',['controller'=>'Homes','action'=>'index'],['class'=>'btn btn-default'])?>
                                </li>
                                <li> 
                                    <?=$this->Html->link('About Us',['controller'=>'homes','action'=>'about'],['class'=>'btn btn-default'])?>
                                </li>
                                <li> 
                                    <?=$this->Html->link('Blogs',['controller'=>'blogs','action'=>'index'],['class'=>'btn btn-default'])?>
                                </li>
                                <li> 
                                    <?=$this->Html->link('Privacy Policy',['controller'=>'homes','action'=>'licenses'],['class'=>'btn btn-default'])?>
                                </li>

                            </ul>       
                    </div>
                </div>

            
            </div>

        </div>	
        <h3>Comments</h3> 
                <div class="well" style="overflow: auto; max-height: 300px;">
              <?php foreach ($Blogs->comments as $key => $value):?>
            
                <div class="media">
                    <div class="pull-left" >
                      <?=$this->Html->image('rooms/'.$value->image,['height'=>64,'width'=>64])?>  
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?=h($value->your_name)?>
                            <small> &nbsp;&nbsp;&nbsp;<?=h($value->created)?></small>
                        </h4>
                        <?=h($value->description)?>
                    </div>
                </div><hr>
               
            <?php endforeach;?>
            </div>
           <div class="well">
                    <?=$this->Form->create('post',array('url'=>['controller'=>'comments','action'=>'add',$Blogs->id],'enctype'=>"multipart/form-data")); ?>
                    <h4>Comment:</h4>
                    <div class="form-group">
                                <input type="text" name="your_name" placeholder="Your Name" class="form-control" required="">
                            <span class="material-input"></span></div>
                      <div class="form-group">
                                <input type="text" value="" name="description" placeholder="Comment....." class="form-control" required="">
                            <span class="material-input"></span></div>
                       <div class="form-group"><?=$this->Html->image('default-avatar.png',['class'=>'','height'=>64,'widht'=>64,'alt'=>'Image Select'])?> 
                                <input type="file"  name="image"  class="form-control">
                            <span class="material-input"></span></div>
                         <button type="submit" class="btn btn-primary">Submit</button>
                     <?php echo $this->Form->end();?>
                </div>
                <hr>
	
		</div>
</div> 

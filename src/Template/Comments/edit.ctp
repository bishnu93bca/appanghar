<?php echo $this->Html->script(["//cdn.tinymce.com/4/tinymce.min.js"]);?>
<div class="bookmarks form large-10 medium-9 columns content">
    <?= $this->Form->create($rooms,['enctype'=>"multipart/form-data"]) ?>
    <fieldset>
        <legend><?= __('Add Room') ?></legend>
        <?php
          $gender=array('boy'=>'Boy','girl'=>'Girl','b/g'=>'Boys/Girls');
            echo $this->Form->input('name');
            echo $this->Form->input('address',['type' => 'textarea']);

            echo $this->Form->input('city_id',['options' => $rooms->cities]);
            echo $this->Form->input('location_id',['options' => $location]);
            echo $this->Form->input('category_id',['options' => $categories]);
            echo $this->Form->input('select',['options' => $gender]);
            echo $this->Form->input('room');
            echo $this->Form->input('rent');
            echo $this->Form->input('ac',['type'=>'checkbox','id'=>'ac','format' =>['between', 'label']]);
            echo $this->Form->input('wifi',['type'=>'checkbox','id'=>'wifi','format' =>['between', 'label']]);
            echo $this->Form->input('housekeeping',['type'=>'checkbox','id'=>'housekeeping','format' =>['between', 'label']]);
            echo $this->Form->input('support',['type'=>'checkbox','id'=>'support','format' =>['between', 'label']]);
            echo $this->Form->input('car_parking',['type'=>'checkbox','id'=>'car_parking','format' =>['between', 'label']]);
            echo $this->Form->input('geyser',['type'=>'checkbox','id'=>' geyser','format' =>['between', 'label']]);
            echo $this->Form->input('fridge',['type'=>'checkbox','id'=>' fridge','format' =>['between', 'label']]);
            echo $this->Form->input('power_backup',['type'=>'checkbox','id'=>'power_backup','format' =>['between', 'label']]);
            echo $this->Form->input('food',['type'=>'checkbox','id'=>'food','format' =>['between', 'label']]); 
            echo $this->Form->input('tv',['type'=>'checkbox','id'=>'tv','format' =>['between', 'label']]); 
            echo $this->Form->input('card_accepted',['type'=>'checkbox','id'=>'card_accepted','format' =>['between', 'label']]); 
            echo $this->Form->input('laundry',['type'=>'checkbox','id'=>'laundry','format' =>['between', 'label']]); 
            echo $this->Form->input('elevator',['type'=>'checkbox','id'=>'elevator','format' =>['between', 'label']]); 
            echo $this->Form->input('cctv',['type'=>'checkbox','id'=>'cctv','format' =>['between', 'label']]); 
            echo $this->Form->input('dryer',['type'=>'checkbox','id'=>'dryer','format' =>['between', 'label']]);
            echo $this->Form->input('in_room_safe',['type'=>'checkbox','id'=>' in_room_safe','format' =>['between', 'label']]); 
            echo $this->Form->input('description',['type' => 'textarea']);
 
            echo $this->Form->input('lat');
            echo $this->Form->input('lng');
            
            echo '<label for="image">Images</label>';
            echo $this->Form->input('image[]',['type' => 'file','multiple' => true,'label'=>false,'id'=>'image']);

        
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
     
         tinymce.init({ selector:'textarea',
                          theme: 'modern',
                          plugins: [
                            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                            'insertdatetime media nonbreaking save table contextmenu directionality',
                            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
                          ],
                          toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                          toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
                          image_advtab: true,
                          templates: [
                            { title: 'Test template 1', content: 'Test 1' },
                            { title: 'Test template 2', content: 'Test 2' }
                          ],
                          content_css: [
                            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                            '//www.tinymce.com/css/codepen.min.css'
                          ]
                     });

          $("#city-id").change(function(){
            var id = $('#city-id').val();
              $.ajax({url: "http://localhost/appanghar/location/ajax/"+id,
               success: function(data){

                html = "";
                $obj=JSON.parse(data);
                for (var i =0; i<$obj.length;i++) {
                 console.log($obj[i].id);
                  html += "<option value=" + $obj[i].id  + ">" +$obj[i].name + "</option>"
                }
                 document.getElementById("location-id").innerHTML = html;
                
          }});
  });
    });
</script>

<div class="bookmarks form large-10 medium-9 columns content">
    <?= $this->Form->create($rooms,['enctype'=>"multipart/form-data"]) ?>
    <fieldset>
        <legend><?= __('Add Room') ?></legend>
        <?php
          $gender=array('boy'=>'Boy','girl'=>'Girl','b/g'=>'Boys/Girls');
            echo $this->Form->input('name',['placeholder'=>'Name.','required'=>true]);
            echo $this->Form->input('location',['placeholder'=>'Address','id'=>'autocomplete','onFocus'=>"geolocate()",'required'=>true]);

            echo $this->Form->input('city_id',['options' => $rooms->cities]);
            echo $this->Form->input('location_id',['options' => $location]);
            echo $this->Form->input('category_id',['options' => $categories]);
            echo $this->Form->input('select',['options' => $gender]);
            echo $this->Form->input('room',['placeholder'=>'Room type.','required'=>true]);

            // echo "<div id='shar'>";
            // echo $this->Form->input('single_sharing');
            // echo $this->Form->input('double_haring');
            // echo $this->Form->input('triple_sharing');
            // echo "</div>";
            echo $this->Form->input('rent',['placeholder'=>'Rent.','required'=>true]);
            echo $this->Form->input('ac',['type'=>'checkbox','id'=>'ac','format' =>['between', 'label']]);
            echo $this->Form->input('wifi',['type'=>'checkbox','id'=>'wifi','format' =>['between', 'label']]);
            echo $this->Form->input('housekeeping',['type'=>'checkbox','id'=>'housekeeping','format' =>['between', 'label']]);
            echo $this->Form->input('support',['type'=>'checkbox','id'=>'support','format' =>['between', 'label']]);
            echo $this->Form->input('car_parking',['type'=>'checkbox','id'=>'car_parking','format' =>['between', 'label']]);
            echo $this->Form->input(' geyser',['type'=>'checkbox','id'=>' geyser','format' =>['between', 'label']]);
            echo $this->Form->input(' fridge',['type'=>'checkbox','id'=>' fridge','format' =>['between', 'label']]);
            echo $this->Form->input('power_backup',['type'=>'checkbox','id'=>'power_backup','format' =>['between', 'label']]);
            echo $this->Form->input('food',['type'=>'checkbox','id'=>'food','format' =>['between', 'label']]); 
            echo $this->Form->input('tv',['type'=>'checkbox','id'=>'tv','format' =>['between', 'label']]); 
            echo $this->Form->input('card _accepted',['type'=>'checkbox','id'=>'card _accepted','format' =>['between', 'label']]); 
            echo $this->Form->input('laundry',['type'=>'checkbox','id'=>'laundry','format' =>['between', 'label']]); 
            echo $this->Form->input('elevator',['type'=>'checkbox','id'=>'elevator','format' =>['between', 'label']]); 
            echo $this->Form->input('cctv',['type'=>'checkbox','id'=>'cctv','format' =>['between', 'label']]); 
            echo $this->Form->input('dryer',['type'=>'checkbox','id'=>'dryer','format' =>['between', 'label']]);
            echo $this->Form->input(' in_room_safe',['type'=>'checkbox','id'=>' in_room_safe','format' =>['between', 'label']]); 
            echo $this->Form->input('description',['type' => 'textarea','placeholder'=>'Description.','required'=>true]);

            echo '<label for="image">Images</label>';
            echo $this->Form->input('image[]',['type' => 'file','multiple' => true,'label'=>false,'id'=>'image']);

        
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      $('#category-id').change( function(){
        var cat=$('#category-id').val();
        if(cat==1){
          // $('#room').hide();
           $('#shar').show();
          
        }else{
          $('#room').show();
          $('#shar').hide();
          
        }
      });
        

          $("#city-id").change(function(){
            var id = $('#city-id').val();
              $.ajax({url: "http://www.appanghar.com/location/ajax/"+id,
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
<script>
      
      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);

      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }


        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

    

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFiNOhRrRLPNbKWQOId8rP8RJZy290nRg&libraries=places&callback=initAutocomplete"
        async defer></script>
<div class="bookmarks form large-10 medium-9 columns content">
    <?= $this->Form->create($Blogs,['enctype'=>"multipart/form-data"]) ?>
    <fieldset>
        <legend><?= __('Add Blog') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description',['type' =>'textarea']);
            echo '<label for="image">Images</label>';
            echo $this->Form->input('images',['type' => 'file','label'=>false,'id'=>'image']);

        
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

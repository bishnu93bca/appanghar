<div class="bookmarks form large-10 medium-9 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Add Location') ?></legend>
        <?php
            echo $this->Form->input('city_id', ['options' => $cities]);
            echo $this->Form->input('name',['placeholder'=>'Name.','required'=>true]);
            echo $this->Form->input('remarks');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


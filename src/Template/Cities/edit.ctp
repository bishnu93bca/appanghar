<div class="users form large-10 medium-9 columns content">
    <?= $this->Form->create($cities) ?>
    <fieldset>
        <legend><?= __('New City') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('remarks');
           
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

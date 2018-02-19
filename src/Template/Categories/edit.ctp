<div class="users form large-10 medium-9 columns content">
    <?= $this->Form->create($categories) ?>
    <fieldset>
        <legend><?= __('New Categories') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('remarks');
           
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>

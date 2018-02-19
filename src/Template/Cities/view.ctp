<div class="users view large-10 medium-9 columns content">
    <h3><?= h($cities->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Filter') ?></th>
            <td><?= h($cities->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarks') ?></th>
            <td><?= h($cities->remarks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cities->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cities->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cities->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Filter Values') ?></h4>
        <?php if (!empty($cities->location)): ?> 
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Filter') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Remarks') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cities->location as $location): ?>
            <tr>
                <td><?= h($location->id) ?></td>
                
                <td><?=$this->Html->link($location->name, ['controller'=>'location','action' => 'view', $location->id])?></td>
                <td><?= h($location->remarks) ?></td>
                <td><?= h($location->created) ?></td>
                <td><?= h($location->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'location', 'action' => 'view', $location->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'location', 'action' => 'edit', $location->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'location', 'action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<div class="users index large-10 medium-8 columns content">
    <h3><?= $this->Html->link(__('Add Room'),['action'=>'add']) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= $this->Number->format($room->id) ?></td>
                <td><?=$this->Html->link($room->name, ['action' => '#', $room->id])?></td>
                <td><?= h($room->address) ?></td>
                <td><?= h($room->room) ?></td>
                <td><?= h($room->rent) ?></td>
                <?php if(empty($room->is_active)){?>
                <td><?=$this->Html->link("Unactive", ['action' => 'active', $room->id,1])?></td>
                <?php }else{?>
                <td><?=$this->Html->link("Active", ['action' => 'active', $room->id,0])?></td>
                <?php }?>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => '#', $room->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody> 
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

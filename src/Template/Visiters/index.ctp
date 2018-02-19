<div class="users index large-10 medium-8 columns content">
    <!-- <h3><?= $this->Html->link(__('Add room'),['action'=>'add']) ?></h3> -->
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Detail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                
                <!-- <th scope="col" class="actions"><?= __('Actions') ?></th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visiters as $visiters): ?>
            <tr>
                <td><?= $this->Number->format($visiters->id) ?></td>
                <td><?= h($visiters->room_id) ?></td>
                <td><?=h($visiters->name)?></td>
                <td><?= h($visiters->email) ?></td>
                <td><?= h($visiters->mobile) ?></td>
                <td><?= h($visiters->detail) ?></td>
                <!-- <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $room->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?>
                </td> -->
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

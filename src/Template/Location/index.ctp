<div class="users index large-10 medium-8 columns content">
    <h3><?= $this->Html->link(__('Add Location'),['action'=>'add']) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($location as $loc): ?>
            <tr>
                <td><?= $this->Number->format($loc->id) ?></td>
                <td><?=h($loc->name)?></td>
                <td><?= h($loc->remarks) ?></td>
                <td><?= h($loc->created) ?></td>
                <td><?= h($loc->modified) ?></td>
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loc->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loc->id)]) ?>
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

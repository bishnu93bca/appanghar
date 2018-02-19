<div class="users index large-10 medium-8 columns content">
    <h3><?= $this->Html->link(__('Add Categories'),['action'=>'add']) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $categories): ?>
            <tr>
                <td><?= $this->Number->format($categories->id) ?></td>
                <td><?=h($categories->name)?></td>
                <td><?= h($categories->remarks) ?></td>
                    <td class="actions">
                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $categories->id]) ?>-->
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categories->id)]) ?>
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

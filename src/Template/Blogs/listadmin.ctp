<div class="users index large-10 medium-8 columns content">
    <h3><?= $this->Html->link(__('Add Blog'),['action'=>'add']) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('images') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Blogs as $blog): ?>
            <tr>
                <td><?= $this->Number->format($blog->id) ?></td>
                <td><?=$this->Html->link($blog->name, ['action' =>'listview',$blog->id])?></td>
                <td><?php if(strlen(strip_tags($blog->description))> 200){
                          echo substr(strip_tags($blog->description),0,200)."...";

                        } else{    
                          echo strip_tags($blog->description)."...";
                        }?></td>
                <td><?=$this->Html->image('rooms/'.$blog->images,['height'=>100,'width'=>100])?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'listview', $blog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?>
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

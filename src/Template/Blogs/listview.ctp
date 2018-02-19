<div class="users view large-10 medium-9 columns content">
    <h3><?= h($Blogs->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Blog') ?></th>
            <td><?= h($Blogs->name) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Comments') ?></h4>
        <?php if (!empty($Blogs->comments)): ?> 
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Your Name') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($Blogs->comments as $comment): ?>
            <tr>
                <td><?= h($comment->id) ?></td>
                
                <td><?=$this->Html->link($comment->your_name, ['controller'=>'comments','action' => 'view', $comment->id])?></td>

                <td><?= h($comment->description) ?></td>
                 <td><?=$this->Html->image('rooms/'.$comment->image, ['height'=>100,'width'=>100])?></td>
                <td><?= h($comment->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $Blogs->id]) ?>
                   <!--  <?= $this->Html->link(__('Edit'), ['controller' => 'comments', 'action' => 'edit', $comment->id]) ?> -->
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'comments', 'action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<div class="users index large-10 medium-8 columns content">
    <h3>Comments</h3>
    <h4><?=h($Comments->your_name);?></h4>
    <p><?=h($Comments->description);?></p>
    <?=$this->Html->image('rooms/'.$Comments->image, ['height'=>100,'width'=>100])?>
</div>

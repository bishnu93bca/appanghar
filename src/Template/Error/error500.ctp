<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?php if ($error instanceof Error) : ?>
        <strong>Error in: </strong>
        <?= sprintf('%s, line %s', str_replace(ROOT, 'ROOT', $error->getFile()), $error->getLine()) ?>
<?php endif; ?>
<?php
    echo $this->element('auto_table_warning');

    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<div class="text-center medium_break" style="">
   <img src="<?php echo BASE_URL;?>img/error.jpg" height="600" width="1300">
   <!--  <div class="head_maintext text-capitalize"><?php echo "Page not found"; ?></div>
    <div class="head_subtext"><?php echo "You seem to have landed on a wrong page"; ?></div> -->
    <div class="medium_break"></div>
    <?= $this->Html->link(__('Back'), 'javascript:history.back()',['class'=>'btn btn-danger']) ?>

</div>



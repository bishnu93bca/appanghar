<?php
$cakeDescription = 'Appan Ghar';
?>
<!DOCTYPE html>
<html>
<head>
<?php $session= $this->request->session();
    $user_session=$session->read('user');
 if(in_array($user_session->type_id, [1])){?>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="<?php echo BASE_URL; ?>img/favicon.png" type="image/x-icon" />
        <title><?= $this->fetch($title) ?></title>


    <?php echo $this->Html->script(["jquery.min", "bootstrap.min", "bootstrap-waitingfor.min", "https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"]);?>
    <?= $this->Html->css(['base.css','http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css']) ?>
    <?= $this->Html->css('cake.css') ?>

   
    

</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-3 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                
                <li><?= $this->Html->link(__($user_session->name), [ 'action' => '#']) ?></li>
                <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <nav class="large-2 medium-3 columns" id="actions-sidebar">
            <ul class="side-nav">
                <li class="heading"><?= __('Actions') ?></li>
                    <li><?= $this->Html->link(__('City'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Location'), ['controller' => 'Location', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Category'),['controller' =>'Categories', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Rooms'), ['controller' => 'Rooms', 'action' => 'listadmin']) ?></li>
                    <li><?= $this->Html->link(__('Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
                     <li><?= $this->Html->link(__('Blogs'), ['controller' => 'Blogs', 'action' => 'listadmin']) ?></li>
                    <li><?= $this->Html->link(__('Schedule a Visit'), ['controller' => 'Visiters', 'action' => 'index']) ?></li>

            </ul>
        </nav>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
   <?php }else{
    echo "<br><br><br><center>Page No Found<br>".$this->Html->link(__('Go to Home'), ['controller' => 'Users', 'action' => 'login'])."</center>";
    } ?>
</body>
</html> 
<?=$this->Html->script(['js/jquery-1.12.4','js/jquery.dataTables.min','js/dataTables.buttons.min','js/buttons.flash.min','js/jszip.min','js/pdfmake.min','
js/vfs_fonts','js/buttons.html5.min','js/buttons.print.min'])?>
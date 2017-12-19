<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<style>
    
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
    <?php
    if ($this->request->session()->read('Auth.User')) {
        if ($this->request->session()->read('Auth.User.role_id') == 1) {
            ?>
                
                <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
                <li><?= $this->Html->link(__('List Manager'), ['controller' => 'Users', 'action' => 'searchmanager']) ?> </li>
                <li class="heading"><?= __('Role') ?></li>
                <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
                <li class="heading"><?= __('Department') ?></li>
                <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
                <li class="heading"><?= __('Order') ?></li>
                <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
                <li class="heading"><?= __('Menu') ?></li>
                <li><?= $this->Html->link(__('List Menu'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New Menus'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
                <li class="heading"><?= __('Stock') ?></li>
                <li><?= $this->Html->link(__('List Stocks'), ['controller' => 'Stocks', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New Stocks'), ['controller' => 'Stocks', 'action' => 'add']) ?> </li>
                <li class="heading"><?= __('Customer') ?></li>
                <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Users', 'action' => 'display']) ?> </li>
                <li class="heading"><?= __('Status') ?></li>
                <li><?= $this->Html->link(__('List Status'), ['controller' => 'Statuss', 'action' => 'index']) ?> </li>
                
                <?php

            } elseif ($this->request->session()->read('Auth.User.role_id') == 2) {
                ?>

                <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    <?php

} else {
    ?>
                <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
                <li><?= $this->Html->link(__('My Order'), ['controller' => 'Users','action' => 'view', $auth['User']['id']]) ?> </li>
                
        <?php	
    }
}
?>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    
    <table cellpadding="0" cellspacing="0">
    <thead>
    <?php if ($this->request->session()->read('Auth.User')){
                if($this->request->session()->read('Auth.User.role_id') == 1||$this->request->session()->read('Auth.User.role_id')==2)
                
                {
            ?>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('address') ?></th>
            <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
            <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('department_id') ?></th>  
            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
            <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
         <?php } }?>
                
        </tr>
         
    </thead>
    <tbody>
    <?php if ($this->request->session()->read('Auth.User')){
                if($this->request->session()->read('Auth.User.role_id') == 1)
                
                {
            ?>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->name) ?></td>
            <td><?= h($user->address) ?></td>
            <td><?= h($user->telephone) ?></td>
        
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
            <td><?= $user->has('department') ? $this->Html->link($user->department->name, ['controller' => 'Departments', 'action' => 'view', $user->department->id]) : '' ?></td>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->modified) ?></td>
            <td class="actions">        
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>                    
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>   
            </td>

        </tr>
        <?php endforeach; ?>
        <?php
                }elseif($this->request->session()->read('Auth.User.role_id') == 3)
                {
                ?>
                    <div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           
<p class=" text-info"><?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo "Today date : " . date("d-m-Y");
?></p>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
       
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">My Profile</h3>
            </div>
            <div class="panel-body">
              <div class="row">
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Address:</td>
                        <td><?=$auth['User']['address'] ?></td>
                      </tr>
                      <tr>
                        <td>No Phone:</td>
                        <td><?=$auth['User']['telephone'] ?></td>
                      </tr>
                      
                      <tr>
                        <td>Email</td>
                        <td><?=$auth['User']['email'] ?></td> 
                      </tr>

                      <tr>
                        <td>Joined Since :</td>
                        <td><?=$auth['User']['created'] ?></td> 
                      </tr>

                      
                     
                    </tbody>
                  </table>
                  
                  <?= $this->Html->link(__('Edit My Profile'), ['action' => 'edit', $auth['User']['id']]) ?>  
                  
                </div>
               
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
      
    </div>
                
                <?php }
                elseif($this->request->session()->read('Auth.User.role_id') == 2)
                
                {
            ?>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->name) ?></td>
            <td><?= h($user->address) ?></td>
            <td><?= h($user->telephone) ?></td>
        
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
            <td><?= $user->has('department') ? $this->Html->link($user->department->name, ['controller' => 'Departments', 'action' => 'view', $user->department->id]) : '' ?></td>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->modified) ?></td>
            <td class="actions">        
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                  
            </td>

        </tr>
        <?php endforeach; ?>
        <?php
                }
             }?>
             
    </tbody>
    
</table>

    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

    

    


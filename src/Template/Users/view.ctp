<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
//print_r( $this->Session->read('Auth.User'));
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
    <?php
    if ($this->request->session()->read('Auth.User')) {
        if ($this->request->session()->read('Auth.User.role_id') == 1) {
            ?>
                <li class="heading"><?= __('User') ?></li>
                <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
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
                
        <?php	
    }
}
?>
    </ul>
</nav>

<div class="users view large-9 medium-8 columns content">
<h2><?= __('My Profile Page') ?></h2>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
     
        <div class="panel panel-info">
       
            <div class="panel-heading">
              <h3 class="panel-title"><div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="..\..\img\dp.png" width="25%" length="25%" class="img-circle img-responsive"> </div><?= h($user->name) ?></h3>
            </div>
            <div class="panel-body">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Address:</td>
                        <td><?= h($user->address) ?></td>
                      </tr>
                      <tr>
                        <td>Telephone:</td>
                        <td><?= h($user->telephone) ?></td>
                      </tr>
                      <tr>
                        <td>Role:</td>
                        <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Department:</td>
                        <td><?= $user->has('department') ? $this->Html->link($user->department->name, ['controller' => 'Departments', 'action' => 'view', $user->department->id]) : '' ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
    
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($user->orders)) : ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Menu Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->orders as $orders) : ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->menu_id) ?></td>
                <td><?= h($orders->quantity) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->time) ?></td>

                <?php
                if ($this->request->session()->read('Auth.User')) {
                    if ($this->request->session()->read('Auth.User.role_id') == 1) {
                        ?> 
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
                <?php

            }
        }
        ?>
            </tr>
            <?php endforeach; ?>
        </table>

        
        <?php endif; ?>
    </div>
</div>



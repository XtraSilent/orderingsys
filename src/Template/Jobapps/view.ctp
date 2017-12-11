<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jobapp $jobapp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
<li class="heading"><?= __('Actions') ?></li>
<?php
        if ($this->request->session()->read('Auth.User')){
            if($this->request->session()->read('Auth.User.role_id') == 1)
            
            {
                ?>

            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Menu'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Menus'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Stocks'), ['controller' => 'Stocks', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Stocks'), ['controller' => 'Stocks', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Users', 'action' => 'display']) ?> </li>
<?php
            }
        elseif ($this->request->session()->read('Auth.User.role_id') == 2) {
            ?>

            <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
<?php
            }else{   
            ?>
            <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
            
    <?php	}
        }
    ?>
</ul>
</nav>
<div class="jobapps view large-9 medium-8 columns content">
    <h3><?= h($jobapp->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($jobapp->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($jobapp->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($jobapp->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($jobapp->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= $jobapp->has('department') ? $this->Html->link($jobapp->department->name, ['controller' => 'Departments', 'action' => 'view', $jobapp->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($jobapp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submissiondate') ?></th>
            <td><?= h($jobapp->submissiondate) ?></td>
        </tr>
    </table>
</div>

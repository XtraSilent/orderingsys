<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jobapp[]|\Cake\Collection\CollectionInterface $jobapps
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
<div class="jobapps index large-9 medium-8 columns content">
    <h3><?= __('Jobapps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submissiondate') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobapps as $jobapp): ?>
            <tr>
                <td><?= $this->Number->format($jobapp->id) ?></td>
                <td><?= h($jobapp->name) ?></td>
                <td><?= h($jobapp->email) ?></td>
                <td><?= h($jobapp->telephone) ?></td>
                <td><?= h($jobapp->address) ?></td>
                <td><?= $jobapp->has('department') ? $this->Html->link($jobapp->department->name, ['controller' => 'Departments', 'action' => 'view', $jobapp->department->id]) : '' ?></td>
                <td><?= h($jobapp->submissiondate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $jobapp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobapp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobapp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobapp->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
</div>

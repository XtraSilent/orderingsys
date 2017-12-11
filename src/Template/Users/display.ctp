<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <fieldset>
        <legend><?= __('Admin') ?></legend>
       <p>Below are the list of Customers</p>
	   
	   <?php foreach ($users as $user): ?>
       <td><?= h($user->name) ?></td>
       <td><?= h($user->telephone) ?></td>
      
       
       <?php endforeach; ?>
    </fieldset>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jobapp $jobapp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $jobapp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $jobapp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Jobapps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobapps form large-9 medium-8 columns content">
    <?= $this->Form->create($jobapp) ?>
    <fieldset>
        <legend><?= __('Edit Jobapp') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('telephone');
            echo $this->Form->control('address');
            echo $this->Form->control('department_id', ['options' => $departments, 'empty' => true]);
            echo $this->Form->control('submissiondate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

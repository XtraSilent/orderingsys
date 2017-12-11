<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave $leave
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Leaves'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="leaves form large-9 medium-8 columns content">
    <?= $this->Form->create($leave) ?>
    <fieldset>
        <legend><?= __('Add Leave') ?></legend>
        <?php
            echo $this->Form->control('reason');
            echo $this->Form->control('status');
            echo $this->Form->control('start');
            echo $this->Form->control('end');
            echo $this->Form->control('staff_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

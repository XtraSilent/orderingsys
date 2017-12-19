<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
 //print_r($user); //debug;var_dump
 //die();
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Search Admin'), ['action' => 'searchadmin']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('Announcement'), ['action' => 'announce']) ?></li>
        <li><?= $this->Html->link(__('Admin'), ['action' => 'admin']) ?></li>
		<li><?= $this->Html->link(__('Users'), ['action' => 'listuser']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user)?>
   <fieldset>
		<legend><?=__('Search Admin')?></legend>
		<?php
			echo $this->form->control('search' , ['label'=> 'Please enter name/username to search']);
			?>
			
		</fieldset>
		<?= $this->form->button(__('Submit'))?>
		<?= $this->form->end()?>

		<?php
			if($user){
		?>	
			Here are result of your search : <br><br>
			<?php
				foreach($user as $users){
				echo $users['name'] . " "
				. $users['email'] . " "
				. $this->Html->link(__('View'),
								['action' => 'view', $users['id']])
				."<br>" ;
			}
		}
		?>
	</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Travel $travel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Travels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passengers'), ['controller' => 'Passengers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passenger'), ['controller' => 'Passengers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="travels form large-9 medium-8 columns content">
    <?= $this->Form->create($travel) ?>
    <fieldset>
        <legend><?= __('Add Travel') ?></legend>
        <?php
            echo $this->Form->control('car_id', ['options' => $cars]);
            echo $this->Form->control('honnan');
            echo $this->Form->control('hova');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

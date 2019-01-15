<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Passenger $passenger
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Passenger'), ['action' => 'edit', $passenger->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Passenger'), ['action' => 'delete', $passenger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passenger->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Passengers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passenger'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="passengers view large-9 medium-8 columns content">
    <h3><?= h($passenger->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Travel') ?></th>
            <td><?= $passenger->has('travel') ? $this->Html->link($passenger->travel->id, ['controller' => 'Travels', 'action' => 'view', $passenger->travel->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $passenger->has('user') ? $this->Html->link($passenger->user->name, ['controller' => 'Users', 'action' => 'view', $passenger->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($passenger->id) ?></td>
        </tr>
    </table>
</div>

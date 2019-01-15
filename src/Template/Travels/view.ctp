<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Travel $travel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Travel'), ['action' => 'edit', $travel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Travel'), ['action' => 'delete', $travel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Travels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Travel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passengers'), ['controller' => 'Passengers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passenger'), ['controller' => 'Passengers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="travels view large-9 medium-8 columns content">
    <h3><?= h($travel->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Car') ?></th>
            <td><?= $travel->has('car') ? $this->Html->link($travel->car->cartype, ['controller' => 'Cars', 'action' => 'view', $travel->car->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Honnan') ?></th>
            <td><?= h($travel->honnan) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hova') ?></th>
            <td><?= h($travel->hova) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($travel->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Passengers') ?></h4>
        <?php if (!empty($travel->passengers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Travel Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($travel->passengers as $passengers): ?>
            <tr>
                <td><?= h($passengers->id) ?></td>
                <td><?= h($passengers->travel_id) ?></td>
                <td><?= h($passengers->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Passengers', 'action' => 'view', $passengers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Passengers', 'action' => 'edit', $passengers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Passengers', 'action' => 'delete', $passengers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passengers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

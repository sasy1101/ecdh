<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car[]|\Cake\Collection\CollectionInterface $cars
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Car'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cars index large-9 medium-8 columns content">
    <h3><?= __('Cars') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('regist_num') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cartype') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pass_num') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car): ?>
            <tr>
                <td><?= $this->Number->format($car->id) ?></td>
                <td><?= h($car->regist_num) ?></td>
                <td><?= h($car->cartype) ?></td>
                <td><?= h($car->color) ?></td>
                <td><?= $car->has('user') ? $this->Html->link($car->user->name, ['controller' => 'Users', 'action' => 'view', $car->user->id]) : '' ?></td>
                <td><?= $this->Number->format($car->pass_num) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $car->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $car->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id)]) ?>
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

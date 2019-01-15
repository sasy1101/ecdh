<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Passenger[]|\Cake\Collection\CollectionInterface $passengers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Passenger'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passengers index large-9 medium-8 columns content">
    <h3><?= __('Passengers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('travel_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($passengers as $passenger): ?>
            <tr>
                <td><?= $this->Number->format($passenger->id) ?></td>
                <td><?= $passenger->has('travel') ? $this->Html->link($passenger->travel->honnan . ' - ' . $passenger->travel->hova, ['controller' => 'Travels', 'action' => 'view', $passenger->travel->id]) : '' ?></td>
                <td><?= $passenger->has('user') ? $this->Html->link($passenger->user->name, ['controller' => 'Users', 'action' => 'view', $passenger->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $passenger->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $passenger->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $passenger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passenger->id)]) ?>
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

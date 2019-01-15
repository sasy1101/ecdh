<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Travel[]|\Cake\Collection\CollectionInterface $travels
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Travel'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passengers'), ['controller' => 'Passengers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passenger'), ['controller' => 'Passengers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="travels index large-9 medium-8 columns content">
    <h3><?= __('Travels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('car_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('honnan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hova') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hanyutas') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($travels as $travel): ?>
            <tr>
                <td><?= $this->Number->format($travel->id) ?></td>
                <td><?= $travel->has('car') ? $this->Html->link($travel->car->cartype, ['controller' => 'Cars', 'action' => 'view', $travel->car->id]) : '' ?></td>
                <td><?= h($travel->honnan) ?></td>
                <td><?= h($travel->hova) ?></td>
                <td><?php foreach($data as $egydata) if($egydata->id == $travel->id) echo ($egydata->hanyutas) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Sign up'), ['controller' => 'Passengers', 'action' => 'signup', $travel->id]) ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $travel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $travel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $travel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travel->id)]) ?>
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

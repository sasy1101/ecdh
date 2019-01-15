<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rule') ?></th>
            <td><?= h($user->rule) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cars') ?></h4>
        <?php if (!empty($user->cars)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Regist Num') ?></th>
                <th scope="col"><?= __('Cartype') ?></th>
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Pass Num') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->cars as $cars): ?>
            <tr>
                <td><?= h($cars->id) ?></td>
                <td><?= h($cars->regist_num) ?></td>
                <td><?= h($cars->cartype) ?></td>
                <td><?= h($cars->color) ?></td>
                <td><?= h($cars->user_id) ?></td>
                <td><?= h($cars->pass_num) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cars', 'action' => 'view', $cars->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cars', 'action' => 'edit', $cars->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cars', 'action' => 'delete', $cars->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cars->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Travels') ?></h4>
        <?php if (!empty($user->travels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Car Id') ?></th>
                <th scope="col"><?= __('Honnan') ?></th>
                <th scope="col"><?= __('Hova') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->travels as $travels): ?>
            <tr>
                <td><?= h($travels->id) ?></td>
                <td><?= h($travels->car_id) ?></td>
                <td><?= h($travels->honnan) ?></td>
                <td><?= h($travels->hova) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Travels', 'action' => 'view', $travels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Travels', 'action' => 'edit', $travels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Travels', 'action' => 'delete', $travels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

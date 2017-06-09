<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room[]|\Cake\Collection\CollectionInterface $rooms
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rooms index large-9 medium-8 columns content">
    <div class="row">
        <div class="columns medium-8">
            <h3><?= __('Rooms') ?></h3>
        </div>
        <div class="columns medium-4">
            <?= $this->Form->create(null, ['type' => 'post']) ?>
            <div class="row">
                <div class="large-5 columns">
                    <label for="status_id">Status</label>
                    <?= $this->Form->select('status_id', $_status, ['empty' => 'all']) ?>
                </div>
                <div class="large-5 columns">
                    <label for="price_per_day">Price per day</label>
                    <?= $this->Form->number('price_per_day') ?>
                </div>
                <div class="large-2 columns">
                    <?= $this->Form->button('submit') ?>
                </div>
            </div>
            <?= $this->Form->end(); ?>
        </div>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('room_no') ?></th>
            <th scope="col"><?= $this->Paginator->sort('price_per_day') ?></th>
            <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= $this->Number->format($room->id) ?></td>
                <td><?= $this->Number->format($room->room_no) ?></td>
                <td><?= "RM " . $this->Number->format($room->price_per_day) ?></td>
                <td><?= $room->has('status') ? $this->Html->link($room->status->name, ['controller' => 'Statuses', 'action' => 'view', $room->status->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $room->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?>
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

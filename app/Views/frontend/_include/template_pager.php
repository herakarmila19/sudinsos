<?php $pager->setSurroundCount(2) ?>

<div class="pagination-box text-center">
    <ul class="styled-pagination">

        <?php if ($pager->hasPrevious()) : ?>
            <li class="prev">
                <a href="<?= $pager->getFirst() ?>" aria-label="Awal">
                    <span aria-hidden="true">Awal</span>
                </a>
            </li>
            <!-- <li class="prev">
                <a href="< ?= $pager->getPrevious() ?>" aria-label="< ?= lang('Pager.previous') ?>">
                    <span aria-hidden="true">< ?= lang('Pager.previous') ?></span>
                </a>
            </li> -->
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" <?= $link['active'] ? 'class="active"' : '' ?>>
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <!-- <li class="next">
                <a href="< ?= $pager->getNext() ?>" aria-label="< ?= lang('Pager.next') ?>">
                    <span aria-hidden="true">< ?= lang('Pager.next') ?></span>
                </a>
            </li> -->
            <li class="next">
                <a href="<?= $pager->getLast() ?>" aria-label="Akhir">
                    <span aria-hidden="true">Akhir</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</div>
<?php foreach ($items as $item): ?>
    <div class="level">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <?= $item->author->name ?>
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <?= $item->text ?>
                    <br><br>
                    <strong><?= (new DateTime())->setTimestamp($item->created_at)->format('d.m.Y,  H:m:s') ?></strong>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
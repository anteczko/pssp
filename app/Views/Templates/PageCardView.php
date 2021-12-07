<?php if(!empty($card)): ?>
    <div class="card">
        <div class="card-header">
            <?= $card['name'] ?>
        </div>
        <div class="card-body">
            <img src=<?=base_url("uploads").'/'.$card['image']?> class="img-fluid"></img>
        </div>
    </div>
<?php endif ?>

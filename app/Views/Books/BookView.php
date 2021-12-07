<div class="container">
    <?php if(!empty($pages)): ?>
    <div class="row row-cols-1 row-cols-md-2">
        <?php foreach($pages as $page): ?>
            <div class="col">
                <?php echo view('Templates/PageCardView',['card'=>$page]); ?>
            </div>
        <?php endforeach?>
    </div>
    <?php endif?>
</div>

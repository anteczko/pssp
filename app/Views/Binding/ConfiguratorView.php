<?php echo view('BootstrapView'); ?>


<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-header">
                NAme of page
            </div>
            <div class="card-body">
                description of the card
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col col-lg-1">
                    <button type="submit" class="btn btn-primary"><span>&#8592;</span> </button>
                </div>
                <?php
                foreach($rows as $row){
                    echo '<div class="col">';
                    echo '<div class="card-body">';
                    echo '<img src='.base_url("uploads/".$row['image']).' class="img-fluid"></img>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                <div class="col col-lg-1">
                    <button type="submit" class="btn btn-primary float-end"><span>&#8594;</span> </button>
                </div>
            </div>
        </div>
    </div>
</div>

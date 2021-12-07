<?php echo view('BootstrapView'); ?>

<nav class="navbar navbar-expand-md navbar-light bg-light">
    <ul class="navbar-nav nav-fill w-100">
        <?php foreach ($categories as $category) :?>
            <li class="nav-link" aria-current="page" href="#"><?= $category['name'] ?></li>
        <?php endforeach; ?>
    </ul>
</nav>

<div class="container">
    <div class="container">
        <div class="card">
            <?php
                $session=session();
                if(!empty($session->get('email'))) {
                    $i = $session->get('selectedPageId');
                    if (!empty($i) && count($rows)) {
                        $row = $rows[$i];
                        echo '<div class="card-header">';
                        echo $row['name'];
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo $row['description'];
                        echo '</div>';
                        echo '<div id="selectedPageId" class="card-footer">';
                        echo $row['id'];
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </div>
</div>

<div class="flex-container">
    <div class="row align-items-center">
        <div class="col col-lg-1" align="center">
            <button id="buttonPageLeft" class="btn btn-primary"><span>&#8592;</span></button>
        </div>
            <?php
                $session=session();
                $i=$session->get('selectedPageId')-2;
                $limit=$i+5;
                for($i;$i<$limit;$i++){
                    echo '<div class="col">';
                        if($i>=0 && $i<count($rows)){
                            echo view('Templates/PageCardView',['card'=>$rows[$i]]);
                        }else{
                            echo view('Templates/EmptyCardView');
                        }
                    echo '</div>';
                }
            ?>
            <div class="col col-lg-1" align="center">
                <button id="buttonPageRight" class="btn btn-primary"><span>&#8592;</span></button>
            </div>
    </div>


    <div class="row align-items-center">
        <div class="col"> </div>
        <div class="col" align="center">
                 <button id="buttonAddPage" class="btn btn-primary">^</button>
                 <button id="buttonRemovePage" class="btn btn-primary">\/</button>
        </div>
        <div class="col"> </div>
    </div>

    <div class="row align-items-center">
        <div class="col col-lg-1" align="center">
            <button id="buttonBindingLeft" class="btn btn-primary"><span>&#8592;</span></button>
        </div>
        <?php
            $session=session();

            if(!empty($session->get('email'))) {
                $i = $session->get('bindingPageId') - 3;
            }else{
                $i=0;
                $binding=[];
            }
            $limit=$i+7;
            for($i;$i<$limit;$i++){
                echo '<div class="col">';
                if($i>=0 && !empty($binding) && $i<count($binding)){
                    echo view('Templates/PageCardView',['card'=>$binding[$i]]);
                    //echo view('Templates/EmptyCardView');
                }else{
                    echo view('Templates/EmptyCardView');
                }
                echo '</div>';
            }
        ?>
        <div class="col col-lg-1" align="center">
            <button id="buttonBindingRight" class="btn btn-primary"><span>&#8592;</span></button>
        </div>
    </div>
</div>

<div class="container">
    <div class="container">
        <div class="card">
            <?php
            $session=session();
            $i=$session->get('bindingPageId');
            if(!empty($i) && count($binding)) {
                $row = $binding[$i];

                echo '<div class="card-header">';
                echo $row['name'];
                echo '</div>';
                echo '<div class="card-body">';
                echo $row['description'];
                echo '</div>';
                echo '<div id="bindingPageId" class="card-footer">';
                echo $row['id'];
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<button id="buttonSaveBinding" class="btn btn-primary">Save</button>';
                echo '</div>';
            }
            ?>
            <?php if(!empty($binding)): ?>
            <form action="/books/bindingSave" method="post">
                 <div class="form-group">
                     <label class="form-label" for="bookName">Nazwa plannera</label>
                     <input class="form-control" type="text" name="bookName">

                     <label class="form-label" for="bookName">Opis plannera</label>
                     <input class="form-control" type="text" name="bookDescription">

                     <input id="buttonSaveBinding" type="submit" name="submit" value="Save Planner" />
                 </div>
            </form>
            <?php endif;?>
        </div>
    </div>
</div>

<script>
    document.getElementById("buttonPageLeft").addEventListener("click",function(){
        document.location.href="/books/pageLeftAction";
    });

    document.getElementById("buttonPageRight").addEventListener("click",function(){
        document.location.href="/books/pageRightAction";
    });


    document.getElementById("buttonBindingLeft").addEventListener("click",function(){
        document.location.href="/books/bindingLeftAction";
    });

    document.getElementById("buttonBindingRight").addEventListener("click",function(){
        document.location.href="/books/bindingRightAction";
    });

    document.getElementById("buttonAddPage").addEventListener("click",function(){
        var id=document.getElementById("selectedPageId").innerText;
        document.location.href="/books/addSelectedPageAction/"+id;
    });

    document.getElementById("buttonSaveBinding").addEventListener("click",function(){
        //document.location.href="/books/bindingSave";
    });

</script>

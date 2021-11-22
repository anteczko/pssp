<?php
foreach($rows as $row){
    echo '<img src='.base_url("uploads/".$row['image']).'></img>';
    d($row);
}
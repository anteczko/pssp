<?php
    echo view('BootstrapView');
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">YourCalendar.com</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/books/showBooks">Calendar catalouge</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/books/binding">Configurator</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pages/add"> Add page</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            #TODO for logged users
            <?php if(!empty($session) && !empty($session->get('email'))):?>
            <li class="nav-item">
                <?php $session ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Your Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/logout">Log Out</a>
            </li>
            <?php else:?>
            <li class="nav-item">
                <a class="nav-link" href="/users/login">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/register">Sign In</a>
            </li>
            <?php endif?>
        </ul>
    </div>
</nav>
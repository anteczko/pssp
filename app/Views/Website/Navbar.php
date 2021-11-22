<?php echo view('BootstrapView'); ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">YourCalendar.com</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Calendar catalouge</a>
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
            <li class="nav-item">
                <a class="nav-link" href="/users/login">Log In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users/register">Sign In</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Your Cart</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sign Out</a>
            </li>
        </ul>
    </div>
</nav>
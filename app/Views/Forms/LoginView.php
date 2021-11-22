<?php echo view('BootstrapView'); ?>

<div class="container-fluid">
    <form action="/users/loginAction" method="post" class="row">
        <div class="col-12">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="col-12">
            <label for="password" class="form-label">password</label>
            <input type="password" name="password" id="password">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
<?php echo view('BootstrapView'); ?>

<div class="container-fluid">
    <form action="/users/registerAction" method="post" class="row">
        <div class="col-12">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username">
        </div>
        <div class="col-12">
            <label for="password" class="form-label">password</label>
            <input type="password" name="password">
        <div class="col-12">
            <label for="repeatPassword" class="form-label">repeatPassword</label>
            <input type="password" name="repeatPassword">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</div>
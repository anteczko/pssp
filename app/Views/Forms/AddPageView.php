<?php echo view('BootstrapView'); ?>
<div class="container-fluid">
    <form method="post" enctype="multipart/form-data" action="/pages/addAction">
        <div class="form-group">
            <label class="form-label" for="name">name</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label class="form-label" for="type">type</label>
            <select class="form-control" name="type">
                <option>blank</option>
                <option>pattern</option>
                <option>generated</option>
                <option>image</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="description">description</label>
            <input class="form-control" type="text" name="description">
        </div>
        <div class="form-group">
            <label class="form-label" for="file">file</label>
            <input class="form-control" type="file" name="file">
        </div>
        <div class="form-group">
            <label class="form-label" for="is_a_spread ">is_a_spread </label>
            <input class="form-check-input" type="checkbox" name="is_a_spread ">
        </div>
        <div class="form-group">
            <label class="form-label" for="is_two_sided">is_two_sided</label>
            <input class="form-check-input" type="checkbox" name="is_two_sided">
        </div>
        <div class="form-group">
           <button type="submit" class="btn btn-primary">Add image</button>
        </div>
    </form>
</div>
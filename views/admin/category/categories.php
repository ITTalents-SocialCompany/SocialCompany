<div class="col-md-5">
    <div class="page-header">
        <h1>All Categories</h1>

        <a href="/admin/addCategory" class="btn btn-success">Add Category</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Category Name</th>
        </tr>
        </thead>
        <tbody>
        <?php if(count($categories) > 0) foreach($categories as $category):?>
            <tr class="info">
                <td><?= $category->category_id?></td>
                <td><?= $category->name?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>

<div class="page-header">
    <h1>All Deleted Users</h1>
</div>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Deleted On</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user):?>
        <tr class="info">
            <td><?= $user->user_id?></td>
            <td><?= $user->username?></td>
            <td><?= $user->first_name?></td>
            <td><?= $user->last_name?></td>
            <td><?= $user->soft_delete?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<script src="/libs/js/admin.js"></script>
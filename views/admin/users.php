<div class="page-header">
    <h1>All Users</h1>
</div>

<table class="table table-striped table-hover ">
    <thead>
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Approve</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user):?>
        <tr class="info">
            <td><?= $user->user_id?></td>
            <td><?= $user->username?></td>
            <td><?= $user->first_name?></td>
            <td><?= $user->last_name?></td>
            <?php if(!$user->is_approve):?>
                <td>
                    <a onclick="approve(<?= $user->user_id?>);" class="btn btn-success btn-xs" id="approve_<?= $user->user_id?>">Approve</a>
                </td>
            <?php else:?>
                <td>Approve Success</td>
            <?php endif;?>
            <?php if(!$user->soft_delete):?>
                <td>
                    <a onclick="deleteUser(<?= $user->user_id?>);" class="btn btn-danger btn-xs" id="delete_user_<?= $user->user_id?>">
                        Soft Delete
                    </a>
                </td>
            <?php else:?>
                <td>Deleted User</td>
            <?php endif; ?>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<script src="/libs/js/admin.js"></script>
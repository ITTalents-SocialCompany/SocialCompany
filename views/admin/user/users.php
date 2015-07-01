<div class="page-header">
    <h1>All Users</h1>
    <a href="/admin/deletedUsers" class="btn btn-success">Log of deleted users</a>
</div>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Approve</th>
        <th>Delete</th>
        <th>Admin</th>
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
                    <p id="approve_success_<?= $user->user_id?>" hidden>Approve Success</p>
                </td>
            <?php else:?>
                <td>
                    <a onclick="approve(<?= $user->user_id?>)" style="display: none" class="btn btn-success btn-xs" id="approve_<?= $user->user_id?>">
                        Approve
                    </a>
                    <p id="approve_success_<?= $user->user_id?>">Approve Success</p>
                </td>
            <?php endif;?>
            <?php if(!$user->soft_delete):?>
                <td>
                    <a onclick="deleteUser(<?= $user->user_id?>);" class="btn btn-danger btn-xs" id="delete_user_<?= $user->user_id?>">
                        Soft Delete
                    </a>
                    <p id="delete_success_<?= $user->user_id?>" hidden>Deleted User</p>
                </td>
            <?php else:?>
                <td>
                    <a onclick="deleteUser(<?= $user->user_id?>);" style="display: none" class="btn btn-danger btn-xs"
                       id="delete_user_<?= $user->user_id?>">
                        Soft Delete
                    </a>
                    <p id="delete_success_<?= $user->user_id?>">Deleted User</p>
                </td>
            <?php endif; ?>
            <?php if($user->is_admin): ?>
                <td>Admin</td>
            <?php else: ?>
                <td>
                    <a onclick="makeAdmin(<?= $user->user_id?>);" class="btn btn-warning btn-xs"
                       id="admin_user_<?= $user->user_id?>">
                        Make Admin
                    </a>
                    <span id="is_admin_<?= $user->user_id?>" hidden>Admin</span>
                </td>
            <?php endif;?>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<script src="/libs/js/admin.js"></script>
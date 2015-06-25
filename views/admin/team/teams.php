<div class="page-header">
    <h1>All Teams</h1>

    <a href="/admin/addTeam" class="btn btn-success">Add Team</a>
    <a href="/admin/usersTeam" class="btn btn-info">Add User to Team</a>
</div>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Team Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($teams as $team):?>
        <tr class="info">
            <td><?= $team->team_id?></td>
            <td><?= $team->name?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

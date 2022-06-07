<table  class="table">
<thead class="table-dark">
	<tr>
		<th scope="col">Login</th>
		<th scope="col">Client</th>
		<th scope="col">Role</th>
		<th scope="col">Options</th>
	</tr>
</thead>
<tbody>
{foreach $users as $u}
{strip}
	<tr>
		<td>{$u["login"]}</td>
		<td>{$u["first_name"]} {$u["last_name"]}</td>
		<td>{$u["name"]}</td>
		<td>
			<form action="{$conf->action_url}roleUpdate/{$u['client_id']}" method="post">
			<select class="form-select" aria-label="Change user role" name="role" id="">
				{foreach $role_list as $rl}
					<option value={$rl["role_id"]}>{$rl["name"]}</option>
				{/foreach}
			</select>
			<button type="submit"class="btn btn-success"
					href= "">Zapisz</button>
			</form>

			&nbsp;

		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

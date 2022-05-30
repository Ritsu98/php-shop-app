<table  class="table">
<thead class="table-dark">
	<tr>
		<th scope="col">Name</th>
		<th scope="col">Price</th>
		<th scope="col">Category</th>
		<th scope="col">Options</th>
	</tr>
</thead>
<tbody>
{foreach $products as $p}
{strip}
	<tr>
		<td>{$p["name"]}</td>
		<td>{$p["prize"]}</td>
		<td>{$p["category_name"]}</td>
		<td>
			<a class="btn btn-secondary" href="{$conf->action_url}productEdit/{$p['product_id']}">Edytuj</a>
			&nbsp;
			<a class="btn btn-danger"
			  href= "{$conf->action_url}productDelete/{$p['product_id']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

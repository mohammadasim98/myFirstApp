<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url('style.css')?>>
</head>
<body>
	<h1><?= esc($title) ?></h1>
<div class="container">	
	<div class='row'>
		<div class=col>
			<table id='car-table'>
				<?php if(!empty($cars) && is_array($cars)){?>
					<tr>
						<th>Model</th>
						<th>Company</th>
						<th>Type</th>
						<th>Fuel</th>
						<th>Warranty</th>
						<th>Action</th>
					</tr>
					<?php foreach ($cars as $item):?>
						<tr>
							<td><?= esc($item['model']) ?></td>
							<td><?= esc($item['company']) ?></td>
							<td><?= esc($item['type']) ?></td>
							<td><?= esc($item['fuel']) ?></td>
							<td><?= esc($item['warranty']) ?></td>
							<td><button><a href=<?php echo base_url('edit/'.$item['carid']);?>>Edit</a></button>
								<button><a href=<?php echo base_url('delete/'.$item['carid']);?>>Delete</a></button>
								<button><a href="view">View</a></button></td>
						</tr>
					<?php endforeach;}?>
			</table>
			<button id='add-button'><a href="add" style="text-decoration: none;">Add New Entry</a></button>
		</div>
	</div>
</div>
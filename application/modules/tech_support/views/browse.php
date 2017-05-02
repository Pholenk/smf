<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Users List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<div class="col-xs-5" style="padding: 0 2%;">
							<h3>User List</h3>
							<form method="post" id="ts_form">
							<table class="table table-hover" style="margin-top:1%;border:none;" id="table_user_tech_support">
								<tr style="text-align:center;">
									<th>Email</th>
									<th>Nama</th>
									<th>Action</th>
								</tr>
								<?php foreach ($users_data as $user) { ?>
								<tr id="edit_source">
									<td id='ts_email'><?php echo $user->email ?></td>
									<td id='ts_name'><?php echo $user->name_full ?></td>
									<td>
										<a href="/tech_support/add/<?php echo $user->id ?>"><button type="button" class="btn btn-success" id="add_tech_support"><i class="fa fa-plus"></i> ADD</button>
									</td>
								</tr>
								<?php }?>
							</table>
							</form>
						</div>
						<div class="col-xs-7" style="padding: 0 2%;">
							<h3>Technical Support List</h3>
							<table class="table table-hover" style="margin-top:1%;border:none;" id="table_ts_tech_support">
								<tr style="text-align:center;">
									<th>Email</th>
									<th>Nama</th>
									<th>Peternak</th>
									<th>Populasi</th>
									<th>Action</th>
								</tr>
								<?php foreach ($ts_data as $ts) {?>
								<tr id="edit_source">
									<td><?php echo $ts->email; ?></td>
									<td><?php echo $ts->name_full; ?></td>
									<?php
									if ($count_breeder >= 1)
									{
										foreach ($count_breeder as $total)
										{
											echo ($total->ts_id != $ts->id ? '<td>0</td><td>0</td>' : '<td>'.$total->breeder_count.'</td><td>'.$total->populasi.'</td>');
										}
									}
									else
									{
										echo '<td>0</td><td>0</td>';
									}
									?>										
									<td>
										<a href="/tech_support/delete/<?php echo $ts->id ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
									</td>
								</tr>
								<?php }?>
							</table>
						</div>

					</div>
					<!-- /.box-body -->
					<!-- box-footer -->
					<div class="box-footer">
						
					</div>
				</div>
				<!-- /.box -->
				<div class="modal fade" id="modal" tab-index="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
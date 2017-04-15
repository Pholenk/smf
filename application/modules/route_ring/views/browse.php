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
						<div class="col-xs-12" style="padding: 0 5%;">
							<table class="table table-hover" style="margin-top:1%;border:none;" id="table_route_ring">
								<tr style="text-align:center;">
									<th>Desa</th>
									<th>Jalur</th>
									<th>Ring</th>
									<th style="text-align:center">Action</th>
								</tr>
								<?php foreach($area_data as $data) { ?>
								<tr id="edit_source_<?php echo $data->id ?>">
									<td><?php echo $data->desa ?></td>
									<td><?php echo $data->jalur ?></td>
									<td><?php echo $data->ring ?></td>
									<td>
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal" id="edit_route_ring_<?php echo $data->id ?>"><i class="fa fa-edit"></i> EDIT</button>
										<a href="/route_ring/delete/<?php echo $data->id ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
									</td>
								</tr>
								<tr>
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
					<!-- /.box-body -->
					<!-- box-footer -->
					<div class="box-footer">
						<div class="col-sm-6">
							<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal" id="add_route_ring"><i class="fa fa-plus"></i> ADD</button>
						</div>
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
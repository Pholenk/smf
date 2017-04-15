<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Contract Price</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-xs-6">
							<div class="row" style="padding:2%;">
								<label class="control-label" style="padding-left:40%;">Harga DOC</label>
								<table class="table table-hover" style="margin-top:1%;border:none;" id="table_contract">
									<thead>
										<tr>
											<th>Jenis</th>
											<th>Harga</th>
											<th width="250px" style="text-align:center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($doc as $doc_data) { 
											?>
										<tr id="edit_source_contract_doc_<?php echo $doc_data->id ?>">
											<td><?php echo $doc_data->jenis ?></td>
											<td><?php echo $doc_data->harga ?></td>
											<td>
												<button type="button" class="btn btn-info" data-toggle="modal" data-target='#modal' id="edit_contract_doc_<?php echo $doc_data->id ?>"><i class="fa fa-edit"></i> EDIT</button>
												<a href="/contract/delete/doc/<?php echo $doc_data->id ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
											</td>
										</tr>
										<?php }?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4" align="center">
												<button type="button" class="btn btn-success" data-toggle="modal" data-target='#modal' id="add_contract_doc"><i class="fa fa-plus"></i> ADD</button>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="row" style="padding:2%;">
								<label class="control-label" style="padding-left:40%;">Harga Pakan</label>
								<table class="table table-hover" style="margin-top:1%;border:none;" id="table_contract">
									<thead>
										<tr>
											<th>Jenis</th>
											<th>Harga</th>
											<th width="250px" style="text-align:center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($pakan as $pakan_data) { 
											?>
										<tr id="edit_source_contract_pakan_<?php echo $pakan_data->id ?>">
											<td><?php echo $pakan_data->jenis ?></td>
											<td><?php echo $paka_data->harga ?></td>
											<td>
												<button type="button" class="btn btn-info" data-toggle="modal" data-target='#modal' id="edit_contract_pakan_<?php echo $pakan_data->id ?>"><i class="fa fa-edit"></i> EDIT</button>
												<a href="/contract/delete/pakan/<?php echo $pakan_data->id ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
											</td>
										</tr>
										<?php }?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4" align="center">
												<button type="button" class="btn btn-success" data-toggle="modal" data-target='#modal' id="add_contract_pakan"><i class="fa fa-plus"></i> ADD</button>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="row" style="padding:2%;">
								<label class="control-label" style="padding-left:40%;">Harga OVK</label>
								<table class="table table-hover" style="margin-top:1%;border:none;" id="table_contract">
									<thead>
										<tr>
											<th>Jenis</th>
											<th>Harga</th>
											<th width="250px" style="text-align:center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($ovk as $ovk_data) { 
											?>
										<tr id="edit_source_contract_ovk_<?php echo $ovk_data->id ?>">
											<td><?php echo $ovk_data->jenis ?></td>
											<td><?php echo $ovk_data->harga ?></td>
											<td>
												<button type="button" class="btn btn-info" data-toggle="modal" data-target='#modal' id="edit_contract_ovk_<?php echo $ovk_data->id ?>"><i class="fa fa-edit"></i> EDIT</button>
												<a href="/contract/delete/ovk/<?php echo $ovk_data->id ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
											</td>
										</tr>
										<?php }?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4" align="center">
												<button type="button" class="btn btn-success" data-toggle="modal" data-target='#modal' id="add_contract_ovk"><i class="fa fa-plus"></i> ADD</button>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="row" style="padding:2%;">
								<label class="control-label" style="padding-left:35%;">Garansi Harga Beli</label>
								<table class="table table-hover" style="margin-top:1%;border:none;" id="table_contract">
									<thead>
										<tr>
											<th colspan="2" style="text-align:center;">Range</th>
											<th>Harga</th>
											<th width="250px" style="text-align:center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($harga_beli as $harga_beli_data) { 
											?>
										<tr id="edit_source_contract_beli_<?php echo $harga_beli_data->id ?>">
											<td><?php echo $harga_beli_data->from ?></td>
											<td><?php echo $harga_beli_data->to ?></td>
											<td><?php echo $harga_beli_data->harga ?></td>
											<td>
												<button type="button" class="btn btn-info" data-toggle="modal" data-target='#modal' id="edit_contract_beli_<?php echo $harga_beli_data->id ?>"><i class="fa fa-edit"></i> EDIT</button>
												<a href="/contract/delete/beli/<?php echo $harga_beli_data->id ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
											</td>
										</tr>
										<?php }?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4" align="center">
												<button type="button" class="btn btn-success" data-toggle="modal" data-target='#modal' id="add_contract_beli"><i class="fa fa-plus"></i> ADD</button>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="row" style="padding:2%;">
								<label class="control-label" style="padding-left:35%;">Bonus Selisih FCR </label>
								<table class="table table-hover" style="margin-top:1%;border:none;" id="table_contract">
									<thead>
										<tr>
											<th colspan="2" style="text-align:center;">Range</th>
											<th>Harga</th>
											<th width="250px" style="text-align:center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($selisih_fcr as $selisih_fcr_data) { 
											?>
										<tr id="edit_source_contract_selisih-_<?php echo $selisih_fcr_data->id ?>">
											<td><?php echo $selisih_fcr_data->from ?></td>
											<td><?php echo $selisih_fcr_data->to ?></td>
											<td><?php echo $selisih_fcr_data->harga ?></td>
											<td>
												<button type="button" class="btn btn-info" data-toggle="modal" data-target='#modal' id="edit_contract_selisih-fcr_<?php echo $selisih_fcr_data->id ?>"><i class="fa fa-edit"></i> EDIT</button>
												<a href="/contract/delete/selisih-fcr/<?php echo $selisih_fcr_data->id ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
											</td>
										</tr>
										<?php }?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4" align="center">
												<button type="button" class="btn btn-success" data-toggle="modal" data-target='#modal' id="add_contract_selisih-fcr"><i class="fa fa-plus"></i> ADD</button>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="row" style="padding:2%;">
								<label class="control-label" style="padding-left:40%;">Bonus Pasar</label>
								<table class="table table-hover" style="margin-top:1%;border:none;" id="table_contract">
									<thead>
										<tr>
											<th colspan="2" style="text-align:center;">Range</th>
											<th>Harga</th>
											<th width="250px" style="text-align:center;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($bonus_pasar as $bonus_pasar_data) { 
											?>
										<tr id="edit_source_contract_bonus-pasar_<?php echo $bonus_pasar_data->id ?>">
											<td><?php echo $bonus_pasar_data->from ?></td>
											<td><?php echo $bonus_pasar_data->to ?></td>
											<td><?php echo $bonus_pasar_data->bonus ?></td>
											<td>
												<button type="button" class="btn btn-info" data-toggle="modal" data-target='#modal' id="edit_contract_bonus-pasar_<?php echo $bonus_pasar_data->id ?>"><i class="fa fa-edit"></i> EDIT</button>
												<a href="/contract/delete/bonus-pasar/<?php echo $bonus_pasar_data->id ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></a>
											</td>
										</tr>
										<?php }?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4" align="center">
												<button type="button" class="btn btn-success" data-toggle="modal" data-target='#modal' id="add_contract_bonus-pasar"><i class="fa fa-plus"></i> ADD</button>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
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
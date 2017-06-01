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
            <div class="box-tools">
              <label class="col-xs-3 control-label">
                <strong>Search by Email</strong>
              </label>
              <div class="input-group">
                <input type="text" id="table_search" class="form-control input-text"  placeholder="Search">
                <span class="input-group-addon input-icon" style="padding:1%"><i class="fa fa-search"></i></span>
              </div>
            </div>
            <div class="col-sm-12">
              <table class="table table-hover" style="margin-top:1%;border:none;">
                <thead>
                  <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Name</th>
                    <th style="text-align:center">Email</th>
                    <th style="text-align:center">Jabatan</th>
                    <th style="text-align:center">Action</th>
                  </tr>
                </thead>
                <tbody id="user-data">
                  <?php $i=1; foreach ($users_data as $key) { ?>
                  <tr>
                    <td style="text-align:center">
                      <?php echo $i; ?>
                    </td>
                    <td style="text-align:center">
                      <?php echo $key->id; ?>
                    </td>
                    <td style="text-align:center">
                      <?php echo $key->name_full; ?>
                    </td>
                    <td style="text-align:center">
                      <?php echo $key->email; ?>
                    </td>
                    <td style="text-align:center">
                      <?php echo $key->jabatan; ?>
                    </td>
                    <td style="text-align:center">
                      <a href="<?php echo base_url('/users/read/'.$key->email)?>">
                        <button type="button" class="btn btn-info"><i class="fa fa-edit"></i> EDIT</button>
                      </a>
                      <a href="<?php echo base_url('/users/delete/'.$key->id)?>">
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                      </a>
                    </td>
                  </tr>
                  <?php $i++;}?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-sm-6">
              <a href="<?php echo base_url('/users/add')?>"><button type="button" class="btn btn-success pull-right" id="add_user"><i class="fa fa-plus"></i> ADD</button></a>
            </div>
          </div>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>
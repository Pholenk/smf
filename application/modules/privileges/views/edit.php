<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <i class="fa fa-user" style="color:#304FFE;" ></i>
            <h1 class="box-title" style="align:center;"> User Privileges</h1>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php foreach ($old_data as $data) {?>
          <form class="form-horizontal" method="post" action="/privileges/edit/<?php echo $data->id ?>">
            <div class="box-body">
              <div class="col-sm-6">
                <?php foreach ($headersColumn as $key => $value) {?>
                <div class="checkbox">
                  <label style="padding-right:12px;padding-left=8px;font-weight:bold;">
                    <input name="<?php echo $key ?>" type="checkbox" value = '1' <?php echo ($data->$key == 1 ? 'checked' : '') ?>> <?php echo $value ?>
                  </label>
                </div>
                <?php } ?>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-success pull-right">Save</button>
              </div>
              <div class="col-sm-6">
                <a href="/users/read/<?php echo $data->email ?>"><button class="btn btn-default">Cancel</button></a>
              </div>
              <!-- /.box-footer -->
            </div>
          </form>
          <?php } ?>
          <!-- /.box -->
        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title" style="font-weight:bold;"><i class="fa fa-warning" style="color:orange;"></i> Supplier Products</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12" style="padding: 0 5%;">
                <form method="post">
                  <div class="form-group">
                    <label class="col-xs-3">Supplier's Name</label>
                    <div class="col-sm-9">
                      <select name="supplier_data" class="form-control" id="supplier_data">
                        <option> </option>
                        <?php foreach ($supplier_data as $supplier) {?>
                        <option value=<?php echo $supplier->id ?> >
                          <?php echo $supplier->nama_perusahaan ?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12" style="padding: 2%;border:none;">
                <table class="table table-hover" id="result">
                </table>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <div class="col-xs-6">
              <button type='button' class='btn btn-success pull-right' data-toggle="modal" data-target="#modal" id="add_supplier_product"><i class="fa fa-plus"></i> ADD</button>
            </div>
          </div>
        </div>
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
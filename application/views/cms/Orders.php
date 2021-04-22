<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Orders
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          <div class="panel-body">
            <p>
              <button type="button" class="add-btn btn btn-success btn-sm">Add new Order</button>
            </p>
            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Order Type</th>
                    <th>Order Images</th>
                    <th>Order Cost</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Delivery Date</th>
                    <th>Delivery Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($res) > 0 ): ?>

                    <?php $i = 1; foreach ($res as $key => $value): ?>
                      <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $value->order_type ?></td>
                        <td><?php echo $value->order_images ?></td>
                        <td><?php echo $value->order_cost ?></td>
                        <td><?php echo $value->status ?></td>
                        <td><?php echo $value->order_date ?></td>
                        <td><?php echo $value->delivery_date ?></td>
                        <td><?php echo $value->delivery_status ?></td>
                        <td>
                          <button type="button"
                          data-payload='<?php echo json_encode(['order_id' => $value->order_id, 'order_type' => $value->order_type, 'order_images' => $value->order_images_f, 'order_cost' => $value->order_cost, 'status' => $value->status, 'order_date' => $value->order_date, 'delivery_date' => $value->delivery_date, 'delivery_status' => $value->delivery_status])?>'
                          class="edit-row btn btn-info btn-xs">Edit</button>
                          <button type="button" data-id='<?php echo $value->order_id; ?>'
                            class="btn btn-delete btn-danger btn-xs">Delete</button>
                          </td>
                        </tr>
                      <?php endforeach; ?>


                    <?php else: ?>
                      <tr>
                        <td colspan="4" style="text-align:center">Empty table data</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>

  <!-- Modal -->
  <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
        <div class="modal-body">

          <form role="form" method="post" id="main-form" enctype="multipart/form-data">
            <div class="form-group">
              <label >Order Type</label>
              <input type="text" class="form-control" name="order_type" placeholder="Order Type">
            </div>
            <div class="form-group">
              <label >Order Images</label>
              <input type="file" class="form-control" name="order_images" placeholder="Order Images">
            </div>
            <div class="form-group">
              <label >Order Cost</label>
              <input type="text" class="form-control" name="order_cost" placeholder="Order Cost">
            </div>
            <div class="form-group">
              <label >Status</label>
              <input type="text" class="form-control" name="status" placeholder="Status">
            </div>
            <div class="form-group">
              <label >Order Date</label>
              <input type="date" class="form-control" name="order_date" placeholder="Order Date">
            </div>
            <div class="form-group">
              <label >Delivery Date</label>
              <input type="date" class="form-control" name="delivery_date" placeholder="Delivery Date">
            </div>
            <div class="form-group">
              <label >Delivery Status</label>
              <input type="text" class="form-control" name="delivery_status" placeholder="Delivery Status">
            </div>

          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            <input class="btn btn-info" type="submit" value="Save changes">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- modal -->

  <script src="<?php echo base_url('public/admin/js/custom/') ?>order_management.js"></script>
  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>

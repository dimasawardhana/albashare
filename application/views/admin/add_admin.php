<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Admin</h2>
                <h5>Tolong isi Form berikut untuk melanjutkan </h5>
                <?php if (isset($account_updated))
                  {
                    echo $account_updated;
                  }
                ?>
            </div>
        </div>
        <hr />
        <div class="row">
        <!--Nama -->
          <form class="form-horizontal" role="form" action="<?php echo base_url();?>Administrator/createAdmin" method="POST">


            <div class="form-group">
              <label class="control-label col-sm-3">Nama</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="name">
              </div>

            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Inisial</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="initial" maxlength="3">
              </div>

            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Username</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="username">
              </div>

            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Password</label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="password">
              </div>

            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" >Tipe Admin</label>
              <div class="col-sm-4">
                <select name="TipeAdmin" class="form-control" value ='1'>
                  <option value="1">SuperAdmin</option>
                  <option value="0">Admin</option>
                </select>
              </div>
            </div>
            <!-- Cabang -->
            <div class="form-group">
              <label class="control-label col-sm-3" >cabang</label>
              <div class="col-sm-4">
                <select name="cabang" class="form-control" value='1'>
                  <option value="1">(1)Bandung</option>
                  <option value="2">(2)Cilegon</option>
                  <option value="3">(3)Serang</option>
                </select>
              </div>
            </div>

            <!-- Submit -->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-primary" id="submitButton" >Submit</button>
                <button type="reset" class="btn btn-danger" ><a href="<?php echo base_url();?>home">Cancel</a></button>
              </div>
            </div>
          </form>
          <?php echo validation_errors('<p class="error">');?>
        </div>

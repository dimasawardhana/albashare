<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Rekening Baru</h2>
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
          <form class="form-horizontal" role="form" action="<?php echo base_url();?>Anggota/create_rekening/<?php echo $id_anggota; ?>" method="POST">


            <div class="form-group">
              <label class="control-label col-sm-3">Rekening</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="no_rekening">
                  <p>Rekening terakhir adalah : <?php echo $lastRek[0]->no_rekening; ?></p>
              </div>

            </div>

            <!-- Cabang -->
            <div class="form-group">
              <label class="control-label col-sm-3" >cabang</label>
              <div class="col-sm-4">
                <select name="cabang" class="form-control">
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
                <a href="<?php echo base_url();?>Anggota" class = "btn btn-danger">Cancel</a>
              </div>
            </div>
          </form>
          <?php echo validation_errors('<p class="error">');?>
        </div>

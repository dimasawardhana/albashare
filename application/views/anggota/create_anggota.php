<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Nasabah Baru</h2>
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
          <form class="form-horizontal" role="form" action="<?php echo base_url();?>Anggota/add_anggota" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-3">Nama Lengkap:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" id="name" onchange=" isAllValued();">
              </div>
            </div>
            <!--Kota Kelahiran -->
            <div class="form-group">
              <label class="control-label col-sm-3">Kota Kelahiran:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="City" id="City" onchange=" isAllValued();">
              </div>
              <!-- JK (Radio button inline)-->
              <label class="control-label col-sm-2">Jenis Kelamin</label>
              <div class="col-sm-4">
                <label class="radio-inline"><input type="radio" name="JK" value='L' checked>Laki-Laki</label>
                <label class="radio-inline"><input type="radio" name="JK" value='P'>Perempuan</label>
              </div>
            </div>


            <!-- TTL-->

            <div class="form-group">
              <label class="control-label col-sm-3">Tempat Tanggal Lahir</label>
              <div class="col-sm-4">
                  <input type="text" class="form-control" name="TTL" id='datepicker' onchange=" isAllValued();">
              </div>


              <!-- Kode Pos -->
              <label class="control-label col-sm-2">Kode pos</label>
              <div class=" col-sm-2">
                <input type="text" class="form-control" name="ZIP" id="ZIP" onchange=" isAllValued();">
              </div>
            </div>

            <!--Alamat -->
            <div class="form-group">
              <label class="control-label col-sm-3">Alamat</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="alamat" id="alamat" onchange=" isAllValued();">
              </div>
            </div>

            <!-- Nama Ibu Kandung -->
            <div class="form-group">
              <label class="control-label col-sm-3">Nama Ibu Kandung</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="ibu" id="ibu" onchange=" isAllValued();">
              </div>
            </div>
            <!-- No Handphone -->
            <div class="form-group">
              <label class="control-label col-sm-3">No Handphone</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="HP" id="HP"onchange=" isAllValued();">
              </div>
              <!-- Telepon Rumah -->
              <label class="control-label col-sm-2">No Telephone</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="TP" id="TP" onchange=" isAllValued();">
              </div>
            </div>

            <!--Email -->
            <div class="form-group">
              <label class="control-label col-sm-3">Email :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="email" id="email" onchange=" isAllValued();">
              </div>
            </div>
            <!-- PEkerjaan -->
            <div class="form-group">
              <label class="control-label col-sm-3">Pekerjaan :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="job" id="job" onchange=" isAllValued();">
              </div>
            </div>
            <!-- No Identitas (KTP) -->
            <div class="form-group">
              <label class="control-label col-sm-3">No Identitas :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="identity" id="identity" onchange=" isAllValued();">
              </div>
            </div>
            <!-- Nama Suami/ Istri -->
            <div class="form-group">
              <label class="control-label col-sm-3">Nama Suami/Istri :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="spouse" id="spouse" onchange=" isAllValued();">
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
                <button type="submit" class="btn btn-primary" id="submitButton" disabled>Submit</button>
                <a href="<?php echo base_url();?>Anggota" class = "btn btn-danger">Cancel</a>
                <label id="notification"></label>
              </div>
            </div>
          </form>
          <?php echo validation_errors('<p class="error">');?>
        </div>
        <script>
          var element =[
            document.getElementById('name'),
            document.getElementById('City'),
            document.getElementById('datepicker'),
            document.getElementById('ZIP'),
            document.getElementById('alamat'),
            document.getElementById('HP'),
            document.getElementById('identity')
            ];

          function isAllValued(){
            var i=0;
            var letEnable =true;
            for(i;i<7;i++){
              if(element[i].value.length == 0){
                letEnable=false;
              }
            }
            if(letEnable==true){
              document.getElementById('submitButton').disabled = false;
            }else{
              document.getElementById('submitButton').disabled = true;
            }
          }
        </script>

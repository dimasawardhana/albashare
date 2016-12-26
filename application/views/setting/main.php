<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Pengaturan Petugas</h2>
                <h5>Welcome Admin, love to see your back. </h5>
                <h5><?php
                  //var_dump($account_updated);
                  //exit();
                  if (isset($account_updated))
                  {
                    echo $account_updated;
                  }
                ?></h5>
            </div>
        </div>
        <hr />
        <div class="row">
          <form class="form-horizontal" role="form" action="<?php echo base_url();?>Setting/updatesetting" method="POST">
            <div class="form-group">
              <div class="col-sm-8">
                <input type = "hidden" name="id" value="<?php echo $administrator[0]->id;?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Nama:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" value="<?php echo $administrator[0]->name;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Inisial:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="initial" value="<?php echo $administrator[0]->initial;?>" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Username:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="username" value="<?php echo $administrator[0]->username;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Password:</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password" id="txtNewPassword" >
              </div>
            </div>
            <div class="form-group" id = 'retype'>
              <label class="control-label col-sm-3">Re-Type Password:</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password_confirm" id="txtConfirmPassword" >
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-10">
                <div class="registrationFormAlert" id="divCheckPasswordMatch">
                </div>
                <button type="submit" class="btn btn-primary" id="submitButton" disabled>Submit</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
              </div>
            </div>
          </form>
          <?php echo validation_errors('<p class="error">');?>
        </div>

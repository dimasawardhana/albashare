<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Daftar Administrator</h2>
				<h3>Selamat Datang</h3>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-12">
				<a href="<?php echo base_url();?>Administrator/add_admin" class="btn btn-primary btn-sm">Tambah Admin</a>
				<br>
			</div>
		</div>
		<br/>
		<div class="row">
		</div>
			<div class="col-md-12">
				<div class = "panel panel-default">
					<div class = "panel-heading">
						Daftar Administrator
					</div>
					<div class = "panel-body">
						<div class = "table-responsive">
							<table class="table table-stiped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nama</th>
										<th>Initial</th>
										<th>Cabang</th>
										<th>Role</th>
										<th>Status</th>
										<th>Action</th>
									</tr>

								</thead>
								<tbody>

										<?php
										if(isset($AllAdmin)){
											$no = 0;
											foreach($AllAdmin as $object){
												$no++;

										 ?>
										 <tr>
											 <th><?php echo $no;?></th>
											 <th><?php echo $object->name;?></th>
											 <th><?php echo $object->initial?></th>
											 <?php
											 if ($object->id_cabang==1){
												 ?>
												<th><?php echo "Cimahi";?></th>
												<?php
											 }
											  elseif($object->id_cabang==2){
													?>
													<th><?php echo "Cilegon"?></th>
													<?php
												}
												elseif($object->id_cabang==3){
													?>
													<th><?php echo "Serang"?></th>
												<?php
												}
											  ?>

											 <th>
												 <?php
												 if($object->role ==1){
													 echo "SuperAdmin";
												 }
												 else {
												 	echo "Admin";
												 }
												 ?>
											 </th>
											 <th><?php
											if($object->status==1){
												echo "Active ";
												echo "<a class='btn btn-primary btn-sm' href='".base_url()."Administrator/Inactivate/".$object->id."'>Inactivate</a>";
											}
											else{
												echo "Inactive ";
												echo "<a class='btn btn-primary btn-sm' href='".base_url()."Administrator/Activate/".$object->id."'>Activate</a>";
											} ?>
										 	</th>
											 <th>
												 <?php
												 if($log[1]->no_admin != $object->id){
												?> <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>Administrator/Hapus/<?php	echo $object->id; ?>">
													 Hapus</a>
												 <?php
											 		}
													 ?>
													 <a class = "btn btn-primary btn-sm" href ="<?php echo base_url();?>Administrator/Edit/<?php echo $object->id; ?>">
														 Edit</a>
											</th>
										 </tr>
										 <?php
									 }
								 }
										  ?>
								</tbody>
							</table>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>

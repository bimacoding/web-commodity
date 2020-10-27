<div class="bg_white">
	<div class="container py-4">
		<div class="row justify-content-between align-items-center flex-lg-row-reverse content_general_row">
			<div class="col-lg-12">
				<h2 class="text-center"><?=$title?></h2>
			</div>
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-striped">
					  <caption>Data list <?=$title?></caption>
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Tgl. Upload</th>
					      <th scope="col">Nama File</th>
					      <th width="100">
					      	<center>
					      		Aksi
					      	</center>
					      </th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php  
					  		if ($cek > 0) {
						  		$no = 1;
						  		foreach ($row->result_array() as $key) {
					  	?>
						  		<tr>
							      <th scope="row"><?=$no?></th>
							      <td><?=$this->mylibrary->tgl_indo($key['created_on']);?></td>
							      <td><?=$key['judul_warta'];?></td>
							      <td>
							      	<center>
							      		<a href="<?=base_url()?>assets/uploads/<?=$key['file_warta']?>" class="btn btn-primary btn-sm" target="_blank">Lihat</a>
							      	</center>
							      </td>
							    </tr>

					  	<?php 	$no++; } }else{ ?>
					  		<tr>
					  			<td colspan="4"><center class="text-danger">Belum ada data yang diisi!!</center></td>
					  		</tr>
					  	<?php } ?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
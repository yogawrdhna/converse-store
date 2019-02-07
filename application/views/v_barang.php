<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Transaksi

	</title>
</head>
<body style="background-color:blue;">
<h1 style="text-align:center">Barang</h1>

<?php if($this->session->flashdata('pesan')): ?>


	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>


<?php endif?>



<?php if($this->session->userdata('level')=="admin"){?>
<br><a href="#tambah" class="btn btn-primary" data-toggle="modal" style="float: center;">Tambah</a><br><br>

<?php }?>
<table class="table table-hover table-stripped">

	<thead>

		<tr>

			<td>No</td>
			<td>Kode barang</td>
			<td>Nama barang</td>
			<!-- <td>Tahun</td> -->
			<td>Kategori</td>
			<!-- <td>Merk</td> -->
			<td>Harga</td>
			<td>Stok</td>

		</tr>

	</thead>

	<tbody>


		<?php $no = 0; foreach($barang as $bk): $no++;?>


		<tr>

			<td><?=$no?></td>
			<td><?=$bk->kode_barang?></td>
			<td><?=$bk->nama_barang?></td>
			<!-- <td><?=$bk->size?></td> -->
			<td><?=$bk->nama_kategori?></td>
			<td><?=$bk->harga?></td>
			<!-- <td><<?=$bk->merk?></td> -->
			<td><?=$bk->stok?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?>
			<a href="#ubah" data-toggle="modal" onclick="edit(<?=$bk->kode_barang?>)"  class="btn btn-warning">Ubah</a>
			<?php }else{ 		echo "Anda Kasir"; }?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?>
			<a href="<?=base_url('index.php/barang/hapus/'.$bk->kode_barang)?>" onclick="return confirm('apakah anda yakin untuk menghapus')"
			class="btn btn-danger">Hapus</a><?php }else{ echo "Anda Kasir"; }?></td>

		</tr>
	<?php endforeach?>

</tbody>
</table>


<div class="modal fade" id="tambah" >
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">


			<div class="row">

			<div class="col-md-6">
				<div class="modal-title">Tambah barang</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>

			</div>

			<div class="modal-body">


				<form action="<?=base_url('index.php/barang/tambah')?>" method="post" enctype="multipart/form-data">

					<table>

						<tr>
							<td>Nama barang</td>
							<td><input type="text" name="nama_barang" style="margin-left: 20px;"></td>
						</tr>

						<!-- <tr>
							<td>Size</td>
							<td><input type="number" name="size" style="margin-left: 20px;"></td>
						</tr> -->

						<tr>
							<td>Kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; ">
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>
								</select>
							</td>
						</tr>

						<tr>
							<td>Harga</td>
							<td><input type="text" name="harga" style="margin-left: 20px;"></td>
						</tr>

						<!-- <tr>
							<td>Merk</td>
							<td><input type="text" name="merk" style="margin-left: 20px;"></td>
						</tr> -->

						<tr>
							<td>Stok</td>
							<td><input type="number" name="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" name="tambah" value="tambah" class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>
		</div>
	</div>

</div>



<div class="modal fade" id="ubah" >
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">

				<div class="row">

			<div class="col-md-6">
				<div class="modal-title">Ubah barang</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>
			</div>

			<div class="modal-body">


				<form action="<?=base_url('index.php/barang/update')?>" method="post" enctype="multipart/form-data">

					<table>

						<input type="hidden" name="kode_barang" required id="kode_barang" style="margin-left: 20px;">

						<tr>
							<td>Nama barang</td>
							<td><input type="text" name="nama_barang"  required  id="nama_barang" style="margin-left: 20px;"></td>
						</tr>

						<!-- <tr>
							<td>Size</td>
							<td><input type="number" name="size" required  id="size" style="margin-left: 20px;"></td>
						</tr> -->

						<tr>
							<td>Kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; " id="kategori" required >
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>
								</select>
							</td>
						</tr>

						<tr>
							<td>Harga</td>
							<td><input type="text" name="harga" required  id="harga" style="margin-left: 20px;"></td>
						</tr>

						<!-- <tr>
							<td>Merk</td>
							<td><input type="text" name="merk"   id="barang" style="margin-left: 20px;"></td>
						</tr> -->

						<tr>
							<td>Stok</td>
							<td><input type="number" name="stok" required  id="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" value="Ubah" name="update" required  class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>
		</div>
	</div>

</div>


<script >


	function edit(kode_barang){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/barang/tampil_ubah_barang/"+kode_barang,
			dataType:"json",


			success:function(data){
				$("#kode_barang").val(data.kode_barang);
				$("#nama_barang").val(data.nama_barang);
				// $("#size").val(data.size);
				$("#kategori").val(data.kode_kategori);
				$("#harga").val(data.harga);
				// $("#merk").val(data.merk);
				$("#stok").val(data.stok);
			}
		});
	}

</script>

</body>
</html>



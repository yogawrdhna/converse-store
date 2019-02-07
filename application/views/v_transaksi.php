<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<!-- <style media="screen">
		@font-face {
			src: url(../assets/font/tayo.ttf);
			font-family: tayo;
		}
		@font-face {
			src: url(../assets/font/hiya.ttf);
			font-family: hiya;
		}
			td, th{
				color: #1C3341;
				font-family: tayo;
				font-size: 20px;
			}
			th{
				font-size: 23px;
			}

			h1{
				color: white;
				margin-top: 5px;
				margin-bottom: 35px;
				font-family: hiya;
				font-size: 45px;
				text-align: center;
			}
		</style> -->
	</head>
	<body>

		<h1 > Transaksi</h1>

		<?php if($this->session->flashdata('pesan')): ?>


			<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>


		<?php endif?>


		<div class="row">

			<div class="col-md-7">



				<table class="table table-hover table-stripped">



					<thead>

						<tr>

						<th>No</th><th>Nama Barang</th><th>Kategori</th><th>Harga</th>
						<!-- <td>cover</td> -->
						<th>Stok</th><th></th><th></th>

						</tr>

					</thead>

					<tbody>


						<?php $no = 0; foreach($barang as $bk): $no++;?>

						<tr>

							<td><?=$no?></td></td><td><?=$bk->nama_barang?></td><td><?=$bk->nama_kategori?></td><td><?=$bk->harga?></td>
							<!-- <td><img src="<?=base_url('assets/gambar/'.$bk->cover)?>" style="width:40px;"></td> -->
							<td><?=$bk->stok?></td>

							<td> <a href="<?=base_url('index.php/Cart/tambah_cart/'.$bk->kode_barang)?>" class="btn btn-success">Beli</a></td>



						</tr>



					<?php endforeach?>


				</tbody>

			</table>




		</div>


		<div class="col-md-5">


		<form action="<?= base_url('index.php/Transaksi/transaksi')?>" method="post">

		<table class="table table-stripped table-hover">


			<tr><td colspan="2">Nama Pembeli</td><td colspan="4"><input type="text" name="pembeli" value="<?=$this->session->flashdata('pembeli');?>"></td></tr>


						<tr>

						<th>No</th><th>Nama Branag</th><th>Jumlah</th><th>Harga</th><th>Subtotal</th><th></th>

						</tr>




					<?php $no = 0; foreach($this->cart->contents() as $ct): $no++;?>

						<input type="hidden" name="kode_barang[]" value="<?=$ct['id']?>">
						<input type="hidden" name="rowid[] " value="<?=$ct['rowid']?>">

						<tr>
							<td><?=$no?></td></td><td><?=$ct['name']?></td><td><input type="number" name="banyak[]" value="<?=$ct['qty']?>" style="width:60px;"></td><td><?=number_format($ct['price'])?></td><td><?=number_format($ct['subtotal'])?>
							<td> <a href="<?=base_url('index.php/Cart/hapus_cart/'.$ct['rowid'])?>" onclick="return confirm('apakah anda yakin untuk menghapus pesanan ini')" class="btn btn-danger">x</a></td>

						</tr>
					<?php endforeach?>


				<tr><td colspan="2">Total</td><td colspan="4"><?= number_format($this->cart->total())?></td></tr>

				<tr><td colspan="2">Bayar</td><td colspan="4"><input type="number" name="bayaru"></td></tr>

				<tr><td colspan="2">Kembali</td><td colspan="4"><input type="number" value="<?= $this->session->flashdata('kembali') ?>" name="kembaliu"></td></tr>

				<tr><td colspan="2"><input type="submit" value="Bayar" name="bayar" class="btn btn-success"></td><td colspan="2"><a href="<?=base_url('index.php/Cart/hapus_semua_cart')?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin untuk menghapus semua pesanan')">Hapus Cart</a></td><td colspan="2"><input type="submit" value="Update_qty" name="update qty" class="btn btn-primary"></td></tr>

			</table>


		</form>








		</div>


		</div>

	</body>
</html>

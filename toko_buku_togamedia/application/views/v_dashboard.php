	<h3 >Selamat Datang <?=$this->session->userdata('nama_user')?></h3>
		<p class="panel-subtitle">Toko Buku Togamedia</p>
						
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
							<?php if($this->session->userdata('level')=='admin'){?>
								<a href="<?=base_url('index.php/Kasir')?>" style="color: black">
								<?php }?>
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number"><?= $user?></span>
											<span class="title">Pegawai</span>
										</p>
									</div>
								<?php if($this->session->userdata('level')=='admin'){?>
								</a>
								<?php }?>
								</div>
								<div class="col-md-4">

								<a href="<?=base_url('index.php/Histori')?>" style="color: black">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number"><?= $transaksi ?></span>
											<span class="title">penjualan</span>
										</p>
									</div>

									</a>
								</div>
								<div class="col-md-4">
								<a href="<?=base_url('index.php/Buku')?>" style="color: black">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number"><?= $buku ?></span>
											<span class="title">Buku</span>
										</p>
									</div>

									</a>
								</div>
							</div>
							
						</div>

	<div class="boss" style="width">




	</div>
				
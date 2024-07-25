
				<div class="panel-heading"><h2>DAFTAR BOBOT</h2></div>
				<a href="?page=bobot_tambah">TAMBAH BOBOT</a><br>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Selisih</th>
								<th>Bobot</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 

							$halaman = 10;
							  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
							  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
							  $result = mysqli_query($koneksi, "SELECT * FROM tbl_bobot");
							  $total = mysqli_num_rows($result);
							  $pages = ceil($total/$halaman);            
							  $query = mysqli_query($koneksi, "SELECT * FROM tbl_bobot LIMIT $mulai, $halaman")or die(mysql_error);
							  $no =$mulai+1;
							 
							while ($data = mysqli_fetch_assoc($query)){
								?>
								<tr>
									<td><?php echo $nomor=$nomor+1; ?></td>
									<td><?php echo $data['selisih']; ?></td>
									<td><?php echo $data['bobot']; ?></td>
									<td><?php echo $data['keterangan']; ?></td>
									<td>
										<a href="?page=bobot_edit&selisih=<?php echo $data['selisih']; ?>">
										<i class='fa fa-edit'></i>
										</a>
										<a href="bobot_hapus.php?selisih=<?php echo $data['selisih']; ?>">
										<i class="fa fa-eraser"></i>
										</a>
									</td>
								</tr>
							<?php 
							// endforeach;
						}
							?>
						</tbody>
					</table>
					<div class="">
						<p align="right">
							<?php for ($i=1; $i<=$pages ; $i++){ ?>
								<a href="?page=bobot&halaman=<?php echo $i; ?>"><input type="button" value="<?php echo $i; ?>"></a>
							 
						<?php } ?>
						</p>
							 
					</div>
<div class="row">
    <div class="product-title">
        <h2>Our Product</h2>
    </div>
    <div class="row wrapper-cards">
        <?php foreach ($data as $barang) : ?>
            <div class="col-lg-2 col-md-4 col-sm-2 cards-space">
                <div class="cards card">
                    <a href="">
                        <img src="./assets/function/img/<?= $barang['img']; ?>" class="card-img-top card-img" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title product-judul"><?= $barang['nama_barang']; ?></h5>
                        <div class="info">
                            <p class="stok-product">Stok : <?= $barang['stok'] ?></p>
                            <p class="stok-product">Harga : <?= format_rupiah($barang['harga_barang']) ?></p>
                        </div>
                        <p class="card-text"></p>
                        <a class="btn btn-primary detail" data-bs-toggle="modal" href="#Modal" role="button">Lihat Detail Barang</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>

<!-- Modal -->
<div class="modal fade" id="Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="wrapper-gambar">
                    <img src="./assets/function/img/<?= $barang['img']; ?>" class="card-img-top card-img gambar-hover" alt="...">
                </div>
                <div class="info mt-4">
                    <h4 class="text-center"><?=$barang['nama_barang']?></h4>
                    <p class="stok-product">Stok : <?= $barang['stok'] ?></p>
                    <p class="stok-product">Harga : <?= format_rupiah($barang['harga_barang']) ?></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
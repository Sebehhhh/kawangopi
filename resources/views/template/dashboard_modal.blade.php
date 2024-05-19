 <!-- Modal Tambah Kategori Produk -->
 <div class="modal fade" id="tambahKategoriProdukModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="tambahModalLabel">Tambah Kategori</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <!-- Formulir untuk menambahkan data baru -->
                 <!-- Contoh: -->
                 <form action="{{ route('dashboard.kategoriProduk.store') }}" method="POST">
                     @csrf
                     <div class="mb-3">
                         <label for="nama" class="form-label">Nama Kategori <span
                                 class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="nama" name="nama"
                             placeholder="Masukkan Nama Kategori Produk...">
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <!-- Modal Edit Kategori Produk -->
 <div class="modal fade" id="editKategoriProdukModal" tabindex="-1" aria-labelledby="editKategoriProdukModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editKategoriProdukModalLabel">Edit Kategori Produk</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="{{ route('dashboard.kategoriProduk.update') }}" method="POST" id="editForm">
                     @csrf
                     @method('PUT')
                     <input type="hidden" id="edit-id" name="id">
                     <div class="mb-3">
                         <label for="edit-nama" class="form-label">Nama Kategori</label>
                         <input type="text" class="form-control" id="edit-nama" name="nama">
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </form>
             </div>
         </div>
     </div>
 </div>

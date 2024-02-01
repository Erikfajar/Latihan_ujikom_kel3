<!-- Modal effects -->
<div class="modal  fade" id="modaldemo8">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Form Input Data Buku</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mg-b-20">Silahkan isi form di bawah ini dengan lengkap.</p>
                <!-- message info -->
                {{-- @include('_component.message') --}}
                <div class="pd-10 pd-sm-20 bg-gray-100">
                    <form action="{{ route('data_buku.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Judul <span
                                                        class="tx-danger">*</span></label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <input class="form-control" placeholder="Masukan Judul BUku"
                                                    type="text" name="judul" value="{{ old('judul') }}" required>
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Penulis <span
                                                        class="tx-danger">*</span> </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <input class="form-control" placeholder="Masukan Penulis Buku"
                                                    type="text" name="penulis" value="{{ old('penulis') }}">
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Penerbit <span
                                                        class="tx-danger">*</span> </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <input class="form-control " name='penerbit'
                                                    placeholder="Masukan Penerbit Buku" type="text"
                                                    value="{{ old('penerbit') }}">
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Tahun Terbit </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <input class="form-control numberonly" name='tahun_terbit'
                                                    placeholder="Masukan Tahun terbit Contoh (2020)" type="number"
                                                    maxlength="4" step="1" value="{{ old('tahun_terbit') }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="submit"><i class='fa fa-save'></i> Simpan</button>
                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button"> <i
                        class='fa fa-chevron-left'></i> Kembali</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal effects-->

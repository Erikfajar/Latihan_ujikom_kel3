<!-- Modal effects -->
<div class="modal  fade" id="modaldemo2">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">From Update Data Peminjaman </h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mg-b-20">Silahkan isi form di bawah ini dengan lengkap.</p>
                <!-- message info -->
                {{-- @include('_component.message') --}}
                <div class="pd-10 pd-sm-20 bg-gray-100">
                    <form action="{{ route('peminjaman.store') }}" method="post">
                        @csrf
                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Judul/Nama Buku </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <select class="form-control select2" name="buku_id" id="">
                                                    {{-- <option value="{{ $dt->buku->id }}">{{ $dt->buku->judul }}</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Tanggal Peminjaman </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <input class="form-control " name='TanggalPeminjaman' placeholder="haha" type="date"  value="{{old('TanggalPeminjaman')}}">
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Tanggal Pengembalian </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <input class="form-control " name='TanggalPengembalian' placeholder="" type="date"  value="{{old('TanggalPengembalian')}}">
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Status Peminjaman </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <input class="form-control" placeholder="" type="text" name="StatusPeminjaman" value="{{old('StatusPeminjaman')}}">
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
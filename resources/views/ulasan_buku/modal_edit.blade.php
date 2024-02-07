<!-- Modal effects -->
<div class="modal  fade" id="modaldemo8{{ $dt->id }}">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Form Update Data Ulasan BUku</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="mg-b-20">Silahkan isi form di bawah ini dengan lengkap.</p>
                <!-- message info -->
                {{-- @include('_component.message') --}}
                <div class="pd-10 pd-sm-20 bg-gray-100">
                    <form action="{{ route('ulasan_buku.store') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Buku <span class="tx-danger">*</span></label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <select class="SlectBox form-control " name="buku_id" id="" >
                                                    <option  value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Rating buku </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                                <select class="SlectBox form-control " name="rating" id="" >
                                                    <option value="" disabled selected>Pilih Rating dari 1 sampai 10</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row row-xs align-items-center mg-b-20">
                                            <div class="col-md-3">
                                                <label class="form-label mg-b-0">Ulasan Buku </label>
                                            </div>
                                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                               <textarea class="form-control " placeholder="Masukan Ulasan Buku" name="ulasan" id="" cols="30" rows="10">{{old('ulasan_buku')}}</textarea>
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

@extends('layouts.user')

@section('page_title', 'Edit Tema')

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<form action="post" class="form-material m-t-40">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card card-outline-esrive">
                <div class="card-header">
                  <h4 class="m-b-0 text-white">Tampilan</h4>
                </div>
                <div class="card-body">
                  <div class="row justify-content-center">
              			<div class="col-md-6">
              				<div class="web-preview">
              					<div class="display">
              						<img src="{{ asset('storage/img/user/web-preview.png') }}" alt="">
              					</div>
              				</div>
              			</div>
                  </div>

                  <div class="row" style="margin-top:20px">
                    <div class="col-12 text-center">
                      <button class="btn btn-info" type="button" name="button">Edit Tampilan</button>
                    </div>
                  </div>

                  <div class="row justify-content-center" style="margin-top:20px">
                    <div class="col-md-6 text-center">
                      <label>URL Undangan</label>
                      <div class="esrive-input-group">
                        <div class="esrive-input-group-prepend">
                          <span class="esrive-input-group-text">http://www.esrive.id/</span>
                        </div>
                        <div class="form-group m-b-40">
                          <input type="text" class="form-control" id="wedding_url" aria-describedby="basic-addon3">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card card-outline-esrive">
                <div class="card-header">
                  <h4 class="m-b-0 text-white">Profil Pengantin</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card-title">
                        Pengantin Pria
                      </div>
                      <div class="form-group m-b 40">
                        <label for="groom_full">Nama Lengkap</label>
                        <input type="text" class="form-control" id="groom_full">
                      </div>
                      <div class="form-group m-b 40">
                        <label for="groom_nick">Nama Panggilan</label>
                        <input type="text" class="form-control" id="groom_nick">
                      </div>
                      <div class="form-group m-b-5">
                        <label for="groom_profile">Profil Pengantin Pria</label>
                        <textarea class="form-control" rows="3" id="groom_profile"></textarea>
                        <span class="help-block text-muted">
                          <small>min. 30 karakter</small>
                        </span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="card-title">
                        Pengantin Wanita
                      </div>
                      <div class="form-group m-b 40">
                        <label for="bride_full">Nama Lengkap</label>
                        <input type="text" class="form-control" id="bride_full">
                      </div>
                      <div class="form-group m-b 40">
                        <label for="bride_nick">Nama Panggilan</label>
                        <input type="text" class="form-control" id="bride_nick">
                      </div>
                      <div class="form-group m-b-5">
                        <label for="bride_profile">Profil Pengantin Wanita</label>
                        <textarea class="form-control" rows="3" id="bride_profile"></textarea>
                        <span class="help-block text-muted">
                          <small>min. 30 karakter</small>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card card-outline-esrive">
                <div class="card-header">
                  <h4 class="m-b-0 text-white">Upacara Pernikahan</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="wedding_cer">Tipe Upacara Pernikahan</label>
                    <select name="" id="wedding_cer" class="form-control">
                      <option value="">Akad Nikah</option>
                      <option value="">Pemberkatan Pernikahan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="wedding_cer_date">Tanggal</label>
                    <input type="text" class="form-control" id="wedding_cer_date">
                  </div>
                  <label>Waktu</label>
                  <div class="input-daterange input-group" id="date-range">
                      <input type="text" class="form-control" name="wedding_cer_begin" id="wedding_cer_begin">
                      <div class="input-group-append">
                          <span class="input-group-text bg-info b-0 text-white">sampai</span>
                      </div>
                      <input type="text" class="form-control" name="wedding_cer_end" id="wedding_cer_end">
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card card-outline-esrive">
                <div class="card-header">
                  <h4 class="m-b-0 text-white">Resepsi Pernikahan</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="wedding_rec">Tipe Resepsi Pernikahan</label>
                    <select name="" id="wedding_rec" class="form-control">
                      <option value="">Resepsi Pernikahan</option>
                      <option value="">Pesta Pernikahan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="wedding_rec_date">Tanggal</label>
                    <input type="text" class="form-control" id="wedding_rec_date">
                  </div>
                  <label>Waktu</label>
                  <div class="input-daterange input-group" id="date-range">
                      <input type="text" class="form-control" name="wedding_rec_begin" id="wedding_rec_begin">
                      <div class="input-group-append">
                          <span class="input-group-text bg-info b-0 text-white">sampai</span>
                      </div>
                      <input type="text" class="form-control" name="wedding_rec_end" id="wedding_rec_end">
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
      <button class="btn btn-info" type="button" name="button">SIMPAN</button>
    </div>
</form>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection

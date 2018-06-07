@extends('layouts.user')

@section('page_title', 'Data Undangan')

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-outline-esrive">
            <div class="card-header">
              <h4 class="m-b-0 text-white">URL Undangan</h4>
            </div>
            <div class="card-body">

              <div class="row" style="margin-top:20px">
                <div class="col-12">
                  <form action="{{ $user->type == 2 ? route('user.saveurl') : "#" }}" method="POST" class="form-material">
                    @csrf
                    <div class="esrive-input-group">
                      <div class="esrive-input-group-prepend">
                        <span class="esrive-input-group-text bg-theme b-0 text-white">http://www.esrive.id/</span>
                      </div>
                      <div class="form-group{{ $errors->has('wedding_url') ? ' has-error' : '' }} m-b-40">
                        <input type="text" class="form-control" id="wedding_url" aria-describedby="basic-addon3" name="wedding_url" value="{{ isset($wedding->wedding_url) ? $wedding->wedding_url : "" }}" required disabled>

                        @if ($errors->has('wedding_url'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('wedding_url') }}</strong>
                            </span>
                        @endif

                      </div>
                    </div>
                    @if ($user->type == 1)
                      <div>
                        <span class="help-block text-danger float-right">
                          <small>Upgrade ke PREMIUM untuk mengganti URL undangan</small>
                        </span>
                      </div>
                    @else
                      <div>
                        <span class="help-block text-muted float-right">
                         <small>url undangan anda</small>
                       </span>
                      </div>
                    @endif
                    @if ($user->type == 2)
                      <div class="m-t-20">
                        <button id="editUrl" class="btn btn-sm btn-outline-info" type="button">Edit URL</button>
                        <button id="cancelUrl" class="btn btn-sm btn-danger" type="button">Cancel</button>
                        <button id="simpanUrl" class="btn btn-sm btn-success" type="submit">Simpan URL</button>
                      </div>
                    @endif
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<div id="dataUndangan">
  <div class="m-t-10 row text-center">
    <div class="col-12">
      <button id="editButton1" class="btn btn-outline-info" type="button">Edit Undangan</button>
    </div>
  </div>
  <div class="row m-t-20">
      <div class="col-12 col-md-6">
          <div class="card card-outline-esrive">
              <div class="card-header">
                <h4 class="m-b-0 text-white">Pengantin Pria</h4>
              </div>
              <div class="card-body">
                <div class="text-center m-b-40">
        					<div class="profile-picture">
        						<upload-groom :user="{{ $user }}" :wedding="{{ $wedding }}"></upload-groom>
        					</div>
        				</div>
                  <small class="text-muted">Nama Lengkap</small>
                  <h6 class="m-t-5">{{ $wedding->groom_full }}</h6>
                  <hr>
                  <small class="text-muted">Nama Panggilan</small>
                  <h6 class="m-t-5">{{ $wedding->groom_nick }}</h6>
                  <hr>
                  <small class="text-muted">Profil</small>
                  <h6 class="m-t-5">{{ $wedding->groom_profile }}</h6>
                  <hr>
              </div>
          </div>
      </div>
      <div class="col-12 col-md-6">
          <div class="card card-outline-esrive">
              <div class="card-header">
                <h4 class="m-b-0 text-white">Pengantin Wanita</h4>
              </div>
              <div class="card-body">
                <div class="text-center m-b-40">
        					<div class="profile-picture">
        						<upload-bride :user="{{ $user }}" :wedding="{{ $wedding }}"></upload-bride>
        					</div>
        				</div>
                <small class="text-muted">Nama Lengkap</small>
                <h6 class="m-t-5">{{ $wedding->bride_full }}</h6>
                <hr>
                <small class="text-muted">Nama Panggilan</small>
                <h6 class="m-t-5">{{ $wedding->bride_nick }}</h6>
                <hr>
                <small class="text-muted">Profil</small>
                <h6 class="m-t-5">{{ $wedding->bride_profile }}</h6>
                <hr>
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
                <small class="text-muted">Tipe</small>
                <h6 class="m-t-5">{{ $wedding->wedding_cer }}</h6>
                <hr>
                <small class="text-muted">Hari/Tanggal</small>
                <h6 class="m-t-5">{{ $hari[date('w' ,strtotime($wedding->wedding_cer_date))] . ", " . date('j' ,strtotime($wedding->wedding_cer_date)) . " " . $bulan[date('n' ,strtotime($wedding->wedding_cer_date))] . " " . date('Y' ,strtotime($wedding->wedding_cer_date)) }}</h6>
                <hr>
                <small class="text-muted">Waktu</small>
                <h6 class="m-t-5">{{ date('H:i' ,strtotime($wedding->wedding_cer_begin)) }} - {{ date('H:i' ,strtotime($wedding->wedding_cer_end)) }}</h6>
                <hr>
                <small class="text-muted">Nama tempat</small>
                <h6 class="m-t-5">{{ $wedding->wedding_cer_place }}</h6>
                <hr>
                <small class="text-muted">Alamat</small>
                <h6 class="m-t-5">{{ $wedding->wedding_cer_address }}</h6>
                <hr>
                <div id="viewAkad" style="width: 100%; height: 300px; margin-top: 5px;"></div>
                <input type="text" id="cerLat" name="wedding_cer_lat"  value="{{ isset($wedding->wedding_cer_lat) ? $wedding->wedding_cer_lat : "" }}" style="display:none">
                <input type="text" id="cerLong" name="wedding_cer_long"  value="{{ isset($wedding->wedding_cer_long) ? $wedding->wedding_cer_long : "" }}" style="display:none">
              </div>
          </div>
      </div>
      <div class="col-12 col-md-6">
          <div class="card card-outline-esrive">
              <div class="card-header">
                <h4 class="m-b-0 text-white">Resepsi Pernikahan</h4>
              </div>
              <div class="card-body">
                <small class="text-muted">Tipe</small>
                <h6 class="m-t-5">{{ $wedding->wedding_rec }}</h6>
                <hr>
                <small class="text-muted">Hari/Tanggal</small>
                <h6 class="m-t-5">{{ $hari[date('w' ,strtotime($wedding->wedding_rec_date))] . ", " . date('j' ,strtotime($wedding->wedding_rec_date)) . " " . $bulan[date('n' ,strtotime($wedding->wedding_rec_date))] . " " . date('Y' ,strtotime($wedding->wedding_rec_date)) }}</h6>
                <hr>
                <small class="text-muted">Waktu</small>
                <h6 class="m-t-5">{{ date('H:i' ,strtotime($wedding->wedding_rec_begin)) }} - {{ date('H:i' ,strtotime($wedding->wedding_rec_end)) }}</h6>
                <hr>
                <small class="text-muted">Nama tempat</small>
                <h6 class="m-t-5">{{ $wedding->wedding_rec_place }}</h6>
                <hr>
                <small class="text-muted">Alamat</small>
                <h6 class="m-t-5">{{ $wedding->wedding_rec_address }}</h6>
                <hr>
                <div id="viewResepsi" style="width: 100%; height: 300px; margin-top: 5px;"></div>
                <input class="form-control" type="text" name="wedding_rec_lat" id="recLat"  value="{{ isset($wedding->wedding_rec_lat) ? $wedding->wedding_rec_lat : "" }}" style="display:none">
            		<input class="form-control" type="text" name="wedding_rec_long" id="recLong"  value="{{ isset($wedding->wedding_rec_long) ? $wedding->wedding_rec_long : "" }}" style="display:none">

              </div>

          </div>
      </div>
  </div>

  <div class="m-b-20 row text-center">
    <div class="col-12">
      <button id="editButton2" class="btn btn-outline-info" type="button">Edit Undangan</button>
    </div>
  </div>
</div>


{{-- EDIT FORM --}}
<div id="formUndangan">

  <form action="{{ route('user.editdata') }}" method="POST" class="form-material m-t-10" enctype="multipart/form-data">
    @csrf
      <div class="text-center m-b-20">
        <button id="cancelEdit1" class="btn btn-danger" type="button">CANCEL</button>
        <button class="btn btn-success" type="submit">SIMPAN</button>
      </div>
      <div class="row">
          <div class="col-12 col-md-6">
              <div class="card card-outline-warning">
                  <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit Pengantin Pria</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group{{ $errors->has('groom_full') ? ' has-error' : '' }} m-b 40">
                      <label for="groom_full">Nama Lengkap</label>
                      <input type="text" class="form-control" id="groom_full" name="groom_full" value="{{ isset($wedding->groom_full) ? $wedding->groom_full : "" }}" required>
                      @if ($errors->has('groom_full'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('groom_full') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group{{ $errors->has('groom_nick') ? ' has-error' : '' }} m-b 40">
                      <label for="groom_nick">Nama Panggilan</label>
                      <input type="text" class="form-control" id="groom_nick" name="groom_nick" value="{{ isset($wedding->groom_nick) ? $wedding->groom_nick : "" }}" required>
                      @if ($errors->has('groom_nick'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('groom_nick') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group{{ $errors->has('groom_profile') ? ' has-error' : '' }} m-b-5">
                      <label for="groom_profile">Profil Pengantin Pria</label>
                      <textarea class="form-control" rows="3" id="groom_profile" name="groom_profile" required>{{ isset($wedding->groom_profile) ? $wedding->groom_profile : "" }}</textarea>
                      <span class="help-block text-muted pull-left" id="groom_text"></span>
                      <span class="help-block text-muted pull-right">
                        <small>max. 500 karakter</small>
                        <br>
                        @if ($errors->has('groom_profile'))
                          <span class="help-block text-danger">
                            <strong class="text-danger">{{ $errors->first('groom_profile') }}</strong>
                          </span>
                        @endif
                      </span>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-6">
              <div class="card card-outline-warning">
                  <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit Pengantin Wanita</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group{{ $errors->has('bride_full') ? ' has-error' : '' }} m-b 40">
                      <label for="bride_full">Nama Lengkap</label>
                      <input type="text" class="form-control" id="bride_full" name="bride_full" value="{{ isset($wedding->bride_full) ? $wedding->bride_full : "" }}" required>
                      @if ($errors->has('bride_full'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('bride_full') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group{{ $errors->has('bride_nick') ? ' has-error' : '' }} m-b 40">
                      <label for="bride_nick">Nama Panggilan</label>
                      <input type="text" class="form-control" id="bride_nick" name="bride_nick" value="{{ isset($wedding->bride_nick) ? $wedding->bride_nick : "" }}" required>
                      @if ($errors->has('bride_nick'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('bride_nick') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group{{ $errors->has('bride_profile') ? ' has-error' : '' }} m-b-5">
                      <label for="bride_profile">Profil Pengantin Wanita</label>
                      <textarea class="form-control" rows="3" id="bride_profile" name="bride_profile" required>{{ isset($wedding->bride_profile) ? $wedding->bride_profile : "" }}</textarea>
                      <span class="help-block text-muted pull-left" id="bride_text"></span>
                      <span class="help-block text-muted pull-right">
                        <small>max. 500 karakter</small>
                        <br>
                        @if ($errors->has('bride_profile'))
                          <span class="help-block text-danger">
                            <strong class="text-danger">{{ $errors->first('bride_profile') }}</strong>
                          </span>
                        @endif
                      </span>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-12 col-md-6">
              <div class="card card-outline-warning">
                  <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit Upacara Pernikahan</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group{{ $errors->has('wedding_cer') ? ' has-error' : '' }}">
                      <label for="wedding_cer">Tipe Upacara Pernikahan</label>
                      <select name="wedding_cer" id="wedding_cer" class="form-control" required>
                        <option value="Akad Nikah" {{ $wedding->wedding_cer == "Akad Nikah" ? "selected" : "" }}>Akad Nikah</option>
                        <option value="Pemberkatan Pernikahan" {{ $wedding->wedding_cer == "Pemberkatan Pernikahan" ? "selected" : "" }}>Pemberkatan Pernikahan</option>
                        <option value="Upacara Pernikahan" {{ $wedding->wedding_cer == "Upacara Pernikahan" ? "selected" : "" }}>Upacara Pernikahan</option>
                        <option value="Prosesi Pernikahan" {{ $wedding->wedding_cer == "Prosesi Pernikahan" ? "selected" : "" }}>Prosesi Pernikahan</option>
                      </select>
                      @if ($errors->has('wedding_cer'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_cer') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group{{ $errors->has('wedding_cer_date') ? ' has-error' : '' }}">
                      <label for="wedding_cer_date">Tanggal</label>
                      <input type="text" class="form-control" id="wedding_cer_date" name="wedding_cer_date" value="{{ isset($wedding->wedding_cer_date) ? $wedding->wedding_cer_date : "" }}" required>
                      @if ($errors->has('wedding_cer_date'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_cer_date') }}</strong>
                          </span>
                      @endif
                    </div>
                    <label>Waktu</label>
                    <div class="input-daterange input-group m-b-20" id="date-range">
                        <input type="text" class="form-control" name="wedding_cer_begin" id="wedding_cer_begin" value="{{ isset($wedding->wedding_cer_begin) ? $wedding->wedding_cer_begin : "" }}" required>
                        @if ($errors->has('wedding_cer_begin'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('wedding_cer_begin') }}</strong>
                            </span>
                        @endif
                        <div class="input-group-append">
                            <span class="input-group-text bg-inverse b-0 text-white">sampai</span>
                        </div>
                        <input type="text" class="form-control" name="wedding_cer_end" id="wedding_cer_end" value="{{ isset($wedding->wedding_cer_end) ? $wedding->wedding_cer_end : "" }}" required>
                        @if ($errors->has('wedding_cer_end'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('wedding_cer_end') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('wedding_cer_place') ? ' has-error' : '' }} m-b 40">
                      <label for="wedding_cer_place">Nama Tempat</label>
                      <input type="text" class="form-control" id="wedding_cer_place" name="wedding_cer_place" value="{{ isset($wedding->wedding_cer_place) ? $wedding->wedding_cer_place : "" }}" required>
                      @if ($errors->has('wedding_cer_place'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_cer_place') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group{{ $errors->has('wedding_cer_address') ? ' has-error' : '' }} m-b 20">
                      <label for="wedding_cer_address">Alamat</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="wedding_cer_address" name="wedding_cer_address" value="{{ isset($wedding->wedding_cer_address) ? $wedding->wedding_cer_address : "" }}" required>
                        <span class="input-group-btn" style="cursor: pointer;">
            							<input class="btn btn-sm btn-info" type="button" id="cariAkad" value="cari di peta">
            						</span>
                      </div>
                      <span class="help-block text-muted"><small>contoh: Jalan Siliwangi no. 10, Bandung</small></span>
                      @if ($errors->has('wedding_cer_address'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_cer_address') }}</strong>
                          </span>
                      @endif

                      <div id="map_akad" style="width: 100%; height: 300px; margin-top: 5px;"></div>
            					<span class="help-block text-muted"><small>Geser <b>marker <i class="fa fa-map-marker red" aria-hidden="true"></i></b> untuk memperoleh koordinat yang benar</small></span>

                      <input class="form-control" type="text" name="wedding_cer_lat" id="wedding_cer_lat"  value="{{ isset($wedding->wedding_cer_lat) ? $wedding->wedding_cer_lat : "" }}" style="display:none">
                  		<input class="form-control" type="text" name="wedding_cer_long" id="wedding_cer_long"  value="{{ isset($wedding->wedding_cer_long) ? $wedding->wedding_cer_long : "" }}" style="display:none">

                    </div>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-6">
              <div class="card card-outline-warning">
                  <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit Resepsi Pernikahan</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group{{ $errors->has('wedding_rec') ? ' has-error' : '' }}">
                      <label for="wedding_rec">Tipe Resepsi Pernikahan</label>
                      <select name="wedding_rec" id="wedding_rec" class="form-control" required>
                        <option value="Resepsi Pernikahan" {{ $wedding->wedding_rec == "Resepsi Pernikahan" ? "selected" : "" }}>Resepsi Pernikahan</option>
                        <option value="Pesta Pernikahan" {{ $wedding->wedding_rec == "Pesta Pernikahan" ? "selected" : "" }}>Pesta Pernikahan</option>
                        <option value="Syukuran Pernikahan" {{ $wedding->wedding_rec == "Syukuran Pernikahan" ? "selected" : "" }}>Syukuran Pernikahan</option>
                      </select>
                      @if ($errors->has('wedding_rec'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_rec') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group{{ $errors->has('wedding_rec_date') ? ' has-error' : '' }}">
                      <label for="wedding_rec_date">Tanggal</label>
                      <input type="text" class="form-control" id="wedding_rec_date" name="wedding_rec_date" id="wedding_rec_date" value="{{ isset($wedding->wedding_rec_date) ? $wedding->wedding_rec_date : "" }}" required>
                      @if ($errors->has('wedding_rec_date'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_rec_date') }}</strong>
                          </span>
                      @endif
                    </div>
                    <label>Waktu</label>
                    <div class="input-daterange input-group m-b-20" id="date-range">
                        <input type="text" class="form-control" id="wedding_rec_begin" name="wedding_rec_begin" value="{{ isset($wedding->wedding_rec_begin) ? $wedding->wedding_rec_begin : "" }}" required>
                        @if ($errors->has('wedding_rec_begin'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('wedding_rec_begin') }}</strong>
                            </span>
                        @endif
                        <div class="input-group-append">
                            <span class="input-group-text bg-inverse b-0 text-white">sampai</span>
                        </div>
                        <input type="text" class="form-control" id="wedding_rec_end" name="wedding_rec_end" value="{{ isset($wedding->wedding_rec_end) ? $wedding->wedding_rec_end : "" }}" required>
                        @if ($errors->has('wedding_rec_end'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('wedding_rec_end') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('wedding_rec_place') ? ' has-error' : '' }} m-b 40">
                      <label for="wedding_rec_place">Nama Tempat</label>
                      <input type="text" class="form-control" id="wedding_rec_place" name="wedding_rec_place" value="{{ isset($wedding->wedding_rec_place) ? $wedding->wedding_rec_place : "" }}" required>
                      @if ($errors->has('wedding_rec_place'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_rec_place') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group{{ $errors->has('wedding_rec_address') ? ' has-error' : '' }} m-b 20">
                      <label for="wedding_rec_address">Alamat</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="wedding_rec_address" name="wedding_rec_address" value="{{ isset($wedding->wedding_rec_address) ? $wedding->wedding_rec_address : "" }}" required>
                        <span class="input-group-btn" style="cursor: pointer;">
            							<input class="btn btn-sm btn-info" type="button" id="cariResepsi" value="cari di peta">
            						</span>
                      </div>
                      <span class="help-block text-muted"><small>contoh: Jalan Siliwangi no. 10, Bandung</small></span>
                      @if ($errors->has('wedding_rec_address'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_rec_address') }}</strong>
                          </span>
                      @endif

                      <div id="map_resepsi" style="width: 100%; height: 300px; margin-top: 5px;"></div>
            					<span class="help-block text-muted"><small>Geser <b>marker <i class="fa fa-map-marker red" aria-hidden="true"></i></b> untuk memperoleh koordinat yang benar</small></span>

                      <input class="form-control" type="text" name="wedding_rec_lat" id="wedding_rec_lat"  value="{{ isset($wedding->wedding_rec_lat) ? $wedding->wedding_rec_lat : "" }}" style="display:none">
                  		<input class="form-control" type="text" name="wedding_rec_long" id="wedding_rec_long"  value="{{ isset($wedding->wedding_rec_long) ? $wedding->wedding_rec_long : "" }}" style="display:none">

                    </div>

                  </div>
              </div>
          </div>
      </div>

      <div class="text-center">
        <button id="cancelEdit2" class="btn btn-danger" type="button">CANCEL</button>
        <button class="btn btn-success" type="submit">SIMPAN</button>
      </div>
  </form>

</div>



<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection

@section('scripts')

<script src="{{ asset('user/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('user/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('user/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('user/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('user/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('user/plugins/cropper-master/dist/cropper.min.js') }}"></script>

<script type="text/javascript">
  $(function() {
    $('#wedding_cer_date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
    $('#wedding_cer_begin').bootstrapMaterialDatePicker({ date: false, format: 'HH:mm' });
    $('#wedding_cer_end').bootstrapMaterialDatePicker({ date: false, format: 'HH:mm' });

    $('#wedding_rec_date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
    $('#wedding_rec_begin').bootstrapMaterialDatePicker({ date: false, format: 'HH:mm' });
    $('#wedding_rec_end').bootstrapMaterialDatePicker({ date: false, format: 'HH:mm' });

    $('#editUrl').on('click', function() {
      $('#editUrl').css('display', 'none');
      $('#simpanUrl').fadeIn();
      $('#cancelUrl').fadeIn();
      $('#wedding_url').prop('disabled', false);
      $('#wedding_url').focus();
    });

    $('#cancelUrl').on('click', function() {
      $('#editUrl').fadeIn();
      $('#simpanUrl').css('display', 'none');
      $('#cancelUrl').css('display', 'none');
      $('#wedding_url').prop('disabled', true);
    });

    $('#editButton1').on('click', function() {
      $('#dataUndangan').slideUp();
      $('#formUndangan').fadeIn();
    });

    $('#editButton2').on('click', function() {
      $('#dataUndangan').slideUp();
      $('#formUndangan').fadeIn();
    });

    $('#cancelEdit1').on('click', function() {
      $('#dataUndangan').slideDown();
      $('#formUndangan').fadeOut();
    });

    $('#cancelEdit2').on('click', function() {
      $('#dataUndangan').slideDown();
      $('#formUndangan').fadeOut();
    });

    var text_max = 500;

  	$('#groom_profile').keyup(function() {
  		var text_length = $('#groom_profile').val().length;
  		var text_remaining = text_max - text_length;

  		$('#groom_text').html(text_remaining + ' karakter lagi');
  	});

  	var text_max1 = 500;

  	$('#bride_profile').keyup(function() {
  		var text_length1 = $('#bride_profile').val().length;
  		var text_remaining1 = text_max1 - text_length1;

  		$('#bride_text').html(text_remaining1 + ' karakter lagi');
  	});


  });
</script>

<script>
  function initMap() {
    var viewCerLat = Number(document.getElementById('cerLat').value);
    var viewCerLong = Number(document.getElementById('cerLong').value);
    var cerLatLong = {lat: viewCerLat, lng: viewCerLong};
    var viewRecLat = Number(document.getElementById('recLat').value);
    var viewRecLong = Number(document.getElementById('recLong').value);
    var recLatLong = {lat: viewRecLat, lng: viewRecLong};
    var cerLat = Number(document.getElementById('wedding_cer_lat').value);
    var cerLong = Number(document.getElementById('wedding_cer_long').value);
    var myCerLatLong = {lat: cerLat, lng: cerLong};
    var lat = Number(document.getElementById('wedding_rec_lat').value);
    var long = Number(document.getElementById('wedding_rec_long').value);
    var myLatLong = {lat: lat, lng: long};
    var viewCer = new google.maps.Map(document.getElementById('viewAkad'), {
      zoom: 16,
      center: cerLatLong
    });
    var viewCerMarker = new google.maps.Marker({
      position: cerLatLong,
      map: viewCer,
      draggable: false
    });
    var viewRec = new google.maps.Map(document.getElementById('viewResepsi'), {
      zoom: 16,
      center: recLatLong
    });
    var viewCerMarker = new google.maps.Marker({
      position: recLatLong,
      map: viewRec,
      draggable: false
    });
    var cerMap = new google.maps.Map(document.getElementById('map_akad'), {
      zoom: 16,
      center: myCerLatLong
    });
    var cerMarker = new google.maps.Marker({
      position: myCerLatLong,
      map: cerMap,
      draggable: true
    });
    var recMap = new google.maps.Map(document.getElementById('map_resepsi'), {
      zoom: 16,
      center: myLatLong
    });
    var recMarker = new google.maps.Marker({
      position: myLatLong,
      map: recMap,
      draggable: true
    });
    google.maps.event.addListener(cerMarker, 'dragend', function(cerMarker) {
      var getlatLng = marker.latLng;
      console.log(getlatLng.lat());
      console.log(getlatLng.lng());
      $('#wedding_cer_lat').attr({
        value: getlatLng.lat()
      });
      $('#wedding_cer_long').attr({
        value: getlatLng.lng()
      });
    });
    google.maps.event.addListener(recMarker, 'dragend', function(recMarker) {
      var getlatLng = marker.latLng;
      console.log(getlatLng.lat());
      console.log(getlatLng.lng());
      $('#wedding_rec_lat').attr({
        value: getlatLng.lat()
      });
      $('#wedding_rec_long').attr({
        value: getlatLng.lng()
      });
    });

    var geocoder = new google.maps.Geocoder();

    document.getElementById('cariAkad').addEventListener('click', function() {
      geocodeCerAddress(geocoder, cerMap);
    });
    document.getElementById('cariResepsi').addEventListener('click', function() {
      geocodeRecAddress(geocoder, recMap);
    });
  }

  function geocodeCerAddress(geocoder, resultsMap) {
    var address = document.getElementById('wedding_cer_address').value;
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === 'OK') {
        var latlng = results[0].geometry.location;
        resultsMap.setCenter(latlng);
        var marker = new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location,
          draggable: true,
        });
        $('#wedding_cer_lat').attr({
          value: latlng.lat()
        });
        $('#wedding_cer_long').attr({
          value: latlng.lng()
        });
        google.maps.event.addListener(marker, 'dragend', function(marker) {
          var getlatLng = marker.latLng;
          console.log(getlatLng.lat());
          console.log(getlatLng.lng());
          $('#wedding_cer_lat').attr({
            value: getlatLng.lat()
          });
          $('#wedding_cer_long').attr({
            value: getlatLng.lng()
          });
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }
  function geocodeRecAddress(geocoder, resultsMap) {
    var address = document.getElementById('wedding_rec_address').value;
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === 'OK') {
        var latlng = results[0].geometry.location;
        resultsMap.setCenter(latlng);
        var marker = new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location,
          draggable: true,
        });
        $('#wedding_rec_lat').attr({
          value: latlng.lat()
        });
        $('#wedding_rec_long').attr({
          value: latlng.lng()
        });
        google.maps.event.addListener(marker, 'dragend', function(marker) {
          var getlatLng = marker.latLng;
          console.log(getlatLng.lat());
          console.log(getlatLng.lng());
          $('#wedding_rec_lat').attr({
            value: getlatLng.lat()
          });
          $('#wedding_rec_long').attr({
            value: getlatLng.lng()
          });
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }
  </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADAyUypMMV6g56jzDBqU7pw7_YFlMBmgI&callback=initMap"></script>

@endsection

@section('hidden-div')

<div class="modal fade modal-upload" id="groomUpload" tabindex="-1" role="dialog" aria-labelledby="brideLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="brideLabel">Upload Foto Profil Pengantin Pria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <form action="{{ route('user.groompic') }}" id="groom_image"  enctype="multipart/form-data" class="formset" role="form" method="POST">
      	@csrf
      	<div class="modal-body">

      		<div class="form-group{{ $errors->has('groom_pic') ? ' has-error' : '' }}">
      			<input id="input_img_groom" type="file" name="groom_pic" style="margin-top: 10px;">

      			@if ($errors->has('groom_pic'))
      				<span class="help-block">
      					<strong>{{ $errors->first('groom_pic') }}</strong>
      				</span>
      			@endif

      			<input id="width_groom" name="width_groom" hidden>
      			<input id="height_groom" name="height_groom" hidden>
      			<input id="x_groom" name="x_groom" hidden>
      			<input id="y_groom" name="y_groom" hidden>

      		</div>

      		<div class="img-wrapper-groom">
      			<img src="" alt="">
      		</div>

      	</div>
      	<div class="modal-footer">
      		<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>
      		<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>
      	</div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade modal-upload" id="brideUpload" tabindex="-1" role="dialog" aria-labelledby="brideLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="brideLabel">Upload Foto Profil Pengantin Wanita</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="{{ route('user.bridepic') }}" id="bride_image"  enctype="multipart/form-data" class="formset" role="form" method="POST">
      	@csrf
      	<div class="modal-body">

      		<div class="form-group{{ $errors->has('bride_pic') ? ' has-error' : '' }}">
      			<input id="input_img_bride" type="file" name="bride_pic" style="margin-top: 10px;">

      			@if ($errors->has('bride_pic'))
      				<span class="help-block">
      					<strong>{{ $errors->first('bride_pic') }}</strong>
      				</span>
      			@endif

      			<input id="width_bride" name="width_bride" hidden>
      			<input id="height_bride" name="height_bride" hidden>
      			<input id="x_bride" name="x_bride" hidden>
      			<input id="y_bride" name="y_bride" hidden>

      		</div>

      		<div class="img-wrapper-bride">
      			<img src="" alt="">
      		</div>

      	</div>
      	<div class="modal-footer">
      		<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>
      		<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>
      	</div>
      </form>
    </div>
  </div>
</div>

@endsection

@extends('layouts.user')

@section('page_title', 'Edit Undangan')

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<form action="{{ $user->user_type == 1 ? route('user.editdatafree') : route('user.editdata') }}" method="POST" class="form-material m-t-40" enctype="multipart/form-data">
  @csrf
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-outline-esrive">
                <div class="card-header">
                  <h4 class="m-b-0 text-white">Ubah URL Undangan</h4>
                </div>
                <div class="card-body">

                  <div class="row" style="margin-top:20px">
                    <div class="col-12">
                      <div class="esrive-input-group">
                        <div class="esrive-input-group-prepend">
                          <span class="esrive-input-group-text bg-theme b-0 text-white">http://www.esrive.id/</span>
                        </div>
                        <div class="form-group{{ $errors->has('wedding_url') ? ' has-error' : '' }} m-b-40">
                          <input type="text" class="form-control" id="wedding_url" aria-describedby="basic-addon3" name="wedding_url" value="{{ isset($user_wedding->wedding_url) ? $user_wedding->wedding_url : "" }}" required {{ $user->user_type == 1 ? 'disabled' : '' }}>

                          @if ($errors->has('wedding_url'))
                              <span class="help-block text-danger">
                                  <strong>{{ $errors->first('wedding_url') }}</strong>
                              </span>
                          @endif

                        </div>
                      </div>
                      @if ($user->user_type == 1)
                        <span class="help-block text-danger float-right">
                          <small>Upgrade ke PRO</small>
                        </span>
                      @else
                        <span class="help-block text-muted float-right">
                         <small>url undangan anda</small>
                       </span>
                      @endif

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
                  <h4 class="m-b-0 text-white">Pengantin Pria</h4>
                </div>
                <div class="card-body">
                  <div class="text-center m-b-40">
          					<div class="profile-picture">
          						<img src="{{ asset('storage/img/user/noimg.png') }}" alt="" class="img-circle img-responsive">
          					</div>
          					<span class="help-block text-muted"><small>klik foto untuk mengganti</small></span>
          				</div>
                  <div class="form-group{{ $errors->has('groom_full') ? ' has-error' : '' }} m-b 40">
                    <label for="groom_full">Nama Lengkap</label>
                    <input type="text" class="form-control" id="groom_full" name="groom_full" value="{{ isset($user_wedding->groom_full) ? $user_wedding->groom_full : "" }}" required>
                    @if ($errors->has('groom_full'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('groom_full') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('groom_nick') ? ' has-error' : '' }} m-b 40">
                    <label for="groom_nick">Nama Panggilan</label>
                    <input type="text" class="form-control" id="groom_nick" name="groom_nick" value="{{ isset($user_wedding->groom_nick) ? $user_wedding->groom_nick : "" }}" required>
                    @if ($errors->has('groom_nick'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('groom_nick') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('groom_profile') ? ' has-error' : '' }} m-b-5">
                    <label for="groom_profile">Profil Pengantin Pria</label>
                    <textarea class="form-control" rows="3" id="groom_profile" name="groom_profile" required>{{ isset($user_wedding->groom_profile) ? $user_wedding->groom_profile : "" }}</textarea>
                    <span class="help-block text-muted">
                      <small>min. 30 karakter</small>
                      <br>
                      @if ($errors->has('groom_profile'))
                        <strong class="text-danger">{{ $errors->first('groom_profile') }}</strong>
                      @endif
                    </span>
                  </div>
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
          						<img src="{{ asset('storage/img/user/noimg.png') }}" alt="" class="img-circle img-responsive">
          					</div>
          					<span class="help-block text-muted"><small>klik foto untuk mengganti</small></span>
          				</div>
                  <div class="form-group{{ $errors->has('bride_full') ? ' has-error' : '' }} m-b 40">
                    <label for="bride_full">Nama Lengkap</label>
                    <input type="text" class="form-control" id="bride_full" name="bride_full" value="{{ isset($user_wedding->bride_full) ? $user_wedding->bride_full : "" }}" required>
                    @if ($errors->has('bride_full'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('bride_full') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('bride_nick') ? ' has-error' : '' }} m-b 40">
                    <label for="bride_nick">Nama Panggilan</label>
                    <input type="text" class="form-control" id="bride_nick" name="bride_nick" value="{{ isset($user_wedding->bride_nick) ? $user_wedding->bride_nick : "" }}" required>
                    @if ($errors->has('bride_nick'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('bride_nick') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('bride_profile') ? ' has-error' : '' }} m-b-5">
                    <label for="bride_profile">Profil Pengantin Wanita</label>
                    <textarea class="form-control" rows="3" id="bride_profile" name="bride_profile" required>{{ isset($user_wedding->bride_profile) ? $user_wedding->bride_profile : "" }}</textarea>
                    <span class="help-block text-muted">
                      <small>min. 30 karakter</small>
                      <br>
                      @if ($errors->has('bride_profile'))
                        <strong class="text-danger">{{ $errors->first('bride_profile') }}</strong>
                      @endif
                    </span>
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
                  <div class="form-group{{ $errors->has('wedding_cer') ? ' has-error' : '' }}">
                    <label for="wedding_cer">Tipe Upacara Pernikahan</label>
                    <select name="wedding_cer" id="wedding_cer" class="form-control" required>
                      <option value="Akad Nikah" {{ $user_wedding->wedding_cer == "Akad Nikah" ? "selected" : "" }}>Akad Nikah</option>
                      <option value="Pemberkatan Pernikahan" {{ $user_wedding->wedding_cer == "Pemberkatan Pernikahan" ? "selected" : "" }}>Pemberkatan Pernikahan</option>
                      <option value="Upacara Pernikahan" {{ $user_wedding->wedding_cer == "Upacara Pernikahan" ? "selected" : "" }}>Upacara Pernikahan</option>
                      <option value="Prosesi Pernikahan" {{ $user_wedding->wedding_cer == "Prosesi Pernikahan" ? "selected" : "" }}>Prosesi Pernikahan</option>
                    </select>
                    @if ($errors->has('wedding_cer'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('wedding_cer') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('wedding_cer_date') ? ' has-error' : '' }}">
                    <label for="wedding_cer_date">Tanggal</label>
                    <input type="text" class="form-control" id="wedding_cer_date" name="wedding_cer_date" value="{{ isset($user_wedding->wedding_cer_date) ? $user_wedding->wedding_cer_date : "" }}" required>
                    @if ($errors->has('wedding_cer_date'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('wedding_cer_date') }}</strong>
                        </span>
                    @endif
                  </div>
                  <label>Waktu</label>
                  <div class="input-daterange input-group m-b-20" id="date-range">
                      <input type="text" class="form-control" name="wedding_cer_begin" id="wedding_cer_begin" value="{{ isset($user_wedding->wedding_cer_begin) ? $user_wedding->wedding_cer_begin : "" }}" required>
                      @if ($errors->has('wedding_cer_begin'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_cer_begin') }}</strong>
                          </span>
                      @endif
                      <div class="input-group-append">
                          <span class="input-group-text bg-inverse b-0 text-white">sampai</span>
                      </div>
                      <input type="text" class="form-control" name="wedding_cer_end" id="wedding_cer_end" value="{{ isset($user_wedding->wedding_cer_end) ? $user_wedding->wedding_cer_end : "" }}" required>
                      @if ($errors->has('wedding_cer_end'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_cer_end') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="form-group{{ $errors->has('wedding_cer_place') ? ' has-error' : '' }} m-b 40">
                    <label for="wedding_cer_place">Nama Tempat</label>
                    <input type="text" class="form-control" id="wedding_cer_place" name="wedding_cer_place" value="{{ isset($user_wedding->wedding_cer_place) ? $user_wedding->wedding_cer_place : "" }}" required>
                    @if ($errors->has('wedding_cer_place'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('wedding_cer_place') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('wedding_cer_address') ? ' has-error' : '' }} m-b 20">
                    <label for="wedding_cer_address">Alamat</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="wedding_cer_address" name="wedding_cer_address" value="{{ isset($user_wedding->wedding_cer_address) ? $user_wedding->wedding_cer_address : "" }}" required>
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
          					@if ($errors->has('wedding_cer_lat'))
          						<span class="help-block">
          							<strong>{{ $errors->first('wedding_cer_lat') }}</strong>
          						</span>
          					@endif
          					@if ($errors->has('wedding_cer_long'))
          						<span class="help-block">
          							<strong>{{ $errors->first('wedding_cer_long') }}</strong>
          						</span>
          					@endif
          					<span class="help-block text-muted"><small>Geser <b>marker <i class="fa fa-map-marker red" aria-hidden="true"></i></b> untuk memperoleh koordinat yang benar</small></span>
          					@if ($errors->has('wedding_cer_address'))
          						<span class="help-block">
          							<strong>{{ $errors->first('wedding_cer_address') }}</strong>
          						</span>
          					@endif

                    <input class="form-control" type="text" name="wedding_cer_lat" id="wedding_cer_lat"  value="{{ isset($user_wedding->wedding_cer_lat) ? $user_wedding->wedding_cer_lat : "" }}" style="display:none">
                		<input class="form-control" type="text" name="wedding_cer_long" id="wedding_cer_long"  value="{{ isset($user_wedding->wedding_cer_long) ? $user_wedding->wedding_cer_long : "" }}" style="display:none">

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
                  <div class="form-group{{ $errors->has('wedding_rec') ? ' has-error' : '' }}">
                    <label for="wedding_rec">Tipe Resepsi Pernikahan</label>
                    <select name="wedding_rec" id="wedding_rec" class="form-control" required>
                      <option value="Resepsi Pernikahan" {{ $user_wedding->wedding_rec == "Resepsi Pernikahan" ? "selected" : "" }}>Resepsi Pernikahan</option>
                      <option value="Pesta Pernikahan" {{ $user_wedding->wedding_rec == "Pesta Pernikahan" ? "selected" : "" }}>Pesta Pernikahan</option>
                      <option value="Syukuran Pernikahan" {{ $user_wedding->wedding_rec == "Syukuran Pernikahan" ? "selected" : "" }}>Syukuran Pernikahan</option>
                    </select>
                    @if ($errors->has('wedding_rec'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('wedding_rec') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('wedding_rec_date') ? ' has-error' : '' }}">
                    <label for="wedding_rec_date">Tanggal</label>
                    <input type="text" class="form-control" id="wedding_rec_date" name="wedding_rec_date" id="wedding_rec_date" value="{{ isset($user_wedding->wedding_rec_date) ? $user_wedding->wedding_rec_date : "" }}" required>
                    @if ($errors->has('wedding_rec_date'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('wedding_rec_date') }}</strong>
                        </span>
                    @endif
                  </div>
                  <label>Waktu</label>
                  <div class="input-daterange input-group m-b-20" id="date-range">
                      <input type="text" class="form-control" id="wedding_rec_begin" name="wedding_rec_begin" value="{{ isset($user_wedding->wedding_rec_begin) ? $user_wedding->wedding_rec_begin : "" }}" required>
                      @if ($errors->has('wedding_rec_begin'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_rec_begin') }}</strong>
                          </span>
                      @endif
                      <div class="input-group-append">
                          <span class="input-group-text bg-inverse b-0 text-white">sampai</span>
                      </div>
                      <input type="text" class="form-control" id="wedding_rec_end" name="wedding_rec_end" value="{{ isset($user_wedding->wedding_rec_end) ? $user_wedding->wedding_rec_end : "" }}" required>
                      @if ($errors->has('wedding_rec_end'))
                          <span class="help-block text-danger">
                              <strong>{{ $errors->first('wedding_rec_end') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div class="form-group{{ $errors->has('wedding_rec_place') ? ' has-error' : '' }} m-b 40">
                    <label for="wedding_rec_place">Nama Tempat</label>
                    <input type="text" class="form-control" id="wedding_rec_place" name="wedding_rec_place" value="{{ isset($user_wedding->wedding_rec_place) ? $user_wedding->wedding_rec_place : "" }}" required>
                    @if ($errors->has('wedding_rec_place'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('wedding_rec_place') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('wedding_rec_address') ? ' has-error' : '' }} m-b 20">
                    <label for="wedding_rec_address">Alamat</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="wedding_rec_address" name="wedding_rec_address" value="{{ isset($user_wedding->wedding_rec_address) ? $user_wedding->wedding_rec_address : "" }}" required>
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
          					@if ($errors->has('wedding_rec_lat'))
          						<span class="help-block">
          							<strong>{{ $errors->first('wedding_rec_lat') }}</strong>
          						</span>
          					@endif
          					@if ($errors->has('wedding_rec_long'))
          						<span class="help-block">
          							<strong>{{ $errors->first('wedding_rec_long') }}</strong>
          						</span>
          					@endif
          					<span class="help-block text-muted"><small>Geser <b>marker <i class="fa fa-map-marker red" aria-hidden="true"></i></b> untuk memperoleh koordinat yang benar</small></span>
          					@if ($errors->has('wedding_rec_address'))
          						<span class="help-block">
          							<strong>{{ $errors->first('wedding_rec_address') }}</strong>
          						</span>
          					@endif

                    <input class="form-control" type="text" name="wedding_rec_lat" id="wedding_rec_lat"  value="{{ isset($user_wedding->wedding_rec_lat) ? $user_wedding->wedding_rec_lat : "" }}" style="display:none">
                		<input class="form-control" type="text" name="wedding_rec_long" id="wedding_rec_long"  value="{{ isset($user_wedding->wedding_rec_long) ? $user_wedding->wedding_rec_long : "" }}" style="display:none">

                  </div>

                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
      <button class="btn btn-outline-info" type="submit" name="button">SIMPAN</button>
    </div>
</form>

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

<script type="text/javascript">
  $(function() {
    $('#wedding_cer_date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
    $('#wedding_cer_begin').bootstrapMaterialDatePicker({ date: false, format: 'HH:mm' });
    $('#wedding_cer_end').bootstrapMaterialDatePicker({ date: false, format: 'HH:mm' });

    $('#wedding_rec_date').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
    $('#wedding_rec_begin').bootstrapMaterialDatePicker({ date: false, format: 'HH:mm' });
    $('#wedding_rec_end').bootstrapMaterialDatePicker({ date: false, format: 'HH:mm' });

    $('.profile-picture').on('click', function(){
   		var modal =
   		'<div class="modal fade">\
   		  <div class="modal-dialog">\
   		   <div class="modal-content">\
   			<div class="modal-header">\
   				<button type="button" class="close" data-dismiss="modal">&times;</button>\
   				<h4 class="blue">Ganti Profile Picture</h4>\
   			</div>\
   			\
   			<form class="no-margin">\
   			 <div class="modal-body">\
   				<div class="space-4"></div>\
   				<div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
   			 </div>\
   			\
   			 <div class="modal-footer center">\
   				<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
   				<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
   			 </div>\
   			</form>\
   		  </div>\
   		 </div>\
   		</div>';


   		var modal = $(modal);
   		modal.modal("show").on("hidden", function(){
   			modal.remove();
   		});

   		var working = false;

   		var form = modal.find('form:eq(0)');
   		var file = form.find('input[type=file]').eq(0);
   		file.ace_file_input({
   			style:'well',
   			btn_choose:'Klik untuk mengganti foto',
   			btn_change:null,
   			no_icon:'ace-icon fa fa-picture-o',
   			thumbnail:'small',
   			before_remove: function() {
   				//don't remove/reset files while being uploaded
   				return !working;
   			},
   			allowExt: ['jpg', 'jpeg', 'png', 'gif'],
   			allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
   		});

   		form.on('submit', function(){
   			if(!file.data('ace_input_files')) return false;

   			file.ace_file_input('disable');
   			form.find('button').attr('disabled', 'disabled');
   			form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");

   			var deferred = new $.Deferred;
   			working = true;
   			deferred.done(function() {
   				form.find('button').removeAttr('disabled');
   				form.find('input[type=file]').ace_file_input('enable');
   				form.find('.modal-body > :last-child').remove();

   				modal.modal("hide");

   				var thumb = file.next().find('img').data('thumb');
   				if(thumb) $('#avatar2').get(0).src = thumb;

   				working = false;
   			});


   			setTimeout(function(){
   				deferred.resolve();
   			} , parseInt(Math.random() * 800 + 800));

   			return false;
   		});
   				
   	});
  });
</script>

<script>
  function initMap() {
    var cerLat = Number(document.getElementById('wedding_cer_lat').value);
    var cerLong = Number(document.getElementById('wedding_cer_long').value);
    var myCerLatLong = {lat: cerLat, lng: cerLong};
    var lat = Number(document.getElementById('wedding_rec_lat').value);
    var long = Number(document.getElementById('wedding_rec_long').value);
    var myLatLong = {lat: lat, lng: long};
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

@sections('main')

<section id="content"  class="red">

	<div id="home">

		<div class="home-bg">

			<div class="inner-home">
				<div class="bg-inner"></div>
			</div>

		</div>

		<div class="home-content">
			<div class="content-inner">
				<div class="row justify-content-center">
					<div class="col-md-6 col-12">
						<div class="wedding-header">
							<div class="img-header">
								<img src=@asset('img/akanmenikah-red.png') alt="" class="img-fluid">
							</div>
							<p class="text-center" style="margin-top: 10px;">
								{{ $wedding->groom_nick }} &amp; {{ $wedding->bride_nick }}
								<br>
								{{ $hari[date('w' ,strtotime($wedding->wedding_rec_date))] . ", " . date('j' ,strtotime($wedding->wedding_rec_date)) . " " . $bulan[date('n' ,strtotime($wedding->wedding_rec_date))] . " " . date('Y' ,strtotime($wedding->wedding_rec_date)) }}
							</p>
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="img-wedding">
							<img src=@asset('img/default.jpg') alt="" class="img-fluid border-red">
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-12 col-12">
						<ul class="header-menu">
							<li class="menus-header">
								<a href="#profile" class="btn btn-red"><i class="fa fa-heart" aria-hidden="true"></i> Profil Kami</a>
							</li>
							<li class="menus-header">
								<a href="#acara" class="btn btn-red"><i class="fa fa-calendar" aria-hidden="true"></i> Acara</a>
							</li>
							<li class="menus-header">
								<a href="#rsvp" class="btn btn-red"><i class="fa fa-envelope" aria-hidden="true"></i> RSVP</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</div> {{-- END HOME --}}

	{{-- PROFILE --}}

	<div id="profile">

		<h1 class="head-section">- PROFIL -</h1>

		<div class="container profile-inner">

			<div class="row justify-content-center">
				<div class="col-md-6 col-12 text-center">
					<div class="img-profile">
						<img src={{ asset('storage/user/' . $user->username . '/img' . '/' . $wedding->groom_pic) }} alt="" class="img-fluid">
					</div>

					<h3 class="profile-name">{{ $wedding->groom_full }}</h3>
					<p class="profile-p">
						{{ $wedding->groom_profile }}
					</p>

					<hr>
				</div>

				<div class="col-md-6 col-12 text-center">
					<div class="img-profile">
						<img src={{ asset('storage/user/' . $user->username . '/img' . '/' . $wedding->bride_pic) }} alt="" class="img-fluid">
					</div>

					<h3 class="profile-name">{{ $wedding->bride_full }}</h3>

					<p class="profile-p">
						{{ $wedding->bride_profile }}
					</p>

					<hr>
				</div>
			</div>

		</div>

	</div> {{-- END PROFILE --}}

	{{-- ACARA PERNIKAHAN --}}

	<div id="acara">

		<div class="home-bg">

			<div class="inner-acara">
				<div class="bg-inner"></div>
			</div>

		</div>

		<div class="acara-content">
			<div class="acara-content-inner">
				<div class="row justify-content-center">
					<div class="col-md-6 col-12">
						<img src=@asset('img/acarapernikahan-red.png') alt="" class="img-fluid" style="margin-bottom: 20px;">
					</div>
					<div class="col-md-6 col-12 text-center">
						<div class="wedding_cer">
							<h3>{{ $wedding->wedding_cer }}</h3>
							<p>
								<span class="date">{{ $hari[date('w' ,strtotime($wedding->wedding_cer_date))] . ", " . date('j' ,strtotime($wedding->wedding_cer_date)) . " " . $bulan[date('n' ,strtotime($wedding->wedding_cer_date))] . " " . date('Y' ,strtotime($wedding->wedding_cer_date)) }}</span>
								<br>
								<span class="time">{{ date('H:i', strtotime($wedding->wedding_cer_begin)) }} sampai {{ date('H:i', strtotime($wedding->wedding_cer_end)) }}</span>
								<br>
								<span class="place">{{ $wedding->wedding_cer_place }}</span>
								<br>
								<span class="address">{{ $wedding->wedding_cer_address }}</span>
								<br>
								<a href={{ 'https://www.google.com/maps/?q=' . $wedding->wedding_cer_lat . ',' . $wedding->wedding_cer_long }} class="btn btn-red" style="margin-top: 10px;" target="_blank">LIHAT PETA</a>
							</p>
						</div>
						<hr>
						<div class="wedding_rec">
							<h3>{{ $wedding->wedding_rec }}</h3>
							<p>
								<span class="date">{{ $hari[date('w' ,strtotime($wedding->wedding_rec_date))] . ", " . date('j' ,strtotime($wedding->wedding_rec_date)) . " " . $bulan[date('n' ,strtotime($wedding->wedding_rec_date))] . " " . date('Y' ,strtotime($wedding->wedding_rec_date)) }}</span>
								<br>
								<span class="time">{{ date('H:i', strtotime($wedding->wedding_rec_begin)) }} sampai {{ date('H:i', strtotime($wedding->wedding_rec_end)) }}</span>
								<br>
								<span class="place">{{ $wedding->wedding_rec_place }}</span>
								<br>
								<span class="address">{{ $wedding->wedding_rec_address }}</span>
								<br>
								<a href={{ 'https://www.google.com/maps/?q=' . $wedding->wedding_rec_lat . ',' . $wedding->wedding_rec_long }} class="btn btn-red" style="margin-top: 10px;" target="_blank">LIHAT PETA</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div> {{-- END ACARA PERNIKAHAN --}}

	{{-- RSVP --}}
	<div id="rsvp">

		<h1 class="head-section">- RSVP -</h1>

		<div class="row justify-content-center">
			<div class="col-md-6 align-self-center">
				<form action="#" class="form-horizontal">
					<div class="form-group">
						<label for="nama_tamu">Nama</label>
						<input class="form-red form-control" type="text" id="nama_tamu" placeholder="Nama">
					</div>
					<div class="form-group">
						<label for="email_tamu">Email</label>
						<input type="text" class="form-red form-control" id="email_tamu" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="attending">Apakah anda akan datang?</label>
						<select name="attending" id="attending" class="form-red form-control">
							<option value="Ya">Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
					</div>
					<div class="form-group">
						<label for="komen_tamu">Ucapan Selamat</label>
						<textarea name="komen_tamu" id="komen_tamu" rows="5" class="form-red form-control"></textarea>
					</div>
					<div class="col-sm-4 col-sm-offset-4">
						<input type="submit" class="btn btn-red btn-block" value="KIRIM">
					</div>
				</form>
			</div>
		</div>
	</div> {{-- END RSVP --}}

	<a id="back-to-top" href="#home" class="back-red">
		<div class="text-center">
			<i class="fa fa-chevron-up" aria-hidden="true"></i>
		</div>
	</a>

</section>

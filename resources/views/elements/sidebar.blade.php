<div class="deznav">
	<div class="deznav-scroll">
		<ul class="metismenu" id="menu">
			<li class="nav-label first">Main Menu</li>
			@if(Auth::user()->role == 1)
			<li><a href="{{route('hrd')}}" aria-expanded="false">
					<i class="fas fa-home" aria-hidden="true"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			<li><a href="{{url('/hrd/laporan')}}" aria-expanded="false">
					<i class="fas fa-file-alt" aria-hidden="true"></i>
					<span class="nav-text">Laporan</span>
				</a>
			</li>
			<li class="nav-label">Data Master</li>
			<li><a href="{{url('/hrd/user')}}" aria-expanded="false">
					<i class="fas fa-user" aria-hidden="true"></i>
					<span class="nav-text">User</span>
				</a>
			</li>
			@elseif(Auth::user()->role == 2)
			<li><a href="{{route('manajer')}}" aria-expanded="false">
					<i class="fas fa-home" aria-hidden="true"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			<li><a href="{{url('/manajer/pengajuan-izin')}}" aria-expanded="false">
					<i class="fas fa-file-signature" aria-hidden="true"></i>
					<span class="nav-text">Pengajuan Izin</span>
				</a>
			</li>
			<li><a href="{{url('/manajer/laporan')}}" aria-expanded="false">
					<i class="fas fa-file-alt" aria-hidden="true"></i>
					<span class="nav-text">Laporan</span>
				</a>
			</li>
			@elseif(Auth::user()->role == 3)
			<li><a href="{{url('/karyawan/absensi')}}" aria-expanded="false">
					<i class="fas fa-file-signature" aria-hidden="true"></i>
					<span class="nav-text">Absensi</span>
				</a>
			</li>
			<li><a href="{{url('/karyawan/riwayat-absensi')}}" aria-expanded="false">
					<i class="fas fa-file-alt" aria-hidden="true"></i>
					<span class="nav-text">Riwayat Absensi</span>
				</a>
			</li>
			<li><a href="{{url('/karyawan/pengajuan-izin')}}" aria-expanded="false">
					<i class="fas fa-file-signature" aria-hidden="true"></i>
					<span class="nav-text">Pengajuan Izin</span>
				</a>
			</li>
			@endif
		</ul>
	</div>
</div>
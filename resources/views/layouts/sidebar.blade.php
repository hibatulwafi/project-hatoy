            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="{{ route('index') }}" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                                </a>
                            </li>

                            @if(Auth::user()->level == 2 || Auth::user()->level == 3 || Auth::user()->level ==  0)
                            <li>
                                <a href="#" class="waves-effect"><i class="mdi mdi-human-child"></i><span>Siswa <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('tabelsiswa') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Data Siswa </span></a></li>
                                    <li><a href="{{ route('inputsiswa') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Input Siswa </span></a></li>
                                    <li><a href="{{ route('pindahsiswa') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Siswa Pindah</span></a></li>
                                </ul>
                            </li>
                          
                            <li>
                                <a href="#" class="waves-effect"><i class="mdi mdi-home-modern"></i><span>Kelas<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('tabelkelas') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Data Kelas </span></a></li>
                                    <li><a href="{{ route('kenaikankelas') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Kenaikan Kelas </span></a></li>

                                </ul>
                            </li>
                         
                            <li>
                                <a href="#" class="waves-effect"><i class="mdi mdi-cash-usd"></i><span>Input Transaksi<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{ route('spp') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> SPP </span></a></li>
                                    <li><a href="{{ route('kegiatan') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Kegiatan </span></a></li>
                                    <li><a href="{{ route('pangkal') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Pangkal </span></a></li>
                                    <li><a href="{{ route('biaya') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Biaya </span></a></li>
                                    <li><a href="{{ route('aset') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Aset </span></a></li>
                                </ul>
                            </li>
                            @endif
                            @if(Auth::user()->level == 2  || Auth::user()->level ==  0)

                            <li>
                                <a href="#" class="waves-effect"><i class="mdi mdi-chart-areaspline"></i><span>Laporan<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                     <!-- <li><a href="{{ route('laporan.harian') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Harian </span></a></li>
                                     <li><a href="{{ route('laporan.bulanan') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Bulanan </span></a></li>
                                     <li><a href="{{ route('laporan.semester') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Semester </span></a></li> -->
                                     <li><a href="{{ route('laporan.pendapatan') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Pendapatan </span></a></li>
                                     <li><a href="{{ route('laporan.biaya') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Biaya </span></a></li>
                                     <li><a href="{{ route('laporan.aset') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Aset </span></a></li>
                                     <li><a href="{{ route('laporan.bukubesar') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Buku Besar </span></a></li>
                                     <li><a href="{{ route('laporan.cashflow') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Cashflow </span></a></li>
                                    <li><a href="{{ route('laporan.labarugi') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Laba Rugi </span></a></li>
                                 <!--    <li><a href="{{ route('laporan.ekuitas') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Ekuitas </span></a></li> -->
                                    <li><a href="{{ route('laporan.neraca') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span> Neraca </span></a></li>
                                </ul>
                            </li>
                            @endif
                            @if(Auth::user()->level == 2 || Auth::user()->level ==  0)

                            <li>
                                <a href="#" class="waves-effect"><i class="mdi mdi-settings"></i><span>Setting<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                     <li><a href="{{ route('setting.tahun') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span>Master Tahun Ajar</span></a></li>
                                     <li><a href="{{ route('setting.pembayaran') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span>Master Bayaran</span></a></li>
                                     <li><a href="{{ route('setting.biaya') }}" class="waves-effect"><i class="mdi mdi-fan"></i><span>Master Biaya</span></a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('petugas') }}" class="waves-effect"><i class="mdi mdi-account"></i><span> Petugas </span></a>
                            </li>

                            @endif
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
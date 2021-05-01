<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});
// Hatoy
Route::get('/tabelkelas','HomeController@tabelkelas')->name('tabelkelas');
Route::get('/pindahkelas','HomeController@pindahkelas')->name('pindahkelas');
Route::get('/pembayaran/spp','HomeController@spp')->name('pembayaran.spp');
Route::get('/pembayaran/pangkal','HomeController@pangkal')->name('pembayaran.pangkal');
Route::get('/pembayaran/kegiatan','HomeController@kegiatan')->name('pembayaran.kegiatan');
Route::get('/laporan/harian','HomeController@harian')->name('pembayaran.harian');
Route::get('/laporan/bulanan','HomeController@bulanan')->name('pembayaran.bulanan');
Route::get('/laporan/semester','HomeController@semester')->name('pembayaran.semester');
Route::get('/petugas','HomeController@petugas')->name('petugas');

//Dashboard
Route::get('/index','HomeController@dashboard')->name('index');

//Siswa
Route::get('/tabelsiswa','SiswaController@index')->name('tabelsiswa');
Route::get('/inputsiswa','SiswaController@inputsiswa')->name('inputsiswa');
Route::get('/pindahsiswa','SiswaController@pindahsiswa')->name('pindahsiswa');
Route::get('/siswa/detail/{id}','SiswaController@detail');
Route::post('/siswa/save','SiswaController@save');
Route::post('/siswa/update','SiswaController@update');
Route::get('/siswa/edit/{id}','SiswaController@edit');
Route::get('/siswa/delete/{id}','SiswaController@delete');
// Siswa Export - 
Route::get('/tabelsiswa/export','SiswaController@export')->name('siswa.export');
Route::post('/tabelsiswa/import','SiswaController@import')->name('siswa.import');


//SPP
Route::get('/spp','SPPController@index')->name('spp');
Route::get('/spp/pembayaran/{id}','SPPController@pembayaran')->name('spp.pembayaran');
Route::post('/spp/pembayaran/create','SPPController@pembayaran_create')->name('spp.create');

//Pangkal
Route::get('/pangkal','PangkalController@index')->name('pangkal');
Route::get('/pangkal/pembayaran/{id}','PangkalController@pembayaran')->name('pangkal.pembayaran');
Route::post('/pangkal/pembayaran/create','PangkalController@pembayaran_create')->name('pangkal.create');

//Kegiatan
Route::get('/kegiatan','KegiatanController@index')->name('kegiatan');
Route::get('/kegiatan/pembayaran/{id}','KegiatanController@pembayaran')->name('kegiatan.pembayaran');
Route::post('/kegiatan/pembayaran/create','KegiatanController@pembayaran_create')->name('kegiatan.create');

// Laporan
Route::get('/laporan/harian','LaporanController@harian')->name('laporan.harian');
Route::get('/laporan/bulanan','LaporanController@bulanan')->name('laporan.bulanan');
Route::get('/laporan/semester','LaporanController@semester')->name('laporan.semester');

//  Setting
Route::get('/setting/tahun','SettingController@tahun')->name('setting.tahun');
Route::post('/setting/tahun','SettingController@tahun_add')->name('add.tahun');
Route::post('/setting/tahun/edit','SettingController@tahun_edit')->name('edit.tahun');

Route::get('/setting/pembayaran','SettingController@pembayaran')->name('setting.pembayaran');
Route::post('/setting/pembayaran','SettingController@pembayaran_add')->name('add.pembayaran');
Route::post('/setting/pembayaran/edit','SettingController@pembayaran_edit')->name('edit.pembayaran');


Route::get('/qbun', 'UserController@index');
Route::get('/maps-user','UserController@mapssort')->name('maps-user');
Route::get('/sejarah', 'UserController@sejarah');
Route::get('/visimisi', 'UserController@vm');
Route::get('/tujuan', 'UserController@tf');
Route::get('/struktur_organisasi', 'UserController@so');\
Route::get('/foto', 'UserController@foto');
Route::get('/fotodetailapp', 'UserController@fotodetailapp');
Route::get('/fotodetailweb', 'UserController@fotodetailweb');
Route::get('/video', 'UserController@vid');
Route::get('/statistik', 'UserController@sta');
Route::get('/harga', 'UserController@har');
Route::get('/berita-user', 'UserController@blog')->name('berita-user');
Route::get('/detail-user/{id}', 'UserController@db')->name('detail-user');
Route::get('/kontak', 'UserController@kontak');

Route::namespace('Auth')->group(function() {
    Route::get('/login', 'LoginController@loginform')->name('login');
    Route::post('/loginpost', 'LoginController@login')->name('loginpost');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    }); 

Route::middleware(['auth:login'])->group(function() {

//Route::get('/index','HomeController@dashboard')->name('index');
//Perusahaan
Route::get('/perusahaan','PerusahaanController@index')->name('perusahaan');
Route::get('/perusahaan/delete/{id}','PerusahaanController@delete');
Route::get('/perusahaan/edit/{id}','PerusahaanController@edit');
Route::post('/perusahaan/update','PerusahaanController@update');
Route::get('/perusahaan/tambah','PerusahaanController@tambah');
Route::post('/perusahaan/save','PerusahaanController@save');

//Komoditas
Route::get('/komoditas','KomoditasController@index')->name('komoditas');
Route::get('/komoditas/delete/{id}','KomoditasController@delete');
Route::get('/komoditas/edit/{id}','KomoditasController@edit');
Route::post('/komoditas/update','KomoditasController@update');
Route::get('/komoditas/tambah','KomoditasController@tambah');
Route::post('/komoditas/save','KomoditasController@save');

//Komoditas
Route::get('/kecamatan','KecamatanController@index')->name('kecamatan');
Route::get('/kecamatan/delete/{id}','KecamatanController@delete');
Route::get('/kecamatan/edit/{id}','KecamatanController@edit');
Route::post('/kecamatan/update','KecamatanController@update');
Route::get('/kecamatan/tambah','KecamatanController@tambah');
Route::post('/kecamatan/save','KecamatanController@save');

//Petugas
Route::get('/petugas','PetugasController@index')->name('petugas');
Route::get('/petugas/delete/{id}','PetugasController@delete');
Route::get('/petugas/edit/{id}','PetugasController@edit');
Route::get('/petugas/edit_password','EditPasswordController@edit')->name('editpass');
Route::post('/petugas/update','PetugasController@update');
Route::post('/petugas/update_password','EditPasswordController@update');
Route::get('/petugas/tambah','PetugasController@tambah');
Route::post('/petugas/save','PetugasController@save');

//Detail
Route::get('/detail','DetailController@index')->name('detail');
Route::get('/detail/delete/{id}','DetailController@delete');
Route::post('/detail/save','DetailController@save');
Route::get('/detail/tambah','DetailController@tambah');
Route::post('/detail/update','DetailController@update');
Route::get('/detail/edit/{id}','DetailController@edit');

//Berita
Route::get('/berita','BeritaController@index')->name('berita');
Route::get('/berita/delete/{id}','BeritaController@delete');
Route::post('/berita/save','BeritaController@save');
Route::get('/berita/tambah','BeritaController@tambah');
Route::post('/berita/update','BeritaController@update');
Route::get('/berita/edit/{id}','BeritaController@edit');

//Route Grafik 
Route::get('/grafikproduksi','GrafikProduksiController@index')->name('grafik');

//Produksi
Route::get('/produksi','ProduksiController@index')->name('produksi');
Route::get('/produksi/delete/{id}','ProduksiController@delete');
Route::get('/produksi/edit/{id}','ProduksiController@edit');
Route::get('/produksi/tambah','ProduksiController@tambah');
Route::post('/produksi/update','ProduksiController@update');
Route::post('/produksi/save','ProduksiController@save');

//Luas
Route::get('/luas','LuasController@index')->name('luas');
Route::get('/luas/delete/{id}','LuasController@delete');
Route::get('/luas/edit/{id}','LuasController@edit');
Route::get('/luas/tambah','LuasController@tambah');
Route::post('/luas/update','LuasController@update');
Route::post('/luas/save','LuasController@save');

//Laporan
Route::get('/lpkomoditas','LPKomoditasController@index')->name('lpkomoditas');
Route::get('/lpproduksi','LPProduksiController@index')->name('lpproduksi');
Route::get('/lpharga','LPHargaController@index')->name('lpharga');

//mapbox
Route::get('/maps','HomeController@index')->name('maps');
Route::get('/maps-sort','HomeController@mapssort')->name('maps-sort');
});
//Route::get('{any}', 'LexaController@index');

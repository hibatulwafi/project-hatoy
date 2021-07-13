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


Route::namespace('Auth')->group(function() {
    Route::get('/login', 'LoginController@loginform')->name('login');
    Route::post('/loginpost', 'LoginController@login')->name('loginpost');
    }); 

Auth::routes();

Route::middleware(['ceklogin'])->group(function() {


//Dashboard
Route::get('/index','HomeController@index')->name('index');

// Hatoy
Route::get('/tabelkelas','KelasController@tabelkelas')->name('tabelkelas');
Route::get('/pindahkelas','KelasController@pindahkelas')->name('pindahkelas');
Route::get('/kenaikankelas','KelasController@kenaikankelas')->name('kenaikankelas');
Route::get('/updatekelas','KelasController@updatekelas')->name('updatekelas');
Route::get('/rollback','KelasController@rollback')->name('rollback');

Route::post('getsiswa','KelasController@getsiswa');

/*Route::get('/pembayaran/spp','HomeController@spp')->name('pembayaran.spp');
Route::get('/pembayaran/pangkal','HomeController@pangkal')->name('pembayaran.pangkal');
Route::get('/pembayaran/kegiatan','HomeController@kegiatan')->name('pembayaran.kegiatan');
Route::get('/laporan/harian','HomeController@harian')->name('pembayaran.harian');
Route::get('/laporan/bulanan','HomeController@bulanan')->name('pembayaran.bulanan');
Route::get('/laporan/semester','HomeController@semester')->name('pembayaran.semester');
Route::get('/petugas','HomeController@petugas')->name('petugas');*/


//Siswa
Route::get('/tabelsiswa','SiswaController@index')->name('tabelsiswa');
Route::get('/inputsiswa','SiswaController@inputsiswa')->name('inputsiswa');
Route::get('/pindahsiswa','SiswaController@pindahsiswa')->name('pindahsiswa');
Route::get('/siswa/detail/{id}','SiswaController@detail');
Route::post('/siswa/save','SiswaController@save');
Route::post('/pindahsiswa/save','SiswaController@savepindahan');
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
Route::post('/spp/import','SPPController@import')->name('spp.import');

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
Route::get('/laporan/harian/detail/{id}','LaporanController@harian_detail')->name('laporan.harian.detail');

Route::get('/laporan/bulanan','LaporanController@bulanan')->name('laporan.bulanan');
Route::get('/laporan/bulanan/detail/{id}','LaporanController@bulanan_detail')->name('laporan.bulanan.detail');

Route::get('/laporan/semester','LaporanController@semester')->name('laporan.semester');
Route::get('/laporan/semester/detail/{id}','LaporanController@semester_detail')->name('laporan.semester.detail');

//  Setting
Route::get('/setting/tahun','SettingController@tahun')->name('setting.tahun');
Route::post('/setting/tahun','SettingController@tahun_add')->name('add.tahun');
Route::post('/setting/tahun/edit','SettingController@tahun_edit')->name('edit.tahun');

Route::get('/setting/pembayaran','SettingController@pembayaran')->name('setting.pembayaran');
Route::post('/setting/pembayaran','SettingController@pembayaran_add')->name('add.pembayaran');
Route::post('/setting/pembayaran/edit','SettingController@pembayaran_edit')->name('edit.pembayaran');

//Petugas
Route::get('/petugas','PetugasController@index')->name('petugas');
Route::get('/petugas/delete/{id}','PetugasController@delete');
Route::get('/petugas/edit/{id}','PetugasController@edit');
Route::get('/petugas/edit_password','EditPasswordController@edit')->name('editpass');
Route::post('/petugas/update','PetugasController@update');
Route::post('/petugas/update_password','EditPasswordController@update');
Route::get('/petugas/tambah','PetugasController@tambah');
Route::post('/petugas/save','PetugasController@save');

});

Route::get('/home', 'HomeController@index')->name('home');

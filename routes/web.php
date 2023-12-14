<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Datamaster;
use App\Http\Controllers\transaksi;
use App\Http\Controllers\search;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WellyadminController;

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
    return view('login.signIn');
});

Route::get('/index', 'App\Http\Controllers\WellyadminController@dashboard_2');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');

// Route::get('/index', 'App\Http\Controllers\WellyadminController@dashboard_1');
Route::get('/patient', 'App\Http\Controllers\WellyadminController@patient');
Route::get('/patient-details', 'App\Http\Controllers\WellyadminController@patient_details');
Route::get('/doctor', 'App\Http\Controllers\WellyadminController@doctor');
Route::get('/doctor-details', 'App\Http\Controllers\WellyadminController@doctor_details');
Route::get('/reviews', 'App\Http\Controllers\WellyadminController@reviews');
Route::get('/app-calender', 'App\Http\Controllers\WellyadminController@app_calender');
Route::get('/app-profile', 'App\Http\Controllers\WellyadminController@app_profile');
Route::get('/post-details', 'App\Http\Controllers\WellyadminController@post_details');
Route::get('/chart-chartist', 'App\Http\Controllers\WellyadminController@chart_chartist');
Route::get('/chart-chartjs', 'App\Http\Controllers\WellyadminController@chart_chartjs');
Route::get('/chart-flot', 'App\Http\Controllers\WellyadminController@chart_flot');
Route::get('/chart-morris', 'App\Http\Controllers\WellyadminController@chart_morris');
Route::get('/chart-peity', 'App\Http\Controllers\WellyadminController@chart_peity');
Route::get('/chart-sparkline', 'App\Http\Controllers\WellyadminController@chart_sparkline');
Route::get('/ecom-checkout', 'App\Http\Controllers\WellyadminController@ecom_checkout');
Route::get('/ecom-customers', 'App\Http\Controllers\WellyadminController@ecom_customers');
Route::get('/ecom-invoice', 'App\Http\Controllers\WellyadminController@ecom_invoice');
Route::get('/ecom-product-detail', 'App\Http\Controllers\WellyadminController@ecom_product_detail');
Route::get('/ecom-product-grid', 'App\Http\Controllers\WellyadminController@ecom_product_grid');
Route::get('/ecom-product-list', 'App\Http\Controllers\WellyadminController@ecom_product_list');
Route::get('/ecom-product-order', 'App\Http\Controllers\WellyadminController@ecom_product_order');
Route::get('/email-compose', 'App\Http\Controllers\WellyadminController@email_compose');
Route::get('/email-inbox', 'App\Http\Controllers\WellyadminController@email_inbox');
Route::get('/email-read', 'App\Http\Controllers\WellyadminController@email_read');
Route::get('/form-editor-summernote', 'App\Http\Controllers\WellyadminController@form_editor_summernote');
Route::get('/form-element', 'App\Http\Controllers\WellyadminController@form_element');
Route::get('/form-pickers', 'App\Http\Controllers\WellyadminController@form_pickers');
Route::get('/form-validation-jquery', 'App\Http\Controllers\WellyadminController@form_validation_jquery');
Route::get('/form-wizard', 'App\Http\Controllers\WellyadminController@form_wizard');
Route::get('/map-jqvmap', 'App\Http\Controllers\WellyadminController@map_jqvmap');
Route::get('/page-error-400', 'App\Http\Controllers\WellyadminController@page_error_400');
Route::get('/page-error-403', 'App\Http\Controllers\WellyadminController@page_error_403');
Route::get('/page-error-404', 'App\Http\Controllers\WellyadminController@page_error_404');
Route::get('/page-error-500', 'App\Http\Controllers\WellyadminController@page_error_500');
Route::get('/page-error-503', 'App\Http\Controllers\WellyadminController@page_error_503');
Route::get('/page-forgot-password', 'App\Http\Controllers\WellyadminController@page_forgot_password');
Route::get('/page-lock-screen', 'App\Http\Controllers\WellyadminController@page_lock_screen');
Route::get('/page-login', 'App\Http\Controllers\WellyadminController@page_login');
Route::get('/page-register', 'App\Http\Controllers\WellyadminController@page_register');

Route::get('/table-bootstrap-basic', 'App\Http\Controllers\WellyadminController@table_bootstrap_basic');
Route::get('/table-datatable-basic', 'App\Http\Controllers\WellyadminController@table_datatable_basic');

Route::get('/dashboard2', 'App\Http\Controllers\WellyadminController@dashboard_2');
Route::get('/dashboard2/export', 'App\Http\Controllers\WellyadminController@export_dashboard');

//Obat
Route::get('/obat', [WellyadminController::Class,'obat']);
Route::get('/obat/discontinue', [WellyadminController::Class,'obatDiscontinue']);
Route::post('/obat/create', [Datamaster::Class,'create_obat']);
Route::post('/obat/edit', [Datamaster::Class,'edit_obat']);

//Stok
Route::get('/stok', [WellyadminController::Class,'stok']);
Route::post('/stok/create', [Datamaster::Class,'create_stok']);
Route::post('/stok/edit', [Datamaster::Class,'edit_stok']);
Route::get('/stok/passing/{id}', [Datamaster::Class,'update_stok_obat']);


//Golongan
Route::get('/golongan', 'App\Http\Controllers\WellyadminController@golongan');
Route::get('/kelolagolongan', 'App\Http\Controllers\WellyadminController@kelolagolongan');
Route::post('/kelolagolongan/create', [Datamaster::Class,'create_golongan']);
Route::post('/kelolagolongan/edit', [Datamaster::Class,'edit_golongan']);

//kategori
Route::get('/katagori', 'App\Http\Controllers\WellyadminController@katagori');
Route::get('/kelolakatagori', 'App\Http\Controllers\WellyadminController@kelolakatagori');
Route::get('/laporankatagori', 'App\Http\Controllers\WellyadminController@laporankatagori');
Route::post('/laporankatagori/search', [search::Class,'search_laporan_kategori']);
Route::get('/laporankatagori/export', [Datamaster::Class,'export_laporan_kategori']);
Route::post('/kelolakatagori/create', [Datamaster::Class,'create_kategori']);
Route::post('/kelolakatagori/edit', [Datamaster::Class,'edit_kategori']);

//stok Penerimaan opnam
Route::get('/stok-opnam', [WellyadminController::Class,'stokOpnam']);
Route::post('/stok-opnam/create', [Datamaster::Class,'create_opnam']);
Route::post('/stok-opnam/edit', [Datamaster::Class,'edit_opnam']);

//stok Pengeluaran Opnam
Route::get('/pengeluaran-opnam',[WellyadminController::Class,'pengeluaranOpnam']);
Route::post('/pengeluaran-opnam/create', [Datamaster::Class,'create_pengeluaran_opnam']);
Route::post('/pengeluaran-opnam/edit', [Datamaster::Class,'edit_pengeluaran_opnam']);
Route::get('/pengeluaran-opnam/submit/{id}', [Datamaster::Class,'submit_pengeluaran_opnam']);

//kandungan
Route::get('/kandungan', 'App\Http\Controllers\WellyadminController@kandungan');
Route::post('/kandungan/create', [Datamaster::Class,'create_kandungan']);
Route::post('/kandungan/edit', [Datamaster::Class,'edit_kandungan']);
Route::get('/laporankandungan', 'App\Http\Controllers\WellyadminController@laporankandungan');
Route::post('/laporankandungan/search', [search::Class,'search_laporan_kandungan']);
Route::get('/laporankandungan/export', [Datamaster::Class,'export_laporan_kandungan']);

//dosis
Route::get('/dosis', 'App\Http\Controllers\WellyadminController@dosis');
Route::post('/dosis/create', [Datamaster::Class,'create_dosis']);
Route::post('/dosis/edit', [Datamaster::Class,'edit_dosis']);

//satuan
Route::get('/satuan', 'App\Http\Controllers\WellyadminController@satuan');
Route::post('/satuan/create', [Datamaster::Class,'create_satuan']);
Route::post('/satuan/edit', [Datamaster::Class,'edit_satuan']);

//pabrik
Route::get('/pabrik', 'App\Http\Controllers\WellyadminController@pabrik');
Route::post('/pabrik/create', [Datamaster::Class,'create_pabrik']);
Route::post('/pabrik/edit', [Datamaster::Class,'edit_pabrik']);

//pbf
Route::get('/pbf', 'App\Http\Controllers\WellyadminController@pbf');
Route::post('/pbf/create', [Datamaster::Class,'create_pbf']);
Route::post('/pbf/edit', [Datamaster::Class,'edit_pbf']);

Route::get('/export', 'App\Http\Controllers\WellyadminController@export');

//dokter
Route::get('/dokter', 'App\Http\Controllers\WellyadminController@dokter');
Route::post('/dokter/create', [Datamaster::Class,'create_dokter']);
Route::post('/dokter/edit', [Datamaster::Class,'edit_dokter']);

//pengadaan
Route::get('/halpengadaan', 'App\Http\Controllers\WellyadminController@halpengadaan');
Route::get('/tambahpengadaan', 'App\Http\Controllers\WellyadminController@tambahpengadaan');
Route::post('/tambahpengadaan/create',[transaksi::Class,'create_pengadaan']);
Route::get('/editpengadaan/{id}', 'App\Http\Controllers\WellyadminController@editpengadaan');
Route::post('/editpengadaan/{id}/edit',[transaksi::Class,'edit_pengadaan']);
Route::get('/detailpengadaan/{id}', 'App\Http\Controllers\WellyadminController@detailpengadaan');

//penerimaan
Route::get('/halpenerimaan', 'App\Http\Controllers\WellyadminController@halpenerimaan');
Route::get('/halpenerimaan/tambah-penerimaan', 'App\Http\Controllers\WellyadminController@tambah_penerimaan');
Route::post('/halpenerimaan/tambah-penerimaan/create',[transaksi::Class,'create_penerimaan']);
Route::post('/halpenerimaan/edit-penerimaan/{id}/edit',[transaksi::Class,'edit_penerimaan']);
Route::get('/halpenerimaan/edit-penerimaan/{id}','App\Http\Controllers\WellyadminController@edit_penerimaan');
Route::get('/halpenerimaan/submit/{id}',[transaksi::Class,'submit_penerimaan']);

//pengeluaran
Route::get('/halpengeluaran', 'App\Http\Controllers\WellyadminController@halpengeluaran');
Route::get('/halpengeluaran/tambah-pengeluaran', 'App\Http\Controllers\WellyadminController@tambah_pengeluaran');
Route::get('/halpengeluaran/{id}', 'App\Http\Controllers\WellyadminController@edit_pengeluaran');
Route::post('/halpengeluaran/tambah-pengeluaran/create', [transaksi::Class,'create_pengeluaran']);
Route::post('/halpengeluaran/{id}/edit', [transaksi::Class,'edit_Pengeluaran']);
Route::get('/halpengeluaran/submit/{id}',[transaksi::Class,'submit_pengeluaran']);

//laporan
Route::get('/lappengadaan', 'App\Http\Controllers\WellyadminController@lappengadaan');
Route::get('/lappengadaan/export', 'App\Http\Controllers\WellyadminController@export_laporan_pengadaan');

Route::get('/lappenerimaan', 'App\Http\Controllers\WellyadminController@lappenerimaan');
Route::get('/lappenerimaan/export', 'App\Http\Controllers\WellyadminController@export_laporan_penerimaan');

Route::get('/lappengeluaran', 'App\Http\Controllers\WellyadminController@lappengeluaran');
Route::get('/lappengeluaran/export', 'App\Http\Controllers\WellyadminController@export_laporan_pengeluaran');

Route::get('/lappengeluaranresep', 'App\Http\Controllers\WellyadminController@lappengeluaranresep');

Route::get('/lapobated', 'App\Http\Controllers\WellyadminController@lapobated');
Route::get('/lapobated/export', 'App\Http\Controllers\WellyadminController@export_laporan_obatED');

Route::get('/laporan-opnam', 'App\Http\Controllers\WellyadminController@lapOpnam');
Route::get('/laporan-opnam/export', 'App\Http\Controllers\WellyadminController@export_laporan_opnam');

//search laporan
Route::post('/lappengeluaran/search', [search::Class,'search_laporan_pengeluaran']);
Route::post('/lappengadaan/search', [search::Class,'search_laporan_pengadaan']);
Route::post('/lappenerimaan/search', [search::Class,'search_laporan_penerimaan']);
Route::post('/laporan-opnam/search', [search::Class,'search_laporan_opnam']);

//search transaksi
Route::post('/halpengadaan/search', [search::Class,'search_pengadaan']);
Route::post('/halpenerimaan/search', [search::Class,'search_penerimaan']);
Route::post('/halpengeluaran/search', [search::Class,'search_pengeluaran']);
Route::post('/dashboard2/search', [search::Class,'search_dashboard']);

//search datamaster
Route::post('/obat/search', [search::Class,'search_obat']);

Route::get('/uc-lightgallery', 'App\Http\Controllers\WellyadminController@uc_lightgallery');
Route::get('/uc-nestable', 'App\Http\Controllers\WellyadminController@uc_nestable');
Route::get('/uc-noui-slider', 'App\Http\Controllers\WellyadminController@uc_noui_slider');
Route::get('/uc-select2', 'App\Http\Controllers\WellyadminController@uc_select2');
Route::get('/uc-sweetalert', 'App\Http\Controllers\WellyadminController@uc_sweetalert');
Route::get('/uc-toastr', 'App\Http\Controllers\WellyadminController@uc_toastr');
Route::get('/ui-accordion', 'App\Http\Controllers\WellyadminController@ui_accordion');
Route::get('/ui-alert', 'App\Http\Controllers\WellyadminController@ui_alert');
Route::get('/ui-badge', 'App\Http\Controllers\WellyadminController@ui_badge');
Route::get('/ui-button', 'App\Http\Controllers\WellyadminController@ui_button');
Route::get('/ui-button-group', 'App\Http\Controllers\WellyadminController@ui_button_group');
Route::get('/ui-card', 'App\Http\Controllers\WellyadminController@ui_card');
Route::get('/ui-carousel', 'App\Http\Controllers\WellyadminController@ui_carousel');
Route::get('/ui-dropdown', 'App\Http\Controllers\WellyadminController@ui_dropdown');
Route::get('/ui-grid', 'App\Http\Controllers\WellyadminController@ui_grid');
Route::get('/ui-list-group', 'App\Http\Controllers\WellyadminController@ui_list_group');
Route::get('/ui-media-object', 'App\Http\Controllers\WellyadminController@ui_media_object');
Route::get('/ui-modal', 'App\Http\Controllers\WellyadminController@ui_modal');
Route::get('/ui-pagination', 'App\Http\Controllers\WellyadminController@ui_pagination');
Route::get('/ui-popover', 'App\Http\Controllers\WellyadminController@ui_popover');
Route::get('/ui-progressbar', 'App\Http\Controllers\WellyadminController@ui_progressbar');
Route::get('/ui-tab', 'App\Http\Controllers\WellyadminController@ui_tab');
Route::get('/ui-typography', 'App\Http\Controllers\WellyadminController@ui_typography');
Route::get('/widget-basic', 'App\Http\Controllers\WellyadminController@widget_basic');

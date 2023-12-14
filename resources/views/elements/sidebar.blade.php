<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{!! url('/index'); !!}">Dashboard</a></li>
							<li><a href="{!! url('/patient'); !!}">Patient</a></li>
							<li><a href="{!! url('/patient-details'); !!}">Patient Details</a></li>
							<li><a href="{!! url('/doctor'); !!}">Doctors</a></li>
							<li><a href="{!! url('/doctor-details'); !!}">Doctor Details</a></li>
							<li><a href="{!! url('/reviews'); !!}">Reviews</a></li>
						</ul>
                    </li> --}}
            <li><a href="{!! url('/dashboard2') !!}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Datamaster</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{!! url('/obat') !!}">Obat</a></li>
                    <li><a href="{!! url('/katagori') !!}">Kategori</a></li>
                    <li><a href="{!! url('/stok-opnam') !!}">Stok Opnam</a></li>

                    {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <span class="nav-text">Stok Opnam</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{!! url('/penerimaan-opnam') !!}">&nbsp;&nbsp;&nbsp;&emsp;Penerimaan Opnam</a>  
                            </li>
                            <li>
                                <a href="{!! url('/pengeluaran-opnam') !!}">&nbsp;&nbsp;&nbsp;&emsp;Pengeluaran Opnam</a>  
                            </li>
                            


                        </ul>
                    </li> --}}

                    <li><a href="{!! url('/kandungan') !!}">Kandungan</a></li>
                    <li><a href="{!! url('/laporankandungan') !!}" hidden></a></li>
                    <li><a href="{!! url('/pabrik') !!}">Pabrik</a></li>
                    <li><a href="{!! url('/pbf') !!}">PBF</a></li>
                    <li><a href="{!! url('/dokter') !!}">Dokter</a></li>

                </ul>
            </li>
            {{-- @if (Auth::user()->role == 'user') --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Transaksi</span>
                </a>
                <ul aria-expanded="false">
                    {{-- <li><a href="{!! url('/halpengadaan') !!}"> Pengadaan</a></li> --}}
                    <li><a href="{!! url('/tambahpengadaan') !!}" hidden></a></li>
                    <li><a href="{!! url('/editpengadaan') !!}" hidden></a></li>
                    <li><a href="{!! url('/detailpengadaan') !!}" hidden></a></li>
                    <li><a href="{!! url('/halpenerimaan') !!}"> Penerimaan</a></li>
                    <li><a href="{!! url('/halpengeluaran') !!}"> Pengeluaran</a></li>
                </ul>
            </li>
            {{-- @endif --}}
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Laporan</span>
                </a>
                <ul aria-expanded="false">
                    {{-- <li><a href="{!! url('/lappengadaan') !!}">Pengadaan Obat</a></li> --}}
                    <li><a href="{!! url('/lappenerimaan') !!}">Penerimaan Obat</a></li>
                    <li><a href="{!! url('/lappengeluaran') !!}">Pengeluaran Resep Obat</a></li>
                    {{-- <li><a href="{!! url('/lappengeluaranresep') !!}">Pengeluaran Resep</a></li> --}}
                    <li><a href="{!! url('/lapobated') !!}">Obat Kadaluarsa</a></li>
                    <li><a href="{!! url('/laporan-opnam') !!}">Opnam</a></li>
                </ul>
            </li>
            <li><a href="/logout" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-exit"></i>
                    <span class="nav-text">Sign Out</span>
                </a>
            </li>

            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Apps</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/app-profile'); !!}">Profile</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="{!! url('/email-compose'); !!}">Compose</a></li>
                                    <li><a href="{!! url('/email-inbox'); !!}">Inbox</a></li>
                                    <li><a href="{!! url('/email-read'); !!}">Read</a></li>
                                </ul>
                            </li>
                            <li><a href="{!! url('/app-calender'); !!}">Calendar</a></li>
							<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                                <ul aria-expanded="false">
                                    <li><a href="{!! url('/ecom-product-grid'); !!}">Product Grid</a></li>
									<li><a href="{!! url('/ecom-product-list'); !!}">Product List</a></li>
									<li><a href="{!! url('/ecom-product-detail'); !!}">Product Details</a></li>
									<li><a href="{!! url('/ecom-product-order'); !!}">Order</a></li>
									<li><a href="{!! url('/ecom-checkout'); !!}">Checkout</a></li>
									<li><a href="{!! url('/ecom-invoice'); !!}">Invoice</a></li>
									<li><a href="{!! url('/ecom-customers'); !!}">Customers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-controls-3"></i>
							<span class="nav-text">Charts</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/chart-flot'); !!}">Flot</a></li>
                            <li><a href="{!! url('/chart-morris'); !!}">Morris</a></li>
                            <li><a href="{!! url('/chart-chartjs'); !!}">Chartjs</a></li>
                            <li><a href="{!! url('/chart-chartist'); !!}">Chartist</a></li>
                            <li><a href="{!! url('/chart-sparkline'); !!}">Sparkline</a></li>
                            <li><a href="{!! url('/chart-peity'); !!}">Peity</a></li>
                        </ul>
                    {{-- </li> --}}
                    {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-internet"></i>
							<span class="nav-text">Bootstrap</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/ui-accordion'); !!}">Accordion</a></li>
                            <li><a href="{!! url('/ui-alert'); !!}">Alert</a></li>
                            <li><a href="{!! url('/ui-badge'); !!}">Badge</a></li>
                            <li><a href="{!! url('/ui-button'); !!}">Button</a></li>
                            <li><a href="{!! url('/ui-modal'); !!}">Modal</a></li>
                            <li><a href="{!! url('/ui-button-group'); !!}">Button Group</a></li>
                            <li><a href="{!! url('/ui-list-group'); !!}">List Group</a></li>
                            <li><a href="{!! url('/ui-media-object'); !!}">Media Object</a></li>
                            <li><a href="{!! url('/ui-card'); !!}">Cards</a></li>
                            <li><a href="{!! url('/ui-carousel'); !!}">Carousel</a></li>
                            <li><a href="{!! url('/ui-dropdown'); !!}">Dropdown</a></li>
                            <li><a href="{!! url('/ui-popover'); !!}">Popover</a></li>
                            <li><a href="{!! url('/ui-progressbar'); !!}">Progressbar</a></li>
                            <li><a href="{!! url('/ui-tab'); !!}">Tab</a></li>
                            <li><a href="{!! url('/ui-typography'); !!}">Typography</a></li>
                            <li><a href="{!! url('/ui-pagination'); !!}">Pagination</a></li>
                            <li><a href="{!! url('/ui-grid'); !!}">Grid</a></li>

                        </ul>
                    </li> --}}
                    {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-heart"></i>
							<span class="nav-text">Plugins</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/uc-select2'); !!}">Select 2</a></li>
                            <li><a href="{!! url('/uc-nestable'); !!}">Nestedable</a></li>
                            <li><a href="{!! url('/uc-noui-slider'); !!}">Noui Slider</a></li>
                            <li><a href="{!! url('/uc-sweetalert'); !!}">Sweet Alert</a></li>
                            <li><a href="{!! url('/uc-toastr'); !!}">Toastr</a></li>
                            <li><a href="{!! url('/map-jqvmap'); !!}">Jqv Map</a></li>
                            <li><a href="{!! url('/uc-lightgallery'); !!}">Lightgallery</a></li>
                        </ul>
                    </li>
                    <li><a href="{!! url('/widget-basic'); !!}" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Widget</span>
						</a>
					</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Forms</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/form-element'); !!}">Form Elements</a></li>
                            <li><a href="{!! url('/form-wizard'); !!}">Wizard</a></li>
                            <li><a href="{!! url('/form-editor-summernote'); !!}">Summernote</a></li>
                            <li><a href="{!! url('/form-pickers'); !!}">Pickers</a></li>
                            <li><a href="{!! url('/form-validation-jquery'); !!}">Jquery Validate</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-network"></i>
							<span class="nav-text">Table</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/table-bootstrap-basic'); !!}">Bootstrap</a></li>
                            <li><a href="{!! url('/table-datatable-basic'); !!}">Datatable</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-layer-1"></i>
							<span class="nav-text">Pages</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{!! url('/page-register'); !!}">Register</a></li>
                            <li><a href="{!! url('/page-login'); !!}">Login</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="{!! url('/page-error-400'); !!}">Error 400</a></li>
                                    <li><a href="{!! url('/page-error-403'); !!}">Error 403</a></li>
                                    <li><a href="{!! url('/page-error-404'); !!}">Error 404</a></li>
                                    <li><a href="{!! url('/page-error-500'); !!}">Error 500</a></li>
                                    <li><a href="{!! url('/page-error-503'); !!}">Error 503</a></li>
                                </ul>
                            </li>
                            <li><a href="{!! url('/page-lock-screen'); !!}">Lock Screen</a></li>
                        </ul>
                    </li> --}} 
        </ul>

        {{-- <div class="copyright">
					<p><strong>Welly Hospital Admin Dashboard</strong> © 2020 All Rights Reserved</p>
					<p>Made with ♥ by DexignZone</p>
				</div> --}}
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->

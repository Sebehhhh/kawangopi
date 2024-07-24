 <!-- Menu -->

 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <a href="#" class="app-brand-link">
             <span class="app-brand-logo demo me-1">
                 <img src="{{ asset('assets/dashboard/assets/img/logo.jpg') }}" alt="Kawa Ngopi Logo"
                     style="height: 24px;">
             </span>
             <span class="app-brand-text demo menu-text fw-semibold ms-2"> <img
                     src="{{ asset('assets/img/horizontal.png') }}" alt="Kawa Ngopi Logo" style="height: 24px;"></span>
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
             <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
         </a>
     </div>



     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
         <!-- Dashboards -->
         <li class="menu-item {{ Route::currentRouteName() == 'dashboard.dashboard' ? 'active' : '' }}">
             <a href="{{ route('dashboard.dashboard') }}" class="menu-link">
                 <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                 <div data-i18n="Dashboard">Dashboard</div>
             </a>
         </li>

         <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <i class="menu-icon tf-icons mdi mdi-cog"></i>
                 <div data-i18n="Layouts">Setting</div>
             </a>

             <ul class="menu-sub">
                 <li class="menu-item {{ Route::currentRouteName() == 'dashboard.about' ? 'active' : '' }}">
                     <a href="{{ route('dashboard.about') }}" class="menu-link">
                         <div data-i18n="About">About</div>
                     </a>
                 </li>
             </ul>
             <ul class="menu-sub">
                 <li class="menu-item {{ Route::currentRouteName() == 'dashboard.galeri' ? 'active' : '' }}">
                     <a href="{{ route('dashboard.galeri') }}" class="menu-link">
                         <div data-i18n="Galeri">Galeri</div>
                     </a>
                 </li>
             </ul>
         </li>

         <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <i class="menu-icon tf-icons mdi mdi-database-outline"></i>
                 <div data-i18n="Layouts">Master Data</div>
             </a>

             <ul class="menu-sub">
                 <li class="menu-item {{ Route::currentRouteName() == 'dashboard.kategoriProduk' ? 'active' : '' }}">
                     <a href="{{ route('dashboard.kategoriProduk') }}" class="menu-link">
                         <div data-i18n="Category Product">Category Product</div>
                     </a>
                 </li>
                 <li class="menu-item {{ Route::currentRouteName() == 'dashboard.produk' ? 'active' : '' }}">
                     <a href="{{ route('dashboard.produk') }}" class="menu-link">
                         <div data-i18n="Product">Product</div>
                     </a>
                 </li>
             </ul>
         </li>

         <li class="menu-item {{ Route::currentRouteName() == 'dashboard.user' ? 'active' : '' }}">
             <a href="{{ route('dashboard.user') }}" class="menu-link">
                 <i class="menu-icon tf-icons mdi mdi-account"></i>
                 <div data-i18n="Users">User</div>
             </a>
         </li>

         <li class="menu-item {{ Route::currentRouteName() == 'dashboard.transaksi' ? 'active' : '' }}">
             <a href="{{ route('dashboard.transaksi') }}" class="menu-link">
                 <i class="menu-icon tf-icons mdi mdi-cash"></i>
                 <div data-i18n="Transaction">Transaction</div>
             </a>
         </li>

         <li class="menu-item {{ Route::currentRouteName() == 'dashboard.blog' ? 'active' : '' }}">
             <a href="{{ route('dashboard.blog') }}" class="menu-link">
                 <i class="menu-icon tf-icons mdi mdi-post-outline"></i>
                 <div data-i18n="Blog">Blog</div>
             </a>
         </li>

     </ul>
 </aside>

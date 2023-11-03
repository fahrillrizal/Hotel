<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('Home')}}" class="brand-link">
      <img src="{{url('images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @can('role', 'resepsionis')
                <x-nav-item label="Reservasi" icon="fas fa-book-open" :link="route('reservasi')" />
                <x-nav-item label="Check-in" icon="fas fa-address-book" :link="route('reservasi-confirm')" />
                <x-nav-item label="Check-out" icon="fas fa-book" :link="route('reservasi-reject')" />
                @endcan
        @can('role', 'admin')
        <x-nav-item label="Kamar" icon="fas fa-bed" :link="route('kamar.index')"/>
        <x-nav-item label="Fasilitas" icon="fas fa-building" :link="route('fasilitas.index')"/>
        <x-nav-item label="Fasilitas Kamar" icon="fas fa-air-freshener" :link="route('fasilitaskamar.index')"/>
        <x-nav-item label="User Admin" icon="fas fa-users" :link="route('admin.index')"/>
        @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

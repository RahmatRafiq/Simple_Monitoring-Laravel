 <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
     id="sidenav-main">
     <div class="sidenav-header">
         <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
             aria-hidden="true" id="iconSidenav"></i>
         <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html "
             target="_blank">
             <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
             <span class="ms-1 font-weight-bold">Soft UI Dashboard</span>
         </a>
     </div>
     <hr class="horizontal dark mt-0">
     <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
         <ul class="navbar-nav">
             <li class="nav-item">
                 <a class="nav-link active" href="{{ route('projects.index') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="fas fa-project-diagram"></i>
                     </div>
                     <span class="nav-link-text ms-1">Projects</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link active" href="{{ route('tasks.index') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="fas fa-clipboard-check"></i>
                     </div>
                     <span class="nav-link-text ms-1">Task</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link active" href="{{ route('karyawan.index') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="fas fa-user"></i> <!-- Ganti ikon sesuai dengan ikon user yang diinginkan -->
                     </div>
                     <span class="nav-link-text ms-1">User</span>
                 </a>
             </li>
         </ul>
     </div>
 </aside>

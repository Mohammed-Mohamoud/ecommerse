    <!-- Navbar -->
    <main class="main-content mt-1 border-radius-lg">
            <!-- End Navbar -->
       
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <div class="collapse navbar-collapse mt-sm-0 mt-2 px-0" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav">
              <li class="nav-item"
              data-toggle="modal" data-target="#logoutModa11">
                <p class="nav-link text-body font-weight-bold px-0" style="cursor: pointer">
                  <i class="fa fa-outdent me-sm-1"></i>الخروج
                </p>
              </li>
           
            </ul>
                                  <!-- Delete Modal-->
  
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>
          </div>
        </div>
      </nav>
      <div class="modal fade" id="logoutModa11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-body text-center">سوف يتم حذف هذه الصفة نهائيأ</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">الغاء</button>
                  <a class="btn btn-primary" href="{{route('profile.view.logut')}}">موافق</a>
              </div>
          </div>
      </div>
      </div>
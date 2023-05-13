


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#060c22 ;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li> </li>
        <li> </li>
        <li> </li>
        <li> </li>
        
        </ul>
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-100" href="<?= site_url('home'); ?>">
        <img
          src="../assets/img/logobims.png"
          height="50"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->


<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5" >
        <div class="card-body p-1">
        <!-- Nested Row within Card Body -->
          <div class="row" style="background-color:#c0c0c0;" >
              <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                    </div>
                    <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                    <?= $this->session->flashdata('message'); ?>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" 
                        value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address"
                        value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                          <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                          <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Confirm Password">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-danger btn-user btn-block">
                        Register Account
                      </button>
                    </form>
                    <hr>
                    <div class="text-center">
                      <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="<?= site_url('auth'); ?>">Already have an account? Sign In Now!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

  

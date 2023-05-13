

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
    <ul class="navbar-nav me-auto mb-2 mb-lg-10">
        <li> </li>
        <li> </li>
        <li> </li>
        <li> </li>
        
        </ul>
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-100" href="<?= site_url('home'); ?>">
        <img
          src="assets/img/logobims.png"
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

 

<div class="container-md" >
<p></p>

    <!-- Outer Row -->
    <div class="row justify-content-center" >
        <div class="col-xl-10 col-lg-100 col-md-9 my-5">
            <div class="card o-hidden border-0 shadow-lg my-10">
                <div class="card-body p-1" >
                    <!-- Nested Row within Card Body -->
                    <div class="row" style="background-color:#c0c0c0;">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image" ></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                             
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-5 "><?= $title; ?></h1>
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email"
                                        value="<?= set_value('email'); ?>" >
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                        <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                   <center> <button type="submit" class="btn2 btn-danger btn-user btn-block" >
                                        Sign In
                                    </button></center>
                                    
                                </form>
                                
                                <hr>
                                
                                <div class="text-center">
                                   <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= site_url('auth/registration'); ?>">Register!</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <center><h2>NOTE: You need to be a resident of the barangay to register. </h2>
        <h2> If not, contact to your nearest barangay.</center>
        </div>
    </div>
</div>


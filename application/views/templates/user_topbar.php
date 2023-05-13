<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto" id="topNav">
                <?php

                $usernotifnr = $this->Report_model->getuserNotifNotReadModel();
                $usernotifr = $this->Report_model->getuserNotifReadModel();
                $usernotifdone = $this->Report_model->getuserreportNotReadModel();
                $nonotif =  $this->Report_model->getuserreportcountdoneReadModel();
                $nonotifyet =  $this->Report_model->getuserNoNotifYet();
                $notif_count = count($nonotif);
                $count = 0;
                $count_done = 0;
                ?>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-lg-inline text-gray-600 medium">
                            <i class="fas fa-bell fa-lg"></i>
                            <span class="badge badge-info">
                                <?php foreach ($usernotifdone as $data) : ?>
                                    <?php if ($data['status'] != 'Pending' && $data['status'] != 'Record' && $data['status'] != 'Resolved' && $data['status'] != 'Unresolved') :  ?>
                                        <?php if ($user['id'] == $data['uqid']) :  ?>
                                            <?php $count++ ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php echo $count ?>
                            </span>
                        </span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" style="border:thin" border"1px solid black">
                        <?php foreach ($nonotifyet as $data) : ?>
                            <?php if ($data['status'] != 'Pending' && $data['status'] != 'Record' && $data['status'] != 'Resolved' && $data['status'] != 'Unresolved') :  ?>
                                <?php if ($user['id'] == $data['uqid']) : ?>
                                    <?php $count_done++ ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if ($count_done == 0) : ?>
                            <div class="row-fluid">
                                <div class="span12 text-center">
                                    No Notification Yet.
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php $testval = 0; ?>
                        <?php foreach ($usernotifdone as $data) : ?>
                            <?php if ($data['status'] != 'Pending' && $data['status'] != 'Record' && $data['status'] != 'Resolved' && $data['status'] != 'Unresolved') :  ?>
                                <?php if ($user['id'] == $data['uqid']) : ?>
                                    <?php if ($data['status'] == 'Scheduled') : ?>
                                        <a class="dropdown-item" href="<?= base_url('report/summonnotifcontrolerusernotif/' . $data['id']) ?>">
                                            <table cellpadding="5px">
                                                <tr>
                                                    <td>
                                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $data['image']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php $data['name'] ?> reported an <br> <?= $data['title'] ?> related to <?= $data['type'] ?> <br> is <?= $data['status'] ?>
                                                    </td>
                                                    <td>
                                                        <i class="fas fa-dot-circle"></i>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <?php $testval++; ?>
                                    <?php endif; ?>
                                    <?php if ($data['status'] != 'Scheduled') : ?>
                                        <a class="dropdown-item" href="<?= base_url('report/notifcontrolerusernotif/' . $data['id']) ?>">
                                            <table cellpadding="5px">
                                                <tr>
                                                    <td>
                                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $data['image']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php $data['name'] ?> reported an <br> <?= $data['title'] ?> related to <?= $data['type'] ?> <br> is <?= $data['status'] ?>
                                                    </td>
                                                    <td>
                                                        <i class="fas fa-dot-circle"></i>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php foreach ($usernotifr as $data2) : ?>
                            <?php if ($data2['status'] != 'Pending' && $data2['status'] != 'Record' && $data2['status'] != 'Resolved' && $data2['status'] != 'Unresolved') :  ?>
                                <?php if ($user['id'] == $data2['uqid']) : ?>
                                    <?php if ($data2['status'] == 'Scheduled') : ?>
                                        <a class="dropdown-item" href="<?= base_url('report/summonnotifcontrolerusernotif/' . $data2['id']) ?>">
                                            <table cellpadding="5px">
                                                <tr>
                                                    <td>
                                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $data2['image']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?= $data2['name'] ?> reported an <br> <?= $data2['title'] ?> related to <?= $data2['type'] ?> <br> is <?= $data2['status'] ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                    <?php endif; ?>
                                    <?php if ($data2['status'] != 'Scheduled') : ?>
                                        <a class="dropdown-item" href="<?= base_url('report/notifcontrolerusernotif/' . $data2['id']) ?>">
                                            <table cellpadding="5px">
                                                <tr>
                                                    <td>
                                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $data2['image']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?= $data2['name'] ?> reported an <br> <?= $data2['title'] ?> related to <?= $data2['type'] ?> <br> is <?= $data2['status'] ?>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('user'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            My Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Sign Out
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
        <style>
            .dropdown-menu {
                max-height: 400px;
                max-width: auto;
                overflow: hidden;
                overflow-y: auto;
            }

            ::-webkit-scrollbar {
                width: 12px;
            }

            ::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.8);
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb {
                border-radius: 10px;
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
            }
        </style>
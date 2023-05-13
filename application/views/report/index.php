<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">History Report</h6>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Case</th>
                                <th>Status</th>
                                <th>Reporters Name</th>
                                <th>Case No.</th>
                                <th>Accused Name</th>
                                <th>Report Title</th>
                                <th>Report Type</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1; ?>
                            <?php foreach ($reports as $r) : ?>
                                <tr>
                                    <td><?= $index; ?></td>
                                    <td><?= $r['cases']; ?></td>
                                    <?php if ($r['status'] == "Cancelled") : ?>
                                        <td><a class="badge badge-secondary badge-center" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Pending") : ?>
                                        <td><a class="badge badge-warning badge-center" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "On Process") : ?>
                                        <td><a class="badge badge-primary" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Record") : ?>
                                        <td><a class="badge badge-secondary" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Scheduled") : ?>
                                        <td><a class="badge badge-info" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Endorsed") : ?>
                                        <td><a class="badge badge-warning" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Settled") : ?>
                                        <td><a class="badge badge-success" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Dismiss") : ?>
                                        <td><a class="badge badge-danger" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Resolved") : ?>
                                        <td><a class="badge badge-success" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <?php if ($r['status'] == "Unresolved") : ?>
                                        <td><a class="badge badge-danger" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>
                                    <?php endif; ?>
                                    <td><?= $r['name']; ?></td>
                                    <td><?= $r['id']; ?></td>
                                    <td><?= $r['accused_name']; ?></td>
                                    <td><?= $r['title']; ?></td>
                                    <td><?= $r['type']; ?></td>
                                    <td><?= $r['date_reported'] ?></td>
                                    <td width="25%">
                                        <a class="badge badge-primary" style="font-size:14px;" href="<?= site_url('report/update_detail/' . $r['id']); ?>">Detail</a>
                                        <?php if ($r['status'] == "Scheduled") : ?>
                                            <a class="badge badge-info" style="font-size:14px;" href="<?= site_url('report/schedule_summon/' . $r['id']); ?>">Make Schedule</a>
                                        <?php endif; ?>
                                        <?php if ($r['status'] != "Pending" && $r['status'] != "On Process" && $r['status'] != "Scheduled" && $r['status'] != "Record" && $r['status'] != "Cancelled" && $r['status'] != "Resolved" && $r['status'] != "Unresolved") : ?>
                                            <a class="badge badge-info" style="font-size:14px;" href="<?= site_url('report/view_summon/' . $r['id']); ?>">View Summon</a>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "Settled") : ?>
                                            <a class="badge badge-success" style="font-size:14px;" href="<?= site_url('report/settlement/' . $r['id']); ?>">Settlement</a>
                                        <?php endif; ?>
                                        <?php if ($r['status'] == "Record") : ?>
                                            <a class="badge badge-info" style="font-size:14px;" href="<?= site_url('report/action_taken/' . $r['id']); ?>">Action Taken</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $index++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Deleted data cannot be recovered!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Remove</a>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">


        <div class="card-header py-3">
            <div class="col-md-9">
                <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('report') ?>"><i class="fas fa-arrow-left"></i> Back</a></h6>
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary" style="text-align:left; display:inline-block;">Summon History</h6>
        </div>
        <?php include 'vsummon_layout.php';?>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    function openTab() {
        window.open('<?= site_url('report/first_hearing_pdf/' . $ureport['id']); ?>', '_blank');
    }

    function openTab2() {
        window.open('<?= site_url('report/second_hearing_pdf/' . $ureport['id']); ?>', '_blank');
    }

    function openTab3() {
        window.open('<?= site_url('report/third_hearing_pdf/' . $ureport['id']); ?>', '_blank');
    }
</script>
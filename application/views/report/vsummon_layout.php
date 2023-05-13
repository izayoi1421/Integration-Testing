<form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th># Summon</th>
                                <th>Summon Detail</th>
                                <th>Case No.</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1 ?>
                            <?php foreach ($reportsummon as $r) : ?>
                                <?php if ($ureport['id'] == $r['case_no']) : ?>
                                    <tr>
                                        <td><?= $index; ?></td>
                                        <td><?= $r['summon_detail']; ?></td>
                                        <td><?= $r['case_no']; ?></td>
                                        <td><?= $r['summon_schedule']; ?></td>
                                        <td width="17%">
                                            <?php if ($r['summon_no'] == "1st") : ?>
                                                <button class="badge badge-danger" style="font-size:14px;" onclick="openTab()"><i class="fas fa-file-pdf"></i> Save as PDF</button>
                                            <?php endif; ?>
                                            <?php if ($r['summon_no'] == "2nd") : ?>
                                                <button class="badge badge-danger" style="font-size:14px;" onclick="openTab2()"><i class="fas fa-file-pdf"></i> Save as PDF</button>
                                            <?php endif; ?>
                                            <?php if ($r['summon_no'] == "3rd") : ?>
                                                <button class="badge badge-danger" style="font-size:14px;" onclick="openTab3()"><i class="fas fa-file-pdf"></i> Save as PDF</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $index++; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
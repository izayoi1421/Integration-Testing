<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr class="centerwspace">
                                <td colspan="2"><b>Republic of the Philippines</b></td>
                            </tr>
                            <tr class="centerwspace">
                                <td colspan="2">Barangay 386 Zone 39 Manila</td>                            
                            </tr>
                            <tr class="spaceUnder">
                                <td colspan="2">Barangay Complain and Incident Automated Record System</td>                            
                            </tr>
                            <tr class="smallspacingBot">                            
                                <td>Barangay Blotter No.:</td>
                                <td><?= $ureport['date_reported']?>-<?php echo $ureport['id']; ?></td>
                            </tr>
                            <tr class="smallspacingBot">                            
                                <td>Date :</td>
                                <td><?= $ureport['date_reported']?></td>
                            </tr>
                            <tr class="smallspacingBot">
                                <td width="30%">Subject : </td> 
                                <td width="70%"><?php echo $ureport['type']; ?></td>                           
                            </tr>                                
                            <tr class="spacingBot">
                                <?php if($ureport['accused_name'] != "NA") : ?> 
                                    <td>To      : </td>
                                    <td><?php echo $ureport['accused_name']; ?></td>
                                <?php endif; ?>
                            </tr>
                        </thead>    
                        <tbody>
                            <tr class="spacingTop" style="border-top:1px solid black;">                            
                                <td>Title :</td>
                                <td><?php echo $ureport['title']; ?></td>
                            </tr>
                            <tr class="spacingBot">                            
                                <td>Description :</td>
                                <td><?php echo $ureport['description']; ?></td>
                            </tr>
                            <tr class="center">                            
                                <td width="10%"><b>Joey Cruz</b></td>
                                <td width="90%"></td>
                            </tr>
                            <tr class="spaceUnder">               
                                <td>Secretary</td>
                                <td></td>
                            </tr>
                            <tr class="center">                            
                                <td ><b><?php echo $ureport['name']; ?></b></td>
                                <td></td>
                            </tr>
                            <tr class="center">                   
                                <td>Complainant</td>
                                <td></td>
                            </tr>
                    </tbody>
                    </table>
                </div>
            </div>
<style>
.nsize{
  width:30%;
}
.center {
  margin: auto;
  width: 50%;
  text-align: center; 
}
.centerwspace {
  margin: auto;
  width: 50%;
  text-align: center; 
  padding-bottom: 1em;
}
tr.centerwspace>td {
  margin: auto;
  width: 50%;
  text-align: center; 
  padding-bottom: 1em;
}

.uspace{
    padding: 5em;
}
tr.smallspacingBot>td {
  padding-bottom: 1em;
}
tr.spacingBot>td {
  padding-bottom: 4em;
}
tr.spacingTop>td {
    padding-top: 3em;
    padding-bottom: 1em;
}
tr.spaceUnder>td {
  padding-bottom: 4em;
  margin: auto;
  width: 50%;
  text-align: center; 
}
tr.spaceUpper>td {
  padding-top: 4em;
  margin: auto;
  width: 50%;
  text-align: center; 
}
</style>            
<?php view('inc.Header'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>for <?= (isset($title))? $title : ''; ?></small>
      </h1>

      <button class="btn btn-primary pull-right" onclick="window.print()" style="margin-top: -20px;" >Print</button>

    </section>

<style type="text/css">
	table tr td{
		text-align: center !important;
		border: 1px solid #000 !important;
	}

	table table tr td{
		border: none !important;
	}

  @media print{
    body{
      margin-top: -10px;
      font-size: 10px;
      page-break-before: avoid;
    }
    footer{
      visibility: hidden;
    }
  }
  
</style>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><?= (isset($title))? $title : ''; ?></h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        
        <div class="box-body">
          <table width="100%" height="auto" class="table-bordered">
            
            <tr>
              <td colspan="6">POMIS-5.B</td>
            </tr>

            <tr>
              <td colspan="6">
                আর্থিক প্রতিবেদন ( Financial Report ) 
              </td>
            </tr>

            <tr>
              <td>নোট – ৪</td>
              <td colspan="2">ক্ষুদ্রঋণ হিসাব ( মাঠ পর্যায়ে ঋণ স্থিতি )</td>
              <td>পুরুষ</td>
              <td>মহিলা</td>
              <td>মোট</td>
            </tr>

<!-- start pksf -->

<?php
  $pList = $this->db->where("pksf","1")->get("project")->result();
?>

            <tr>
              <td rowspan="<?= count($pList) + 2 ?>">পিকেএসএফ</td>
            </tr>

<?php
  
  // pksf initial value
  $pksfLoanM = 0;
  $pksfLoanF = 0;

  $pksfCollectionM = 0;
  $pksfCollectionF = 0;

    foreach($pList as $list):


      // total loan given upto today
      // male given loan
      $uptoGivenLoanM = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id")->row();

      $pksfLoanM += $uptoGivenLoanM->total_amount;

    // female loan given
      $uptoGivenLoanF = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id")->row();

      $pksfLoanF += $uptoGivenLoanF->total_amount;

      // total collection upto today
      // male collection
      $uptoLoanCollectionM = $this->db->query("SELECT SUM(lc.capital) as capital FROM loan_collection lc,member_info mi,somiti_project sp WHERE lc.member_id = mi.user_id AND mi.somiti = sp.somiti_id AND sp.project_id = $list->id AND mi.gender = 1")->row();

      $pksfCollectionM += $uptoLoanCollectionM->capital;

      // female collection
      $uptoLoanCollectionF = $this->db->query("SELECT SUM(lc.capital) as capital FROM loan_collection lc,member_info mi,somiti_project sp WHERE lc.member_id = mi.user_id AND mi.somiti = sp.somiti_id AND sp.project_id = $list->id AND mi.gender = 2")->row();

      $pksfCollectionF += $uptoLoanCollectionF->capital;

?>

            <tr>
              <td><?= $list->project_name ?></td>
              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td>এ যাবৎ ঋণ বিতরণ </td>
                  </tr>

                  <tr>
                    <td>এ যাবৎ ঋণ আদায় </td>
                  </tr>

                  <tr>
                    <td>বর্তমান ঋণ স্থিতি </td>
                  </tr>
                
                </table>
              </td>
              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?php if($uptoGivenLoanM->total_amount != ''): echo $uptoGivenLoanM->total_amount;else:echo 0;endif;  ?></td>
                  </tr>

                  <tr>
                    <td><?php if($uptoLoanCollectionM->capital != ''):echo $uptoLoanCollectionM->capital;else:echo 0;endif; ?></td>
                  </tr>

                  <tr>
                    <td><?= $uptoGivenLoanM->total_amount - $uptoLoanCollectionM->capital ?></td>
                  </tr>
                
                </table>
              </td>

              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?php if($uptoGivenLoanF->total_amount != ''):echo $uptoGivenLoanF->total_amount;else:echo 0;endif; ?></td>
                  </tr>

                  <tr>
                    <td><?php if($uptoLoanCollectionF->capital != ''):echo $uptoLoanCollectionF->capital;else:echo 0;endif; ?></td>
                  </tr>

                  <tr>
                    <td><?= $uptoGivenLoanF->total_amount - $uptoLoanCollectionF->capital ?></td>
                  </tr>
                
                </table>
              </td>

              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $uptoGivenLoanM->total_amount + $uptoGivenLoanF->total_amount ?></td>
                  </tr>

                  <tr>
                    <td><?= $uptoLoanCollectionM->capital + $uptoLoanCollectionF->capital ?></td>
                  </tr>

                  <tr>
                    <td><?= $uptoGivenLoanM->total_amount + $uptoGivenLoanF->total_amount - $uptoLoanCollectionM->capital - $uptoLoanCollectionF->capital ?></td>
                  </tr>
                
                </table>
              </td>

            </tr>

<?php endforeach; ?>

            <tr>
              <td>সর্বমোট </td>
              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td>এ যাবৎ ঋণ বিতরণ </td>
                  </tr>

                  <tr>
                    <td>এ যাবৎ ঋণ আদায় </td>
                  </tr>

                  <tr>
                    <td>বর্তমান ঋণ স্থিতি </td>
                  </tr>
                
                </table>
              </td>
              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $pksfLoanM ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfCollectionM ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfLoanM - $pksfCollectionM ?></td>
                  </tr>
                
                </table>
              </td>

              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $pksfLoanF ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfCollectionF ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfLoanF - $pksfCollectionF ?></td>
                  </tr>
                
                </table>
              </td>

              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $pksfLoanM + $pksfLoanF ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfCollectionM + $pksfCollectionF ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfLoanM + $pksfLoanF - $pksfCollectionM - $pksfCollectionF ?></td>
                  </tr>
                
                </table>
              </td>

            </tr>

<!-- end pksf -->

<!-- start non pksf -->

<?php
  $pList = $this->db->where("pksf","2")->get("project")->result();
?>

            <tr>
              <td rowspan="<?= count($pList) + 2 ?>">নন পিকেএসএফ</td>
            </tr>

<?php
  
  // pksf initial value
  $nonpksfLoanM = 0;
  $nonpksfLoanF = 0;

  $nonpksfCollectionM = 0;
  $nonpksfCollectionF = 0;

    foreach($pList as $list):


      // total loan given upto today
      // male given loan
      $uptoGivenLoanM = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=1 AND sp.project_id = $list->id")->row();

      $nonpksfLoanM += $uptoGivenLoanM->total_amount;

    // female loan given
      $uptoGivenLoanF = $this->db->query("SELECT SUM(li.loan_amount) as total_amount FROM `loan_info` li,somiti_project sp,member_info mi WHERE li.somiti_id=sp.somiti_id AND mi.user_id = li.member_id AND mi.gender=2 AND sp.project_id = $list->id")->row();

      $nonpksfLoanF += $uptoGivenLoanF->total_amount;

      // total collection upto today
      // male collection
      $uptoLoanCollectionM = $this->db->query("SELECT SUM(lc.capital) as capital FROM loan_collection lc,member_info mi,somiti_project sp WHERE lc.member_id = mi.user_id AND mi.somiti = sp.somiti_id AND sp.project_id = $list->id AND mi.gender = 1")->row();

      $nonpksfCollectionM += $uptoLoanCollectionM->capital;

      // female collection
      $uptoLoanCollectionF = $this->db->query("SELECT SUM(lc.capital) as capital FROM loan_collection lc,member_info mi,somiti_project sp WHERE lc.member_id = mi.user_id AND mi.somiti = sp.somiti_id AND sp.project_id = $list->id AND mi.gender = 2")->row();

      $nonpksfCollectionF += $uptoLoanCollectionF->capital;

?>

            <tr>
              <td><?= $list->project_name ?></td>
              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td>এ যাবৎ ঋণ বিতরণ </td>
                  </tr>

                  <tr>
                    <td>এ যাবৎ ঋণ আদায় </td>
                  </tr>

                  <tr>
                    <td>বর্তমান ঋণ স্থিতি </td>
                  </tr>
                
                </table>
              </td>
              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?php if($uptoGivenLoanM->total_amount != ''): echo $uptoGivenLoanM->total_amount;else:echo 0;endif;  ?></td>
                  </tr>

                  <tr>
                    <td><?php if($uptoLoanCollectionM->capital != ''):echo $uptoLoanCollectionM->capital;else:echo 0;endif; ?></td>
                  </tr>

                  <tr>
                    <td><?= $uptoGivenLoanM->total_amount - $uptoLoanCollectionM->capital ?></td>
                  </tr>
                
                </table>
              </td>

              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?php if($uptoGivenLoanF->total_amount != ''):echo $uptoGivenLoanF->total_amount;else:echo 0;endif; ?></td>
                  </tr>

                  <tr>
                    <td><?php if($uptoLoanCollectionF->capital != ''):echo $uptoLoanCollectionF->capital;else:echo 0;endif; ?></td>
                  </tr>

                  <tr>
                    <td><?= $uptoGivenLoanF->total_amount - $uptoLoanCollectionF->capital ?></td>
                  </tr>
                
                </table>
              </td>

              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $uptoGivenLoanM->total_amount + $uptoGivenLoanF->total_amount ?></td>
                  </tr>

                  <tr>
                    <td><?= $uptoLoanCollectionM->capital + $uptoLoanCollectionF->capital ?></td>
                  </tr>

                  <tr>
                    <td><?= $uptoGivenLoanM->total_amount + $uptoGivenLoanF->total_amount - $uptoLoanCollectionM->capital - $uptoLoanCollectionF->capital ?></td>
                  </tr>
                
                </table>
              </td>

            </tr>

          <?php endforeach; ?>

            <tr>
              <td>সর্বমোট </td>
              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td>এ যাবৎ ঋণ বিতরণ </td>
                  </tr>

                  <tr>
                    <td>এ যাবৎ ঋণ আদায় </td>
                  </tr>

                  <tr>
                    <td>বর্তমান ঋণ স্থিতি </td>
                  </tr>
                
                </table>
              </td>
              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $nonpksfLoanM ?></td>
                  </tr>

                  <tr>
                    <td><?= $nonpksfCollectionM ?></td>
                  </tr>

                  <tr>
                    <td><?= $nonpksfLoanM - $nonpksfCollectionM ?></td>
                  </tr>
                
                </table>
              </td>

              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $nonpksfLoanF ?></td>
                  </tr>

                  <tr>
                    <td><?= $nonpksfCollectionF ?></td>
                  </tr>

                  <tr>
                    <td><?= $nonpksfLoanF - $nonpksfCollectionF ?></td>
                  </tr>
                
                </table>
              </td>

              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $nonpksfLoanM + $nonpksfLoanF ?></td>
                  </tr>

                  <tr>
                    <td><?= $nonpksfCollectionM + $nonpksfCollectionF ?></td>
                  </tr>

                  <tr>
                    <td><?= $nonpksfLoanM + $nonpksfLoanF - $nonpksfCollectionM - $nonpksfCollectionF ?></td>
                  </tr>
                
                </table>
              </td>

            </tr>

            <!-- end non pksf -->

           <!-- start intotal -->

            <tr>
              <td>সর্বমোট ( পিকেঃ নন পিকে ) </td>
              <td></td>
              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td>এ যাবৎ ঋণ বিতরণ </td>
                  </tr>

                  <tr>
                    <td>এ যাবৎ ঋণ আদায় </td>
                  </tr>

                  <tr>
                    <td>বর্তমান ঋণ স্থিতি </td>
                  </tr>
                
                </table>
              </td>
              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $pksfLoanM + $nonpksfLoanM ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfCollectionM + $nonpksfCollectionM ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfLoanM + $nonpksfLoanM - $pksfCollectionM - $nonpksfCollectionM ?></td>
                  </tr>
                
                </table>
              </td>

              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $pksfLoanF + $nonpksfLoanF ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfCollectionF + $nonpksfCollectionF ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfLoanF + $nonpksfLoanF - $pksfCollectionF - $nonpksfCollectionF ?></td>
                  </tr>
                
                </table>
              </td>

              <td>
                <table width="100%" height="100%" class="table-bordered">
                  
                  <tr>
                    <td><?= $pksfLoanM + $nonpksfLoanM + $pksfLoanF + $nonpksfLoanF ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfCollectionM + $nonpksfCollectionM + $pksfCollectionF + $nonpksfCollectionF ?></td>
                  </tr>

                  <tr>
                    <td><?= $pksfLoanM + $nonpksfLoanM + $pksfLoanF + $nonpksfLoanF - $pksfCollectionM - $nonpksfCollectionM - $pksfCollectionF - $nonpksfCollectionF ?></td>
                  </tr>
                
                </table>
              </td>

            </tr>

            <tr style="height:20px !important;">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

  <!-- end intotal -->


          </table>
        </div>
    

  <div class="box-footer">
    <div class="form-group">
      <span>
          <?php if (hasFlash('msg')) {?>
              <span><?= flashMessage('msg')  ?></span>
          <?php } ?>
      </span>
    </div>
  </div><!-- /.box-footer-->
</div><!-- /.box -->

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

<?php view('inc.Footer'); ?>
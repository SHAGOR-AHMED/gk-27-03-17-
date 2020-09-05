<?php view('inc.Header'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>for <?= (isset($title))? $title : ''; ?></small>
      </h1>
    </section>

<style type="text/css">
	table tr td{
		text-align: center !important;
		border: 1px solid #000 !important;
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
			<center> <b> গণস্বাস্থ্য কেন্দ্র ক্ষুদ্রঋণ কার্যক্রম ( জিকেএমসি) </b>
					 <p> আর্থিক প্রতিবেদনঃ সমন্বিত স্থিতিপত্র month, year; অর্থ বছর  year - year (month টু month)</p>	
			</center>
				<tr>
					<td rowspan="2"> ক্রঃ <br> নং </td>
					<td rowspan="2" colspan="2"> তহবিল ও দায় হিসাব </td>
					<td colspan="3"> বিগত অর্থ বছর ২০১৪-২০১৫ </td>
					<td colspan="3"> চলতি অর্থ বছর ২০১৫-২০১৬ (জুলাই টু জুন) </td>
				</tr>
				
				<tr>
					<td> পিকেএসএফ </td>
					<td> নন পিকেএসএফ </td>
					<td> মোট </td>
					<td> পিকেএসএফ </td>
					<td> নন পিকেএসএফ </td>
					<td> মোট </td>
				</tr>
				
				<tr>
					<td> ১ </td>
					<td colspan="2"> &nbsp; </td>
					<td> টাকা </td>
					<td> টাকা  </td>
					<td> টাকা </td>
					<td> টাকা </td>
					<td> &nbsp; </td>
					<td> টাকা </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বিগত বছরের তহবিল </td>
					<td> - </td>
					<td> -  </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> চলতি বছরের উদ্বৃত </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> মোট  উদ্বৃত তহবিল হিঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অনুদান হিসাব </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অবচয় তহবিল </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সংরক্ষিত তহবিল হিসাব </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ঋণ ব্যবস্থাপনা সঞ্চিতি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> উপমোটঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> PKSF (ফান্ড হিঃ) :</td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> প্ললী ঋণ (আরএমসি) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অতি দরিদ্র (ইউপিপি) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অতিদরিদ্র (বৈঃ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> দুর্যোগ ব্যবস্থাপনা ঋণ ইফরাপ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2" style="text-align:right !important;"> মোট (ফান্ড হিঃ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> প্রধান অফিস হিঃ (এফএসসি) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ঋণ হিসাব জিকে মৌসুমী </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> জিসিসিএসএল </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> প্রাথমিক জমা হিঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> উপমোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অভ্যন্তরীন লেনদেনঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> প্রধান অফিস হিঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				<tr>
					<td> ২ </td>
					<td colspan="2"> আঞ্চলিক অফিস হিঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> শাখা অফিস হিঃ  </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> উপমোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> স্বেচ্ছা সঞ্চয় তহবিল </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সঞ্চয় তহবিল (বুনিয়াদ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সঞ্চয় তহবিল (জাগরণ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সঞ্চয় তহবিল </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> উপমোট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বীমা তহবিল </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> দুর্যোগ ব্যবস্থাপনা সঞ্চিতি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> এলএলপি হিসাব </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> আসবাব পত্র </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অবচয় সঞ্চিতি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> পাওনাদার সঞ্চিতি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> প্রভিডেন্ট ফান্ড (পিএফ) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> বই ও পত্রিকা </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ফিডিলিটি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ভ্যাট সঞ্চিতি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সানড্রি ডিপোজিট </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সংরক্ষিত তহবিল হিসাব </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ঋণের সুদ সঞ্চিতি </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> আন্তঃঋণ হিসাব (শাখা টু শাখা) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ঋণ হিসাব- (শিক্ষাকার্যক্রম) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> অন্যান্য দায় হিঃ </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> জামানত হিঃ কর্মী </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> ওডিঋণ প্রধান অফিস </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> আন্তঃঋণ হিসাব (প্রধান অফিস) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> আন্তঃঋণ হিসাব (শাখা অফিস) </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<tr>
					<td> ২ </td>
					<td style="text-align:right !important;" colspan="2"> স্থায়ী সম্পত্তি মোটঃ</td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				
				
				<tr>
					<td> ২ </td>
					<td colspan="2"> সর্বমোট তহবিল / দায় </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
			</table>
		</div><!-- /.box-body -->
		
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
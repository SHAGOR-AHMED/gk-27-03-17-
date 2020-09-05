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
			<p style="text-align:center;"> <b> MIS প্রতিবেদন ( বকেয়া শ্রেণীকরন, স্টাফ সংক্রান্ত  )  গণস্বাস্থ্য কেন্দ্র,  ইং </b> </p>
			<table width="100%" height="auto" class="table-bordered">
				<tr>
					<td style="width: 8%; border-bottom:none !important; "> কর্মসূচীর নাম</td>
					
					<td style="width: 8%;"> ভালো ঋণ <br> Standard <br> Loan </td>
					
					<td style="width: 12%;"> ( ১ - ৩০ ) দিন পর্যন্ত বকেয়া <br> সদস্যদের ( Watchful <br> Loan )</td>
					
					<td style="width: 12%;"> ( ৩১ - ১৮০ ) দিন পর্যন্ত বকেয়া <br> সদস্যদের ( Sub-Standard <br> Loan )</td>
					
					<td style="width: 12%;"> ( ১৮১ - ৩৬৫) দিন পর্যন্ত বকেয়া <br> সদস্যদের ( Doubtful <br> Loan )</td>
					
					<td style="width: 8%;"> কু-ঋণ <br> ( ৩৬৫ + দিন ) <br>( Bad Loan ) </td>
					
					<td style="width: 8%;"> মোট  ঋণস্থিতি  </td>
					<td style="width: 8%;"> মোট  বকেয়া  </td>
					<td style="width: 8%;">  বকেয়া  সদস্যদের ঋণস্থিতি </td>
					<td style="width: 8%;"> দুই কিস্তির বেশি <br> বকেয়া  সদস্যদের <br> ঋণস্থিতি </td>
					<td style="width: 8%;"> বকেয়া  সদস্যদের <br> সঞ্চয়স্থিতি </td>
				</tr>
				
				<!-- titling start -->
				
				<tr>
					<td style="border-top:none !important;">  </td>		
					
					<td> ঋণস্থিতি </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%; border-left:none !important; border-top:none !important; border-bottom:none !important;"> বকেয়া </td>
								<td style="width: 50%; border:none !important;"> ঋণস্থিতি </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%; border-left:none !important; border-top:none !important; border-bottom:none !important;"> বকেয়া </td>
								<td style="width: 50%; border:none !important;"> ঋণস্থিতি </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%; border-left:none !important; border-top:none !important; border-bottom:none !important;"> বকেয়া </td>
								<td style="width: 50%; border:none !important;"> ঋণস্থিতি </td>
							</tr>
						</table>
					</td>
					
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
				
				<!-- titling end -->
				
				<!-- numbering start -->
				
				<tr>
					<td> ১ </td>		
					
					<td> ২ </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%; border-left:none !important; border-top:none !important; border-bottom:none !important;"> ৩ </td>
								<td style="width: 50%; border:none !important;"> ৪ </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%; border-left:none !important; border-top:none !important; border-bottom:none !important;"> ৫ </td>
								<td style="width: 50%; border:none !important;"> ৬ </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%; border-left:none !important; border-top:none !important; border-bottom:none !important;"> ৭ </td>
								<td style="width: 50%; border:none !important;"> ৮ </td>
							</tr>
						</table>
					</td>
					
					<td> ৯ </td>
					<td> ১০ = ২+৪+৬+৮+৯ </td>
					<td> ১১ = ৩+৫+৭+৯ </td>
					<td> ১২ = ৪+৬+৮+৯ </td>
					<td> ১৩ </td>
					<td> ১৪ </td>
				</tr>
				
				<!-- numbering end -->
				
				<!-- RMC start -->
				
				<tr>
					<td> RMC </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- RMC end -->
				
				<!-- JAGORON Start -->	
				
				<tr>
					<td> JAGORON </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- JAGORON End -->
				
				<!-- BUNIAD এককালীন Start -->	
				
				<tr>
					<td> BUNIAD এককালীন </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- BUNIAD এককালীন End -->
				
				<!-- BUNIAD সাপ্তাহিক Start -->	
				
				<tr>
					<td> BUNIAD সাপ্তাহিক </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- BUNIAD সাপ্তাহিক End -->
				
				<!-- BUNIAD সর্বমোট Start -->	
				
				<tr>
					<td> BUNIAD সর্বমোট </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- BUNIAD সর্বমোট End -->
				
				<!-- FSOEUPP Start -->	
				
				<tr>
					<td> FSOEUPP </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- FSOEUPP End -->
				
				<!-- EFFRAP Start -->	
				
				<tr>
					<td> EFFRAP </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- EFFRAP End -->
				
				<!-- LRP Start -->	
				
				<tr>
					<td> LRP </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- LRP End -->
				
				<!-- Unknown Start -->	
				
				<tr>
					<td> &nbsp; </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- Unknown End -->
				
				<!-- PKSF Start -->	
				
				<tr>
					<td> BUNIAD সর্বমোট </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- PKSF End -->
				
				<!-- non - PKSF  Start -->	
				
				<tr>
					<td> NON - PKSF </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- non - PKSF End -->
				
				<!-- সর্বমোট  Start -->	
				
				<tr>
					<td> সর্বমোট </td>		
					
					<td> - </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> - </td>
								<td style="width: 50%;"> - </td>
							</tr>
						</table>
					</td>
					
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
					<td> - </td>
				</tr>
				
				<!-- সর্বমোট End -->
			</table>
			
		</div><!-- /.box-body -->
		
		<!-- Second Sheet -->
		
		<div class="box-body">
			<p style="text-align:left;"> <b> ( খ ) <u> স্টাফ সংক্রান্তঃ </u> </b> </p>
			<table width="100%" height="auto" class="table-bordered">
				<tr>
					<td> &nbsp; </td>
					<td colspan="6" > শাখা পর্যায় </td>
					<td rowspan="2"> প্রধান কার্যালয় </td>
					<td rowspan="2"> সর্বমোট </td>
				</tr>
				
				<tr>
					<td>  ক্ষুদ্রঋণ কর্মসূচীর নাম </td>
					<td> মাঠ কর্মী </td>
					<td> সুপারভাইজার/ </td>
					<td> হিসাবরক্ষক </td>
					<td> শাখা ব্যবস্থাপক </td>
					<td> অন্যান্য </td>
					<td> মোট </td>
				</tr>
				
				<tr>
					<td> RMC </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
				
				<tr>
					<td>  UPP </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
				
				<tr>
					<td>  ক্ষুদ্র উদ্যোগী ঋণ </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
				
				<tr>
					<td> অন্যান্য  ক্ষুদ্রঋণ </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
				
				<tr>
					<td>  অন্যান্য  ক্ষুদ্রঋণ </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
				
				<tr>
					<td> পিকেএসএফ মোট </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
				
				<tr>
					<td> NON - PKSF </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
				
				<tr>
					<td> সর্বমোট </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
				
				<tr>
					<td> দ্বৈত গণনা ছাড়া সর্বমোট </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
					<td> &nbsp; </td>
				</tr>
			</table>
			
			<p> 
				বিঃ দ্রঃ  উপরোক্ত ছকে অন্যান্য ক্ষুদ্রঋণ কার্যক্রমের ক্ষেত্রে প্রয়োজনীয় সংখ্যক সারি তৈ্রী করে কার্যক্রমের নাম উল্লেখ পূর্বক আলাদাভাবে তথ্য সন্নিবেশ করতে হবে।
			</p>
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
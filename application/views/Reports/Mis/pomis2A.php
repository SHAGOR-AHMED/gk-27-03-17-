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
			<p style="text-align:center;"> <b> MIS প্রতিবেদন ( ঋণ )  গণস্বাস্থ্য কেন্দ্র,  ইং </b> </p>
			<table width="100%" height="auto" class="table-bordered">
				<tr>
					<td style="width: 16%;"> কর্মসূচীর নাম</td>
					
					<td style="width: 8%;"> বিগত মাস শেষে  <br> বকেয়া </td>
					
					<td style="width: 8%;"> এ মাসে <br> নিয়মিত <br> আদায়যোগ্য </td>
					
					<td style="width: 32%;">
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td colspan="4"> এ মাসে আদায় </td>
							</tr>
							<tr>
								<td width="20%">নিয়মিত</td>
								<td width="20%">বকেয়া</td>
								<td width="20%">অগ্রিম</td>
								<td width="40%">মোট <br> &nbsp;</td>
							</tr>
						</table>	
					</td>
					
					<td style="width: 8%;"> এ মাসে নতুন  <br> বকেয়া </td>
					
					<td style="width: 16%;">
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td colspan="2"> মাস শেষে </td>
							</tr>
							<tr>
								<td style="width: 50%;"> মোট বকেয়া </td>
								<td style="width: 50%;"> বকেয়া ঋণ <br> গ্রহীতার সংখ্যা </td>
							</tr>
						</table>	
					</td>
				</tr>
				
				<!-- numbering start -->
				<tr>
					<td> ১ </td>		
					
					<td> ২ </td>
					
					<td> ৩ </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 20%;"> ৪ </td>
								<td style="width: 20%;"> ৫ </td>
								<td style="width: 20%;"> ৬ </td>
								<td style="width: 40%;"> ৭ = ৪+৫+৬ </td>
							</tr>
						</table>
					</td>
					
					<td> ৮ = ৩-৪ </td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> ৯ = ২-৫+৮ </td>
								<td style="width: 50%;"> ১০ </td>
							</tr>
						</table>
					</td>
						
				</tr>
				<!-- numbering end -->
				
				<!-- RMC Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">RMC</td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- RMC End -->
				
				<!-- JAGORON Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> JAGORON </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- JAGORON End -->
				
				<!-- BUNIAD এককালীন Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> BUNIAD এককালীন  </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- BUNIAD এককালীন End -->
				
				<!-- BUNIAD সাপ্তাহিক Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> BUNIAD সাপ্তাহিক  </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- BUNIAD সাপ্তাহিক End -->
				
				<!-- BUNIAD সর্বমোট Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> BUNIAD সর্বমোট </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- BUNIAD সর্বমোট End -->
				
				<!-- FSOEUPP Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> FSOEUPP </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- FSOEUPP End -->
				
				<!-- EFFRAP Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> EFFRAP </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- EFFRAP End -->
				
				<!-- LRP Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> LRP </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- LRP End -->
				
				<!-- PKSF OTHERS LOAN Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> PKSF OTHERS <br> LOAN </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- PKSF OTHERS LOAN End -->
				
				<!-- পিকেএসএফ মোট  Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> পিকেএসএফ  <br> মোট </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- পিকেএসএফ মোট End -->
				
				<!-- non - PKSF  Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> NON - PKSF </td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- non - PKSF End -->
				
				<!-- সর্বমোট  Start -->	
				
				<tr>
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;"> সর্বমোট</td>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td> পুরুষ </td>
										</tr>
										<tr>
											<td> মহিলা </td>
										</tr>
										<tr>
											<td> মোট : </td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>		
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:20%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width:40%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td>
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
					<td>
						<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
							<tr>
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
								
								<td style="width: 50%;">
								
									<table width="100%" height="auto" class="table-bordered" class="table-bordered" style="border-top: none !important;border-bottom: none !important;">
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
										<tr>
											<td>-</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
					
				</tr>
				
				<!-- সর্বমোট End -->
			</table>
			<p> 
				বিঃ দ্রঃ (ক)  পিকেএসএফ মোট ও সর্বমোট সারিতে বকেয়া ঋণগ্রহীতার সংখ্যায় দ্বৈত গণনা পরিহার করে প্রকৃ্ত সংখ্যা উল্লেখ করতে হবে। <br>
				(খ) উপরোক্ত ছকে অন্যান্য ক্ষুদ্রঋণ কার্যক্রমের ক্ষেত্রে প্রয়োজনীয় সংখ্যক সারি তৈ্রী করে কার্যক্রমের নাম উল্লেখ পূর্বক আলাদাভাবে তথ্য সন্নিবেশ করতে হবে।
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
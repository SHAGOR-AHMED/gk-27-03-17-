<!Doctype html>
<html>
<body style="color: #333;">
  <div style="width:670px; margin:15 auto; border:1px solid #CCC;">
      <table style="width:100%; padding:10px; border-collapse:collapse;">
          <tr>
            <td colspan="3" style="text-align: center; font-weight: 14px;">
              <?= $this->config->item('app_company_name'); ?>
              <br>
              <span style="font-size: 12px;">Loan management</span>
            </td>
          </tr>
          <tr><td style="text-align: center; font-size:11px;" colspan="3"><?= $member->brAddress ?></td></tr>
          <tr><td style="text-align: center; font-size:11px;" colspan="3"><strong>KYC Profile Form</strong></td></tr>
      </table>
    <div style="width:100%;">
      <table style="width:100%; padding:10px; border-collapse:collapse;">
          <?php
           if(!empty($member)): ?>
           <tr>
               <td colspan="2">
                   <strong style="font-size: 10px;">(1.0) Organization information:</strong>
               </td>
           </tr>
            <tr>
                <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>1.Organization's name: <?= $member->organization; ?></td>
                <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>2.Somiti's name: <?= $member->somitiName; ?></td>
            </tr>
            <tr>
                <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>3.Zilla's name: <?= $member->districtName; ?></td>
                <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>4.Upazilla's name: <?= $member->upazillaName; ?></td>
            </tr>
            <tr colspan="2">
                <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>5.First loan amount: <?= $member->first_step_loan; ?></td>
            </tr>

            <tr>
                <td colspan="2">
                    <strong style="font-size: 10px;">(2.0) Member information:</strong>
                </td>
            </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>1.Member's name: <?= $member->name; ?></td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>2.Father/Husband's name: <?= $member->father_or_husband; ?></td>
             </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>3.Mother's name: <?= $member->mother; ?></td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>4.Nationality: <?= $member->nationality; ?></td>
             </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>5.Phone: <?= $member->phone; ?></td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>6.Present address: <?= $member->address; ?></td>
             </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>7.Permanant address: <?= $member->parmanent_address; ?></td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>8.Member ID <?= $member->user_id; ?></td>
             </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>9.NID: <?= $member->nid; ?></td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>10.Member type: <?= $member->member_type; ?></td>
             </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>11.Occupation: <?= $member->occupation; ?></td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>12.Member type: <?= $member->member_type; ?></td>
             </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>13.Reference person: <?= $member->ref_person; ?></td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>(3.0) Member age: <?= $member->age; ?></td>
             </tr>
             <tr colspan="2">
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>(4.0) Educational status: <?= $member->educational_status; ?></td>
             </tr>

             <tr>
                 <td colspan="2">
                     <strong style="font-size: 10px;">(5.0) Family information:</strong>
                 </td>
             </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>1.Total children: <?= $member->total_child; ?></td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>2.Total family member: <?= $member->total_member; ?></td>
             </tr>

             <tr>
                 <td colspan="2">
                     <strong style="font-size: 10px;">(6.0) Habitation information:</strong>
                 </td>
             </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>1.Living type: <?= $member->living_type; ?></td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>2.Self home: <?= $member->self_home; ?></td>
             </tr>
             <tr>
                 <td colspan="2">
                     <strong style="font-size: 10px;">(7.0) Water and sanitation information:</strong>
                 </td>
             </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>1.Water source: <?= $member->water_source; ?></td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>2.Sanitary: <?= $member->sanitary; ?></td>
             </tr>
             <tr>
                 <td colspan="2">
                     <strong style="font-size: 10px;">(8.0) Family owned asset/Land information:</strong>
                 </td>
             </tr>
             <tr>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>1.Cultivable land: <?= $member->cultivable; ?> (decimals)</td>
                 <td style='padding-top:10px; padding-bottom:10px; font-size:10px;'>2.Residential land: <?= $member->sanitary; ?> (decimals)</td>
             </tr>

             <tr>
                 <td colspan="2">
                     <strong style="font-size: 10px;">(9.0) Family monthly earnings: <?= ($member->primary_monthly_earnings+$member->secondary_monthly_earnings); ?> (tk)</strong>
                 </td>
             </tr>

             <tr>
                 <td colspan="2">
                     <strong style="font-size: 10px;">(9.0) Family monthly expense: <?= $total_expense; ?> (tk)</strong>
                 </td>
             </tr>
          <?php endif; ?>
      </table>
    </div>

  </div>
    <span style="text-align:right;font-size:10px; margin-left:15px;">
      Date: <?= date("d M, Y / h:m:s:A")?> | Generated by <?= auth('name'); ?>
    </span>
</body>
</html>

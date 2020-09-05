<?php if(!empty($member)): ?>
<div class="row" id="step_one">
<form method="POST" action="" id="frm_step_one_update_form" enctype="multipart/form-data">
  <!-- member id for updating -->
  <input type="hidden" name="member_id" id="member_id_step_one" value="<?= $member->user_id; ?>">
  <div class="col-md-3">
    <div class="form-group">
        <label for="reg_branch">Regional Branch <span class="text-red">*</span></label>
        <select class="form-control" name="reg_branch" id="reg_branch" onchange="getBranchList(this);" required>
          <option value="<?= $member->reg_branch_id; ?>"><?= $member->regBrName; ?></option>
          <?php foreach ($regBranchList as $reg_branch) {
            echo '<option value="'. $reg_branch->id .'">'.$reg_branch->name.'</option>';
          } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="branch">Branch <span class="text-red">*</span></label>
        <select class="form-control" name="branch" id="branch" onchange="getSomitiList(this);" required>
          <option value="<?= $member->branch_id; ?>"><?= $member->brName; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="somiti">Somiti name <span class="text-red">*</span></label>
        <select class="form-control" name="somiti" id="somiti" required>
          <option value="<?= $member->somitiID; ?>"><?= $member->somitiName; ?></option>
          <?php /*foreach ($somitiList as $somiti) {
            echo '<option value="'. $somiti->id .'">'.$somiti->name.'</option>';
          }*/ ?>
        </select>
    </div>
    <div class="form-group">
        <label for="zilla">District <span class="text-red">*</span></label>
        <select class="form-control" name="zilla" id="zilla" onchange="getUpazillaList(this);" required>
          <option value="">Select District</option>
            <?php foreach ($districts as $district) {
              if($member->Zilla == $district->id){
                echo '<option value="'. $district->id .'" selected>'.$district->name.'</option>';
              }else{
                echo '<option value="'. $district->id .'">'.$district->name.'</option>';
              }
            } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="upazilla">Upazila <span class="text-red">*</span></label>
        <select class="form-control" name="upazilla" id="upazilla" required>
            <?php $upazilla = find('upazilas', '*', ['id' => $member->upazilla]); ?>
            <option value="<?= $upazilla->id; ?>"><?= $upazilla->name; ?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="organization">Organization's Name <span class="text-red">*</span></label>
        <input type="text" class="form-control" id="organization" name="organization" placeholder="Enter organization name" value="<?= $member->organization; ?>" required>
    </div>
    <div class="form-group">
        <label for="nationality">Nationality <span class="text-red">*</span></label>
        <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Natonality" value="<?= $member->nationality; ?>" required>
    </div>
  </div>              
  <div class="col-md-3">
    <div class="form-group">
        <label for="name">Member's Name <span class="text-red">*</span></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?= $member->name; ?>" required>
    </div> 
    <div class="form-group">
        <label for="father">Father/Husband <span class="text-red">*</span></label>
        <input type="text" class="form-control" id="father" name="father" placeholder="Enter father or husband" value="<?= $member->father_or_husband; ?>" required>
    </div>
    <div class="form-group">
        <label for="mother">Mother's Name <span class="text-red">*</span></label>
        <input type="text" class="form-control" id="mother" name="mother" placeholder="Enter mother or husband" value="<?= $member->mother; ?>" required>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="age">Age <span class="text-red">*</span></label>
          <input type="text" class="form-control" id="age" name="age" placeholder="In years" value="<?= $member->age; ?>" required>
        </div>
      </div>
      <div class="col-md-7">
        <div class="form-group">
          <label for="phone">Phone No. <span class="text-red">*</span></label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="<?= $member->phone; ?>" required>
        </div>
      </div>
    </div>
    
    <div class="form-group">
        <label for="name">Joining date <span class="text-red">*</span></label>
        <div class='input-group date'>
        <input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="joining_date" name="joining_date" placeholder="Enter date of join" value="<?= $member->joining_date; ?>" required>
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="marital">Marital status <span class="text-red">*</span></label>
          <select class="form-control" name="marital" id="marital" required>
            <option value="<?= $member->maritial_status ?>"><?= $member->maritial_status ?></option>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Divorced">Divorced</option>
            <option value="Widow">Widow</option>
            <option value="Other">Other</option>
          </select>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
            <label for="education">Education <span class="text-red">*</span></label>
            <select class="form-control" id="education" name="education" required>
              <option value="<?= $member->educational_status; ?>"><?= $member->educational_status; ?></option>
              <option value="Below 5">Below 5</option>
              <option value="PSC">PSC</option>
              <option value="JSC">JSC</option>
              <option value="SSC">SSC</option>
              <option value="HSC">HSC</option>
              <option value="Graduation">Hon's</option>
            </select>
        </div>
      </div>
    </div>
    
    <div class="form-group">
        <label for="occupation">Occupation <span class="text-red">*</span></label>
        <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter occupation" value="<?= $member->occupation; ?>" required>
    </div>
                         
  </div>
  <div class="col-md-3">     
    <div class="form-group">
        <label for="address">Present Address <span class="text-red">*</span></label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="<?= $member->address; ?>" required>
    </div>
    <div class="form-group">
        <label for="parmanent_address">Parmanent Address <span class="text-red">*</span></label>
        <input type="text" class="form-control" id="parmanent_address" name="parmanent_address" placeholder="Enter parmanent address" value="<?= $member->parmanent_address; ?>" required>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="house">House </label>
          <select class="form-control" name="house" id="house" onchange="whereLiveEnableDisable();">
            <option value="<?= $member->self_home; ?>"><?= $member->self_home; ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
      </div>
      <div class="col-md-7">
        <div class="form-group">
          <label for="where_live">Where live?</label>
          <input type="text" class="form-control" id="where_live" name="where_live" placeholder="Enter living place" value="<?= $member->where_live; ?>" disabled>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="number_of_rooms">No of rooms</label>
          <select class="form-control" name="number_of_rooms" id="number_of_rooms">
            <option value="<?= $member->total_room; ?>"><?= $member->total_room; ?></option>
            <option value="One">One</option>
            <option value="Many">Many</option>
          </select>                    
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="roof_type">Roof type</label>
          <select class="form-control" name="roof_type" id="roof_type">
            <option value="<?= $member->roof_type; ?>"><?= $member->roof_type; ?></option>
            <option value="Iron sheet">Iron sheet</option>
            <option value="Mats">Mats</option>
            <option value="Bamboo">Bamboo</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group">
        <label for="nid">National ID <span class="text-red">*</span></label>
        <input type="text" class="form-control" id="nid" name="nid" placeholder="Enter NID No." value="<?= $member->nid ?>" required>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="member_type">Member type</label>
          <select class="form-control" name="member_type" id="member_type">
            <option value="Savings">Savings</option>
            <option value="<?= $member->member_type; ?>"><?= $member->member_type; ?></option>
            <option value="Loan">Loan</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="loan_amount">Loan Amount</label>
          <input type="text" class="form-control" id="loan_amount" name="loan_amount" placeholder="Loan amount" value="<?= $member->first_step_loan; ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="total_member">Total Member</label>
          <select class="form-control" name="total_member" id="total_member">
            <option value="<?= $member->total_member ?>"><?= $member->total_member ?></option>
            <?php for($i=1; $i<=30; $i++){
              echo "<option value='$i'>$i</option>";
              } ?>           
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="total_child">Total Children</label>
          <select class="form-control" name="total_child" id="total_child">
            <option value="<?= $member->total_child ?>"><?= $member->total_child ?></option>
            <?php for($i=1; $i<=20; $i++){
              echo "<option value='$i'>$i</option>";
              } ?>           
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
        <label for="ref_name">Reference person <span class="text-red">*</span></label>
        <input type="text" class="form-control" id="ref_name" name="ref_name" placeholder="Enter reference Name" value="<?= $member->ref_person; ?>" required>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="water_source">Water source</label>
          <select class="form-control" name="water_source" id="water_source">
            <option value="<?= $member->water_source; ?>"><?= $member->water_source; ?></option>
            <option value="Pond">Pond</option>
            <option value="Tube-well">Tube-well</option>
            <option value="River">River</option>
            <option value="Supply water">Supply water</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="self_water_source">Self water?</label>
          <select class="form-control" id="self_water_source" name="self_water_source">
            <option value="<?= $member->water_source_self; ?>"><?= $member->water_source_self; ?></option>
            <option value="yes"> Yes</option>
            <option value="no">No</option>
          </select>
        </div>
      </div>                      
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="living_type">Living type</label>
          <select class="form-control" name="living_type" id="living_type">
            <option value="<?= $member->living_type; ?>"><?= $member->living_type; ?></option>
            <option value="Bed">Bed</option>
            <option value="Couki">Couki</option>
            <option value="Flooring">Flooring</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="sanitery_type">Sanitery type</label>
          <select class="form-control" name="sanitery_type" id="sanitery_type">
            <option value="<?= $member->sanitary; ?>"><?= $member->sanitary; ?></option>
            <option value="Kacha">Kacha</option>
            <option value="Paka">Paka</option>
            <option value="Khola">Khola</option>
            <option value="Sastho-sommoto">Sastho-sommoto</option>
          </select>
        </div>
      </div>

       <div class="col-md-6">
            <div class="form-group">
              <label for="gender">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option value="">Select</option>
                <option value="1" <?php if($member->gender == 1):echo "selected";endif; ?> >Male</option>
                <option value="2" <?php if($member->gender == 2):echo "selected";endif; ?> >Female</option>
              </select>
            </div>
          </div>

    </div>
    <div class="form-group">
        <label for="userfile">Photo <span class="text-red">*</span></label>
        <input id="userfile" name="userfile" type="file" onchange="getPreview('userfile','img_preview','none');">
        <img src="<?= (empty($member->photo))? base_url('/').'public/img/default.jpg' : base_url('/').'uploads/member/'.$member->photo; ?>" style="width:100px; margin-top:5px" id="img_preview" class="img-responsive img-thumbnail"/>
        <p class="help-block">(Max photo size: 400x400, 512kb)</p>
        <input type="hidden" name="photo" id="photo" value="<?= $member->photo; ?>">
    </div>
    <div class="form-group">
        <label for="" class="sr-only"></label>
        <a href="<?= goPrevious(); ?>" class="btn btn-info btn-sm btn-warning">Cancel</a>
        <input type="submit" name="save" id="save" value="Update" class="btn btn-primary btn-sm pull-right">
    </div>                    
  </div>            
</form>
</div>
<?php endif; ?>
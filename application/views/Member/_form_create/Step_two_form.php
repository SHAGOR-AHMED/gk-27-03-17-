                <div class="row" id="step_two" style="display:none">
                  <form method="POST" action="" id="frm_step_two">
                  <!-- storing member id -->
                  <input type="hidden"  name="member_id" id="member_id_step_two" value="0">
                  <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="cultivable_land">Cultivable land</label>
                            <input type="text" class="form-control" id="cultivable_land" name="cultivable_land" placeholder="In decimal *">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="residential_land">Residential Land</label>
                            <input type="text" class="form-control" id="residential_land" name="residential_land" placeholder="In decimal *">
                        </div>
                      </div>                      
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="food_lacking">Food lacking</label>
                            <select class="form-control" name="food_lacking" id="food_lacking">
                              <option value="Yearly">Yearly</option>
                              <option value="Sometimes">Sometimes</option>
                              <option value="No">No</option>
                            </select>
                        </div>
                      </div>
<!--                       <div class="col-md-6">
                        <div class="form-group">
                            <label for="earning_status">Earnings status</label>
                            <input type="text" class="form-control" id="earning_status" name="earning_status" placeholder="">
                        </div>
                      </div>  -->                     
                    </div>                   
                    <!-- many text fields -->
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="cow">Cow</label>
                            <select class="form-control" name="cow" id="cow">
                            <?php for ($i=0; $i <= 100; $i++) { 
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            } ?>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="buffalo">Buffalo</label>
                            <select class="form-control" name="buffalo" id="buffalo">
                            <?php for ($i=0; $i <= 100; $i++) { 
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            } ?>
                            </select>                            
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="goat">Goat</label>
                            <select class="form-control" name="goat" id="goat">
                            <?php for ($i=0; $i <= 100; $i++) { 
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            } ?>
                            </select>                             
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="duck">Duck</label>
                            <select class="form-control" name="duck" id="duck">
                            <?php for ($i=0; $i <= 100; $i++) { 
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            } ?>
                            </select> 
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="hen">Hen</label>
                            <select class="form-control" name="hen" id="hen">
                            <?php for ($i=0; $i <= 100; $i++) { 
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            } ?>
                            </select>                             
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="tree">Tree</label>
                            <select class="form-control" name="tree" id="tree">
                            <?php for ($i=0; $i <= 100; $i++) { 
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            } ?>
                            </select>                             
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="teen_sheet_house">Teen house</label>
                            <select class="form-control" name="teen_sheet_house" id="teen_sheet_house">
                            <?php for ($i=0; $i <= 100; $i++) { 
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            } ?>
                            </select>                              
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="mats_house">Mats house</label>
                            <select class="form-control" name="mats_house" id="mats_house">
                            <?php for ($i=0; $i <= 100; $i++) { 
                              echo '<option value="'.$i.'">'.$i.'</option>';
                            } ?>
                            </select>                             
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="other">Other</label>
                            <input type="text" class="form-control" id="other" name="other" placeholder="e.g: 3">
                        </div>
                      </div>
                    </div>                  
                  </div>

                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="savings_amount">Savings amount (Taka)</label>
                            <input type="text" class="form-control" id="savings_amount" name="savings_amount" placeholder="e.g: 10000">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="ngo_name">NGO/Other</label>
                            <select class="form-control" name="ngo_name" id="ngo_name">
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                        </div>  
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="loan_amount">Loan amount (Taka)</label>
                            <input type="text" class="form-control" id="loan_amount" name="loan_amount" placeholder="e.g: 10000">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="vgf">VGF/VGG card-holder</label>
                            <select class="form-control" name="vgf" id="vgf">
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                        </div>      
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="project_name">Other training</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project name if have any">
                    </div>
                    <div class="form-group">
                        <label for="primary_earnings">Primary monthly earnings status (Taka)</label>
                        <input type="text" class="form-control" id="primary_earnings" name="primary_earnings" placeholder="e.g: 10000">
                    </div>
                    <div class="form-group">
                        <label for="secondary_earnings">Secondary monthly earnings status (Taka)</label>
                        <input type="text" class="form-control" id="secondary_earnings" name="secondary_earnings" placeholder="e.g: 10000">
                    </div>  
                  </div>

                  <div class="col-md-12">

                    <hr/>
                    <h4 class="text-center">Family member's infromation</h4>
                      <?php for ($i=0; $i <5 ; $i++) { ?>
                      <!-- start family members table -->
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                              <input type="text" class="form-control" id="family_member_name[]" name="family_member_name[]" placeholder="Family member's name" title="Family member's name">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" name="relation[]" class="form-control" placeholder="Relationship" title="Relationship">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" name="family_marital_status[]" class="form-control" placeholder="Marital status" title="Marital status">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" name="age[]" class="form-control" placeholder="Age" title="Age">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <input type="text" name="educational_status[]" class="form-control" placeholder="Educational status" title="Educational status">
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="form-group">
                            <input type="text" name="primary_occupation[]" class="form-control" placeholder="Primary Occupation" title="Primary Occupation">
                          </div>
                        </div>
                        <div class="col-md-1">
                          <div class="form-group">
                            <input type="text" name="secondary_occupation[]" class="form-control" placeholder="Secondary Occupation" title="Secondary Occupation">
                          </div>
                        </div>
                  <!-- end family members table -->
                    </div>
                    <?php } ?>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="sr-only"></label>
                            <input type="button" name="previous" id="previous" value="Got To Previous" class="btn btn-primary btn-sm pull-left" onclick="stepChange('#step_one', '#step_two');">
                            <input type="submit" name="next_step" id="next_step" value="Got To Next" class="btn btn-primary btn-sm pull-right">
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                </div>
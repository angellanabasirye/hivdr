<!-- ART Profile Modal -->
<div class="modal fade" id="artProfileModal" tabindex="-1" role="dialog" aria-labelledby="artProfileModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="artProfileModalLongTitle">Add <b>{{ $patient->art_number }}'s</b> ART</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/patient_regimens">
        <div class="modal-body bg-light">
                @csrf
                <input type="text" name="patient_id" id="patient_id" value="{{ $patient->id }}" hidden>
                <div class="row form-group">
                  <div class="col-sm-2" style="margin-top:5px;">
                    <strong>Drug Codes:</strong>&nbsp;<span class="text-danger">*</span>
                  </div>
                  <div class="col" style="margin-left: -10px;">
                    <input type="text" name="drug_1" id="drug_1" class="form-control" placeholder="eg DRV" required>
                  </div>
                  <span> + </span>
                  <div class="col">
                    <input type="text" name="drug_2" id="drug_2" class="form-control" placeholder="eg RTV" required>
                  </div>
                  <span> + </span>
                  <div class="col">
                    <input type="text" name="drug_3" id="drug_3" class="form-control" placeholder="eg DTG" required>
                  </div>
                  <span> + </span>
                  <div class="col">
                    <input type="text" name="drug_4" id="drug_4" class="form-control" placeholder="eg TDF">
                  </div>
                  <span> / </span>
                  <div class="col">
                    <input type="text" name="drug_5" id="drug_5" class="form-control" placeholder="eg 3TC">
                  </div>
                </div>

                <div class="row">
                  <div class="col" style="margin-top:5px;">
                    <strong>Treatment line:</strong>&nbsp;<span class="text-danger">*</span>
                  </div>
                  <div class="col-sm-10">
                    <select name="treatment_line" style="padding:5px; width:100%; border-width: thin; border-color: lightgray; border-radius: 5px;" required>
                      <option value="">Select from dropdown ...  </option>
                      <option value="First line">First Line</option>
                      <option value="Second line">Second Line</option>
                      <option value="Third line">Third Line</option>
                    </select>
                  </div>
                </div>

                <div class="row" style="margin-top:10px;">
                  <div class="col-sm-2" style="margin-top:7px">
                    <strong>Start date:</strong>&nbsp;<span class="text-danger">*</span>
                  </div>
                  <div class="col-sm-10">
                    <input type="date" name="start_date" style="padding:3px; width: 100%; border-width: thin; border-color:lightgray; border-radius: 5px;" required>              
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <strong>Is this {{ $patient->art_number }}'s current or past regimen?</strong>&nbsp;<span class="text-danger">*</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-3">
                    <input type="radio" data-toggle="switch" data-on-color="primary" data-off-color="primary" data-on-text="" data-off-text="" id="is_current_regimen" name="current_or_past" value="current" required>
                    <label class="switch">
                        &nbsp;Current
                    </label>
                  </div>
                  <div class="col-sm-3">
                    <input type="radio" data-toggle="switch" data-on-color="primary" data-off-color="primary" data-on-text="" data-off-text="" id="is_past_regimen" name="current_or_past" value="past">
                    <label class="switch">
                        &nbsp;Past
                    </label>
                  </div>
                </div>

                <div id="past_regimen_details" style="display: none;">
                    <div class="row" style="margin-top:10px;">
                      <div class="col-sm-2" style="margin-top:7px">
                        <strong>Stop date<span class="required">*</span></strong>
                      </div>
                      <div class="col-sm-10">
                        <input type="date" name="stop_date" style="padding:3px; width: 100%; border-width: thin; border-color:lightgray; border-radius: 5px;">              
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12" style="margin-top:8px;">
                        <strong>Why was the patient switched/substituted off this regimen?</strong>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-2"></div>
                      <div class="col">
                        @foreach($change_reasons as $key => $reason)
                          <label>
                            <input type="checkbox" name="change_reasons" value="{{ $key }}">
                            {{ $reason }}
                          </label>
                          <br>
                        @endforeach
                      </div>
                    </div>

                    <div class="row">
                      <div class="col" style="margin-top:10px;">
                        <strong>Additional comments:</strong>
                      </div>
                      <div class="col-sm-10">
                        <textarea id="additional_comments" rows="3" style="width: 100%;"></textarea>
                      </div>
                    </div>
                </div>

        </div>
        <div class="modal-footer" style="padding-top: 10px;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- VL Modal -->
<div class="modal fade" id="vlModal" tabindex="-1" role="dialog" aria-labelledby="vlModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vlModalLongTitle">Add VL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ... Add VL data here
        <label class="switch">Dark mode
            <input type="checkbox" data-toggle="switch" data-on-color="primary" data-off-color="primary">
        </label>
            <!-- <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-on" style="width: 72px;">
                <div class="bootstrap-switch-container" style="width: 122px; margin-left: 0px;">
                </div>
            </div> -->
            <!-- <span class="toggle"></span> -->
                <!-- <span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 50px;">ON</span> -->
                <!-- <span class="bootstrap-switch-label" style="width: 30px;">&nbsp;</span> -->
                <!-- <span class="bootstrap-switch-handle-off bootstrap-switch-primary" style="width: 50px;">OFF</span> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

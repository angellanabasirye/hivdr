<!--  Batch Modal  -->
<div class="modal fade" id="batchModal-{{ $eligible_sample->id }}" tabindex="-1" role="dialog" aria-labelledby="batchModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="batchModalLongTitle">Batch (Refer) / Defer Sample</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="POST" action="/eligible_samples/{{ $eligible_sample->id }}/refer_or_defer">
        @csrf
        <div class="modal-body">
            <div class="row" style="margin-left: 8px;">
              <div style="margin-bottom: 10px;">
                <label>
                  <input type="radio" id="refer" name="refer_defer" value="refer">
                  Refer to HIV Drug Resistance testing Lab
                </label>
              </div>
              <div>
                <label>
                  <input type="radio" id="defer_used_up" name="refer_defer" value="defer_used_up">
                  Defer back to facility: <strong>Sample Used Up</strong>
                </label>
              </div>
              <div>
                <label>
                  <input type="radio" id="defer_below_threshold" name="refer_defer" value="defer_below_threshold">
                  Defer back to facility: <strong>Below threshold for HIV DR testing</strong>
                </label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

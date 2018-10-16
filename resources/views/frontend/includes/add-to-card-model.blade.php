<!-- Modal -->
<div class="modal fade gopop" id="addToCartModel" tabindex="-1" role="dialog" aria-labelledby="varifyTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{!! asset('frontend/images/Group489@2x.png') !!}"/>
                <h5 class="modal-title" id="loginTitle">Mobile verified</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="arrow-down"><img src="{!! asset('frontend/images/Path828@2x.png') !!}"/></div>
            <div class="modal-body var-num">
                <div class="col-12 food-quan d-inline-flex">
                    <strong>Quantity</strong>
                    <div class="input-group">
                                <span class="input-group-btn">
                              <button type="button" class="btn btn-default btn-number" data-type="minus"
                                      data-field="quant[1]">
                                  <span class="fa fa-minus"></span>
                                </button>
                                </span>
                        <input type="text" name="quant[1]" class="input-number" value="1" min="1" max="10">
                        <span class="input-group-btn">
                              <button type="button" class="btn btn-default btn-number" data-type="plus"
                                      data-field="quant[1]">
                                  <span class="fa fa-plus"></span>
                                </button>
                                </span>
                    </div>
                </div>
                <div class="col-12">
                    <textarea class="food-textarea" placeholder="Special Instructions"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
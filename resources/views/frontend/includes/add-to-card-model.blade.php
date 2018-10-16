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
            {!! Form::open(['route' => 'frontend.card.add', 'id' => 'frm-add-product-to-cart']) !!}
            <div class="modal-body var-num">
                <div class="col-12 food-quan d-inline-flex">
                    <strong>Quantity</strong>
                    <div class="input-group">
                        <span class="input-group-btn">
                              <button type="button"
                                      class="btn btn-default btn-number minus"
                                      onclick="minusQty()"
                              >
                                  <span class="fa fa-minus"></span>
                              </button>
                        </span>
                        {!! Form::text('qty', 0, ['class' => 'input-number', 'id' => 'qty']) !!}
                        <span class="input-group-btn">
                              <button type="button"
                                      class="btn btn-default btn-number" onclick="addQty()"
                              >
                                  <span class="fa fa-plus"></span>
                                </button>
                        </span>
                    </div>
                </div>
                <div class="col-12">
                    {!! Form::textarea('special_instructions', null, ['class' => 'food-textarea','id' => 'special_instructions']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-success btn">
                    Add to cart
                </button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>

@section('add-to-card-modal-scripts')
    <script>
        $("#frm-add-product-to-cart").validate({
            submitHandler: function (form) {
                $.ajax({
                    url: $("#frm-add-product-to-cart").attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        product_id: '{!! $product['id'] !!}',
                        qty: $("#qty").val(),
                        special_instructions: $("#special_instructions").val()
                    },
                    beforeSend: function () {
                    },
                    success: function (data) {
                        window.location = '{!! route('frontend.checkout.page') !!}';
                        $("#addToCartModel").modal('hide');
                        $("#head-cart-count").html(data.cart_count);
                    },
                    error: function (data) {
                        $("#server-ajax-messages div").hide();
                        var divToShow = $("#server-ajax-messages .error");
                        divToShow.html(data.responseJSON.message);
                        divToShow.show();
                    }
                });
            }
        });
        //Qty
        $(document).ready(function () {

        });
        var qty = 0;
        function addQty() {
            qty = parseInt(qty + 1);
            setQty(qty);
        }
        function minusQty() {
            qty = parseInt(qty - 1);
            if (qty <= 0) {
                qty = 0;
                return false;
            }
            setQty(qty);
        }
        function setQty(qty) {
            $("#qty").val(qty);
        }
    </script>
@stop
@extends('frontend.layouts.app')
@section('content')
    @include('frontend.chef.layout.chef_app')
    <section class="my-order">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xl-6 col-md-8 col-sm-12">
                    <div class="chef-profile">
                        <img src="images/alleanza_albania_-2@2x.png"/>
                        <div class="input mb-3">
                            <input type="text" class="form-control" id="chef-name" value="William Smith" readonly>
                        </div>
                    </div>
                </div>
                <div class="chef-circles">
                    <div class="row">
                        <div class="col-4">
                            <div class="round">80%</div>
                            <p>Success rate</p>
                        </div>
                        <div class="col-4">
                            <div class="round">1 hr</div>
                            <p>Avg.response time</p>
                        </div>
                        <div class="col-4">
                            <div class="round">4.5</div>
                            <p>avg. rating</p>
                        </div>
                    </div>
                </div>
                <div class="desc-edit">
                    <textarea rows="4" class="form-control" id="chef-name" value="William Smith" readonly>Lorem Ipsum je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem Ipsum je štandardným výplňovým textom už od 16. storočia, keď neznámy tlačiar zobral sadzobnicu plnú tlačových znakov a pomiešal ich, aby tak vytvoril vzorkovú knihu. Prežil nielen päť storočí, ale aj skok do elektronickej</textarea>
                    <div class="input-group-addon">
                        <span class="fa fa-pencil" onclick=editName('1')></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
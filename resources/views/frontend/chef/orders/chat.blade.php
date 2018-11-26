@extends('frontend.layouts.app')
@section('content')
    @include('frontend.chef.layout.chef_app')
    <section class="chat">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <div class="live-chat">
                        <div class="chat-header">
                            <div class="row">
                                <div class="col-2"><i class="fa fa-arrow-left"></i></div>
                                <div class="col-8">Chat History</div>
                            </div>
                        </div>
                        <div class="chat-body">
                            <div class="chat-box sender">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="chating-img"><img src="images/alleanza_albania_-6@2x.png"
                                                                      class="chat-img"/></div>
                                        <div class="chating-text">Hellow</div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-box receiver">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="chating-img"><img src="images/alleanza_albania_-5@2x.png"
                                                                      class="chat-img"/></div>
                                        <div class="chating-text">Hellow</div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-box sender">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="chating-img"><img src="images/alleanza_albania_-4@2x.png"
                                                                      class="chat-img"/></div>
                                        <div class="chating-text">Hellow</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-footer">
                            <input type="text" placeholder="Type Here"/>
                            <button type="button"><i class="fa fa-arrow-up"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
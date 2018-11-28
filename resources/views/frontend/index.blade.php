@extends('frontend.layouts.app')

@section('content')
    @include('frontend.includes.search-fullwidth-banner')
    <section class="chef-list">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#food" role="tab"
                       aria-controls="food" aria-selected="true">Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chefs-tab" data-toggle="tab" href="#chefs" role="tab" aria-controls="chefs"
                       aria-selected="false">Chefs</a>
                </li>
                <li class="nav-item filters pull-right">
                    <button type="button" data-toggle="modal" data-target="#filteroverlay">Filter Search <span></span>
                    </button>
                </li>
            </ul>
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade"
                 id="filteroverlay" tabindex="-1" role="dialog" aria-labelledby="filteroverlayTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="filteroverlayTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="food" role="tabpanel" aria-labelledby="food-tab">
                    <div class="row">
                        @include('frontend.partials.product-grid')
                    </div>
                </div>

                <div class="tab-pane fade" id="chefs" role="tabpanel" aria-labelledby="chefs-tab">
                    <div class="row">
                        @include('frontend.partials.chef-grid')
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(!access()->hasRole('Chef'))
        <section class="become-chef-block">
            <div class="container">
                <div class="row">
                    <div class="space col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <h2>Be a Chef in 3 easy steps</h2>
                        <ul>
                            <li>1- Sign up</li>
                            <li>2- Complete your profile</li>
                            <li>3- get yourself approved by admin</li>
                        </ul>
                        <button class="btn btn-outline-success my-2 my-sm-0"
                                onclick="openBsModal('{!! (\Auth::check()) ? 'becomechef' : 'login' !!}')"
                                type="submit">
                            Become a Chef
                        </button>
                    </div>
                    <div class="become-chef-banner">
                        <img src="{!! asset('frontend/images/chef_PNG140@2x.png') !!}"/>
                    </div>
                </div>
            </div>
        </section>
 
    <section class="steps-block">
        <div class="container">
            <div class="row">
                <div class=" col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <h3>SignUp</h3>
                    <p>Fill in the form with <br/>your phone and email</p>
                </div>
                <div class=" col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <h3>Set up your kitchen</h3>
                    <p>Provide us with some cool pictures or your kitchen and necessary information that we will ask
                        you</p>
                </div>
                <div class=" col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <h3>Admin Approval</h3>
                    <p>Provide us clear image of your CNIC and get yourself approved and your are ready to go</p>
                </div>
            </div>
        </div>
    </section>
       @endif

    <section class="apps-block">
        <div class="container">
            <div class="row">
                <div class="space col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <h2>Take us<br/>
                        with You<br/>
                        wherever you go</h2>
                    <a href="#"><img src="{!! asset('frontend/images/Group785@2x.png') !!}"/></a>
                    <a href="#"><img src="{!! asset('frontend/images/Group786@2x.png') !!}"/></a>
                </div>
                <div class="apps-banner">
                    <img src="{!! asset('frontend/images/white-mockup@2x.png') !!}"/>
                </div>
            </div>
        </div>
    </section>
@endsection
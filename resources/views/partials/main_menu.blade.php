
                                @if (!Auth::guest())
                                    <div class="headerUserDetailsCont">
                                        <div class="headerUserProfilePicCont">
                                            <img src="{{asset('img/front/user_pic_placeholder.png')}}" alt="" />
                                        </div>
                                        <div class="headerUserMainDetailsCont">
                                            <a href="{{url('dashboard')}}">
                                                <span class="headerUsersNameCont">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                                            </a>
                                            <span class="headerLinksCont">
                                                <a href="{{url("profile")}}"> Setting</a> | 
                                                <a href="{{url("auth/logout")}}"> Logout</a>
                                            </span>
                                        </div>
                                    </div>
                                @endif
                                <nav id="myNavbar" class="navbar navbar-default" role="navigation">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="topLinks nav navbar-nav">
                                            @if (Auth::guest())
                                                <li><a class="linkToHowItWorks" href="{{url()}}/#howItWorks">How It Works</a></li>
                                                @if (!isset($supplierPage))
                                                    <li><a href="{{ url('request-service') }}">Send a Request</a></li>
                                                @endif
                                                <li><a href="{{ url('auth/login') }}">Sign In</a></li>
<!--                                                <li><a href="{{ url('auth/register') }}">Register Your Business</a></li>-->
                                                    <li><a href="{{ url('auth/register') }}">Try It For Free</a></li>
                                            @else
                                                @if (Auth::userType() == 1)
                                                    <li class="selected"><a href="{{url('suppliers-list')}}">Find Supplier</a></li>
                                                    <li><a href="{{ url('dashboard') }}">My Requests</a></li>
                                                @else
                                                    <li class="selected"><a href="{{url('supplier-profile/'.Auth::user()->company_slug."/".Auth::id())}}">
                                                            My profile</a></li>
                                                    <!--<li><a href="">My Request2<?php // Auth::getRecaller() ?></a></li>-->
                                                    <li><a href="{{ url('dashboard') }}">My Quotes</a></li>
                                                @endif
                                            @endif
                                        </ul>
                                    </div>
                                </nav>
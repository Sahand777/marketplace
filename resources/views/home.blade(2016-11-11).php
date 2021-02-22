<!DOCTYPE html>
<html>
    <head>
        @include('partials.head')
    </head>
    <body>
        @include('partials.outdated_browser')
        <section class="homeHeaderSection">
            <header>
                <section class="top-banner @if(!Auth::guest()) dashboardHeader homepageLogedinHeader @endif">
                    <div class="container">
                        <div class="row menuAndLogoCont">
                            @include('partials.header_menu')
                            <div class="col-md-12">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <div class="banner-text homeTopBannerText">
                                                <p class="text-center">Service Procurement Made Simple</p>
                                                <p class="text-center">Manage your external contractors in one dashboard</p> 
                                                <span class="text-center">
                                                    <input type="submit" class="submit" onclick="window.location.href='{{url('request-service/1')}}'" 
                                                           value="REQUEST A SERVICE"/>
                                                    <a href="{{url('suppliers')}}" class="linkToHowItWorks btn tranparentWhiteBtn hidden-sm hidden-xs">Provide A Service</a>
                                                    <a href="{{url('suppliers')}}" class="btn tranparentWhiteBtn hidden-md hidden-lg">Provide A Service</a>
                                                </span>
                                                <div class="bannerServicSuppliersLinkCont homeBannerSupplierLink text-right hidden-sm hidden-xs">
                                                    <a href="#" class="" data-toggle="modal" data-target="#videoContModal">WATCH THE VIDEO
                                                        <span class="glyphicon glyphicon-triangle-right"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="banner-text homeTopBannerText">
                                                <p class="text-center" style="color:white; font-size:2.9em">THE LARGEST MARKETPLACE FOR CONDO SERVICES</p>
                                                <p class="text-center" style="color:white; font-size:2em">Manage the entire process in one dashboard</p> 
                                                <span class="text-center">
                                                    <input type="submit" class="submit" onclick="window.location.href='{{url('request-service/1')}}'" 
                                                           value="REQUEST A SERVICE"/>
                                                    <a href="{{url('suppliers')}}" class="linkToHowItWorks btn tranparentWhiteBtn hidden-sm hidden-xs">Provide A Service</a>
                                                    <a href="{{url('suppliers')}}" class="btn tranparentWhiteBtn hidden-md hidden-lg">Provide A Service</a>
                                                </span>
                                                <div class="bannerServicSuppliersLinkCont homeBannerSupplierLink text-right hidden-sm hidden-xs">
                                                    <a href="#" class="" data-toggle="modal" data-target="#videoContModal">WATCH THE VIDEO
                                                        <span class="glyphicon glyphicon-triangle-right"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
<!--                                <div class="banner-text homeTopBannerText">
                                    <p class="text-center" style="color:white; font-size:3.5em">Service Procurement Made Simple</p>
                                    <p class="text-center" style="color:white; font-size:2em">Manage your external contractors in one dashboard</p> 
                                    <span class="text-center">
                                        <input type="submit" class="submit" onclick="window.location.href='{{url('request-service/1')}}'" 
                                               value="REQUEST A SERVICE"/>
                                        <a href="{{url('suppliers')}}" class="linkToHowItWorks btn tranparentWhiteBtn hidden-sm hidden-xs">Provide A Service</a>
                                        <a href="{{url('suppliers')}}" class="btn tranparentWhiteBtn hidden-md hidden-lg">Provide A Service</a>
                                    </span>
                                    <div class="bannerServicSuppliersLinkCont homeBannerSupplierLink text-right hidden-sm hidden-xs">
                                        <a href="#" class="" data-toggle="modal" data-target="#videoContModal">WATCH THE VIDEO
                                            <span class="glyphicon glyphicon-triangle-right"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>-->
                            <!-- <div class="col-md-12 homeBannerSupplierLink">
                                <div class="banner-text homeBannerSupplierLink">
	                            	<div class="homeLogoAndSearchCont">
	                            		<img src="{{asset('img/front/company_logos/cci_logo.png')}}" alt="" width="200"/>
                                   	</div>
                                </div>
                            </div> -->
                        <!--</div>-->
                    </div>
                </section>
            </header>
            <section class="services">
                <div class="container">
                    <div class="row homeCategories">
                        @if(count($homeCategories) > 0)
                            @foreach($homeCategories as $homeCategory)
                                <div class="col-md-5ths col-xs-3">
                                    <div class="homeCategoryCont HomeCategoriesAnimation">
                                        <div class="homeCategoryimg">
                                            @if($cat_rel_data->value==1)
                                            
                                            <style>
                                                                                                .services .homeCategories div .homeCategoryCont.HomeCategoriesAnimation .homeCategoryimg:hover, 
                                                .InnerPageCategories div .homeCategoryCont.HomeCategoriesAnimation .homeCategoryimg:hover {
                                                    border-width: 3px;
                                                    padding: 0;
                                                }
                                                .services .homeCategories div .homeCategoryCont .homeCategoryimg:hover .homeCategoryDetails, 
                                                .InnerPageCategories div .homeCategoryCont .homeCategoryimg:hover .homeCategoryDetails {
                                                    transform: rotateY(0deg);
                                                    -o-transform: rotateY(0deg);
                                                    -ms-transform: rotateY(0deg);
                                                    -moz-transform: rotateY(0deg);
                                                    -webkit-transform: rotateY(0deg);
                                                }
                                                .services .homeCategories div .homeCategoryCont.HomeCategoriesAnimation .homeCategoryimg:hover img, 
                                                .InnerPageCategories div .homeCategoryCont.HomeCategoriesAnimation .homeCategoryimg:hover img {
                                                    transform: rotateY(180deg);
                                                    -o-transform: rotateY(180deg);
                                                    -ms-transform: rotateY(180deg);
                                                    -moz-transform: rotateY(180deg);
                                                    -webkit-transform: rotateY(180deg);
                                                }
                                                
                                                
                                            </style>
                                            <div class="homeCategoryDetails">
                                                <h2>{{$homeCategory->total_business}}</h2>
                                                <p>Services</p>
                                                <hr/>
                                                <h2>{{$homeCategory->total_request}}</h2>
                                                <p>Requests</p>
                                            </div>

                                            @endif
                                            
                                            <?php
                                            if (!empty($homeCategory->category_icon)) {
                                                $catImgURL = asset('img/category/category_icons/'.$homeCategory->category_icon);
                                            } else {
                                                $catImgURL = asset('img/front/placeholder_home_categories.png');
                                            }
                                            ?>
                                            <img src="{{$catImgURL}}" alt="{{$homeCategory->name}}">
                                        </div>
                                        <h3><a href="{{ url('/categories/'.$homeCategory->slug) }}" >{{$homeCategory->name}}</a></h3>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="col-md-5ths col-xs-3 hidden-sm hidden-xs">
                            <div class="homeCategoryCont">
                                <a href="{{ url('/auth/register') }}">
                                    <div class="homeCategoryimg"><img src="{{ asset('img/front/free_try_icon.png') }}" alt=""></div>
                                    <h3>Try It Free</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <div class="col-md-12 text-center">
            <!--<div class="add-categories">-->
                <br/><br/><a href="{{url("categories")}}" class="btn">More Categories</a>
            <!--</div>-->
        </div>
        <section class="firmogram homeWhyFirmogramSection">
            <div class="container">
                @if($latest_requests != null)
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-center">LATEST REQUESTS</h1>
                        
                        @foreach($latest_requests as $latest_request)
                            <!--<a href='project-details/{{$latest_request->request_id}}'>-->
                            <div class="col-md-4">
                                <div class="latest_requests_home homerequest text-left">
                                    
                                   
                                <h3> <?php
                                    if (strlen($latest_request->request_title) > 20) {
                                        echo substr($latest_request->request_title, 0, 20) . "...";
                                    } else {
                                        echo $latest_request->request_title;
                                    }
                                ?>
                                
                                </h3>
                                
                                <h5>{{$latest_request->first_name}} {{$latest_request->last_name[0]}}, {{$latest_request->city_name}} {{$latest_request->iso}}</h5>
                                <div class=" text-left detailprop">
                                    <p>
                                       
                                        
                                        <img src="{{asset('img/front/icon_calander.png')}}" alt="" style="margin-right: 2px" /> 
                                        {{date('F j, Y', strtotime($latest_request->created_at))}}
                                        <img src="{{asset('img/front/clock.png')}}" alt="" style="margin-left : 20px"/> 
                                        {{date('h:ia', strtotime($latest_request->created_at))}}
                                    </p>
                                </div>
                                <p class="dashboardProjectMainDetails">
                                        <span > Budget :@if($latest_request->estimated_budget==null) Not specified @else ${{$latest_request->estimated_budget}} / @if($latest_request->budget_type==0) Project @elseif($latest_request->budget_type==1) Hour @endif @endif</span> 
                               </p>

                                    <!--<span>{{$latest_request->description}}</span>-->
                               <p class="descrption">
                                <?php
                                    if (strlen($latest_request->description) > 120) {
                                        echo substr($latest_request->description, 0, 120) . "...";
                                    } else {
                                        echo $latest_request->description;
                                    }
                                ?>
                                <?php // echo substr($latest_request->description, 0, 30) . "..."; ?>
                                </p>
                                <a href="homepage-project-details/{{$latest_request->request_id}}" class="btn">Read More</a>
                                    
                                </div>
                                
                                
<!--                                    <h4 class="text-center">
                                '{{$latest_request->request_title}}'
                                "{{$latest_request->first_name}}
                                {{$latest_request->last_name[0]}}"
                                '{{$latest_request->city_name}}'
                                </h4>-->
                            </div>
                            <!--</a>-->
                        @endforeach
                    </div>
                </div>
                
                @endif
                
                <div class="row">
                    <div class="col-md-12 text-center top_service_provider_section">
                         <h2 class="text-center">TRUSTED AND LOVED BY HUNDREDS OF LOCAL BUSINESSES</h2>
                         
                         <div class="row">
                             
                             
                         @foreach($top_service_provider as $top_supplier)
                        
                        
                             
                             
                         
                         <div class="col-md-3 top_service_provider_col">
                             
                             <a href="{{url("supplier-profile/".$top_supplier->business_name."/".$top_supplier->id)}}">
                                 
                                  <div class="top_service_provider">

                                 @if (empty($top_supplier->company_logo)) 
                                 No Logo 
                                 @else
                                 <img src="{{asset("img/compay_logos/".getFolderStructureByDate($top_supplier->created_at)."/"
                                                            .$top_supplier->company_logo)}}" 

                                      />
                                 @endif

                             </div>
                                 
                             </a>
                             
                             
                            


                         </div>
                            
                         @endforeach
                         
                             
                             
                         </div>
                        <h3 class="text-center">Learn how FIRMOGRAM can help your business</h3> 
                        
                         <a href="{{url("suppliers")}}" class="btn">View More</a>
                    </div>
                </div>
                
                
            </div>
        </section>
        
        <section id="howItWorks" class="works howItWorks">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>HOW IT WORKS</h1>
                        <p class="text-center"></p>
                        <div class="row howItWorksStepsCont">
                            <div class="col-sm-4">
                                <div class="howItWorksStep">
                                    <img src="img/front/Firmogram_r5_c5.png" alt="">
                                    <h3>Submit a Request</h3>
                                    <p>Give us the details for the services or products you need<p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="howItWorksStep">
                                    <img src="{{ asset('img/front/Firmogram_r5_c10.png') }}" alt="">
                                    <h3>Get Free Quotes</h3>
                                    <p>Receive quotes from pre-screened and registered local and national suppliers<p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="howItWorksStep">
                                    <img src="{{ asset('img/front/work1.png') }}" alt="">
                                    <h3>Evaluate and Move Ahead</h3>
                                    <p>Review quotes, select the best options, and complete the deal<p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-center">
                        <a href="#" class="btn videoIconBtn" data-toggle="modal" data-target="#videoContModal">WATCH THE VIDEO</a>
                    </p>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="videoContModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h3>HOW IT WORKS</h3>
                        </div>
                        <div class="modal-body">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/Dn36nSiPAw8?rel=0" frameborder="0" 
                                    allowfullscreen style="max-width: 100%;"></iframe>
                        </div>
<!--                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>-->
                    </div>
                </div>
            </div>
        </section>
        <section class="firmogram homeWhyFirmogramSection">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>WHY FIRMOGRAM?</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h3>The old "Status Quo" way</h3>
                        <div class="oldQuoAndNewSmartWayImgCont hidden-lg hidden-md">
                        	<img src="{{asset('img/front/status_quo_img.jpg')}}" alt=""/>
                        	<img src="{{asset('img/front/status_quo_img_and_new_smart_way_mobile_seprator.jpg')}}" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <h3>The new "Fast & Smart" way</h3>
                        <div class="oldQuoAndNewSmartWayImgCont hidden-lg hidden-md">
                        	<img src="{{asset('img/front/new_smart_way.jpg')}}" alt=""/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <img src="{{asset('img/front/status_quo_img_and_new_smart_way.jpg')}}" alt="" class="hidden-xs hidden-sm"/>
                	<br/><h3 class="text-center"> </h3>
	            </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p class="text-center"></p>
                        <div class="homeWhyFirmogramSubSection homeSmallContiner">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h4>MEETING THE NEEDS OF STRATA PROPERTY MANAGERS.</h4>
                                    <h2>EASY TO USE!</h2>
                                    <p> We simplify day-to-day service procurement from local professionals. FIRMOGRAM makes it simple and fast for you to upload your service or product request. Just fill in the request form and provide details and the rest is up to us!</p>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <img src="{{ asset('img/front/first-div.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="works homeFindRightSuplierSection">
            <div class="container">
                <div class="homeFindRightSupplierSection homeSmallContiner">
                    <div class="row">
                        <div class="col-md-9 col-sm-7 text-right col-md-offset--2">
                            <img src="{{ asset('img/front/Firmogram_r13_c2.png') }}" alt=""/>
                        </div>
                        <div class="col-sm-5">
                            <h4>FINDING THE RIGHT SUPPLIERS WITH THE PRODUCTS AND SERVICES YOU NEED.</h4>
                            <h2>GET FREE QUOTES WITH NO OBLIGATION</h2>
                            <p>Finding the right suppliers for your specific needs and negotiating pricing is time consuming. Let us do the work for you 
                                so you can focus on running your core business. We’ll send you quotes from our businesses within our pre-screened, 
                                registered network of trusted local and global suppliers.</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="beInfromedSection">
            <div class="container">
                <div class="homeWhyFirmogramSubSection homeSmallContiner">
                    <div class="row">
                        <div class="col-sm-7">
                            <h4>ZOOM IN ON INDIVIDUAL SUPPLIERS TO GAIN INSIGHTS THAT WILL LEAD TO FAST AND EASY PURCHASING OR SALES DECISIONS!</h4>
                            <h2>BE FULLY INFORMED AND SHARE WITH YOUR TEAM</h2>
                            <p>Evaluate purchasing and sales opportunities, create eye-catching output reports, and share them with your team for more 
                                efficient decision-making</p>
                        </div>
                        <div class="col-sm-5 text-right">
                            <img src="{{ asset('img/front/Firmogram_r7_c6.png') }}" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="works">
            <div class="container">
                <div class="homeFindRightSupplierSection homeSmallContiner">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('img/front/contact.png') }}" alt="">
                        </div>
                        <div class="col-sm-6">
                            <h4>WE HELP YOU FULLY UNDERSTAND REGIONAL,</br>NATIONAL AND GLOBAL BUSINESS LANDSCAPES...</h4>
                            <h2>IDENTIFY YOUR LEADING OPPORTUNITIES TO SELECT THE BEST OFFERS OR NEGOTIATE FURTHER</h2>
                            <p>Using the FIRMOGRAM marketplace, you’ll have access to detailed information on your complete supplier ecosystem and sales 
                                opportunities, in real-time. Have confidence knowing that FIRMOGRAM will be keeping a close eye on business activities 
                                and trends and letting you know when opportunities arise.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('partials.footer_form')
        @include('partials.footer')
    </body>
</html>
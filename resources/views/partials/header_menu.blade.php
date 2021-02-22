                            @if (Request::url() == url())
	                            <div class="col-md-6">
	                            	<div class="homeLogoAndSearchCont">
		                                <div class="logo">
		                                    <a href="http://firmogram.com"><img src="{{ asset('img/front/inner_logo.gif') }}" alt="Firmogram"/></a>
		                                </div>
	                                    <span class="topSearchFormCont">
	                                        <form action="{{url('search-form-submission')}}" id="homeSearchForm" method="POST">
	                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                                            <input type="hidden" name="selectedOptionType" id="selectedOptionType" value="">
	                                            <input type="hidden" name="selectedCatID" id="selectedCatID" value="">
	                                            <input type="hidden" name="selectedCatName" id="selectedCatName" value="">
	                                            <!-- <input type="text" class="postal" id="code" placeholder="Your Postal Code"/> -->
	                                            <input type="text" class="firms" id="autocomplete-ajax" name="searchKeyword" 
	                                                   placeholder="Search for Firms, Services, City"/>
	                                        </form>
	                                    </span>
	                                </div>
	                            </div>
	                            <div class="col-md-6">
                                	@include('partials.home_menu')
	                            </div>
                            @else
	                            <div class="col-md-6">
	                                <div class="logo">
	                                    <a href="http://firmogram.com"><img src="{{ asset('img/front/inner_logo.gif') }}" alt="Firmogram"/></a>
	                                </div>
                                	@include('partials.logo_menu')
	                            </div>
	                            <div class="col-md-6">
                                	@include('partials.main_menu')
	                            </div>
                            @endif
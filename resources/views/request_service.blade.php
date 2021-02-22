@extends('templates.sub_pages_template')
@section('page-content')
<section class="loginFormSection loginFormSectionNw">
    <div class="loginFormCont registrationFormCont signupShortForm requestQuoteShortForm">

        <form role="form" method="POST" action="{{ url('request-service') }}" id="requestServiceForm" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center sign-in-pen"><img src="{{asset('img/front/sign-in-pen.png')}}"></div>
                    <h1>Request Details</h1>
                </div>
                <div class="col-sm-12">@include("partials.form_errors")</div>
                <div class="col-sm-12 loginFormSectionNwForm">
                    <div class="loginFormSectionNwFormInner">
                        <div class="row">
                            <div class="col-sm-12 registrationFormFieldCont">
                                <label>Request Title *</label>
                                <div class="input-group login-field">
                                    <span><img src="{{asset('img/front/form_icon_bus_name.png')}}" alt="" /></span>
                                    <input type="text" class="form-control input-lg" name="title" value="{{old('title')}}" required 
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>

                            @if($supplier_id==null)
                            <div class="col-sm-6 registrationFormFieldCont">
                                <label>Main Category *</label>
                                <div class="input-group login-field">
                                    <span><img src="{{ asset('img/front/form_icon_main_cat.png') }}" alt="" /></span>
                                    <select name="main_categories" class="customDropdown form-control input-lg" aria-describedby="basic-addon1" 
                                            onchange="getSubCategories(this);">
                                        <option value="">Select Main Categories</option>
                                        {{--*/ $selectedCatId = profileGetFieldsValues(old('main_categories'), $selectedCategories); /*--}}
                                        @foreach ($categories as $category)
                                        <option @if ($category->id == $selectedCatId) selected @endif 
                                                 value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--*/ $subCatsSelectedids = profileGetFieldsValues(old('sub_categories'), $selectedSubCategories) /*--}}
                            <div class="col-sm-6 registrationFormFieldCont">
                                <label>Sub Category *</label>
                                <div class="input-group login-field">
                                    <span><img src="{{ asset('img/front/form_icon_sub_cat.png') }}" alt="" /></span>
                                    <select name="sub_categories" id="sub_categories" class="customDropdown form-control input-lg"  
                                            aria-describedby="basic-addon1" >
                                        <option value="">Select Sub Categories</option>
                                    </select>
                                </div>
                            </div>
                            @else
                            {{--*/ $subCatsSelectedids = "" /*--}}
                            @endif
                            <div class="col-sm-12 registrationFormFieldCont">
                                <label>Description *</label>
                                <div class="input-group login-field">
                                    <span><img src="{{asset('img/front/form_icon_desc.png')}}" alt="" /></span>
                                    <textarea class="form-control input-lg" name="description" required 
                                              aria-describedby="basic-addon1">{{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 registrationFormFieldCont">
                                <label>Province/State *</label>
                                <div class="input-group login-field">
                                    <span><img src="{{ asset('img/front/form_icon_state.png') }}" alt="" /></span>
                                    {{--*/ $selectedStatesids = profileGetFieldsValues(old('state'), $defaultLocation['state']); /*--}}
                                    <select name="state" class="customDropdown form-control input-lg" aria-describedby="basic-addon1" required 
                                            onchange="getCities(this, 'city', '{{profileGetFieldsValues(old("city"), $defaultLocation["id"])}}');" 
                                            data-live-search="true">
                                        <option value="">Select Province/State</option>
                                        @foreach ($states as $state)
                                        <option @if ($state->id == $selectedStatesids)) selected @endif value="{{$state->id}}" 
                                                 data-stateiso="{{$state->iso}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 registrationFormFieldCont">
                                <label>City *</label>
                                <div class="input-group login-field">
                                    <span><img src="{{ asset('img/front/form_icon_city.png') }}" alt="" /></span>
                                    <select name="city" id="city" class="customDropdown form-control input-lg" aria-describedby="basic-addon1" 
                                            required onchange="addPinToMapOnRegisterPage();activegetSuppliers(this, '');" data-live-search="true">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6 registrationFormFieldCont">
                                        <label>Estimated Available Budget</label>
                                        <div class="input-group login-field">
                                            <span><img src="{{asset('img/front/form_icon_estimate_budget.png')}}" alt="" /></span>
                                            <input type="number" class="form-control input-lg" name="estimated_budget" value="{{old('estimated_budget')}}" 
                                                   aria-describedby="basic-addon1" min="0">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 registrationFormFieldCont">
                                        <label>Budget Type</label>
                                        <span class="radioBtnCont">
                                            <input type="radio" name="budget_type" id="per_project" value="0" class="budget_radio" @if (old('budget_type') == '0') checked @elseif (old('budget_type') != '0' && old('budget_type') != '1') checked @endif/>
                                                   <label for="per_project">Per Project</label>
                                            <input type="radio" name="budget_type" id="per_hour" value="1" class="budget_radio" @if (old('budget_type') == '1') checked  @endif/>
                                                   <label for="per_hour">Per Hour</label>
                                        </span>
                                        <span class="radioBtnCont">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="registrationFormCont">
                                <div class="col-sm-6">
                                    <label>Upload Image</label>
                                    <a data-toggle="tooltip" title="Upload relevant image">
                                        <i class="glyphicon glyphicon-info-sign"></i></a>
                                    <div class="inUpload Filesput-group input-group">
                                        <span class="input-group-btn input-group-lg">
                                            <span class="btn btn-primary btn-file" style="margin: 5px 0px 17px 0px;">
                                                <img src="{{ asset('img/front/browse.jpg') }}">&nbsp Browse 
                                                <input type="file" name="image">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control input-lg" style='border: 1px solid;margin: 5px 0px 0px 0px;' readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="row">
                                    @if(Auth::id()!=null)
                                    @if($openly==null)
                                    @if($supplier_id==null)
                                    <div class="col-sm-6 registrationFormFieldCont">
                                        <label>Active Suppliers *</label>
                                        <a data-toggle="tooltip" title="Select suppliers of your choice">
                                            <i class="glyphicon glyphicon-info-sign "></i></a>
                                        <div class="input-group login-field">
                                            <span class="input-group-addon input-lg" id="basic-addon1">
                                                <img src="{{ asset('img/front/form_icon_sub_cat.png') }}" alt="" /></span>
                                            <select name="asuppliers[]" id="asuppliers" class="customDropdown form-control input-lg" 
                                                    aria-describedby="basic-addon1" multiple  required data-live-search="true" data-actions-box="true">
                                            </select>
                                        </div>
                                    </div>
                                    @endif    
                                    @endif    
                                    @endif    
                                </div>
                            </div>


                            <!--                                    <div class="col-sm-6 registrationFormFieldCont">
                                                                    <label>Where Do You Need It?</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon input-lg" id="basic-addon1"><img src="{{asset('img/front/form_icon_where_you_need.png')}}" alt="" /></span>
                                                                        <input type="text" class="form-control input-lg" name="postalcode" value="{{old('postalcode')}}" 
                                                                               onblur="codeAddress(this.value)" id="postalcode" aria-describedby="basic-addon1" placeholder="Your Postal Code. e.g., A1A 1B1">
                                                                    </div>
                                                                </div>-->
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-12 registrationFormFieldCont">
                                        <br/><label>When Do You Need It? *</label><br/>
                                        <span class="radioBtnCont">
                                            <input type="radio" name="when_need_it" value="1" id="whenINeedItVal1" required 
                                                   onclick="showHideField(this, '3', '#whenNeedItDateCont', 'hide')" 
                                                   @if (old('when_need_it') == 1) checked  @endif/>
                                                   <label for="whenINeedItVal1">I’m Flexible</label>
                                        </span>
                                        <span class="radioBtnCont">
                                            <input type="radio" name="when_need_it" value="2" onclick="showHideField(this, '3', '#whenNeedItDateCont', 'hide')" 
                                                   id="whenINeedItVal2" @if (old('when_need_it') == 2) checked  @endif/>
                                                   <label for="whenINeedItVal2">Within 48 Hours</label>
                                        </span>
                                        <span class="radioBtnCont">
                                            <input type="radio" name="when_need_it" value="3" onclick="showHideField(this, '3', '#whenNeedItDateCont', 'hide')" 
                                                   id="whenINeedItVal3" @if (old('when_need_it') == 3) checked  @endif/>
                                                   <label for="whenINeedItVal3">Specific Date</label>
                                        </span>
                                    </div>
                                    <div class="col-sm-12 registrationFormFieldCont" id="whenNeedItDateCont">
                                        <label></label>
                                        <div class="input-group login-field"">
                                            <span><i class="glyphicon glyphicon-calendar" style="color: #fff;"></i></span>
                                            <input type="text" class="form-control input-lg datepicker" name="when_need_it_date" value="{{old('when_need_it_date')}}" 
                                                   id="whenNeeditDate" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 registrationFormFieldCont">
                                        <br/><br/><label>What Is This Purchase For? *</label><br/>
                                        <span class="radioBtnCont">
                                            <input type="radio" name="purchase_type" value="1" id="WhatThisPurchaseForVal1" required 
                                                   @if (old('purchase_type') == 1) checked  @endif/>
                                                   <label for="WhatThisPurchaseForVal1">One Time</label>
                                        </span>
                                        <span class="radioBtnCont">
                                            <input type="radio" name="purchase_type" value="2" id="WhatThisPurchaseForVal2" @if (old('purchase_type') == 2) checked  @endif/>
                                                   <label for="WhatThisPurchaseForVal2">Recurring</label>
                                        </span>
                                        <span class="radioBtnCont">
                                            <input type="radio" name="purchase_type" value="3" id="WhatThisPurchaseForVal3" @if (old('purchase_type') == 3) checked  @endif/>
                                                   <label for="WhatThisPurchaseForVal3">Starting A Business</label>
                                        </span>
                                    </div>
                                    <!--                                            <div class="col-sm-12 registrationFormFieldCont">
                                                                                    <br/><br/><label>Do you want to send to your List ? *</label><br/>
                                                                                    <span class="radioBtnCont">
                                                                                        <input type="radio" name="list_type" value="1"  id="WhatThisPurchaseForVal4" required 
                                                                                               @if (old('list_type') == 1) checked  @endif/>
                                                                                        <label for="WhatThisPurchaseForVal4">yes</label>
                                                                                    </span>
                                                                                    <span class="radioBtnCont">
                                                                                        <input type="radio" name="list_type" id="WhatThisPurchaseForVal5" value="0"  @if (old('list_type') == 0) checked  @endif/>
                                                                                        <label for="WhatThisPurchaseForVal5">no</label>
                                                                                    </span>
                                                                                    
                                                                                </div>-->
                                </div>
                            </div>
                            <div class="col-md-6 registrationFormFieldCont">
                                <div style="margin-top: 20px;" id="map_canvas"></div>
                            </div>
                            @if (Auth::Guest())
                            <div class="col-sm-12"><hr/><h3 class="text-center">Account Information</h3></div>
                            <div class="col-sm-6 class">
                                <div class="row">
                                    <div class="col-sm-6 registrationFormFieldCont">
                                        <span class="radioBtnCont">
                                            <input type="radio" name="existingUser" value="1" id="existingUser" required 
                                                   onchange='showHideLoginForm(this);' @if (old('existingUser') != 2) checked  @endif/>
                                                   <label for="existingUser">Already Member? Sign in</label>
                                        </span>
                                    </div>
                                    <div class="col-sm-6 registrationFormFieldCont">
                                        <span class="radioBtnCont">
                                            <input type="radio" name="existingUser" value="2" id="newUser" 
                                                   onchange='showHideLoginForm(this);' @if (old('existingUser') == 2) checked  @endif/>
                                                   <label for="newUser">New Member? Sign up</label><br/><br/>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 active" id="requestFormLoginFieldsCont">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>E-Mail Address (Required)</label>
                                                <div class="input-group login-field">
                                                    <span><img src="{{ asset('img/front/login-profile-img.png') }}"></span>
                                                    <input type="text" name="loginEmail" class="form-control" value="{{old('loginEmail')}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>Password (Required)</label>
                                                <div class="input-group login-field">
                                                    <span><img src="{{ asset('img/front/password-login-icon.png') }}"></span>
                                                    <input type="password" name="loginPassword" value="{{old('loginPassword')}}" 
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <div class="margin-top-15">
                                                    <a href="{{url('/password/email')}}" target="_blank">Forget Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="requestFormRegisterFieldsCont">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-12 registrationFormFieldCont">
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group login-field">
                                                    <span><img src="{{ asset('img/front/login-profile-img.png') }}"></span>
                                                    <input required type="text" name="first_name" class="form-control" value="{{old('first_name')}}" 
                                                           placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group login-field">
                                                    <span><img src="{{ asset('img/front/login-profile-img.png') }}"></span>
                                                    <input required type="text" name="last_name" class="form-control" value="{{old('last_name')}}" 
                                                           placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group login-field">
                                                    <span>
                                                        <img src="{{ asset('img/front/form_icon_bus_name.png') }}">
                                                        <a data-toggle="tooltip" data-html="true" 
                                                           title="The display name is the visible name used<br/>to communicate with other users">
                                                            <i class="glyphicon glyphicon-info-sign"></i></a>
                                                    </span>
                                                    <input type="text" required name="business_name" class="form-control" value="{{old('business_name')}}" 
                                                           placeholder="Business Name or Display Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group login-field">
                                                    <span><img src="{{ asset('img/front/form_icon_email.png') }}"></span>
                                                    <input required type="email" name="email" class="form-control" value="{{old('email')}}" 
                                                           placeholder="E-Mail Address">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group login-field">
                                                    <span>
                                                        <img src="{{ asset('img/front/form_icon_password.png') }}">
                                                        <a data-toggle="tooltip" title="Minimum password length should be 6">
                                                            <i class="glyphicon glyphicon-info-sign"></i></a>
                                                    </span>
                                                    <input type="password" required name="password" class="form-control" value="{{old('password')}}" id="password" 
                                                           placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group login-field">
                                                    <span><img src="{{ asset('img/front/form_icon_password.png') }}"></span>
                                                    <input type="password" required name="password_confirmation" class="form-control" 
                                                           placeholder="Confirm Password" value="{{old('password_confirmation')}}">
                                                </div>
                                            </div>
                                            <!--                                                            <div class="col-sm-12">
                                                                                                        <div class="input-group login-field">
                                                                                                            <span><img src="{{ asset('img/front/form_icon_password.png') }}"></span>
                                                                                                            <input type="password" required name="password_confirmation" class="form-control" 
                                                                                                                        placeholder="Confirm Password" value="{{old('password_confirmation')}}">
                                                                                                        </div>
                                                                                                    </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-sm-12 registrationFormFieldCont">
                                <label> </label>
                                <input type="hidden" name="lati" value="{{old('lati')}}"/>
                                <input type="hidden" name="longi" value="{{old('longi')}}"/>
                                <input type="hidden" name="singleSupplier" value="{{$supplier_id}}"/>

                                <input type="hidden" name="userType" value="1"/>
                                <input type="hidden" name="iAmA" value="1"/>

                                <div class="text-center submit-btn-auth">
                                    <input type="submit" class="" value="CONTINUE">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script type="text/javascript">
                    jQuery('document').ready(function() {

            getSubCategories("[name='main_categories']", "{{$subCatsSelectedids}}");
                    getCities("[name='state']", 'city', '{{profileGetFieldsValues(old("city"), $defaultLocation["id"])}}');
                    validator = $("#requestServiceForm").validate({
            errorPlacement: $.noop,
                    ignore: [],
                    rules: {
                    when_need_it_date: {
                    required: {
                    depends: function() {
                    return $("input[name='when_need_it']:checked").val() === '3';
                    }
                    }
                    },
                    }
            });
                    showHideLoginForm ('[name="existingUser"]:checked')
            });
                    function showHideLoginForm (checkbox) {
                    if ($(checkbox).val() == 1) {
                    $("#requestFormLoginFieldsCont").slideDown();
                            $("#requestFormRegisterFieldsCont").slideUp();
                            $("#requestFormLoginFieldsCont input").attr('required', 'required');
                            $("#requestFormRegisterFieldsCont input").removeAttr('required');
                    } else {
                    $("#requestFormRegisterFieldsCont").slideDown();
                            $("#requestFormLoginFieldsCont").slideUp();
                            $("#requestFormRegisterFieldsCont input").attr('required', 'required');
                            $("#requestFormLoginFieldsCont input").removeAttr('required');
                    }
                    }
</script>

@endsection
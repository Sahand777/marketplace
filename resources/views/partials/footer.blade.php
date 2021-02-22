        <footer>
            <div class="container">
                <div class="row footerSections">
                    <div class="">
                        <h5>QUICK LINKS</h5>
                        <ul>
                            <li><a class="linkToHowItWorks" href="{{url()}}/#howItWorks">How it works</a></li>
                            <li><a href="{{url('auth/login')}}">Sign In</a></li>
                            <li><a href="{{ url('categories') }}">Categories</a></li>
                            <li><a href="{{url('auth/register')}}">Register Your Business</a></li>
                            <li><a href="{{url('suppliers-list')}}">Suppliers Directory</a></li>
                            <li><a href="http://support.firmogram.ca/" target="_blank">Support</a></li>
                            <li><a href="{{url('')}}/blog/" target="_blank">Blog</a></li>
                        </ul>
                    </div>
                    <div class="">
                        <div class="">
                            <h5>FOLLOW US</h5>
                            <p class="socialLinksCont">
                                <a href="https://www.linkedin.com/company/firmogram-ecosystem-visualization?report%2Esuccess=MlmG7g_fqFRfD4iVhHgr0FomJDOL3vciIT4v8pi3EYkZnZLjFuJfr4acCeXZnFnMvaat" target="_blank">
                                    <img src="{{ asset('img/front/icon_linkedin.png') }}" alt="Linkedin" width="22" height="22"/></a>
                                <a href="https://www.facebook.com/Firmogram-Intelligent-B2B-Marketplace-1254171844608815/" target="_blank">
                                    <img src="{{ asset('img/front/icon_fb.gif') }}" alt="Facebook" width="12" height="20"/></a>
                                <a href="https://twitter.com/firmogram" target="_blank">
                                    <img src="{{ asset('img/front/icon_tw.gif') }}" alt="Twitter" width="26" height="21"/></a>
                                <a href="https://plus.google.com/u/0/104925233774964257643/posts" target="_blank">
                                    <img src="{{ asset('img/front/icon_google_plus.png') }}" alt="Google Plus" width="25" height="24"/></a>
                               <!-- <a href="javascript:;">
                                    <img src="{{ asset('img/front/icon_instagram.png') }}" alt="Instagram" width="25" height="25"/></a>-->
                                <a href="https://www.youtube.com/watch?v=Dn36nSiPAw8" target="_blank">
                                    <img src="{{ asset('img/front/icon_yt.gif') }}" alt="Instagram" width="25" height="24"/></a>
                                <a href="https://www.pinterest.com/firmogram/" target="_blank">
                                    <img src="{{ asset('img/front/icon_pinterest.png') }}" alt="Pinterest" width="25" height="24"/></a>
                            </p><br/>
                        </div>
<!--                        <p>A Proud Member of:</p>
                        <p><img src="{{asset('img/front/company_logos/cci_logo.png')}}" alt="" width="200"/></p>-->
                    </div>
                    <div class="">
                        <h5>CONTACT INFORMATION</h5>
                        <p>P.O. Box 45021, Vancouver BC,<br/>Canada V6S 2M8</p>
                        <p><img src="{{ asset('img/front/icon_phone.gif') }}" alt=""/> TEL +1 855 782 6882</p>
                        <p><img src="{{ asset('img/front/icon_print.gif') }}" alt=""/> FAX +1 604 568 8891</p>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('img/front/Firmogram_r10_c8.png') }}" alt="Firmogram"/><br/><br/>
                        <a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=firmogram.com','SiteLock','width=600,height=600,left=160,top=170');" >
                            <img alt="SiteLock" title="SiteLock" src="//shield.sitelock.com/shield/firmogram.com"/>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 copyrightTextCont">
                        <p>Copyright <?php echo date('Y'); ?> Firmogram. All Rights Reserved.
                            <a href="{{url('privacy-policy')}}">Privacy Policy</a> .
                            <a href="{{url('contact-us')}}">Contact Us</a> . 
                            <a href="{{url('terms')}}">Terms of Use</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <div class="hidden-xs side_follow_bar">
            <ul>
                <li>
                    <a class="an-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.firmogram.com&title=Firmogram" target="_blank">
                        <img src="{{ asset('img/front/ic_linkedin.png') }}" alt="Linkedin" width="22" height="22"/>
                    </a>
                </li>
                <li>
                    <a class="an-facebook" href="http://www.facebook.com/sharer.php?u=https://www.firmogram.com" target="_blank">
                        <img src="{{ asset('img/front/ic_facebook.png') }}" alt="Linkedin" width="22" height="22"/>
                    </a>
                </li>
                <li>
                    <a class="an-twitter" href="https://twitter.com/share?url=https://www.firmogram.com/" target="_blank">
                        <img src="{{ asset('img/front/ic_twitter.png') }}" alt="Linkedin" width="22" height="22"/>
                    </a>
                </li>
                <li>
                    <a class="an-gplus" href="https://plus.google.com/share?url=https://www.firmogram.com" target="_blank">
                        <img src="{{ asset('img/front/ic_googleplus.png') }}" alt="Linkedin" width="22" height="22"/>
                    </a>
                </li>
                <li>
                    <a class="an-youtube" href="https://www.youtube.com/watch?v=Dn36nSiPAw8" target="_blank">
                        <img src="{{ asset('img/front/ic-youtube.png') }}" alt="Linkedin" width="22" height="22"/>
                    </a>
                </li>
                <li>
                    <a class="an-pin" href="https://pinterest.com/pin/create/button/?url=https%3A//www.firmogram.com" target="_blank">
                        <img src="{{ asset('img/front/ic_pinterest.png') }}" alt="Linkedin" width="22" height="22"/>
                    </a>
                </li>
            </ul>
        </div>


        <div class="modal ajaxLoadingPopup" id="loading-indicator" style="display:none; text-align:center">
            <img src="{{ asset('img/ajax-loader.gif') }}" alt="Loading..." width="60" height="60" />
                <!--<p>Please wait while we load .........</p><br /><br />-->

        </div>
        @include('partials.scripts')
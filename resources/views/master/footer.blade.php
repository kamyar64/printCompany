<footer>
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-5">
                        <h4 class="footer-heading footer-heading-simple">ارتباط با ما</h4>
                        <address>
                            @foreach($contact_us_tell as $phone)
                                <p ><i class="icon icon_phone ico-styled text-primary "></i> <strong>{{$phone->name}}</strong> : {{ Helper::convertToPersianDigit($phone->value)}} </p>
                            @endforeach
                            @foreach($contact_us_email as $email)
                                <p ><i class="icon icon_mail_alt ico-styled text-primary "></i> <strong>{{$email->name}}</strong>: {{$email->value}} </p>
                            @endforeach
                        </address>
                        <ul class="list-inline social-icons social-icons-small social-icons-bordered">
                            @foreach($socialNetwork as $social)
                                <li><a href="{{$social->url}}"><i class="{{$social->icon}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-7">
                        <h4 class="footer-heading footer-heading-simple">خبرنامه</h4>
                        <p>جهت عضویت در خبرنامه ما لطفا ایمیل خود را وارد کنید</p>
                        <form class="newsletter-form" method="post">
                            <div class="input-group input-group-lg">
                                <input type="email" class="form-control" name="email" placeholder="ایمیل شما">
                                <span class="input-group-btn"><button class="btn btn-primary" type="button"><i class="fa fa-spinner fa-spin"></i><span>عضویت</span></button>
										</span>
                            </div>
                            <div class="alert"></div>
                        </form>

                    </div>


                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="footer-heading footer-heading-simple">محصولات</h4>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Who we are</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="footer-heading footer-heading-simple">لینک های سایت</h4>
                        <ul class="list-unstyled link-list">
                            <li><a href="#">خانه</a></li>
                            <li><a href="#">درباره ما</a></li>
                            <li><a href="#">ارتباط با ما</a></li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <p class="copyright-text text-center margin-top-30 no-margin-bottom"> تمامی حقوق این سایت متعلق به سازمان چاپ و نشر می باشد.</p>
</footer>

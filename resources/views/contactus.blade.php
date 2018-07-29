@extends('master.layout')
@section('content')
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <ol class="breadcrumb link-accent">
                <li><a href="{{ route('home') }}">خانه</a></li>
                <li class="active">ارتباط با ما</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- PAGE CONTENT -->
    <div class="page-content no-margin-top">
        <div class="google-map map-fullwidth">
            <div id="custom-map-canvas"></div>
        </div>
        <div class="margin-bottom-50"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-border-right" style="margin-bottom: 40px">تماس با ما</h2>
                    @foreach($data["all_address"] as $address)
                        <div class="widget">
                            <h4> {{$address->name}}</h4>
                            <address class="contact-info">
                                <p><i class="icon icon_pin_alt ico-styled text-primary "></i> {{$address->address}}</p>

                            </address>
                        </div>
                     @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                        <div class="widget">

                            <address class="contact-info">
                                @foreach($data["all_phone"] as $phone)
                                    <p ><i class="icon icon_phone ico-styled text-primary "></i> <strong>{{$phone->name}}</strong> : {{ Helper::convertToPersianDigit($phone->value)}} </p>
                                @endforeach
                                    @foreach($data["all_email"] as $email)
                                        <p ><i class="icon icon_mail_alt ico-styled text-primary "></i> <strong>{{$email->name}}</strong>: {{$email->value}} </p>
                                    @endforeach
                            </address>
                        </div>

                </div>
            </div>
               {{-- <div class="col-md-3">
                    <div class="sidebar">
                        <div class="widget">
                            <h4 class="widget-title heading-border-left">CONTACT INFO</h4>
                            <address class="contact-info">
                                <p><i class="icon icon_pin_alt ico-styled text-primary"></i> 1234 North Main Street New York, NY 22222</p>
                                <p><i class="icon icon_phone ico-styled text-primary"></i> (1800) 765 - 4321</p>
                                <p><i class="icon icon_mail_alt ico-styled text-primary"></i> email@yourdomain.com</p>
                            </address>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title heading-border-left">BUSINESS HOURS</h4>
                            <ul class="list-unstyled">
                                <li><strong>Monday-Friday: </strong> 8am to 5pm</li>
                                <li><strong>Saturday: </strong> 10am to 2pm</li>
                                <li><strong>Sunday: </strong> Closed</li>
                            </ul>
                        </div>
                    </div>
                </div>--}}

            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-border-right">ارتباط با ما</h2>
                    <p>@if(isset($data["google_map"]->Description)) {{ $data["google_map"]->Description }}@endif</p>
                    <form method="post" id="contact-form" class="form-horizontal form-minimal margin-top-30" novalidate>
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contact-name" class="control-label sr-only">نام و نام خانوادگی</label>
                                    <input type="text" class="form-control" id="contact-name" name="name" placeholder="نام و نام خانوادگی" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contact-email" class="control-label sr-only">ایمیل</label>
                                    <input type="email" class="form-control" id="contact-email" name="email" placeholder="ایمیل" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contact-mobile" class="control-label sr-only">شماره موبایل</label>
                                    <input type="number" minlength="11" class="form-control" id="contact-mobile" name="mobile" placeholder="شماره موبایل" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-subject" class="control-label sr-only">موضوع</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="contact-subject" name="subject" placeholder="موضوع" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-message" class="control-label sr-only">متن</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="contact-message" name="message" rows="5" cols="30" placeholder="متن  " required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button id="submit-button" type="submit" class="btn btn-primary"><i class="fa loading-icon"></i> <span>ارسال پیام</span></button>
                            </div>
                        </div>
                        <input type="hidden" name="msg-submitted" id="msg-submitted" value="true">
                    </form>
                </div>
                {{-- <div class="col-md-3">
                     <div class="sidebar">
                         <div class="widget">
                             <h4 class="widget-title heading-border-left">CONTACT INFO</h4>
                             <address class="contact-info">
                                 <p><i class="icon icon_pin_alt ico-styled text-primary"></i> 1234 North Main Street New York, NY 22222</p>
                                 <p><i class="icon icon_phone ico-styled text-primary"></i> (1800) 765 - 4321</p>
                                 <p><i class="icon icon_mail_alt ico-styled text-primary"></i> email@yourdomain.com</p>
                             </address>
                         </div>
                         <div class="widget">
                             <h4 class="widget-title heading-border-left">BUSINESS HOURS</h4>
                             <ul class="list-unstyled">
                                 <li><strong>Monday-Friday: </strong> 8am to 5pm</li>
                                 <li><strong>Saturday: </strong> 10am to 2pm</li>
                                 <li><strong>Sunday: </strong> Closed</li>
                             </ul>
                         </div>
                     </div>
                 </div>--}}
            </div>
        </div>
    </div>
<script>
    function codeAddress(theMap) {
        var myLatlng = new google.maps.LatLng( '@if(isset($data["google_map"]->MainAddress)) {{ $data["google_map"]->MainAddress->lat_google }} @endif' ,'@if(isset($data["google_map"]->MainAddress)){{ $data["google_map"]->MainAddress->long_google }} @endif');
        var address = "Tehran";
        geocoder.geocode( { 'address': address, 'region': 'ir'}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                theMap.setCenter(myLatlng);
                var image = new google.maps.MarkerImage("img/location-pin.png", null, null, null, new google.maps.Size(64, 64));
                var beachMarker = new google.maps.Marker({
                    map: theMap,
                    icon: image,
                    position: myLatlng
                });

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>
@endsection

@if(count($errors)>0)

    <div class="alert alert-danger login-alert" role="alert" >
        <ul dir="rtl">
            @foreach( $errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success  login-alert" role="alert" >
        <ul dir="rtl">
            <li>
                {{ Session::get('success') }}
            </li>
        </ul>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger  login-alert" role="alert" >
        <ul dir="rtl">
            <li>
                {{ Session::get('error') }}
            </li>
        </ul>
    </div>
@endif
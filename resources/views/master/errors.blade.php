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
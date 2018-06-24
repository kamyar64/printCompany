<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<a href="#" data-toggle="modal" data-target="#login-modal">Login</a>

    <div class="modal-dialog">
        <div class="loginmodal-container">


            <h1>Login to Your Account</h1><br>
            <form action="{{route('register')}}" method="POST">
                {{ csrf_field() }}
                <input type="text" name="name" placeholder="name">
                <input type="text" name="username" placeholder="username">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_confirmation" placeholder="password_confirmation">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
            </form>

            <div class="login-help">
                <a href="#">Register</a> - <a href="#">Forgot Password</a>
            </div>
        </div>
    </div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
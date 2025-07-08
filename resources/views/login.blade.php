@extends('partials.layout')
<style>
body{
    
        display:flex;
        justify-content:center;
}

    form{
        border: px solid #f1f1f1;
    }

    input[type=email], input[type=password]{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button{
        background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  border-radius:5px;
}
    button:hover {
  opacity: 0.8;
}

button:active{
  opacity:0.5;
}
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}
.container {
  padding: 16px;
}
span.password {
  float: right;
  padding-top: 16px;
}
@media screen and (max-width: 300px) {
  span.password {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}

.flexbox{
    display:flex;
    width:400px;
    align-content: center;
    flex-direction:column;
}
</style>
@section('content')
        <h1 style="text-align:center">Login Form</h1>
          @if ($errors->any())
            <div>
                <strong> Whoops! </strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <li></li>
            </div>
            @endif
            <form class="flexbox" action="/login" method="post">
              @csrf
                <div class="container">
                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="email" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit">Login</button>
                    <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>
              
            </form>
 @endsection 

@extends('partials.layout')
@section('title', 'Update Task')
<style>
    body{
        background-color: aquamarine;
        margin: 0;
        display:flex;
        justify-content:center;
    }
    .container{
        display:flex;
        flex-direction:column;
        align-content: center;
        text-align:center;
        width:400px
    }
    .form{
        display:flex;
        flex-direction:column;
        text-align:left;
        padding: 10px;
    }

    input[type=text]{
        padding:12px 12px;
        margin:8px 0;
        box-sizing:border-box;
    }
</style>
@section('content')
            <h1>Update project list</h1>
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
            <form class="form" method="POST" action="/update/{{$project['id']}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <input value="{{$project['id']}}" name="id" hidden>
                <div>
                <label for="project_name"> project Name </label>
                <input type="text" name="name" id="name"  value="{{$project['name']}}" required>
                </div>
                <div>
                    <label for="description"> description </label>
                <input type="text" name="others" id="others"  value="{{$project['others']}}" required>
                </div>
                <div>
                    <label for="image"> Image </label>
                <input type="file" name="photo" id="image" accept="image/*">
                </div>
                <div class="sub_btns">
                    <a href="/" type="button">Cancel</a>
                    <button type="submit">Update</button>
                </div>
            </form>
@endsection
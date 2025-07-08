@extends('partials.layout')

<style>
    body {
        background-color: rgb(51, 164, 198);
        margin: 0;
        display: flex;
        justify-content: center;
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 400px;
        margin-top: 50px;
    }

    .form {
        display: flex;
        flex-direction: column;
        text-align: left;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .form label {
        margin-top: 10px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="file"] {
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .sub_btns {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .sub_btns a {
        background-color: #10e117;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .sub_btns a:hover {
        background-color: #10e117;
    }

    h1 {
        color: white;
        margin-bottom: 20px;
    }

    div strong {
        color: red;
    }

    div ul {
        list-style-type: disc;
        margin-left: 20px;
        color: red;
    }
</style>

@section('content')
    <div class="container">
        <h1>Add Project</h1>

        @if ($errors->any())
            <div>
                <strong>Whoops!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/project" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Project Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="others">Others</label>
                <input type="text" name="others" id="others" required>
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="photo" id="image" accept="image/*">
            </div>
            <div class="sub_btns">
                <a href="/project" type="button">Cancel</a>
                <button type="submit">ADD</button>
            </div>
        </form>
    </div>
@endsection

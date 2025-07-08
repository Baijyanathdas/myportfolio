@extends('partials.layout')

<style>
  body {
    background-color: rgb(51, 164, 198);
    margin: 0;
    padding: 20px;
    font-family: Arial, sans-serif;
  }

  h1 {
    text-align: center;
    color: white;
    margin-bottom: 40px;
  }

  .content {
    max-width: 900px;
    margin: 0 auto;
    background-color: white;
    padding: 30px;
    border-radius: 10px;
  }

  .top-right-btn {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
  }

  .top-right-btn a {
    background-color: #10e117;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
    transition: background-color 0.3s ease;
  }

  .top-right-btn a:hover {
    background-color: #0cb814;
  }

  ul {
    list-style: none;
    padding: 0;
  }

  .list {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    background-color: #f8f8f8;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    position: relative;
  }

  .list .image img {
    width: 180px;
    height: auto;
    border-radius: 10px;
    object-fit: cover;
  }

  .list p {
    font-size: 18px;
    font-weight: bold;
    margin: 0;
    color: #333;
    flex: 1;
    margin-top: 10px;
  }

  aside {
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: flex-end;
  }

  .edit_btn {
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 14px;
    transition: background-color 0.3s ease;
  }

  .edit_btn:hover {
    background-color: #0056b3;
  }

  .del_btn {
    padding: 8px 16px;
    background-color: #dc3545;
    border: none;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
  }

  .del_btn:hover {
    background-color: #b52a37;
  }

  .pagination {
    text-align: center;
    margin-top: 30px;
  }

  .pagination .page-link {
    padding: 8px 12px;
    margin: 0 4px;
    border-radius: 5px;
    background-color: white;
    border: 1px solid #ccc;
    color: #007bff;
    text-decoration: none;
  }

  .pagination .page-link:hover {
    background-color: #007bff;
    color: white;
  }
</style>

@section('content')
<h1> My Projects </h1>
@if(session('success'))
  <div style="background-color:#d4edda; padding: 10px; border-radius: 5px; margin-bottom: 20px; color:#155724;">
    {{ session('success') }}
  </div>
@endif

<div class="content">
  <div class="top-right-btn">
    <a href="/addp">ADD</a>
  </div>

  <ul>
    @foreach ($projects as $pro)
      <li>
        <div class="list">
          <div class="image">
            <img id="image" src="{{ asset($pro['photo']) }}" alt="img">
          </div>
          <p>{{ $pro->name }}</p>
          <aside>
            <a type="button" class="edit_btn" href="/update/{{ $pro['id'] }}">Edit</a>
            <form method="POST" action="/delete/{{ $pro['id'] }}">
              @csrf
              @method("DELETE")
              <button type="submit" class="del_btn">Delete</button>
            </form>
          </aside>
        </div>
      </li>
    @endforeach
  </ul>

  <div class="pagination">
    {{ $projects->links() }}
  </div>
</div>
@endsection
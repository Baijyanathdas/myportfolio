<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Me</title>
  <style>
    * { box-sizing: border-box; }

    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(120deg, #f3e8ff, #e0f7fa);
      font-family: 'Segoe UI', sans-serif;
      overflow-y: auto;
    }

    .container {
      max-width: 900px;
      width: 90%;
      background: #f8f5ff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .contents {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 10px;
    }

    .photo-container {
      display: flex;
      justify-content: center;
      margin-top: 25px;
    }

    .photo-container img {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #6a5acd;
    }

    .about {
      font-size: 38px;
      color: #6a5acd;
      margin-top: 20px;
      font-weight: bold;
      text-align: center;
    }

    .contactcontainer {
      display: flex;
      justify-content: space-between;
      gap: 40px;
      margin-top: 15px;
      width: 100%;
    }

    .email, .contact {
      font-size: 20px;
      color: #333;
    }

    a {
      text-decoration: none;
      color: #00bcd4;
      font-weight: bold;
    }

    .about-text {
      padding: 20px;
      font-size: 16px;
      color: #333;
      line-height: 1.6;
      text-align: justify;
      white-space: pre-wrap;
    }

    form {
      padding: 0 20px 20px;
    }

    textarea {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      margin-bottom: 10px;
      resize: vertical;
    }

    button {
      background-color: #6a5acd;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 14px;
      border-radius: 4px;
      cursor: pointer;
    }

    .alert {
      padding: 10px 20px;
      margin: 10px 0;
      background-color: #d1e7dd;
      color: #0f5132;
      border: 1px solid #badbcc;
      border-radius: 4px;
    }

    @media (max-width: 768px) {
      .container { width: 95%; padding: 20px; }
      .photo-container img { width: 150px; height: 150px; margin-top: 15px; }
      .about { font-size: 28px; margin-top: 15px; }
      .contactcontainer {
        flex-direction: column;
        align-items: center;
        gap: 10px;
        padding: 10px 0;
      }
      .email, .contact { font-size: 16px; }
      .about-text { font-size: 14px; padding: 10px; }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="about">About Me</div>
    <div class="contents">

      <div class="photo-container">
        @if(Auth::check() && Auth::user()->about_photo)
          <img src="{{ asset('storage/' . Auth::user()->about_photo) }}" alt="Profile Photo" />
        @else
          <img src="https://tse3.mm.bing.net/th/id/OIP.6NivW0DzXMg9URlZ2Ca_qAHaE7?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Default Photo" />
        @endif
      </div>

      <div class="contactcontainer">
        <div class="email">
          <a href="mailto:baijyanathdas123@gmail.com">baijyanathdas123@gmail.com</a>
        </div>
        <div class="contact">
          <a href="tel:9845419045">9845419045</a>
        </div>
      </div>
    </div>

    {{-- Flash message --}}
    @if(session('success'))
      <div class="alert">{{ session('success') }}</div>
    @endif

    {{-- About Me Paragraph --}}
    <div class="about-text">
     <form action="{{ route('profile.updateAboutMe') }}" method="POST">
      @csrf
       <p>{{ Auth::user()->about_me ?? 'No About Me information provided yet.' }}</p>
    
</form>
  </div>
</body>
</html>

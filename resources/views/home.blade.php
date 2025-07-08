 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Portfolio</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: arial;
    }
    body {
      background:rgb(45, 51, 43)
      color: #333;
      line-height: 1;
    }
    .navbar {
        display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 10%;
      background-color:rgb(73, 130, 109);
      position: sticky;
      top: 0;
      left: 0;
      z-index: 10;
      width: 100%;
    }
    .logo{
        font-size: 24px;
        font-weight: bold;
        color: white;
        margin-left: 0;
    }
    .navbar ul {
        list-style: none;
        display: flex;
    }
    .navbar ul li {
        margin-left: 30px;
        list-style: none;
    }
    .navbar ul li a {
        text-decoration: none;
        color: white;
        font-weight: bold;
        transition: color 0.3s;
    }
    .navbar ul li a:hover {
        /* color: rgb(34, 62, 48); */
        font-size:15px;
        /* font-weight:500; */
        transition: 0.3s;
    }
    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 60px 10%;
        flex-wrap: wrap;
    }
    .left {
        flex: 1;
        min-width: 300px;
    }

    .left h1 {
        font-size: 48px;
        color: rgb(73, 74, 72);
        margin-bottom: 20px;
    }
    .left p {
        font-size: 18px;
        max-width: 500px;
        margin-bottom: 30px;
    }
    .btn {
        background-color:rgb(43, 65, 40);
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }
    .btn:hover {
        background-color:rgb(33, 71, 57);
    }
    .right {
        flex: 1;
        min-width: 300px;
        display: flex;
        justify-content: center;
    }
    .right img {
        width: 300px;
        height: 300px;
        object-fit: cover;
        border: 6px;
    }
    .project-card{
        width: 300px;
        padding: 15px;
        border: 1px solid green;
        border-radius: 10px;
        background: none;
    }
    .project-title{
        font-width: bold;
        font-size:16px;
        margin-bottom:10px;
    }
    @media (max-width: 768px) {
        .container {
            flex-direction: column-reverse;
            text-align: center;
        }
        .right img {
            margin-bottom: 30px;
        }
        .navbar {
            flex-direction: column;
            gap: 10px;
        }
        .navbar ul {
            flex-direction: column;
            gap: 10px;
            align-items: center;
      }
    }
    
  </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">My Portfolio</div>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/project">Project</a></li>
            <li><a href="/about">About Me</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/login">Admin login</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="left">
    <h1>Hello, I'm {{ Auth::user()->name ?? 'Mikki' }}</h1>
    <form action="{{ route('profile.updateAboutyou') }}" method="POST">
      @csrf
       <p>{{ Auth::user()->about_you ?? 'No About Me information provided yet.' }}</p>
    
    <a href="/"><button class="btn">View Projects</button></a>
</form>
</div>


    <div class="right">
     @php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp

@if(Auth::check() && Auth::user()->about_photo)
    <img src="{{ asset('storage/' . Auth::user()->about_photo) }}" alt="Profile Photo">
@else
    <img src="https://tse3.mm.bing.net/th/id/OIP.6NivW0DzXMg9URlZ2Ca_qAHaE7?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Default Photo">
@endif



    </div>
    </div>

    <section style="padding: 50px 10%;">
        <h2 style="font-size: 32px; color:rgb(57, 89, 61); margin-bottom: 30px;">Featured Project</h2>
        <div style="display: grid; grid-template-columns:1fr 1fr 1fr 1fr; gap: 30px; justify-content: 
            center;">

    <div style="background: white; border: 2px solid none; border-radius: 10px; 
    overflow: hidden; width: 300px; box-shadow: 0 10px 20px rgb(0, 0, 0, 0.2);">
    <img src="https://nestify.io/wp-content/uploads/2023/04/35019949_8252889-1024x576.jpg" alt="E-Commerce" style="width: 100%; 
    height: 180px; object-fit: cover;">
    <div style="padding: 15px;">
        <h6 class="project-title">Platform for E-commerce</h6>
        <p class="project-decreiption" style="font-size: 14px; color: rgb(23, 23, 23);">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto placeat modi tempora accusamus explicabo alias ratione, soluta voluptate autem quo dolores reiciendis. Distinctio tempore possimus non sequi quod numquam accusantium!
    </p>
      </div>
    </div>

    <div style="background: white; border: 2px none;border-radius: 10px;
    overflow: hidden; width: 300px; box-shadow: 0 10px 20px rgb(0, 0, 0, 0.2);">
    <img src="https://s3-alpha.figma.com/hub/file/1171935825/689d7884-5ef7-4671-a2b3-bfb59996cfa9-cover.png" alt="E-Commerce" style="width: 
    100%; height: 180px; object-fit: cover;">
    <div style="padding: 15px;">
        <h6 class="project-title">Mobile App for Fitness Tracking</h6>
        <p class="project-decreiption" style="font-size: 14px; color:rgb(23, 23, 23);">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto placeat modi tempora accusamus explicabo alias ratione, soluta voluptate autem quo dolores reiciendis. Distinctio tempore possimus non sequi quod numquam accusantium!
    </p>
    </div>
    </div>

    <div style="background: white; border: 2px none;border-radius: 10px;
    overflow: hidden; width: 300px; box-shadow: 0 10px 20px rgb(0, 0, 0, 0.2);">
    <img src="https://thinklayer.com/wp-content/uploads/2021/06/business-analytics-services-transforming-data-into-insight-1-scaled.jpg" alt="E-Commerce" style="width: 
    100%; height: 180px; object-fit: cover;">
    <div style="padding: 15px;">
        <h6 class="project-title">Data Analytics for Business Insights</h6>
        <p class="project-decreiption" style="font-size: 14px; color:rgb(23, 23, 23);">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto placeat modi tempora accusamus explicabo alias ratione, soluta voluptate autem quo dolores reiciendis. Distinctio tempore possimus non sequi quod numquam accusantium!
    </p>
    </div>
    </div>

    <div style="background: white; border: 2px none; border-radius: 10px;
            overflow: hidden; width: 300px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); ">
         <img src="https://th.bing.com/th/id/OIP.pGktFUArFz-Fc4570n1HigHaDo?rs=1&pid=ImgDetMain" alt="E-Commerce" style="width: 100%; 
           height: 180px; object-fit: cover;">
       <div style="padding: 15px;">
           <h6 class="project-title">Data Analytics Dashboard for Business Insights</h6>
            <p class="project-decreiption" style="font-size: 14px; color:rgb(23, 23, 23);">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto placeat modi tempora accusamus explicabo alias ratione, soluta voluptate autem quo dolores reiciendis. Distinctio tempore possimus non sequi quod numquam accusantium!
            </p>
      </div>
    </div>
       <div style="background: white; border: 2px none; border-radius: 10px;
            overflow: hidden; width: 300px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); ">
         <img src="https://th.bing.com/th/id/OIP.pGktFUArFz-Fc4570n1HigHaDo?rs=1&pid=ImgDetMain" alt="E-Commerce" style="width: 100%; 
           height: 180px; object-fit: cover;">
       <div style="padding: 15px;">
           <h6 class="project-title">Data Analytics Dashboard for Business Insights</h6>
            <p class="project-decreiption" style="font-size: 14px; color:rgb(23, 23, 23);">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto placeat modi tempora accusamus explicabo alias ratione, soluta voluptate autem quo dolores reiciendis. Distinctio tempore possimus non sequi quod numquam accusantium!
            </p>
      </div>
    </div>
       <div style="background: white; border: 2px none; border-radius: 10px;
            overflow: hidden; width: 300px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); ">
         <img src="https://th.bing.com/th/id/OIP.pGktFUArFz-Fc4570n1HigHaDo?rs=1&pid=ImgDetMain" alt="E-Commerce" style="width: 100%; 
           height: 180px; object-fit: cover;">
       <div style="padding: 15px;">
           <h6 class="project-title">Data Analytics Dashboard for Business Insights</h6>
            <p class="project-decreiption" style="font-size: 14px; color:rgb(23, 23, 23);">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto placeat modi tempora accusamus explicabo alias ratione, soluta voluptate autem quo dolores reiciendis. Distinctio tempore possimus non sequi quod numquam accusantium!
            </p>
      </div>
    </div>
       <div style="background: white; border: 2px none; border-radius: 10px;
            overflow: hidden; width: 300px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); ">
         <img src="https://th.bing.com/th/id/OIP.pGktFUArFz-Fc4570n1HigHaDo?rs=1&pid=ImgDetMain" alt="E-Commerce" style="width: 100%; 
           height: 180px; object-fit: cover;">
       <div style="padding: 15px;">
           <h6 class="project-title">Data Analytics Dashboard for Business Insights</h6>
            <p class="project-decreiption" style="font-size: 14px; color:rgb(23, 23, 23);">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto placeat modi tempora accusamus explicabo alias ratione, soluta voluptate autem quo dolores reiciendis. Distinctio tempore possimus non sequi quod numquam accusantium!
            </p>
      </div>
    </div>
       <div style="background: white; border: 2px none; border-radius: 10px;
            overflow: hidden; width: 300px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); ">
         <img src="https://th.bing.com/th/id/OIP.pGktFUArFz-Fc4570n1HigHaDo?rs=1&pid=ImgDetMain" alt="E-Commerce" style="width: 100%; 
           height: 180px; object-fit: cover;">
       <div style="padding: 15px;">
           <h6 class="project-title">Data Analytics Dashboard for Business Insights</h6>
            <p class="project-decreiption" style="font-size: 14px; color:rgb(23, 23, 23);">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto placeat modi tempora accusamus explicabo alias ratione, soluta voluptate autem quo dolores reiciendis. Distinctio tempore possimus non sequi quod numquam accusantium!
            </p>
      </div>
    </div>

    </div>
    </section>
</body>
</html>
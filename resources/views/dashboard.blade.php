<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-pVfHf6EfrK5LFmhdH3Heu1eJxWx+DWzDa1PfWCL+S8mVnmO4cRMIwr3XG5gW5Uz07B4pmX8+ZkYECvC+8Vxw/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap");
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { display: flex; height: 100vh; background: #f7f7f7; }

    .sidebar h3 { margin-bottom: 30px; color: purple; }
    .sidebar a { display: block; padding: 10px 0; color: #333; text-decoration: none; margin-bottom: 10px; }

    .main { flex: 1; padding: 30px; }
    .top-bar { display: flex; justify-content: flex-end; align-items: center; margin-bottom: 20px; }

    .profile {
      width: 35px;
      height: 35px;
      background-image: url(https://th.bing.com/th/id/OIP.0v0WSI9bszvLAmV1lus4-wHaDt?rs=1&pid=ImgDetMain);
      background-size: cover;
      border-radius: 50%;
      margin-left: 40px;
    }

    .stats { display: flex; gap: 20px; margin: 20px 0; }
    .stat-box {
      flex: 1;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
      text-align: center;
    }

    table {
      width: 100%;
      background: white;
      border-collapse: collapse;
      margin-top: 20px;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    th { background: #f0f0f0; }
    .edit-btn {
      background: #ddd;
      border: none;
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;
    }

    .sidebar {
      position: sticky;
      top: 0; left: 0; bottom: 0;
      width: 115px;
      height: 100vh;
      padding: 0 1.7rem;
      color: azure;
      overflow: hidden;
      background: rgba(113, 99, 186, 255);
      transition: all 0.5s linear;
    }

    .sidebar:hover { width: 240px; transition: 0.5s; }
    .logo { height: 80px; width: 16px; }

    .menu {
      height: 88%;
      position: relative;
      list-style: none;
      padding: 0;
    }

    .menu li {
      padding: 1rem;
      margin: 8px 0;
      border-radius: 8px;
      transition: all 0.5s ease-in-out;
    }

    .menu li:hover, .active {
      background-color: #e0e0e058;
    }

    .menu a {
      color: azure;
      font-size: 14px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .menu a i { font-size: 1.2rem; }

    .logout {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
    }

    .main--content {
      position: relative;
      background: #ebe9e9;
      width: 100%;
      padding: 1rem;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="logo"></div>
    <div class="profile"></div>
    <ul class="menu"> 
      <li class="active"><a href="#"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
    


      <li>
          <a href="{{ route('contacts.messages') }}" target="_blank">
    <i class="fas fa-code"></i>
    <span>Your message</span>
  </a>
 
</li>

     <li>
  <i class="fas fa-download"></i>
    <span>Download CV</span>
  </a>
</li>
 <li>
    <a href="{{ route('dashboard.updateprofile') }}">
  <i class="fas fa-user-cog"></i>
    <span>Change profile</span>
  </a>
</li>

      <li class="logout">
         <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" style="all: unset; display: flex; align-items: center; gap: 1.5rem; width: 100%; padding: 1rem; color: azure; cursor: pointer;">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log out</span>
          </button>
        </form>
      </li>
    </ul>
  </div>

  <div class="main">
    <div class="top-bar"></div>
    <h2>Dashboard</h2>

    <div class="stats">
      <div class="stat-box"><h3>Projects</h3><p>12</p></div>
      <div class="stat-box"><h3>Skills</h3><p>15</p></div>
      <div class="stat-box"><h3>Messages</h3><p>5</p></div>
    </div>

    <h3>Recent Projects</h3>
    <table>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Skills</th>
        <th>Actions</th>
      </tr>
      <tr>
        <td>Project Alpha</td>
        <td>A web application for managing tasks.</td>
        <td>React, Node.js</td>
        <td><button class="edit-btn">Edit</button></td>
      </tr>
      <tr>
        <td>Project Beta</td>
        <td>A mobile app for tracking fitness goals.</td>
        <td>Swift, Firebase</td>
        <td><button class="edit-btn">Edit</button></td>
      </tr>
      <tr>
        <td>Project Gamma</td>
        <td>A data analysis tool for visualizing trends.</td>
        <td>Python, Pandas</td>
        <td><button class="edit-btn">Edit</button></td>
      </tr>
    </table>

    
    

  </div>
</body>
</html>

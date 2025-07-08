<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 15px;
        }

        .section {
            margin-bottom: 40px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="file"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            background-color: #4b96e6;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #2b6cb0;
        }

        .save-btn {
            background-color: #28a745;
        }

        .save-btn:hover {
            background-color: #1e7e34;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .preview-img {
            max-width: 150px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .btn-home {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">

    <!-- ✅ Update Profile Photo -->
    <div class="section">
        <h2>Update Profile Photo</h2>

        @if(file_exists(public_path('storage/profile.jpg')))
            <img src="{{ asset('storage/profile.jpg') }}" class="preview-img" id="previewImage" alt="Current Profile Photo">
        @else
            <img src="#" class="preview-img" id="previewImage" alt="Profile Preview" style="display:none;">
        @endif

        <form action="{{ route('profile.updateAboutPhoto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="profilePhoto">Choose a photo</label>
            <input type="file" id="profilePhoto" name="aboutPhoto" accept="image/*" onchange="previewFile()">

            <div class="btn-group">
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
    <div class="section">
        <h2>Update About  You Paragraph</h2>
        <form action="{{ route('profile.updateAboutyou') }}" method="POST">
            @csrf
            <label for="aboutyou">Write About Yourself</label>
            <textarea id="aboutyou" name="about_you" placeholder="Enter about yourself">{{ old('about_you', auth()->user()->about_you ?? '') }}</textarea>
            <div class="btn-group">
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>


    <!-- ✅ Update About Me -->
    <div class="section">
        <h2>Update Your About me Paragraph</h2>
        <form action="{{ route('profile.updateAboutMe') }}" method="POST">
            @csrf
            <label for="aboutme">Write About Yourself</label>
            <textarea id="aboutme" name="about_me" placeholder="Enter about yourself">{{ old('about_me', auth()->user()->about_me ?? '') }}</textarea>
            <div class="btn-group">
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>

    <!-- ✅ Update Name -->
    <div class="section">
        <h2>Update Your Name</h2>
        <form action="{{ route('profile.updateName') }}" method="POST">
            @csrf
            <label for="name">Enter Your Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name ?? '') }}">
            <button type="submit" class="save-btn">Save</button>
        </form>
    </div>

    <!-- ✅ Update CV -->
    <div class="section">
        <h2>Update Your CV</h2>

        @if(file_exists(public_path('storage/profile.jpg')))
            <img src="{{ asset('storage/profile.jpg') }}" class="preview-img" id="previewCV" alt="Current CV">
        @else
            <img src="#" class="preview-img" id="previewCV" alt="CV Preview" style="display:none;">
        @endif

        <form action="{{ route('profile.updateAboutPhoto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="cv">Choose a CV Image</label>
            <input type="file" id="cv" name="aboutPhoto" accept="image/*" onchange="previewCV()">

            <div class="btn-group">
                <button type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ url('/') }}" class="btn-home">Go to Home</a>
    </div>

</div>

<script>
function previewFile() {
    const preview = document.getElementById('previewImage');
    const file = document.getElementById('profilePhoto').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
        preview.src = reader.result;
        preview.style.display = "block";
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

function previewCV() {
    const preview = document.getElementById('previewCV');
    const file = document.getElementById('cv').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
        preview.src = reader.result;
        preview.style.display = "block";
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}
</script>
</body>
</html>

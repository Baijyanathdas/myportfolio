
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
</head>
<body>
    <style>
        body {
            font-family: 'Times New Roman',sans-serif;
            background-color: #dfe8f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(36, 35, 35, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            font-family: Sans Unicode;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4b96e6;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container">
        <h1>Contact Me</h1>
        
             @if (session('success'))
                <div style="color: green; margin-bottom: 15px;">
                {{ session('success') }}
        </div>
        @endif


                <form action="/contact" method="POST">
                @csrf
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" value="{{ old('name') }}">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">

                    <label for="message">Message</label>
                    <textarea name="message" id="message" placeholder="Enter message">{{ old('message') }}</textarea>
                   <button type="submit">Submit</button>

            </form>

        </div>
    </body>
    </html>
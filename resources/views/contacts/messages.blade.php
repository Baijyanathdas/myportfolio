<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            padding: 20px;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #4b96e6;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f0f0f0;
        }

        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- ✅ Back Button -->
    <a href="{{ route('dashboard') }}" class="back-button">← Back to Dashboard</a>

    <h2>Contact Messages</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Received At</th>
        </tr>
        @foreach ($messages as $msg)
        <tr>
            <td>{{ $msg->name }}</td>
            <td>{{ $msg->email }}</td>
            <td>{{ $msg->message }}</td>
            <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>

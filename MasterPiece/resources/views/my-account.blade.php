<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">
    <title>My Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #f4f4f4;
        }

        header {
            background-color: #223A66;
            color: white;
            padding: 15px;
            text-align: right;
            display: flex;
            justify-content: flex-end; /* هذا سيجعل الأزرار في الجهة اليمنى */
            align-items: center;
        }

        header .buttons {
            display: flex;
            gap: 10px; /* المسافة بين الأزرار */
        }

        header a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #E12454;
        }

        header a:hover {
            background-color: #c91e47;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .profile {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #223A66;
        }

        .info {
            text-align: left;
        }

        .appointments {
            margin-top: 20px;
            background-color: 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #223A66;
            color: #fff;
        }

        .status.confirmed {
            color: green;
            font-weight: bold;
        }

        .status.pending {
            color: orange;
            font-weight: bold;
        }

        .account-settings {
            margin-top: 20px;
        }

        button {
            background-color: #E12454;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        button:hover {
            background-color: #c91e47;
        }
    </style>
</head>

<body id="top">
    <header>
        <div class="buttons">
            <button onclick="updateProfile()">Update Profile</button>
            <form action="{{ route('index') }}" method="Get" style="display: inline;">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        </div>
    </header>

    <div class="container">
        <header>
            <h1>My Account</h1>
        </header>
        <section class="profile">
            <img src="{{ asset('images/team/1.jpg') }}" alt="my photo" class="profile-pic">
            <div class="info">
                <h2>{{ $user->name }}</h2>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Phone Number:</strong> {{ $user->phone ?? 'N/A' }}</p>
                <p><strong>Address:</strong> {{ $user->address ?? 'N/A' }}</p>
            </div>
        </section>

        <section class="appointments">
            <h2>My Appointments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Click</th>
                        <th>Doctor</th>
                        <th>Condition</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach($user->appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>mkml</td>
                            <td>{{ $appointment->doctor_name }}</td>
                            <td class="status {{ $appointment->status }}">{{ $appointment->status == 'confirmed' ? 'Booked ✅' : 'Pending ⏳' }}</td>
                        </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </section>

        
    </div>
</body>

</html>

@include('superAdmin.ap.header')


<div class="container mt-4">
    <h1 class="mb-4" style="font-weight: 500;">Contact Us Messages</h1>

    @if ($contacts->count() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Phone Number</th>
                    <th>Message</th>
                    <th style="width: 150px;">Sent At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->message }}</td>
                        <td style="width: 150px;">{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>There are no messages at the moment.</p>
    @endif
</div>

@include('superAdmin.ap.footer')

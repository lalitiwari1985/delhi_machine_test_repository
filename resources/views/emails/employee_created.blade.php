<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee Created</title>
</head>

<body>
    <h2>New Employee Created</h2>
    <p>Given below is employee details:</p>
    <ul>
        <li><strong>Name:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Department:</strong> {{ $department }}</li>
    </ul>
    <p>Find attached the Ashok Chakra image:</p>
    <img src="{{ $message->embed(storage_path('app/public/images/ashok_chakra.png')) }}" alt="Ashok Chakra">
</body>

</html>

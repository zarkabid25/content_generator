<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email Verification</title>
</head>
<body>
    <h3>Verify User Email</h3>
    <p>Press <b>'Yes'</b> to verify email or <b>'No'</b> for reject.</p>

    <div style="display: inline-flex">
        <span>
            <a href="{{ route('email.verify', ['isverified' => encrypt('yes'), 'email' => encrypt($email)]) }}" style="padding: 10px; color: white; background-color: green">Yes</a>
        </span>

        <span style="margin-left: 10px">
            <a href="{{ route('email.verify', ['isverified' => encrypt('no'), 'email' => encrypt($email)]) }}" style="padding: 10px; color: white; background-color: red">No</a>
        </span>
    </div>
</body>
</html>
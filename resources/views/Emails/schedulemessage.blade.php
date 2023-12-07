<!DOCTYPE html>
<html>
<head>
<title>Reply to your email</title>
</head>
<body>

<p>Dear {{ $recipientName }},</p>

<h4>Subject:</h4>
<p>{{ $subject }}.</p>

<h4>Body:</h4>
<p>{{ $body }} {{$time}}</p>

<p>Sincerely,</p>
<p>{{ $senderName }}</p>

</body>
</html>

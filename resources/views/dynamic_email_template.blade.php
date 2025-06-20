<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry - MG</title>
</head>

<body>
    <p>Hi MG Team,</p>

    @if(isset($data['category']) || isset($data['product'] ))
    <p>I would like to request quote for {{ $data['category'] }}, {{ $data['product'] }}</p>
    @endif

    <p>{{ $data['name'] }}</p>
    <p>{{ $data['email'] }}</p>
    <p> {{ $data['phone'] }}.</p>

    @if(isset($data['company'] ))
    <p> {{ $data['company'] }}.</p>
    @endif

    @if(isset($data['country'] ))
    <p>{{ $data['country'] }}</p>
    @endif

    @if(isset($data['message'] ))
    <p>{{ $data['message'] }}</p>
    @endif

    <p>&nbsp;</p>
    <p>
        Thanks & Regards <br />
        {{ $data['name'] }}
    </p>
    <p></p>
</body>

</html>
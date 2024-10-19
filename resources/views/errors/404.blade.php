<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Mode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 6%;">
            <div class="col-8 col-md-4 text-center">
                <img src="{{ asset('images/404_notfound.png') }}" class="img-fluid" alt="404 Not Found">
            </div>
        </div>
        <div class="text-center mt-1">
            <h1  style="color:#ec0000; font-weight: bold;">404 Page Not Found !</h1>
            <p style="color:#080808; font-weight: bold;">Sorry for the inconvenience</p>
            <a class="btn btn-primary" href="http://127.0.0.1:8000/login">
             <i class="fa fa-home" aria-hidden="true"></i> &nbsp; Back to Home
            </a>
        </div>
    </div>
</body>
</html>


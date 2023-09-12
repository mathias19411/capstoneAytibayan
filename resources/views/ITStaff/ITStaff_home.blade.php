<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Staff</title>
        <link rel="stylesheet" href="{{ asset('Assets/css/itstaff.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://kit.fontawesome.com/6297197d39.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
@include('ITStaff.Body.sidebar')
              <!--Datatable-->
              <script src="https://code.jquery.com/jquery-3.7.0.js"> </script>
              <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"> </script>
              <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"> </script>
              <script src="{{ asset('itstaff.js') }}"></script>

</body>
</html>
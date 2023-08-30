<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="icon" href="\images\APAO logo.png" type="image icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('Assets/css/itstaff.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://kit.fontawesome.com/6297197d39.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

    <body class="announcement_events">
    @include('ITStaff.Body.sidebar')
        <div class="title">
        <h2> REGISTRATION</h2>
        </div>
             <div class="container">
                <div class="Name">
                <h5> List of Beneficiaries </h5>
                </div>
                <div class="dropdown">
                <button class="dropbtn">Lists <i class="fa-solid fa-caret-down"></i> </button>
                    <div class="dropdown-content">
                    <a href="#">List of Beneficiaries</a>
                    <a href="#">List of Project Coordinators</a>
                    <a href="#">List of Admin</a>
                    </div>
                </div>
                <input type="text" id="searchInput" placeholder="Search...">  

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Key</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Orly</td>
                            <td>Grona</td>
                            <td>Encabo</td>
                            <td>091234567890</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>********</td>
                            <td>3#sdhduf</td>
                            <td>
                                 <button><i class="fa-solid fa-eye fa-2xs"></i></button>
                                <button><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                                <button><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>001</td>
                            <td>Orly</td>
                            <td>Grona</td>
                            <td>Encabo</td>
                            <td>091234567890</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>********</td>
                            <td>3#sdhduf</td>
                            <td>
                                 <button><i class="fa-solid fa-eye fa-2xs"></i></button>
                                <button><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                                <button><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>001</td>
                            <td>Orly</td>
                            <td>Grona</td>
                            <td>Encabo</td>
                            <td>091234567890</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>********</td>
                            <td>3#sdhduf</td>
                            <td>
                                 <button><i class="fa-solid fa-eye fa-2xs"></i></button>
                                <button><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                                <button><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>001</td>
                            <td>Orly</td>
                            <td>Grona</td>
                            <td>Encabo</td>
                            <td>091234567890</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>********</td>
                            <td>3#sdhduf</td>
                            <td>
                                 <button><i class="fa-solid fa-eye fa-2xs"></i></button>
                                <button><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                                <button><i class="fa-solid fa-trash fa-2xs"></i></button>
                            </td>
                        </tr>
                     
                     </tbody>
                </table>
              </div>
                  <button type="button" class="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add
                  </button>

                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="registration">
                            <div class="col">
                            <div class="row">
                              <div class="col-4">
                                <label for="name">Name:</label>
                                <input class="form-control" type="text" name="name" placeholder="Name" required>
                              </div>
                              <div class="col-4">
                                <label for="Mname">Middle Name:</label>
                                  <input class="form-control"  type="text" name="Mname" placeholder="Middle Name" required>
                              </div>
                              <div class="col-4">
                                <label for="Lname">Last Name:</label>
                                  <input class="form-control"  type="text" name="Lname" placeholder="Last Name" required>
                              </div>
                            </div>
                        </div> 
                        <div class="col">
                            <div class="row">
                              <div class="col-4">
                                <label for="cnumber">Contact Number:</label>
                                <input class="form-control" type="text" name="cnumber" placeholder="091234564567" required>
                              </div>
                              <div class="col-4">
                                <label for="email">Email:</label>
                                  <input class="form-control"  type="email" name="email" placeholder="orlybinhi@gmail.com" required>
                              </div>
                              <div class="col-4">
                                <label for="Lname">Program </label>
                                  <input class="form-control"  type="text" name="Lname" placeholder="Binhi ng Pag-asa" required>
                              </div>
                            </div>
                            <form>
                        </div> 

                        <div class="modal-footer">
                          <button type="button" class="close" data-bs-dismiss="modal">Cancel</button>
                          <button type="button" class="add">Register</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script src="https://code.jquery.com/jquery-3.7.0.js"> </script>
                  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"> </script>
                  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"> </script>
                  <script src="{{ asset('/itstaff.js') }}"></script>

    </body>
  </html>
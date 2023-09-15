@extends('Project_Coordinator.projectcoordinator_main')

@section('content')
@include('Project_Coordinator.Body.sidebarproj')
    
<div class="title">
        <h1>Registration</h1>
</div>
    <div class="container">
            <div class="table-card table-responsive">
                <div class="table-body">
                    <table id="coordinator_table" class="table table-striped">
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
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-trash fa-2xs" style="color: #ffffff;"></i></button>
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
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-trash fa-2xs" style="color: #ffffff;"></i></button>
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
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-trash fa-2xs" style="color: #ffffff;"></i></button>
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
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-trash fa-2xs" style="color: #ffffff;"></i></button>
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
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-trash fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                        </tr>
                     </tbody>
                </table>
                </div>  
            </div>
        </div>
        <div class="btn-bottom">
            <button type="button" class="add" data-bs-toggle="modal" data-bs-target="#myModal">
                Register</button> 
            </div>
    </div>
   <!--Buttons-->

<div class="modal fade" id="myModal" tabindex="-1" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="row">
                            <div class="field">
                                <div class="col-4 mb-3">
                                    <label id="label_">Title</label>
                                    <input class="form-control" type="text" id="Title" placeholder="Title.... ">
                                </div>
                                <div class="col-4 mb-3">
                                    <label id="label_">To:</label>
                                    <select class="form-control" type="email" id="to"  onchange= "changeStatus()" placeholder="Title....">
                                        <option value="one"> orly@gmail.com </option>
                                        <option value="two"> joriza@gmail.com</option>
                                        <option value="one"> mathias@gmail.com </option>
                                        <option value="one"> jayferson@gmail.com </option>
                                    </select>
                                    </div>
                                <div class="col-4 mb-3">
                                    <label id="label_">Date</label>
                                        <input class="form-control"  type="date" id="Date" placeholder="Title....">
                                </div>
                            </div>
                        </div>
                    </div>

                            <div class="col-12">
                                <label id="label_">Message:</label>
                                <input class="form-control" type="text" name="message" id="textbox_m" placeholder="Write something...">
                            </div>
            <div class="modal-footer">
                <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="add">Save</button>
         </div>
    </div>
</div>



@endsection

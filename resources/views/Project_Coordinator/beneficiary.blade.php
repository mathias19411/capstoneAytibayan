@extends('Project_Coordinator.projectcoordinator_main')

@section('content')
@include('Project_Coordinator.Body.sidebarproj')
    
<div class="title">
        <h1>Beneficiaries</h1>
</div>
    <div class="container">
    <div class="row">
    <div class="col-md-4">
        <div class="location-form">
            <label for="locationFilter" class="sr-only">Filter by Location:</label>
            <div class="form-inline">
                <select class="form-control" id="locationFilter">
                    <option value="">All Locations</option>
                    <option value="Sagpon">Sagpon, Daraga</option>
                    <option value="Rawis, Legazpi">Rawis, Legazpi</option>
                    <option value="Bitano">Bitano, Legazpi</option>
                    <option value="AnotherLocation">Another Location</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-8 text-right">
        <div class="buttons">
            <button type="button" class="button_top">
                <i class="fa-solid fa-print fa-bounce" style="color: #ffffff;"></i>Print
            </button>
            <button type="button" class="button_top">
                <i class="fa-solid fa-file-arrow-up" style="color: #ffffff;"></i>Import
            </button>
            <button type="button" class="button_top">
                <i class="fa-solid fa-file-arrow-down" style="color: #ffffff;"></i>Export
            </button>
        </div>
    </div>
</div>


            <div class="table-card table-responsive">
                <div class="card-body">
                    <table id="coordinator_table" class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact #</th>
                            <th scope="col">Email</th>
                            <th scope="col">Project</th>
                            <th scope="col">Organization</th>
                            <th scope="col">Action</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Encabo, Orly</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Encabo, Orly</td>
                            <td>Rawis, Legazpi</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Encabo, Orly</td>
                            <td>Bitano, Legazpi</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">4</th>
                            <td>Encabo, Orly</td>
                            <td>Rawis, Legazpi</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">5</th>
                            <td>Encabo, Orly</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">6</th>
                            <td>Encabo, Orly</td>
                            <td>Bitano, Legazpi</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">7</th>
                            <td>Encabo, Orly</td>
                            <td>Rawis, Legazpi</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="inactive">Inactive
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">8</th>
                            <td>Encabo, Orly</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">9</th>
                            <td>Encabo, Orly</td>
                            <td>Bitano, Legazpi</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">10</th>
                            <td>Encabo, Orly</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">11</th>
                            <td>Encabo, Orly</td>
                            <td>Sagpon, Daraga</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">12</th>
                            <td>Encabo, Orly</td>
                            <td>Bitano, Legazpi</td>
                            <td>09123456789</td>
                            <td>orlybinhi@gmail.com</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                            <td><button type="button" class="active">Active
                            </button>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
        
                <div class="btn-bottom">
                    <button type="button" class="add" data-bs-toggle="modal" data-bs-target="#myModal">
                    Add
                    </button>
                    <!--Buttons-->
                    <button type="button" class="report-btn">
                    Generate Report
                    </button>
                </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="form-outline">
                            <label id="label_">Title</label>
                            <input class="form-control" type="text" id="Title" placeholder="Title.... ">
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-outline">
                            <label id="label_">To:</label>
                                <select class="form-control" type="email" id="to"  onchange= "changeStatus()" placeholder="Title....">
                                <option value="one"> orly@gmail.com </option>
                                <option value="two"> joriza@gmail.com</option>
                                <option value="one"> mathias@gmail.com </option>
                                 <option value="one"> jayferson@gmail.com </option>
                                 </select>
                        </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="form-outline">
                        <label id="label_">Date</label>
                                        <input class="form-control"  type="date" id="Date">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-outline">
                                    <label id="label_">Message:</label>
                                    <textarea class="form-control" rows="3" placeholder="Message sent to the employer"></textarea>
                                </div>
                        </div>
                    </div>
            <div class="modal-footer">
                <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="add">Save</button>
         </div>
    </div>
</div>

@endsection

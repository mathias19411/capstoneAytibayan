@extends('Project_Coordinator.projectcoordinator_main')

@section('content')
@include('Project_Coordinator.Body.sidebarproj')
    
<div class="title">
        <h1>Events</h1>
</div>
    <div class="container">
            <div class="table-card table-responsive">
                <div class="table-body">
                    <table id="coordinator_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>image.png</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-trash fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>image.png</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-trash fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>image.png</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-trash fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>image.png</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-trash fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>image.png</td>
                            <td>2023-09-21</td>
                            <td>
                            <button class="action"><i class="fa-solid fa-eye fa-2xs "style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-pen-to-square fa-2xs" style="color: #ffffff;"></i></button>
                            <button class="action"><i class="fa-solid fa-trash fa-2xs" style="color: #ffffff;"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Binhi ng Pag-asa Seminar</td>
                            <td>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</td>
                            <td>image.png</td>
                            <td>2023-09-21</td>
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
                Add</button> 
            </div>
    </div>
   <!--Buttons-->

<div class="modal fade" id="myModal" tabindex="-1" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Events</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                                <!--
                                <div class="row">
                                  <div class="field">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                      <label id="label_">Title</label>
                                      <input class="form-control" type="text" id="Title" placeholder="Title.... " name="title">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                      <label id="label_">Date</label>
                                      <input class="form-control"  type="date" id="Date" placeholder="Title...." name="date">
                                    </div>
                                  </div>
                              </div>
                            </div>
-->
                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label id="label_">Title</label>
                            <input class="form-control" type="text" id="Title" placeholder="Title.... " name="title">                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label id="label_">Date</label>
                                      <input class="form-control"  type="date" id="Date" placeholder="Title...." name="date">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="form-outline">
                                <label id="label_">Message:</label>
                                    <textarea class="form-control" rows="3" placeholder="Write something..."></textarea>
                                    </div>
                                    <div class="form-outline">
                                    <label for="input-file" id="drop-img">
                                    <input name="image" type="file" accept="image/*" id="input-file" hidden>
                                    <div id="img-view">
                                    <img src="/images/image_icon.png">
                                    <p> Drag and drop or click here <br> to upload picture</p>
                                    </div>
                                </label>
                            </div>
                        </div>

            <div class="modal-footer">
                <button type="button" class="close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="add">Save</button>
         </div>
    </div>
</div>
</div>



@endsection

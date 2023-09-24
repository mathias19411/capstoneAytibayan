@extends('ITStaff.home')
@section('ITStaff')
<body class="announcement_events">

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
              <form action="{{ route('registration') }}" method="post">
                <button type="button" class="add"> Register</button>
              </form>

              <section class="services">
                <section class="popup">
                <div class="popup-content">
                      <div class="content">
                        <div class="content-inner">
                            <h3></h3>                                       
                             <div class="read-more-cont">
                              <div class="col">
                              <h3>Announcements</h3>
                                <div class="row">
                                  <div class="field">
                                    <div class="col-4">
                                      <label id="label_">Title</label>
                                      <input class="form-control" type="text" id="Title" placeholder="Title.... ">
                                    </div>
                                    <div class="col-4">
                                      <label id="label_">To:</label>
                                      <select class="form-control" type="email" id="to"  onchange= "changeStatus()" placeholder="Title....">
                                      <option value="one"> orly@gmail.com </option>
                                      <option value="two"> joriza@gmail.com</option>
                                      <option value="one"> mathias@gmail.com </option>
                                      <option value="one"> jayferson@gmail.com </option>
                                      </select>
                                    </div>
                                    <div class="col-4">
                                      <label id="label_">Date</label>
                                        <input class="form-control"  type="date" id="Date" placeholder="Title....">
                                      </div>
                                  </div>
                              </div>
                            </div>
                                <hr class="line">
                              <div class="col-12">
                                <label id="label_">Message:</label>
                                <input class="form-control" type="text" name="message" id="textbox_m" placeholder="Write something...">
                              </div>
                          </div>
                        </div>
                             </div>
                             <button type="button" class="add">Add</button>
                          </div>
                       </div>
                    </div>
                </div>
             </div>
          </div>
       </section>
    </body>

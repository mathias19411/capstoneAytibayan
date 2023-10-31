@extends('ABAKA_Project_Coordinator.projectcoordinator_main')

@section('content')
@include('ABAKA_Project_Coordinator.Body.sidebarproj')
    

    <div class="title">
        <h1>Progress</h1>
    </div>
    
         <div class="boxes">
            <div class="box box-1">
                <h1>Beneficiaries</h1>
                <p>360</pathinfo>
            </div>
            <div class="box box-1 ">
                <h1>Active</h1>
                <p>298</pathinfo>
            </div>
            <div class="box box-2">
                <h1>Inactive</h1>
                <p>62</pathinfo>
            </div>
            <div class="box box-3">
                <h1>Progress %</h1>
                <div class="progress-bar"></div>
                <p></pathinfo>
            </div>
         </div>
         


  <div class="table-header">
        <div class="table-header-left">
            <label for="unread-filter">Filter: </label>
            <select id="unread-filter">
                <option value="all">All</option>
                <option value="unread">Sagpon, Daraga</option>
                <option value="read">Rawis</option>
            </select>
            <label for="items-per-page">Items per page: </label>
            <select id="items-per-page">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="all">All</option>
            </select>
        </div>
        <div class="table-header-right">
            <div class="search-container">
                <input type="text" id="search" placeholder="Search">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
    </div>

         <!--LOGO -->
     <div class="header">
        <h1>Republic of the Philippines</h1>
        <h2>Province of Albay</h2>
        <h3>ALBAY PROVINCIAL AGRICULTURAL OFFICE</h3>
    </div>

        <div class="container">
    
                <table class="table" id="beneficiaries-table">
              

                    <thead>
                    <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Benficiary</th>
                            <th scope="col">Baranggay</th>
                            <th scope="col">City</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Project</th>
                            <th scope="col">Organization</th>
                            <th scope="col" class="no-print" >Action</th>
                            <th scope="col">Financial Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Orly Encabo</td>
                            <td>Sagpon</td>
                            <td>Daraga</td>
                            <td>10000</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td class="no-print">
                                
                                <button class="tooltip-button" data-tooltip="Update Status" onclick="showUpdateStatusPopup()"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                           
                            </td>    
                           
                            <td>
                            Released
                             </td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Orly Encabo</td>
                            <td>Rawis</td>
                            <td>Legazpi</td>
                            <td>10000</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td class="no-print">
                                
                                <button class="tooltip-button" data-tooltip="Update Status" onclick="showUpdateStatusPopup()"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                          
                            <td>
                            Pending
                             </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Orly Encabo</td>
                            <td>Rawis</td>
                            <td>Legazpi</td>
                            <td>10000</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td class="no-print">
                               
                                <button class="tooltip-button" data-tooltip="Update Status" onclick="showUpdateStatusPopup()"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                            
                            <td>
                            Dispersed
                             </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Orly Encabo</td>
                            <td>Sagpon</td>
                            <td>Daraga</td>
                            <td>10000</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td class="no-print">
                                
                                <button class="tooltip-button" data-tooltip="Update Status" onclick="showUpdateStatusPopup()"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                           
                            <td>
                            Released
                             </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Orly Encabo</td>
                            <td>Sagpon</td>
                            <td>Daraga</td>
                            <td>10000</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td class="no-print">
                                
                                <button class="tooltip-button" data-tooltip="Update Status"onclick="showUpdateStatusPopup()"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                           
                            <td>
                            Released
                             </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Orly Encabo</td>
                            <td>Rawis</td>
                            <td>Legazpi</td>
                            <td>10000</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td class="no-print">
                               
                                <button class="tooltip-button" data-tooltip="Update Status"onclick="showUpdateStatusPopup()" ><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>
                            </td>    
                           
                            <td>
                          
                            On Hold
                             </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Orly Encabo</td>
                            <td>Sagpon</td>
                            <td>Daraga</td>
                            <td>10000</td>
                            <td>Free Range Chicken</td>
                            <td>BUCS-CSC</td>
                            <td class="no-print">
                            <button class="tooltip-button" data-tooltip="Update Status" onclick="showUpdateStatusPopup()"><i class="fa-solid fa-pen-to-square fa-2xs"></i></button>

                            </td>    
                          
                            <td>
                           Pending
                             </td>
                        </tr>
                     </tbody>
                </table>
                
      
                <div class="pagination">
                    <button id="prev-page">Previous</button>
                    <div id="page-numbers"></div>
                    <button id="next-page">Next</button>
                </div>

                <div id="pagination-message"></div>
                <div class="button-container">
  <button class="button_top buttons-print" onclick="printTable()"> <i class="fa-solid fa-print" style="color: #ffffff;"></i> Print</button>
 
</div>
              </div>

              
              <div id="update-status-popup" class="update-status-popup">
    <div class="update-status-popup-content">
        <span class="update-status-popup-close" id="update-status-popup-close">&times;</span>
        <h2>Beneficiary Progress Details</h2>
        <p><strong>Beneficiary Name:</strong> <span id="update-status-beneficiary-name"></span></p>
        <p><strong>Organization:</strong> <span id="update-status-organization"></span></p>
        <p><strong>Amount:</strong> <span id="update-status-amount"></span></p>
        <p><strong>Last Updated:</strong> <span id="update-status-last-updated"></span></p>
        <label for="update-status-dropdown">Update Status:</label>
        <select id="update-status-dropdown">
            <option value=""></option>
            <option value="Pending">Pending</option>
            <option value="On Hold">On Hold</option>
            <option value="Dispersed">Dispersed</option>
            <option value="Released">Released</option>
        </select>
        <button id="update-status-save">Save</button>
        <button id="update-status-discard">Discard</button>
    </div>
</div>


           
              

<div class="progress-container">
        <div class="progress-line">


        
            <!-- Steps with numbers will be added dynamically here -->
        </div>
        <ul id="progress-num" class="progress-num"></ul>

        </div>

         <div class="progress-section">
            <h2>Process</h2>
            <ul id="progress-list">
            <!-- Steps will be added dynamically here -->
            </ul>
            
            <div id="progress-percent"></div>
            <button id="add-step">Add Step</button>
        </div>

        
      


       
<script src="{{ asset('Assets/js/progress.js') }}"></script>

@endsection

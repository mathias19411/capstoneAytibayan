@extends('Beneficiary.beneficiary_main')

@section('content')
@include('beneficiary.Body.sidebar')

    <div class="title">
        <h1>UPDATE</h1>
    </div>

    <div class="container_benef mt-5">
    <div class="form-update">
        <div class="col">
        <h3 class="text-center">Beneficiary Update</h3>
        <form id="update-form" class="mt-4">
            <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="date" id="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture:</label>
                <label for="edit-picture" id="drop-img">
                <input name="image" type="file" accept="image/*" id="edit-picture"  hidden>
                <div id="img-view">
                <img src="/images/image_icon.png">
                <p> Drag and drop or click here <br> to upload picture</p>
                </div>
                </label>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" class="form-control" maxlength="50" required>
            </div>
            <button type="submit" class="add-modal">Add</button>
        </form>
        </div>
        </div>
        <div class="row mt-5">
        <div class="col mx-auto">
            <h4 class="text-center">Update Details</h4>
            <div id="update-details" class="row">
                <!-- Update cards will be dynamically generated here -->

                
            </div>
        </div>
    </div>
    </div>
    

    <div class="modal fade" id="editModal" tabindex="-1"  data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-form">
                        <input type="hidden" id="edit-update-id">
                        <div class="mb-3">
                            <label for="edit-date" class="form-label">Date:</label>
                            <input type="date" id="edit-date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-picture" class="form-label">Picture:</label>
                            <label for="edit-picture" id="drop-img">
                <input name="image" type="file" accept="image/*" id="edit-picture"  hidden>
                <div id="img-view">
                <img src="/images/image_icon.png">
                <p> Drag and drop or click here <br> to upload picture</p>
                </div>
                </label>
                        </div>
                        <div class="mb-3">
                            <label for="edit-information" class="form-label">Title:</label>
                            <textarea id="edit-information" class="form-control" rows="4" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="delete">Delete</button>
                    <button type="button" id="edit">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection

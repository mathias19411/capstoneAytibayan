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
        <form action="{{ route('send.updates') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" class="form-control" name="title" maxlength="50" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="date" id="date" class="form-control" name="date" required>
                <input type="email" name="email" value="{{ $userEmail }}" hidden>
                <input type="text" name="benef_of" value="{{ $programName }}" hidden>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture:</label>
                <label for="edit-picture" id="drop-img">
                <input name="image" type="file" id="edit-picture"  hidden>
                <div id="img-view">
                <img src="/images/image_icon.png">
                <p> Drag and drop or click here <br> to upload picture</p>
                </div>
                </label>
            </div>
            <button type="submit" class="add-modal">Add</button>
        </form>
        </div>
        </div>
        <div class="row mt-5">
        <div class="col mx-auto">
            <h4 class="text-center">Update Details</h4>
            <div class="row">
                <!-- Update cards will be dynamically generated here -->
                @foreach($updates->reverse() as $update)
                <div class="card mb-3 col-md-3">
                    <div class="card-body">
                        <p class="update-date">Date: {{ $update->date }}</p>
                        <img src="{{ asset('Uploads/Updates/'.$update->image) }}" alt="Beneficiary's Picture" class="img-thumbnail">
                        <p class="update-title">Title: {{ $update->title }}</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-pink edit-update" data-bs-toggle="modal" data-bs-target="#editModal" data-update-id="1">
                            <i class="fa-solid fa-pen-to-square fa-lg" style="color: #58c0e2"></i>
                        </button>
                        <button class="btn btn-delete delete-update">
                            <i class="fa-solid fa-trash fa-lg" style="color:#ff1100"></i>
                        </button>
                    </div>
                </div>
                @endforeach
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

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
                <div class="modal fade" id="editModal{{ $update->id }}" tabindex="-1"  data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5)">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Update</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="edit-form" action="{{ route('edit.updates') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" id="edit-update-id" name="update_id" value="{{ $update->id }}">
                                    <input type="hidden" id="edit-update-id" name="benef_of" value="{{ $programName }}">
                                    <input type="hidden" id="edit-update-id" name="email" value="{{ $userEmail }}">
                                    <div class="mb-3"> 
                                        <label for="edit-information" class="form-label">Change Title:</label>
                                        <input id="edit-information" class="form-control" value="{{ $update->title }}" name="title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="picture" class="form-label">Change Picture:</label>
                                            <label id="drop-img">
                                                <input name="image" type="file" hidden>
                                                <div id="img-view">
                                                    <img src="{{ asset('Uploads/Updates/'.$update->image) }}">
                                                    <p> Drag and drop or click here <br> to upload picture</p>
                                                </div>
                                            </label>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="close" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" id="edit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 col-md-3">
                    <div class="card-body">
                        <p class="update-date">Date: {{ $update->created_at }}</p>
                        <img src="{{ asset('Uploads/Updates/'.$update->image) }}" alt="Beneficiary's Picture" class="img-thumbnail">
                        <p class="update-title">Title: {{ $update->title }}</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-pink edit-update" data-bs-toggle="modal" data-bs-target="#editModal{{ $update->id }}" data-update-id="1">
                            <i class="fa-solid fa-pen-to-square fa-lg" style="color: #58c0e2"></i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

@endsection

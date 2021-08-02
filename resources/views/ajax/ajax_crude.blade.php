@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-4">
                <div class="card p-3">
                    <span class="bold" id="addTitle">Add new teacher</span>
                    <span class="bold" id="updateTitle">Update teacher</span>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="usr">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name">
                            <span class="text-danger" id="nameError"></span>
                        </div>
                        <div class="form-group">
                            <label for="usr">Title:</label>
                            <input type="text" class="form-control" id="title">
                            <span class="text-danger" id="titleError"></span>

                        </div>
                        <div class="form-group">
                            <label for="usr">Institute:</label>
                            <input type="text" class="form-control" id="institute" name="username">
                            <span class="text-danger" id="instituteError"></span>
                        </div>
                        <input type="hidden" id="id">
                        <button type="submit" class="btn btn-primary" id="addButton" onclick="addData()">Add</button>
                        <button type="submit" class="btn btn-primary" id="updateButton" onclick='updateData()'>Update</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <h6>All teacher</h6>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Institute</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyId">
                        {{-- <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                            <td>john@example.com</td>
                            <td>
                                <button class="btn btn-sm btn-primary mr-2">Edit</button>
                                <button class="btn btn-sm btn-danger mr-2">Delete</button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

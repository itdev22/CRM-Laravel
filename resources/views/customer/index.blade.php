@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h1 class="text-2xl font-bold">Customer</h1>
    </div>
    <div>
        <div class="overflow-x-auto bg-base-100 rounded-md">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr>
                        <th>1</th>
                        <td>Cy Ganderton</td>
                        <td>Quality Control Specialist</td>
                        <td>
                            <button class="btn btn-sm btn-primary">Edit</button>
                            <!-- Open the modal using ID.showModal() method -->
                            <button class="btn btn-sm btn-error" onclick="delete_modal.showModal()">Delete</button>
                            <dialog id="delete_modal" class="modal">
                                <div class="modal-box">
                                    <h3 class="font-bold text-lg">Are you sure want to delete this user?</h3>
                                    <p class="py-4">Are you sure want to delete this user? This action acannot ben undone!
                                    </p>
                                    <div class="modal-action">
                                        <form method="dialog">
                                            <!-- if there is a button in form, it will close the modal -->
                                            <button class="btn">Close</button>
                                        </form>
                                        <form method="POST">
                                            <!-- if there is a button in form, it will close the modal -->
                                            <button class="btn btn-error">DELETE</button>
                                        </form>
                                    </div>
                                </div>
                            </dialog>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

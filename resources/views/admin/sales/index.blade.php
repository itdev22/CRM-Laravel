@extends('layouts.app')

@section('content')
<div class="mb-5 flex flex-row">
    <h1 class="text-2xl font-bold">Sales</h1>
    {{-- <button class="btn btn-primary ml-auto">+ Add new Transaction</button> --}}
    <!-- Open the modal using ID.showModal() method -->
    <button class="btn btn-primary ml-auto" onclick="add_transaction.showModal()">+ Add Sales</button>
    <dialog id="add_transaction" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-7">Add Sales</h3>
            <form action="{{route('admin.sales.create')}}" method="POST" class="flex flex-col gap-3">
                @csrf
                <div class="flex flex-col">
                    <label for="product" class="text-md mb-1">Name</label>
                    <input type="text" name="name" id="product" class="input input-bordered">
                </div>
                <div class="flex flex-col">
                    <label for="product" class="text-md mb-1">Email</label>
                    <input type="text" name="email" id="product" class="input input-bordered">
                </div>
                <div class="flex flex-col">
                    <label for="price" class="text-md mb-1">Password</label>
                    <input type="password" name="password" id="price" class="input input-bordered">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary w-full" value="Submit">
                </div>
            </form>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</div>
    <div>
        <div class="overflow-x-auto bg-base-100 rounded-md">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <!-- row 1 -->
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="edit_modal{{$item->id}}.showModal()">Edit</button>
                                <dialog id="edit_modal{{$item->id}}" class="modal">
                                    <div class="modal-box">
                                        <h3 class="font-bold text-lg mb-7">Add Sales</h3>
                                        <form action="{{route('admin.sales.update',['id'=>$item->id])}}" method="POST" class="flex flex-col gap-3">
                                            @csrf
                                            <div class="flex flex-col">
                                                <label for="product" class="text-md mb-1">Name</label>
                                                <input type="text" name="name" id="product" value="{{ $item->name }}" class="input input-bordered">
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="product" class="text-md mb-1">Email</label>
                                                <input type="text" name="email" id="product" value="{{ $item->email }}" class="input input-bordered">
                                            </div>
                                            <div>
                                                <input type="submit" class="btn btn-primary w-full" value="Submit">
                                            </div>
                                        </form>
                                        <div class="modal-action">
                                            <form method="dialog">
                                                <!-- if there is a button in form, it will close the modal -->
                                                <button class="btn">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                    <form method="dialog" class="modal-backdrop">
                                        <button>close</button>
                                    </form>
                                </dialog>
                                <!-- Open the modal using ID.showModal() method -->
                                <button class="btn btn-sm btn-error" onclick="delete_modal{{$item->id}}.showModal()">Delete</button>
                                <dialog id="delete_modal{{$item->id}}" class="modal">
                                    <div class="modal-box">
                                        <h3 class="font-bold text-lg">Are you sure want to delete this user?</h3>
                                        <p class="py-4">Are you sure want to delete this user? This action acannot ben
                                            undone!
                                        </p>
                                        <div class="modal-action">
                                            <form method="dialog">
                                                <!-- if there is a button in form, it will close the modal -->
                                                <button class="btn">Close</button>
                                            </form>
                                            <form method="POST" action="{{route('admin.sales.delete',['id'=>$item->id])}}">
                                                @csrf
                                                <!-- if there is a button in form, it will close the modal -->
                                                <button class="btn btn-error">DELETE</button>
                                            </form>
                                        </div>
                                    </div>
                                </dialog>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

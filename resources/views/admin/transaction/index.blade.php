@extends('layouts.app')

@section('content')
    <div class="mb-5 flex flex-row">
        <h1 class="text-2xl font-bold">Transaction</h1>
        {{-- <button class="btn btn-primary ml-auto">+ Add new Transaction</button> --}}
        <!-- Open the modal using ID.showModal() method -->
        <button class="btn btn-primary ml-auto" onclick="add_transaction.showModal()">+ Add new Transaction</button>
        <dialog id="add_transaction" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-7">Add new transaction</h3>
                <form method="POST" action="{{route('admin.transaction.create')}}" class="flex flex-col gap-3">
                    @csrf
                    <div class="flex flex-col">
                        <label for="customer" class="text-md mb-1">Customer Name</label>
                        <input type="text" name="customer" id="customer" class="input input-bordered">
                    </div>
                    <div class="flex flex-col">
                        <label for="product" class="text-md mb-1">Product Name</label>
                        <input type="text" name="product" id="product" class="input input-bordered">
                    </div>
                    <div class="flex flex-col">
                        <label for="price" class="text-md mb-1">Price</label>
                        <input type="text" name="price" id="price" class="input input-bordered">
                    </div>
                    <div class="flex flex-col">
                        <label for="quantity" class="text-md mb-1">Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="input input-bordered">
                    </div>
                    <div>
                        <h1>Total Price: <input type="text" id="total_price" disabled></input></h1>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary w-full" value="Submit">
                    </div>
                </form>
                {{-- <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div> --}}
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
                        <th>Customer Name</th>
                        <th>Sales Name</th>
                        <th>Created</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <!-- row 1 -->
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $item->customer->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td><a href="">Invoice</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const total_price = document.getElementById('total_price');
        const price = document.getElementById('price');
        const quantity = document.getElementById('quantity');

        price.addEventListener('input', () => {
            total_price.value = price.value * quantity.value;
        });

        quantity.addEventListener('input', () => {
            total_price.value = price.value * quantity.value;
        });
    </script>
@endsection

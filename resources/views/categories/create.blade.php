<x-app-layout>
<div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">Add new category</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('categories.store') }}" method="post" class="row">
                    @csrf <!-- cross site request forgery -->
                    <div class="col-6">
                        <label for="product-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name category" value="{{old('name')}}">
                    </div>
                    <div class="col-6">
                        <label for="product-description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter description category " value="{{old('description')}}">
                    </div>
                    <div class="col-6">
                        <label for="product-state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter state category" value="{{old('state')}}">
                    </div>

                    @if($errors -> any())
                    <div class="alert alert-danger col-12 mt-4">
                        <ul>
                            @foreach($errors -> all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="col-12 my-4">
                        <div class="d-grid gap-4">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 mb-4">
                <div class="d-grid gap-2">
                    <a href="{{route('products.index')}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

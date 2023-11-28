<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">Add new product</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('product.store') }}" method="post" class="row">
                    @csrf <!-- cross site request forgery -->
                    <div class="col-6">
                        <label for="fk_category_id" class="form-label">Categoría</label>
                        <select class="form-select" id="fk_category_id" name="fk_category_id">
                            <option value="" selected>Selecciona una categoría</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id_category }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="product-code" class="form-label">Code</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Enter code product" value="{{old('code')}}">
                    </div>
                    <div class="col-6">
                        <label for="product-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name product " value="{{old('name')}}">
                    </div>
                    <div class="col-6">
                        <label for="product-price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price product" value="{{old('price')}}">
                    </div>
                    <div class="col-6">
                        <label for="product-stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock product" value="{{old('stock')}}">
                    </div>
                    <div class="col-6">
                        <label for="product-description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter description product" value="{{old('description')}}">
                    </div>
                    <div class="col-6">
                        <label for="product-image" class="form-label">Image</label>
                        <input type="text" class="form-control" id="image" name="image" placeholder="Enter image product" value="{{old('image')}}">
                    </div>
                    <div class="col-6">
                        <label for="product-estado" class="form-label">State</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Enter state product" value="{{old('estado')}}">
                    </div>
                    <!--<div class="col-6">
                        <label for="product-slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug product" value="{{old('slug')}}">
                    </div>-->

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

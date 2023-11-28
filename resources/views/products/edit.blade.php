<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">Edit product {{$product->name}}</h1>
            </div>
            <div class="col-12">
                <form action="{{route('product.update',$product)}}" method="post" class="row">
                    @csrf <!-- cross site request forgery -->
                    @method('PUT')

                    <div class="col-6">
                        <label for="product-fk_category_id" class="form-label">category id</label>
                        <input type="number" class="form-control" id="fk_category_id" name="fk_category_id" placeholder="Enter fk_category_id category" value="{{old('fk_category_id',$product->fk_category_id)}}">
                    </div>
                    <div class="col-6">
                        <label for="product-code" class="form-label">Code</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Enter code product" value="{{old('code',$product->code)}}">
                    </div>
                    <div class="col-6">
                        <label for="product-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name product " value="{{old('name',$product->name)}}">
                    </div>
                    <div class="col-6">
                        <label for="product-price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price product" value="{{old('price',$product->price)}}">
                    </div>
                    <div class="col-6">
                        <label for="product-stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock product" value="{{old('stock',$product->stock)}}">
                    </div>
                    <div class="col-6">
                        <label for="product-description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter description product" value="{{old('description',$product->description)}}">
                    </div>
                    <div class="col-6">
                        <label for="product-image" class="form-label">Image</label>
                        <input type="text" class="form-control" id="image" name="image" placeholder="Enter image product" value="{{old('image',$product->image)}}">
                    </div>
                    <div class="col-6">
                        <label for="product-estado" class="form-label">State</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Enter state product" value="{{old('estado',$product->estado)}}">
                    </div>
                    <div class="col-6">
                        <label for="product-slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug product" value="{{old('slug',$product->slug)}}">
                    </div>

                    <!--Validaciones-->
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
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 mb-4">
                <div class="d-grid gap-2">
                    <a href="{{route('product.index')}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

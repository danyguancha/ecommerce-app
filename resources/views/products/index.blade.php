<x-app-layout>
    @if (!Auth::check())


    <div class="contenedor">
        <!--Buscador-->
        <div class="row">
            <!--Mostrar lista de categorias-->
            <div class="col-2">
                <span>Select Categories</span>
                <form action="{{ route('products.index') }}" method="GET">
                    <select class="form-categories" name="id_category" onchange=" this.form.submit(); ">
                        <option value=""></option>
                        <option value="" aria-placeholder="All"><a type="submit" href="{{route('products.index')}}">All</a></option>
                        @foreach ($categories as $category)
                        @if(isset($productsByCategory[$category->id_category]))
                        <option value="{{$category->id_category}}" aria-placeholder="{{$category->name}}">{{$category->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </form>
            </div>

            <!--Buscador-->
            <div class="col-8">
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="input-group mb-3 input-buscar">
                        <div class="form-floating ">
                            <input type="text" name="search" class="form-control input-buscar2" id="productSearch" onblur="if (this.value == '') {this.value = 'Search product';}" onfocus="if (this.value == 'Search product') {this.value = '';}" value="Search product">
                        </div>
                        <span class="input-group-text btn-lupa" onclick="this.parentNode.parentNode.submit();">
                            <i class="fa-solid fa-search fs-4"></i>
                        </span>

                    </div>
                </form>
            </div>

            <div class="col-2 carro-compra">
                <div class="mb-3">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('cart.index')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="btn-carro">
                        <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                    </span>
                </a>
                </div>

            </div>
        </div>

        <!--Mostrar los productos-->

        @foreach ($categories as $category)
        @if(isset($productsByCategory[$category->id_category]))
        <h2>{{ $category->name }}</h2>
        <div class="carousel" data-id="{{ $category->id_category }}" id="carousel-prod">
            <div class="carousel__contenedor">
                <button aria-label="anterior-{{ $category->id_category }}" class="carousel__anterior">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="carousel__lista">
                    @foreach($productsByCategory[$category->id_category] as $product)

                    <div class="carousel__elemento" style="margin-right: 3rem;">
                        <a href="{{route('products.show', $product->slug)}}">
                            <div class="icon-container">
                                <img src="{{$product->image}}" alt="">
                                <span class="center-icon"><i class="fas fa-plus"></i></span>
                            </div>
                        </a>
                        <p>{{$product->name}}</p>
                        <p>{{$product->price}}</p>
                        <!--<button class="btn btn-primary add-compra" data-producto="{{$product}}">comprar</button>-->
                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $product->id_product }}" id="id_product" name="id_product">
                            <input type="hidden" value="{{ $product->name }}" id="name" name="name">
                            <input type="hidden" value="{{ $product->price }}" id="price" name="price">
                            <input type="hidden" value="{{ $product->image }}" id="image" name="image">
                            <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                            <input type="hidden" value="1" id="quantity" name="quantity">
                            <div class="card-footer" style="background-color: white;">
                                <div class="row">
                                    <button class="btn btn-secondary" class="tooltip-test" title="add to cart">
                                        <i class="fa fa-shopping-cart"></i> agregar al carrito
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @endforeach
                </div>
                <button aria-label="siguiente-{{ $category->id_category }}" class="carousel__siguiente">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            <div role="tablist" class="carousel__indicadores"></div>
        </div>
        @endif
        @endforeach
    </div>
    @else

    <div class="container">
        <div class="row">
            <!--Mostrar lista de categorias-->
            <div class="col-2">
                <span>Select Categories</span>
                <form action="{{ route('products.index') }}" method="GET">
                    <select class="form-categories" name="id_category" onchange=" this.form.submit(); ">
                        <option value=""></option>
                        <option value="" aria-placeholder="All"><a type="submit" href="{{route('products.index')}}">All</a></option>
                        @foreach ($categories as $category)
                        @if(isset($productsByCategory[$category->id_category]))
                        <option value="{{$category->id_category}}" aria-placeholder="{{$category->name}}">{{$category->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </form>
            </div>

            <!--Buscador-->
            <div class="col-8">
                <form action="{{ route('product.index') }}" method="GET">
                    <div class="input-group mb-3 input-buscar">
                        <div class="form-floating ">
                            <input type="text" name="search" class="form-control input-buscar2" id="productSearch" onblur="if (this.value == '') {this.value = 'Search product';}" onfocus="if (this.value == 'Search product') {this.value = '';}" value="Search product">
                        </div>
                        <span class="input-group-text btn-lupa" onclick="this.parentNode.parentNode.submit();">
                            <i class="fa-solid fa-search fs-4"></i>
                        </span>
                    </div>
                </form>
            </div>

        </div>
        @can('Create product')
        <div class="col-12">
            <a href="{{route('product.create')}}" class="btn btn-success">Add product</a>
            <br><br>
        </div>
        @endcan
        @php
        $count = 0; // Inicializa $count en la segunda sección
        @endphp
        @foreach ($productsByCategory as $categoryId => $categoryProducts)

        @if ($categoryProducts[0]->category)
        @php
        $categoryInfo = $categories->where('categoryId', $categoryProducts[0]->category->categoryId);
        @endphp

        <div class="container shadow mt-4">
            <h2>{{ $categoryInfo[$count]->name }}</h2>
            <div class="table-responsive">
                <table class="table table-striped equal-width-columns">
                    <thead>
                        <tr>
                            <th>Id product</th>
                            <th>Id category</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>stock</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>State</th>
                            <th>Slug</th>
                            @can('Edit product')
                            <th>Edit</th>
                            @endcan
                            @can('Delete product')
                            <th>Delete</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoryProducts as $product)
                        <tr>
                            <td>{{ $product->id_product }}</td>
                            <td>{{ $product->fk_category_id }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name}}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->description }}</td>
                            <td class="image-cell">{{ $product->image}}
                                <img src="{{$product->image}}" alt="" style="width:7rem; height: 7rem; margin:0 auto;">
                            </td>
                            <td>{{ $product->estado }}</td>
                            <td>{{ $product->slug }}</td>
                            @can('Edit product')
                            <td><a class="btn btn-success" href="{{route('product.edit',$product)}}"><i class="fa-solid fa-pen-to-square fs-4"></i></td>
                            @endcan
                            @can('Delete product')
                            <td>
                                <form action="{{Route('product.destroy', $product)}}" method="post" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash fs-4"></i></button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @endif
        @php
        $count++;
        @endphp
        @endforeach
        @endif
    </div>
</x-app-layout>

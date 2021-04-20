<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Daftar Produk</title>
</head>
<body>
    <div class="container bg-dark">
        <h1 class="display-6 text-center text-white pt-3 pb-3">Daftar Produk</h1>
    </div>
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {!! session('success') !!}
          </div>
        @endif
        <div class="row">
        {{-- <div class="inline-block"> --}}
            <div class="col-md-2">
                <h3>Cari Produk :</h3>
            </div>
            <div class="col-md-4">
                <form spellcheck="false" id="filter" name="filter" mehtod="GET" action="{{ route('produk.index') }}">
                <select class="form-control custom-select" name="category" onchange="this.form.submit()">
                    <option value="" disabled>Pilih Kategori</option>
                    @foreach ($getcategory as $category)
                        <option {{ $category->id ==  $select ? "selected" : "" }}  value="{{ $category->id }}"> {{ ucfirst($category->category_name) }}</option>
                    @endforeach 
                </select>
                </form>
            </div>

            <div class="col-md-4">
                <form id="search" action="{{ route('produk.index') }}" method="GET">
                    <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Cari Produk" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <button type="submit" class="btn btn-success text-white" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                              </svg></button>
                            </div>
                    </div>
                </form>
            </div>
        {{-- </div> --}}
        </div>
    </div>
    <div class="container">
        <a href="{{ route('produk.create') }}" class="btn btn-primary text-white">Tambah Produk</a>
        <div class="row p-3">
            @foreach ($dataproduk as $item)
                
        
            <div class="col-sm-6 col-md-4 p-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $item->image1 }}" alt="Card image cap">
                    <div class="card-body">
                        <h5>Nama Produk: {{ $item->product_name }}</h5>
                        <h5>Kategori   : {{ $item->category->category_name }}</h5>
                        <h5>Harga   : {{ $item->harga_l }}</h5>
                        <h5>Ukuran Tersedia   :
                            @foreach (json_decode($item->size) as $value)
                               {{ $value }},
                            @endforeach</h5>
                        <h5>Warna   : @foreach (json_decode($item->color) as $value)
                           {{ $value}} ,
                        @endforeach</h5>
                        <p class="card-text">{{ $item->product_name }}</p>
                        <div class="block-inline">
                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMenu-{{ $item->id }}" data-id="{{ $item->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            </button>
                            <div class="modal fade scale" id="deleteMenu-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteMenuTitle" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title">Hapus Produk</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">    
                                            <form id="role-menu-form-delete" action="{{ route('produk.destroy', $item->id) }}" spellcheck="false"  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="mb-4 pb-2">Apa Anda yakin ingin menghapus produk ini ?</div>
                                                <div id="role-menu-form-delete-errors"></div>
                                                <button type="submit" class="btn btn-danger mb-2">Hapus</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center my-4">
            {{  $dataproduk->links() }}
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>
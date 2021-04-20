<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Edit Produk</title>
</head>
<body>

    <div class="container">
        <h1 class="text-center">Edit Produk</h1>
    </div>
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {!! session('success') !!}
        </div>
        @endif
        <form action="{{ route('produk.update',$dataproduk->id) }}" id="user-form" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group p-2">
                <label for="title"><strong>Nama Produk</strong> <span class="text-danger">*</span></label>
                <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name', $dataproduk->product_name) }}" placeholder="Nama Produk" /> 
                @error('product_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="category"><strong>Kategori</strong>  <span class="text-danger">*</span></label>
                <select name="category" id="category" class="form-control custom-select @error('category') is-invalid @enderror" /> 
                    <option value="" disabled>Pilih Kategori</option>
                        @foreach ($getcategory as $category)
                            <option {{ old('category', $dataproduk->category_id) == $category->id  ? "selected" : "" }}  value="{{ $category->id }}"> {{ ucfirst($category->category_name) }}</option>
                        @endforeach 
                </select>
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Deskripsi Produk</strong> <span class="text-danger">*</span></label>
                <textarea name="product_description" class="form-control texteditor  @error('product_description') is-invalid @enderror " rows=" 5 " placeholder="">{{ old('product_name', $dataproduk->product_description) }}</textarea>
                @error('product_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Image URL 1</strong> <span class="text-danger">*</span></label>
                <input type="text" name="image1" id="image1" class="form-control @error('image1') is-invalid @enderror" value="{{ old('product_name', $dataproduk->image1) }}" placeholder="Image 1" /> 
                @error('image1')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Image URL 2</strong> <span class="text-danger">*</span></label>
                <input type="text" name="image2" id="image2" class="form-control @error('image2') is-invalid @enderror" value="{{ old('product_name', $dataproduk->image2) }}" placeholder="Image 2" /> 
                @error('image2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- @dd(json_decode($dataproduk->size)) --}}
            <div class="form-group p-2">
                <label for="size"><strong>Size</strong>  <span class="text-danger">*</span></label>
                <label><input type="checkbox" name="size[]" value="S" {{ (in_array('S', old('size', json_decode($dataproduk->size)))) ? ' checked' : '' }}> S</label>
               <label><input type="checkbox" name="size[]" value="M" {{ (in_array('M', old('size', json_decode($dataproduk->size)))) ? ' checked' : '' }}> M</label>
                <label><input type="checkbox" name="size[]" value="L" {{ (in_array('L', old('size', json_decode($dataproduk->size)))) ? ' checked' : '' }}> L</label>
                <label><input type="checkbox" name="size[]" value="XL" {{ (in_array('XL', old('size', json_decode($dataproduk->size)))) ? ' checked' : '' }}> XL</label>
                <label><input type="checkbox" name="size[]" value="XXL" {{ (in_array('XXL', old('size', json_decode($dataproduk->size)))) ? ' checked' : '' }}> XXL</label>
            </div>

            <div class="form-group p-2">
                <label for="size"><strong>Color</strong>  <span class="text-danger">*</span></label>
                <label><input type="checkbox" name="color[]" value="Merah"  {{ (in_array('Merah', old('color', json_decode($dataproduk->color)))) ? ' checked' : '' }}> Merah</label>
                <label><input type="checkbox" name="color[]" value="Biru" {{ (in_array('Biru', old('color', json_decode($dataproduk->color)))) ? ' checked' : '' }}> Biru</label>
                <label><input type="checkbox" name="color[]" value="Hitam" {{ (in_array('Hitam', old('color', json_decode($dataproduk->color)))) ? ' checked' : '' }}> Hitam</label>
                <label><input type="checkbox" name="color[]" value="Abu-abu" {{ (in_array('Abu-abu', old('color', json_decode($dataproduk->color)))) ? ' checked' : '' }}> Abu-abu</label>
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Harga Ukuran S</strong> <span class="text-danger">*</span></label>
                <input type="text" name="harga_s" id="harga_s" class="form-control @error('harga_s') is-invalid @enderror" value="{{ old('harga_s', $dataproduk->harga_s) }}" placeholder="Harga Produk S" /> 
                @error('harga_s')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Harga Ukuran M</strong> <span class="text-danger">*</span></label>
                <input type="text" name="harga_m" id="harga_m" class="form-control @error('harga_m') is-invalid @enderror" value="{{ old('harga_s', $dataproduk->harga_m) }}" placeholder="Harga Produk M" /> 
                @error('harga_m')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Harga Ukuran L</strong> <span class="text-danger">*</span></label>
                <input type="text" name="harga_l" id="harga_l" class="form-control @error('harga_l') is-invalid @enderror" value="{{ old('harga_s', $dataproduk->harga_l) }}" placeholder="Harga Produk L" /> 
                @error('harga_l')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group p-2">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
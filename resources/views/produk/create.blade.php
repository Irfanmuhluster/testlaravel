<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Create Produk</title>
</head>
<body>

    <div class="container">
        <h1 class="text-center">Tambah Produk</h1>
    </div>
    <div class="container">
       
        <form action="{{ route('produk.store') }}" id="user-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group p-2">
                <label for="title"><strong>Nama Produk</strong> <span class="text-danger">*</span></label>
                <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" placeholder="Nama Produk" /> 
                @error('product_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="category"><strong>Kategori</strong>  <span class="text-danger">*</span></label>
                <select name="category" id="category" class="form-control custom-select @error('category') is-invalid @enderror" /> 
                    <option value="" disabled>Pilih Kategori</option>
                    @foreach ($getcategory as $category)
                        <option {{ old('category') == $category->id  ? "selected" : "" }}  value="{{ $category->id }}"> {{ ucfirst($category->category_name) }}</option>
                    @endforeach 
                </select>
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Deskripsi Produk</strong> <span class="text-danger">*</span></label>
                <textarea name="product_description" class="form-control texteditor  @error('product_description') is-invalid @enderror " rows=" 5 " placeholder="">{{ old('product_description') }}</textarea>
                @error('product_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Image URL 1</strong> <span class="text-danger">*</span></label>
                <input type="text" name="image1" id="image1" class="form-control @error('image1') is-invalid @enderror" value="{{ old('image1') }}" placeholder="Image 1" /> 
                @error('image1')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Image URL 2</strong> <span class="text-danger">*</span></label>
                <input type="text" name="image2" id="image2" class="form-control @error('image2') is-invalid @enderror" value="{{ old('image2') }}" placeholder="Image 2" /> 
                @error('image2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="size"><strong>Size</strong>  <span class="text-danger">*</span></label>
                <label><input type="checkbox" name="size[]" value="S"> S</label>
                <label><input type="checkbox" name="size[]" value="M"> M</label>
                <label><input type="checkbox" name="size[]" value="L"> L</label>
                <label><input type="checkbox" name="size[]" value="XL"> XL</label>
                <label><input type="checkbox" name="size[]" value="XXL"> XXL</label>
            </div>

            <div class="form-group p-2">
                <label for="size"><strong>Color</strong>  <span class="text-danger">*</span></label>
                <label><input type="checkbox" name="color[]" value="Merah"> Merah</label>
                <label><input type="checkbox" name="color[]" value="Biru"> Biru</label>
                <label><input type="checkbox" name="color[]" value="Hitam"> Hitam</label>
                <label><input type="checkbox" name="color[]" value="Abu-abu"> Abu-abu</label>
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Harga Ukuran S</strong> <span class="text-danger">*</span></label>
                <input type="text" name="harga_s" id="harga_s" class="form-control @error('harga_s') is-invalid @enderror" value="{{ old('harga_s') }}" placeholder="Harga Produk S" /> 
                @error('harga_s')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Harga Ukuran M</strong> <span class="text-danger">*</span></label>
                <input type="text" name="harga_m" id="harga_m" class="form-control @error('harga_m') is-invalid @enderror" value="{{ old('harga_m') }}" placeholder="Harga Produk M" /> 
                @error('harga_m')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group p-2">
                <label for="title"><strong>Harga Ukuran L</strong> <span class="text-danger">*</span></label>
                <input type="text" name="harga_l" id="harga_l" class="form-control @error('harga_l') is-invalid @enderror" value="{{ old('harga_l') }}" placeholder="Harga Produk L" /> 
                @error('harga_l')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group p-2">
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>
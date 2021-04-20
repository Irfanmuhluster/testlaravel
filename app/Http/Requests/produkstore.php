<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class produkstore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // dd(request());
        return [
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string|max:255',
            'image1'    => 'required|url',
            'image2'    => 'nullable|url',
            'category' => 'required',
            'size' => 'required',
            'color' => 'required',
            'harga_s' => 'required',
            'harga_m' => 'required',
            'harga_l' => 'required',
      ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Nama Produk harus diisi',
            'product_description.required' => 'Deskripsi Produk harus diisi',
            'image1.required' => 'Image 1 harus diisi',
            'category.required' => 'Kategori harus pilih',
            'size.required' => 'Size harus pilih',
            'color.required' => 'Warna harus pilih',
            'harga_s.required' => 'Harga S harus pilih',
            'harga_l.required' => 'Harga L harus pilih',
            'harga_m.required' => 'Harga M harus pilih',
            
        ];
    }
}

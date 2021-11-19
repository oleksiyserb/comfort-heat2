<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\RedirectResponse;

class AdminProductImagesController extends AdminController
{
    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function store(Product $product): RedirectResponse
    {
        request()->validate([
            'image.*' => 'required|image|mimetypes:png,jpg'
        ]);

        if ($product->images()->count() === 11) {
            return back()->withErrors(['images' => 'Максимальна кількість зображень 11']);
        }

        if (!request()->file('images') == null) {
            foreach (request()->file('images') as $image) {
                $path = $this->uploadAndResizeImage($image, 'products');

                $product->images()->create([
                    'product_id' => $product->id,
                    'image' => $path,
                ]);
            }
        }

        return back();
    }

    /**
     * @param $productId
     * @param $imageId
     * @return RedirectResponse
     */
    public function destroy($productId, $imageId): RedirectResponse
    {
        $image = Product::find($productId)->images()->find($imageId);

        $this->unlinkImage($image);
        $image->delete();

        return back();
    }
}

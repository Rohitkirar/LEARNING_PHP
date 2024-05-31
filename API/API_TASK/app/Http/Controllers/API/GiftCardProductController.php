<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGiftCardProductRequest;
use App\Http\Requests\UpdateGiftCardProductRequest;
use App\Http\Resources\GiftCardProductCollection;
use App\Http\Resources\GiftCardProductResource;
use App\Models\GiftCardProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftCardProductController extends Controller
{
    public function index()
    {
        try {
            $giftCards = GiftCardProduct::with("categories")
                ->selectRaw("* , (cashback_percentage * (user_cashback_percentage / 100)) AS cashback")
                ->where("status", "active")
                ->orderBy("sequence", "asc")
                ->simplePaginate(10);

            return response()->json([
                "success" => true,
                "message" => "Gift cards Records Fetched Successfully",
                "payload" => GiftCardProductCollection::make($giftCards),
                "status" => 200
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" =>  404
            ], 404);
        }
    }

    public function store(CreateGiftCardProductRequest $request)
    {
        try {

            DB::transaction(function () use ($request) {

                $giftCard = GiftCardProduct::create([
                    "name" => $request->name,
                    "code" => $request->code,
                    "cashback_percentage" => $request->cashback_percentage,
                    "user_cashback_percentage" => $request->user_cashback_percentage,
                    "sequence" => $request->sequence,
                    "description" => $request->description,
                    "status" => $request->status,
                    "min_price" => $request->min_price,
                    "image" => $request->file("image")->store("uploads", "public"),
                    "max_price" => $request->max_price,
                ]);

                $giftCard->categories()->attach($request->categories);
            });

            return response()->json([
                "success" => true,
                "message" => "Gift Card Created Successfully",
                "status" => 200
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404
            ], 404);
        }
    }

    public function show(GiftCardProduct $product)
    {
        try {

            $product = $product->load("categories");

            return response()->json([
                "success" => true,
                "message" => "Gift Card Record Fetched Successfully",
                "data" => new GiftCardProductResource($product),
                "status" => 200
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404
            ], 404);
        }
    }


    public function update(UpdateGiftCardProductRequest $request, GiftCardProduct $product)
    {
        try {
            $product->name = $request->name;
            $product->code = $request->code;
            $product->cashback_percentage = $request->cashback_percentage;
            $product->user_cashback_percentage = $request->user_cashback_percentage;
            $product->sequence = $request->sequence;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->min_price = $request->min_price;
            $product->max_price = $request->max_price;

            $file = $request->file("image");
            if ($file) {
                $product->image = $file->store("uploads", "public");
            }

            DB::transaction(function () use ($request, $product) {

                if ($product->isDirty())
                    $product->save();

                $product->categories()->sync($request->categories);
            });
            return response()->json([
                "success" => true,
                "message" => "Gift Card Updated Successfully",
                "status" => 200
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404
            ], 404);
        }
    }

    public function destroy(GiftCardProduct $product)
    {
        try {

            $product->delete();

            return response()->json([
                "success" => true,
                "message" => "Gift Card Deleted Successfully",
                "status" => 200
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404
            ], 404);
        }
    }
}

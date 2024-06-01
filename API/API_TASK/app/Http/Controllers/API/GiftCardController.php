<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateGiftCardRequest;
use App\Models\GiftCard;
use App\Models\GiftCardProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GiftCardController extends Controller
{
    public function store(CreateGiftCardRequest $request, $id)
    {
        try {
            $giftCardProduct = GiftCardProduct::findorFail($id);

            if ($giftCardProduct->min_price <= $request->purchase_amount && $giftCardProduct->max_price >= $request->purchase) {

                DB::transaction(function () use ($request, $giftCardProduct) {

                    $giftCard = GiftCard::create([
                        "gift_card_product_id" => $giftCardProduct->id,
                        "purchase_amount" => $request->purchase_amount,
                        "user_id" => Auth::id(),
                    ]);

                    $giftCard->cashback()->create([
                        "amount" => $giftCard->purchase_amount * (($giftCardProduct->cashback_percentage * $giftCardProduct->user_cashback_percentage) / 10000),
                    ]);
                });

                return response()->json([
                    "success" => true,
                    "message" => "Gift Card Purchased Successfully",
                    "status" => 201
                ], 201);
            } else {
                return response()->json([
                    "errors" => "The purchase amount should be between $giftCardProduct->min_price and $giftCardProduct->max_price",
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404,
            ], 404);
        }
    }
}

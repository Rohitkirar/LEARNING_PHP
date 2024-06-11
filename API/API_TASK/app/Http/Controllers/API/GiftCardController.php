<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateGiftCardRequest;
use App\Http\Requests\API\UpdateGiftCardRequest;
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
            $giftCardProduct = GiftCardProduct::findOrFail($id);

            if ($giftCardProduct->min_price <= $request->purchase_amount && $giftCardProduct->max_price >= $request->purchase) {

                DB::transaction(function () use ($request, $giftCardProduct) {

                    $giftCard = GiftCard::create([
                        "gift_card_product_id" => $giftCardProduct->id,
                        "purchase_amount" => $request->purchase_amount,
                        "amount_left" => $request->purchase_amount,
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

    public function update(UpdateGiftCardRequest $request , $id){
        try{

            $card = Auth::user()->giftCards()->where("is_claimed" , false)->findOrFail($id);
            
            if($card->amount_left >= $request->amount){
                
                $card->amount_left = $card->amount_left - $request->amount ;
                
                if($card->amount_left == 0)
                    $card->is_claimed = true;
                
                $card->save();

                return response()->json([
                    "success" => true,
                    "message" => "gift card updated successfully",
                    "status" => 200
                ] , 200);
            }
            return response()->json([
                "success" => false,
                "message" => "Not Enough Balance : ".$card->amount_left,
                "status" => 404
            ] , 404);
 
        }catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status" => 404
            ] , 404);
        }
    }

    public function destroy($id){
        try{

            $giftCard = Auth::user()->giftCards()->findOrFail($id);

            $giftCard->delete();
            return response()->json([
                "success" => true,
                "message" => "Gift Card Removed Successfully",
                "status" =>  200
            ] , 200);

        }
        catch(Exception $e){
            return response()->json([
                "success" => false,
                "message" => $e->getMessage(),
                "status"  => 404
            ]);
        }
    }
}

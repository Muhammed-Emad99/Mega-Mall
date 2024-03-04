<?php

namespace App\Http\Controllers\Api;

use App\Base\Interfaces\OrderRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CouponRequest;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\Api\OrderResource;
use App\Models\Coupon;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $order;

    public function __construct(OrderRepositoryInterface $order)
    {
        $this->order = $order;
    }


    public function makeOrder(OrderRequest $request)
    {

        try {

            $user = Auth::user();

            $request->merge([
                'user_id' => $user->id,
            ]);

            $dataOrder = $request->except('product_id');

            if (!$user->cart) {
                $order = Order::create($dataOrder);
                Item::create([
                    'quantity' => $request->quantity,
                    'price' => Product::where('id', $request->product_id)->value('price') * $request->quantity,
                    'product_id' => $request->product_id,
                    'order_id' => Order::where('type', 'cart')->value('id')
                ]);

                $order_id = Order::where("type", "cart")->first()->id;
                $total_price = Item::where('order_id', $order_id)->sum('price');
                Order::where('id', $order_id)->update(['total_price' => $total_price]);
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Product added to cart successfully',
                    ], 200);

            }
            else {
                $product_id = Item::where('product_id', $request->product_id)->value('product_id');
                $order_id = Order::where("type", "cart")->first()->id;
                if ($product_id == $request->product_id) {
                    Item::where('order_id', $order_id)
                        ->where('product_id', $request->product_id)
                        ->update(['quantity' => $request->quantity, 'price' => Product::where('id', $request->product_id)->value('price') * $request->quantity]);
                    $total_price = Item::where('order_id', $order_id)->sum('price');
                    Order::where('id', $order_id)->update(['total_price' => $total_price]);

                    return response()->json(
                        [
                            "status" => true,
                            "message" => 'Product price, quantity and total price updated successfully',
                        ], 200);

                } else {
                    Item::create([
                        'quantity' => $request->quantity,
                        'price' => Product::where('id', $request->product_id)->value('price') * $request->quantity,
                        'product_id' => $request->product_id,
                        'order_id' => Order::where('type', 'cart')->value('id')
                    ]);
                    $total_price = Item::where('order_id', $order_id)->sum('price');
                    Order::where('id', $order_id)->update(['total_price' => $total_price]);
                    return response()->json(
                        [
                            "status" => true,
                            "message" => 'Product added to cart successfully',
//                            'order' => new OrderResource(Order::where('type', 'cart')->with(['items'])->first())
                        ], 200);
                }
            }

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }
    }

    public function applyCoupon(CouponRequest $request)
    {
        $user = Auth::user();
        try {
            if ($user->cart()) {
                $discount = Coupon::where('coupon_title', $request->coupon)->value('discount');
                if ($request->coupon == null || $request->coupon == '' || !$discount) {
                    return response()->json(
                        [
                            "status" => true,
                            "message" => 'your coupon is not valid',
                        ], 404);
                }
                $order = Order::where("type", "cart")->first();
                $order->discount = $discount;
                $order->save();
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'You get discount ' . $discount . "%",
                    ], 200);

            }

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }

    public function checkOut()
    {
        $user = Auth::user();
        if ($user->cart){
            $user->cart->update(["type" => "order"]);
            return response()->json(
                [
                    "status" => true,
                    "message" => 'your order is proceeded',
                    'order' => new OrderResource(Order::where('type', 'order')->with(['items'])->orderBy('updated_at', 'desc')->first())
                ], 404);
        }
        else {
            return response()->json(
                [
                    "status" => true,
                    "message" => 'there is no cart available',
                ], 404);
        }

    }

    public function getAllOrders()
    {
        try {
            $orders = $this->order->getAll()->where('type', 'order');
            if (count($orders) > 0) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get all orders successfully',
                        'orders' => OrderResource::collection($orders)

                    ], 200);
            }

            return response()->json(
                [
                    "status" => true,
                    "message" => 'There no orders yet',

                ], 200);

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }
    }

    public function getSpecificOrder($id)
    {
        try {
            $order = $this->order->getById($id);
            if ($order) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get Order successfully',
                        'orders' => new OrderResource($order)

                    ], 200);
            }

            return response()->json(
                [
                    "status" => true,
                    "message" => 'order id not found',

                ], 200);

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }
    }

    public function getOrderBasedOnStatus($status)
    {
        try {
            $orders = $this->order->getAll()->where('status', $status);
            if (count($orders) > 0) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get Orders successfully',
                        'orders' => OrderResource::collection($orders)

                    ], 200);
            }

            return response()->json(
                [
                    "status" => true,
                    "message" => 'There no orders yet with this status',

                ], 200);

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }
    }

    public function getOrderBasedOnType($type)
    {
        try {
            $orders = $this->order->getAll()->where('type', $type);
            if (count($orders) > 0) {
                return response()->json(
                    [
                        "status" => true,
                        "message" => 'Get Orders successfully',
                        'orders' => OrderResource::collection($orders)

                    ], 200);
            }

            return response()->json(
                [
                    "status" => true,
                    "message" => 'There no orders yet with this type.',

                ], 200);

        } catch (Exception $e) {
            return response()->json(["status" => false,
                "message" => $e->getMessage(),
            ], 500
            );
        }
    }

}

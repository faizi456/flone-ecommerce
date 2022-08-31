<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Cart;
use App\Models\User;
use Validator;
use Session;
use Auth;

class CheckoutController extends Controller
{
    public function viewCheckoutPage()
    {
        $mac = session('mac');
        $user = User::where('mac',$mac)->first();
        $cart_products= Cart::select('id','product_name','product_code','subTotal')->where('mac',$mac)->whereNull(['user_id','order_number'])->get();
        if($cart_products->count() > 0){
            return view("user.checkout",['cart_products'=>$cart_products, 'user'=>$user]);
        }
        else{
            return redirect()->route('view.cart');
        }
    }

    public function userCheckout(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'firstName'=>'required|max:100',
            'lastName'=>'required|max:100',
            'phone'=>'required|max:30',
            'email'=>'required|max:100',
            'country'=>'required|max:255',
            'state'=>'required|max:150',
            'city'=>'required|max:100',
            'postcode'=>'required|max:20',
            'address'=>'required|max:255',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $status="PENDING";
        $payment="Cash On Delivery";
        $order_number='YC-'.rand(10000,100000);
        $mac = session('mac');

        $cart_products = Cart::where('mac',$mac)->whereNull('order_number')->update(['order_number' => $order_number, 'user_id' => Auth::id(), 'status' => $status, 'payment_method' => $payment]);
        
        if($cart_products == true){

        require base_path("vendor/autoload.php");
        $mail = new PHPMailer();
        try {
        $mail->isSMTP(); 
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'step.faizasharif@gmail.com'; // SMTP username
        $mail->Password   = 'wpgmsqbmlhcwelgl'; // SMTP password
        $mail->SMTPSecure = 'TLS'; 
        
        $mail->Port = 587;
        $mail->setFrom('step.faizasharif@gmail.com', 'Checking Example');
        $mail->addAddress($request->email);
            // $mail->addCC("");
            // $mail->addBCC("");

            $mail->addReplyTo('sender-reply-email', 'sender-reply-name');

            $mail->isHTML(true);  // Set email content format to HTML

            $mail->Subject = "Checking Example";
            $html = "Hello Check Example here";
            $mail->Body = $html;

            if( !$mail->send() ) {
                Session::flash('error_message' , 'Some error occured. PLease try again!');
                return back();
            }            
            else {
                Session::flash('success_message' , 'Your order is successfull');
                return back();
            }

        } catch (Exception $e) {
            Session::flash('error_message' , 'Some error occured. PLease try again!');
            return back();
        }

        }
        
    }
}

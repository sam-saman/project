<?php

namespace App\Http\Controllers;
use App\Models\login;
use App\Models\cart;
use App\Models\usertable;
use App\Models\product;
use App\Models\shipping;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\support\facades\File;
use Illuminate\Http\Request;

class LogController extends Controller
{
    

        public function insert(Request $request )
        {
            $data = $request->all();
            $login= new usertable;
            $login->name=$data['name'];
            $login->email=$data['email'];
            $login->password=Hash::make($data['password']);
            $insert= $login->save();
            if($insert)
            {
                return back()->with('success','welcome');
            }
            else
            {
                return "Error";
            }

        }

        public function login(Request $request)
         {
   
           $login=login::where('email','=',$request->email)->first();
           if($login)
           {
               if(Hash::check($request->password,$login->password))
               {
                   $request->session()->put('admin',$login['name']);
                    return redirect('admin');
               }
               else
               {
                return back()->with('fail','password dont match');
               }
           }
           else
           {
            $userlogin=usertable::where('email','=',$request->email)->first();
            if($userlogin)
            {
                if(Hash::check($request->password,$userlogin->password))
               {
                   $request->session()->put('name',$userlogin['name']);
                    return redirect('home');
               }
               else
               {
                return back()->with('fail','password dont match');
               }
            }
            else
            {
                return back()->with('fail','Email not Found');
            }

           }

        }





public function editHome($id)
{
    $product= product::find($id);
    return view('edit',compact('product'));

}



public function admin()
{

     if(session()->has('admin')){
        $product=product::all();
          return view('admin',compact('product'));
        }
        else{
                return view ('404');
            }
}

public function user()
{

     if(session()->has('name')){
          return view('userdash');
        }
        else{
                return redirect('index');
            }
}


public function index()
{ 
        return view('index');
}


 

public function logout(Request $request)
 {
     if(Session::get('admin'))
     {
        $request->session()->forget('admin');
        return redirect('home');
     }
     else if(Session::get('name'))
     {
        $request->session()->forget('name');
        return redirect('home');
     }


}



public function store(Request $request)
{

    $product=new product();
    $product->p_name=$request->input('p_name');
    $product->brand=$request->input('brand');
    $product->price=$request->input('price');
 
     if($request->hasFile('image')){
                   
         $file=$request->file('image');
         $extention=$file->getClientOriginalExtension();
         $filename=time().'.'.$extention;
         $file->move('uploades/',$filename);
         $product->image=$filename;
     }
     $product->save();
     return redirect()->back()->with('status','image success');

 }
 


 public function edit(Request $request,$id)
 {
        $product = product::find($id);
        $product->p_name=$request->input('p_name');
        $product->brand=$request->input('brand');
        $product->price=$request->input('price');

        if($request->hasFile('image'))
        {
        $destination ='uploades/'.$product->image;
        if(File::exists($destination))
        {
        File::delete($destination);
        }

        if(empty($request->image))
        {
            $product->image=$request->currentimage;
        }
        else
        {
            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            $file->move('uploades/',$filename);
            $product->image=$filename;
        }

     }
    $product->update();
    return redirect('admin')->with('status','image updated');


 }


 


 public function destroy($id)
 {

    $product= product::find($id);
     $destination ='uploades/'.$product->image;
        if(File::exists($destination))
        {
        File::delete($destination);
        }
    $product->delete();
    return redirect()->back()->with('status','delete success');
}



public function home()
{
    if(session()->has('name') or session()->has('admin'))
    {
        $product=product::all();
        return view('home',compact('product'));
    }
    else
    {
        return view('home');
    }
        
}
    

public function product(Request $request)
{
    $id=$request->id;
    $product=product::find($id);
     return view('product',compact('product'));
}


public function addToCart(Request $request)
    {      
            if(session()->has('name'))
            {
                

                
                    $countdata=DB::table('carts')->where(['pro_id'=>$request->id,'pro_name'=>$request->name,
                    'user_name'=>$request->user_name])->count(); 
                    if($countdata>0)
                    { 
                    DB::table('carts')->where('pro_id',$request->id)->increment('pro_quantity',$request->quantity);
                    return redirect('cart');
                    }
                    else
                    {
                    $cart=new cart;
                    $cart->pro_id=$request->id;
                    $cart->pro_name=$request->name;
                    $cart->pro_quantity=$request->quantity;
                    $cart->pro_price=$request->price;
                    $cart->user_name=$request->user_name;
                    $date=$cart->save();
                    if($date)
                    {
                        return redirect('cart');
                    }
                    }                       

            }
            else
            {
                return redirect('home')->with('Failslogin','You Are not logedin.!! login OR Create New Account');
            }

    }

public function cart(Request $request)
    {      

        if(session()->has('name'))
        {
            $sesion=Session::get('name');
            $datacart=cart::where(['user_name'=>$sesion])->get();
            foreach($datacart as $keys=>$products)
            {

                
                    $count=DB::table('carts')->count();
                    $productdetail=product::where(['id'=>$products->pro_id])->first();
                    $datacart[$keys]->image=$productdetail->image;
                    $subtotal=DB::table('carts')->sum('pro_price');
                    $total=DB::table('carts')->where('pro_price','*','pro_quantity');
                    if($subtotal==0)
                    {
                        $subtotal=0;
                    }   

            }
            $count=DB::table('carts')->count();
            $subtotal=DB::table('carts')->sum('pro_price');
            $total=DB::table('carts')->where('pro_price','*','pro_quantity');
            if($subtotal==0)
            {
                $subtotal=0;
            }   
            return view('cart',compact('datacart','subtotal','total','count'));
        }
        else
        {
            return redirect('index')->with('Failslogin','You Are not logedin.!! login OR Create New Account');
    
        }
        
    }

public function checkout(Request $request)
    {      

        if(session()->has('name'))
        {
            DB::table('carts')->truncate();
            return redirect('home')->with('jsAlert', 'Your Order Has Been Placed!');
        }
      
        
    }

public function cartQuan(Request $request,$id,$quantity)
    {
        DB::table('carts')->where('id',$id)->increment('pro_quantity',$quantity);
        return redirect('cart');
    }

public function cartDel(Request $request,$id)
    {
        DB::table('carts')->where('id',$id)->delete();
        return redirect('cart');

    }
static function countCart()
{

        $sesion=Session::get('name');
        return cart::where(['user_name'=>$sesion])->count();



    }

public function orderNow()
    {
        if(Session::get('name'))
        {
        $sesion=Session::get('name');
        $total= $products= DB::table('carts')
         ->join('products','carts.pro_id','=','products.id')
         ->where('carts.user_name',$sesion)
         ->sum('products.price');
 
         return view('ordernow',['total'=>$total]);
        }
        else
        {   
            return view('404');
        }
 
        //  return view('ordernow');
    }

   public function orderPlace(Request $req)
    {
        $sesion=Session::get('name');
        $allCart=cart::where('user_name',$sesion)->get();
         foreach($allCart as $cart)
        {
             $order= new shipping;
             $order->product_id=$cart['pro_id'];
             $order->user_name=$cart['user_name'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->save();
             Cart::where('user_name',$sesion)->delete(); 
         }
         $req->input();
         return redirect('home')->with('jsAlert', 'Your Order Has Been Placed!Will Be Delieverd Soon');  
    }


 public function myOrders(Request $request)
    {
        if(session()->has('name'))
        {
        $sesion=Session::get('name');
        $orders= DB::table('shippings')
         ->join('products','shippings.product_id','=','products.id')
         ->where('shippings.user_name',$sesion)
         ->get();
 
         return view('myorders',['orders'=>$orders]);
        }
        else{

            return redirect('index')->with('Failslogin','You Are not logedin.!! login OR Create New Account');
        }
    }




}

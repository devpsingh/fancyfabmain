<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\shopall;
use App\Models\Color;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Image;
class Addproduct extends Component
{
    use WithFileUploads;
    public $images=[];
    public $coloroptions=[];
    public $product_name,$price,$quantity,$code,$availability,$product_category,
    $description,$category,$shopall,$shopall_category;
  
    public function render()
    {
        $this->category=Category::all();
        $this->shopall=shopall::all();
        return view('livewire.admin.addproduct',[
            'category'=>$this->category,
            'shopall'=>$this->shopall,
            'colors'=>Color::all(),
        ]);
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updated($field)
    {
        $this->validateOnly($field,[
            'product_category'=>'required',
            'shopall_category'=>'required',
            'code' => 'required|max:8|min:3|unique:products',
            'product_name' => 'required|max:20',
            'images.*' => 'required | mimes:jpeg,jpg,png | max:5000',
            'description'=>'required|max:200',
            'quantity' => 'required',
            'price' => 'required',           
            'availability'=>'required',
            'coloroptions'=>'required',
        ]);
        
    }
    
    public function submit()
    {
        $validatedData = $this->validate([
            'product_category'=>'required',
            'shopall_category'=>'required',
            'code' => 'required|max:8|min:3|unique:products',
            'product_name' => 'required',
            'images.*' => 'required | mimes:jpeg,jpg,png | max:5000',
            'description'=>'required',
            'quantity' => 'required',
            'price' => 'required',           
            'availability'=>'required',
            'coloroptions'=>'required',
            
        ]);
        function generateRandomString($length = 25) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        //usage 
        
        //dd($this->images);  
        foreach($this->images as $key=>$value)
        {
           /* $img = Image::make($value->getRealPath())->encode('jpg', 65)->fit(800, null, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });*/
            $img = Image::make($value->getRealPath())->encode('jpg', 65)->resize(800,800);
            //$thumb = Image::make($value->getRealPath())->encode('jpg', 65)->resize(200,200);
            $imagename = generateRandomString(10);
           $name = ''.$imagename.'-'.mt_rand(1,9999999).'.'.$value->extension();
           //$value->storeAs('public/products', $name);
           Storage::disk('local')->put('public/products/' . '/' . $name, $img, 'public');
           //Storage::disk('local')->put('public/products/thumbnail/' . '/' . $name, $thumb, 'public');
           $this->images[$key] = $name;
           
            
        }
          if($validatedData && !empty($this->images))
          {
            Product::create([
                'collection_id'=>$this->product_category,
                'shopall_id'=>$this->shopall_category,
                'code'=>$this->code,
                'product_name'=>$this->product_name,
                'thumbnail_path'=> json_encode($this->images),
                'product_desc'=>$this->description,
                'qty'=>$this->quantity,
                'price'=>$this->price,
                'available'=>$this->availability,
                'colors'=>serialize($this->coloroptions),
            ]);
            session()->flash('message', 'Product successfully Uploaded.');
          }
            //dd($this->product_category,$this->shopall_category,$this->coloroptions);
        
    }
}

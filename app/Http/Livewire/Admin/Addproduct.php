<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithFileUploads;
class Addproduct extends Component
{
    use WithFileUploads;
    public $productimage=[];
    public $product_name,$price,$quantity,$code,$availability,$product_category,
    $description;
  
    public $category;


    public function render()
    {
        $this->category=Category::all();
        return view('livewire.admin.addproduct',['category'=>$this->category]);
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
            'code' => 'required|max:8|min:3|unique:products',
            'product_name' => 'required|max:20',
            'productimage.*' => 'required|image|mimes:jpeg,png,jpg|max:1096',
            'description'=>'required|max:200',
            'quantity' => 'required',
            'price' => 'required',           
            'availability'=>'required',
        ]);
        
    }
    
    public function submit()
    {
        $validatedData = $this->validate([
            'product_category'=>'required',
            'code' => 'required|max:8|min:3|unique:products',
            'product_name' => 'required',
            'productimage.*' => 'required|image|mimes:jpeg,png,jpg|max:1096',
            'description'=>'required',
            'quantity' => 'required',
            'price' => 'required',           
            'availability'=>'required',
            
        ]);
            
        foreach($this->productimage as $key=>$value)
        {
          
           $name = 'FFB-'.mt_rand(1,99999).'.'.$value->extension();
           $value->storeAs('public/products', $name);
           $this->productimage[$key] = $name;
            
        }
          $all=Product::all();
          $images = array();
          if($validatedData)
          {
            Product::create([
                'category_id'=>$this->product_category,
                'code'=>$this->code,
                'product_name'=>$this->product_name,
                'thumbnail_path'=> json_encode($this->productimage),
                'product_desc'=>$this->description,
                'qty'=>$this->quantity,
                'price'=>$this->price,
                'available'=>$this->availability,
            ]);
            session()->flash('message', 'Product successfully Uploaded.');
          }
            //dd($validatedData);
        
    }
}

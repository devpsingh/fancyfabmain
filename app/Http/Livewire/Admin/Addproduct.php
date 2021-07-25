<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\shopall;
use App\Models\Color;
use Image;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Addproduct extends Component
{
    use WithFileUploads;
    public $images=[];
    public $coloroptions=[];
    public $product_name,$price,$quantity,$code,$availability,$product_category,
    $description,$category,$shopall,$shopall_category;

    protected $rules=[
        'product_category'=>'required',
        'shopall_category'=>'required',
        'code' => 'required|max:8|min:3|unique:products',
        'product_name' => 'required|max:20',
        'images.*' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        'description'=>'required|max:200',
        'quantity' => 'required',
        'price' => 'required',           
        'availability'=>'required',
        'coloroptions'=>'required',
    ];
    protected $messages=[
        'coloroptions.required'=>'Color option field is required',
    ];
  
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
        $this->validateOnly($field);
    }
    
    public function submit()
    {
        $validatedData = $this->validate([
            'product_category'=>'required',
            'shopall_category'=>'required',
            'code' => 'required|max:8|min:3|unique:products',
            'product_name' => 'required',
            'images.*' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'description'=>'required',
            'quantity' => 'required',
            'price' => 'required',           
            'availability'=>'required',
            'coloroptions'=>'required',
            
        ]);
       
       
          if($validatedData && !empty($this->images))
          {
            foreach($this->images as $key=>$value)
            {
            
            $input['imagename'] = time().'.'.$value->extension();
        
            $filePath = public_path('/products');
    
            $img = Image::make($value->path());
            $img->resize(800, 800)->save($filePath.'/'.$input['imagename']);
                $this->images[$key] = $input['imagename'];
        
            }
            if(is_numeric($this->product_category))
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
            }else{
               
                Product::create([
                    'shopall_id'=>$this->shopall_category,
                    'code'=>$this->code,
                    'product_name'=>$this->product_name,
                    'thumbnail_path'=> json_encode($this->images),
                    'product_desc'=>$this->description,
                    'qty'=>$this->quantity,
                    'price'=>$this->price,
                    'available'=>$this->availability,
                    'colors'=>serialize($this->coloroptions),
                    'other_category'=>$this->product_category,
                ]);
            }
            session()->flash('message', 'Product successfully Uploaded.');
          }
          
        
    }
}

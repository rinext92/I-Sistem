<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View,Auth,DB;
use Input;
use App\Inventory;
use App\Category;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Inventory::orderBy('item_name', 'asc')->paginate(3);
        $categories = Category::orderBy('category_name', 'asc')->get();
        return view('e-inventory.e-inventory_list')->with('item', $items)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::orderBy('category_name', 'asc')->get();
        return view('e-inventory.e-inventory_entry')->with('cat', $cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = $request->input('txtbxItemName');
        $serialNo = $request->input('txtbxSerialNumber');
        $category = $request->input('myCategory');
        $totalItem = $request->input('txbxtotal');

        $categoryArray = Category::orderBy('category_name', 'asc')->get();
        $length = count($categoryArray);
            for($i=0;$i<count($items);$i++)
            {
                $item = new Inventory([
                  'item_name' => $items[$i],
                  'serialNumber' => $serialNo[$i],
                  'category' => $category[$i],
                  'total' => $totalItem[$i],
                  'status' => 'not active'
                ]);

                for($c=0; $c<$length; $c++)
                {   
                    if($category[$i] == $categoryArray[$c]->category_name)
                    {   
                        $countTotal = 0;
                        $countTotal = $categoryArray[$c]->total;
                        $categoryArray[$c]->total = $countTotal+1;
                        $categoryArray[$c]->save();
                    }
                }
                $item->save();
            }
            return redirect('i-entry')->with('message', 'Your post successfully   .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       return redirect('i-entry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('i-deleteCategory')->with('message', 'Selected Category successfully deleted.');
    }

    public function find(Request $request)
    {
        if($request->ajax())
        {   
            $output="";
            $itemSearch = DB::table('Inventory')->where('item_name', 'LIKE', '%'.$request->searchText.'%')->orWhere('serialNumber', 'LIKE', '%'.$request->searchText.'%')->get();
            if($itemSearch)
            {   $countData = 0;
                $output.= '<thead><tr><td style="width:5%;text-align: center;">No</td><td>Item Name</td><td>Serial Number</td><td>Category</td>'.
                           '<td style="width: 7%">Quantity</td></tr></thead><tbody>';
                foreach ($itemSearch as $key => $i) {
                     $output.=  '<tr>'.
                                    '<td style="text-align:center">'.++$key.'</td>'.
                                    '<td>'.$i->item_name.'</td>'.
                                    '<td>'.$i->serialNumber.'</td>'.
                                    '<td>'.$i->category.'</td>'.
                                    '<td>'.$i->total.'</td>'.
                                '</tr>';
                    $countData = $key;
                }
                $output.= '</tbody>'; 
            }
            if($countData == 0)
            {
                 $output = "<tr style='background-color:red'><td style='text-align:center;font-weight:bold;'>No Data Found!</td></tr>";
            }
            return Response($output);
        }
    }

    public function addCategory(Request $request)
    {
        $key = $this->generateRandomString();
        $category = $request->input('txtbxCategory');
        $c = new Category([ 'category_name' => $category, 'categorySerialID' => $key]);
        $c->save();
        return redirect('i-newCategory')->with('message', 'Your post successfully submitted.');
    }

    public function deleteCategory()
    {
        $category = Category::where('status', '=', '1')->orderBy('id', 'asc')->paginate(10);
        $InactiveStatus = Category::where('status', '!=', '1')->orderBy('created_at', 'asc')->paginate(5);
        return view('e-inventory.e-inventory_deletecategory')->with('categories',$category)->with('inactiveStats', $InactiveStatus);
    }

    public function editCategoryPage()
    {
        $Editcategory = Category::orderBy('id', 'asc')->paginate(5);
        return view('e-inventory.e-inventory_updatecategory')->with('editCat', $Editcategory);
    }

    public function checkCategory(Request $request)
    {
        if($request->ajax())
        {   
            $output="";
            $itemSearch = DB::table('Categories')->where('category_name', 'LIKE', '%'.$request->searchCategory)->get();
            if($itemSearch)
            {   $countData = 0;
                foreach ($itemSearch as $key => $i) {
                    ++$key;
                    $output = "<label style='text-align:center;font-weight:bold'><font color='red'>Not Available</font></label>";
                    $countData = $key;
                }
                $output.= '</tbody>';
                
            }
            if($countData == 0)
            {
                $output = "<label style='text-align:center;font-weight:bold'><font color='green'>Available</font></label> <input type='submit' class='btn btn-primary' id='btnSave' style='display:inline-block' value='Submit'/>";
            }
            return Response($output);
        }
    }

    public function updateCategory($id)
    {
        $category = Input::get('txtbxCatName');
        Category::where('id', $id)->update(array('category_name' => $category));
        return redirect('i-updateCategory');
    }

    public function generateRandomString($length = 10) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
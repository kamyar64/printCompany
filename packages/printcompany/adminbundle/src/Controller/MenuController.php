<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Department;
use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{

    public function create(Request $request)
    {
        if($request->input('search')){
            $menus=Menu::orWhere('name', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $menus=Menu::paginate(Session::get('limitPagination'));
        }
        $menu=$this->list_categories(null);
        return view('admin::menu.create',['data'=>$menus,'menuData'=>$menu]);
    }
    public function store(Request $request)
    {
        try {
            $this->validate($request,['slug'=>'required|min:2','name'=>'required|min:2']);
            $menu=new Menu();
            $menu->name=$request->input('name');
            $menu->slug=$request->input('slug');
            $menu->sort_id=0;
            $menu->parent_id=$request->input('parent_id');
            $menu->save();
            return  redirect()->back()->with('success', Constants::TEXT_FOR_CREATE_DATA);
        } catch (\Illuminate\Database\QueryException $ex) {
            $errorCode = $ex->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->back()
                    ->with('error',Constants::TEXT_FOR_DUPLICATE_DATA );
            }
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR.$ex->getMessage() );
        }

    }
    public function index()
    {
       $menu=$this->list_categories(null);

    }

    public function list_categories($num)
    {
        $data = [];
            $categories=Menu::where('parent_id',$num)->get()->toArray();

        foreach($categories as $category)
        {
            $data[] = [
                'id'=>$category["id"],
                'name'=> $category["name"],
                'slug'=> $category["slug"],
                'created_at'=> $category["created_at"],
                'updated_at'=> $category["updated_at"],
                'children' => $this->list_categories($category["id"]),
            ];
        }
        return $data;
    }





}

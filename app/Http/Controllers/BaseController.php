<?php

namespace App\Http\Controllers;

use App\Menu;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        $category=new ProductCategory();
        $category=$category->IsEnable()->get();
        $menu=$this->list_categories(null);
        View::share(['category'=>$category,'menu'=>$menu]);
    }
    public function list_categories($num,$id=null)
    {
        if($id!=null )
            $categories=Menu::IsEnable()->where('parent_id',$num)->whereNotIn('id',[$id])->get()->toArray();
        else
            $categories=Menu::IsEnable()->where('parent_id',$num)->get()->toArray();

        $data = [];

        foreach($categories as $category)
        {
            $data[] = [
                'id'=>$category["id"],
                'name'=> $category["name"],
                'slug'=> $category["slug"],
                'created_at'=> $category["created_at"],
                'updated_at'=> $category["updated_at"],
                'children' => $this->list_categories($category["id"],$id),
            ];
        }

        return $data;
    }
}

<?php

namespace App\Http\Controllers;

use App\ContactUsTellAndEmail;
use App\Libraries\Constants;
use App\Menu;
use App\ProductCategory;
use App\SocialNetworks;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
class BaseController extends Controller
{
    public function __construct()
    {
        if(!Session::get('limitPagination'))
            Session::put('limitPagination',Constants::TABLE_ROW_COUNT);
        $category=new ProductCategory();
        $category=$category->IsEnable()->get();

        $menu=$this->list_categories(null);

        $allTellAndEmail=new ContactUsTellAndEmail();
        $allEmail=$allTellAndEmail->IsEmail()->get()->all();
        $allTell=$allTellAndEmail->IsTell()->get()->all();

        $socialNetwork=new SocialNetworks();
        $socialNetwork=$socialNetwork->IsEnable()->get();
        View::share(['category'=>$category,'menu'=>$menu,'contact_us_email'=>$allEmail,'contact_us_tell'=>$allTell,'socialNetwork'=>$socialNetwork]);
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

<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Department;
use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\Menu;
use App\MenuText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuTextController extends Controller
{
    public function index(Request $request)
    {
        if($request->input('search')){
            $MenuTextController=MenuText::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $MenuTextController=MenuText::paginate(Session::get('limitPagination'));
        }

        return view('admin::menu.showText',compact('MenuTextController'));
    }


    public function create(MenuText $id=null)
    {
        $menuText=null;
        if($id)
            $menuText=$id;

        $menu= new Menu();
        $menu=$menu->all();
        return view('admin::menu.createText',['menu'=>$menu,'menus_data'=>$menuText]);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'text'=>'required|min:50',
                'menu_id'=>'required|not_in:0']);
            $menu_text=new MenuText();
            $menu_text->text=$request->input('text');
            $menu_text->menu_id=$request->input('menu_id');
            $menu_text->save();
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


    public function show(MenuText $news)
    {

    }


    public function edit(MenuText $id)
    {

        $menu= new Menu();
        $menu=$menu->all();

        return view('admin::menu.createText',['menus_data'=>$id,'menu'=>$menu]);
    }


    public function update(Request $request, MenuText $id)
    {
        try {
            $this->validate($request,[
                'text'=>'required|min:50',
                'menu_id'=>'required|not_in:0']);
            $id->text=$request->input('text');
            $id->menu_id=$request->input('menu_id');
            $id->save();
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


    public function destroy(MenuText $news)
    {

    }



}

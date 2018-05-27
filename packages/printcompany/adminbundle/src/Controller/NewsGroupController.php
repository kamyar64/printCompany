<?php

namespace PrintCompany\AdminBundle\Controller;

use App\Http\Controllers\Controller;
use App\Libraries\Constants;
use App\NewsGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsGroupController extends Controller
{
    public function index()
    {

    }


    public function create(Request $request)
    {
        if($request->input('search')){
            $priority=NewsGroup::orWhere('title', 'like', '%' . $request->input('search') . '%')->paginate(Session::get('limitPagination'));
        }else{
            $priority=NewsGroup::paginate(Session::get('limitPagination'));
        }

        return view('admin::news_group/create',['data'=>$priority]);
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,['title'=>'required|min:2']);
            $priority=new NewsGroup();
            $priority->title=$request->input('title');
            $priority->save();
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


    public function show($id)
    {

    }


    public function edit(NewsGroup $id)
    {
        $priority=NewsGroup::paginate(Session::get('limitPagination'));
        return view('admin::news_group/create',['data'=>$priority,'priority'=>$id]);
    }


    public function update(Request $request,NewsGroup $id)
    {
        try {
            $priority=NewsGroup::find($id)->first();
            $priority->title=$request->input(['title']);
            $priority->save();
            $request->session()->flash('success', Constants::TEXT_FOR_UPDATE_DATA);
            return redirect()->route('create_news_group');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }


    }


    public function destroy($id)
    {
        try {
            $message="";
            $priority=NewsGroup::find($id);
            if($priority->isDelete==1){
                $priority->isDelete=0;
                $message=Constants::TEXT_FOR_ACTIVE;
            }
            else{
                $priority->isDelete=1;
                $message=Constants::TEXT_FOR_DEACTIVE;
            }

            $priority->save();
            return redirect()->route('create_news_group')->with('success', $message);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()
                ->with('error',Constants::TEXT_FOR_ERROR);
        }
    }

}

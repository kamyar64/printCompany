<div class="datatable-header">
    <div id="DataTables_Table_0_filter" class="dataTables_filter">
        <form action="{{url()->current()}}" method="GET" >
            <label><span>فیلتر :</span></label>
            <input class="" @if(request()->get('search')) value="{{request()->get('search')}}" @endif placeholder="جستسجو ..." aria-controls="DataTables_Table_0" type="search" name="search">
        </form>
    </div>
    <div class="dataTables_length" id="DataTables_Table_0_length">
        <label>
            <span>نمایش تعداد سطر: </span>
            <select name="DataTables_Table_0_length " aria-controls="DataTables_Table_0" class="select-user"  id="select-user" data-href="{{route('pagination')}}" >
                @foreach(\App\Libraries\Constants::TABLE_ROW_NUM as $data)
                    <option value="{{$data}}"  @if(session()->has('limitPagination') && session()->get('limitPagination')==$data)  selected @endif>{{$data}}</option>
                @endforeach
            </select>
        </label>
    </div>
</div>

<ul class="navigation navigation-main navigation-accordion">
    @php $path=\Request::route()->getName() @endphp
    <li class="navigation-header"><span>منوی کاربری</span> <i class="icon-menu" title="Main pages"></i></li>
    <li ><a href="{{ route('admin') }}"><i class="icon-home4"></i> <span>داشبورد</span></a></li>
    <li>
        <a href="#"><i class="icon-stack2"></i> <span>اخبار</span></a>
        <ul>
            <li @if($path=='create_priority') class="active" @endif><a href="{{ route('create_priority') }}">اولویت ها</a></li>
            <li @if($path=='create_news_group') class="active" @endif><a href="{{ route('create_news_group') }}">گروه خبری</a></li>
            <li @if($path=='create_department') class="active" @endif><a href="{{ route('create_department') }}">دپارتمان</a></li>
            <li class="navigation-divider"></li>
            <li @if($path=='create_news') class="active" @endif><a href="{{ route('create_news') }}">درج خبر</a></li>
            <li @if($path=='show_news') class="active" @endif><a href="{{ route('show_news') }}">لیست اخبار</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-copy"></i> <span>محصولات</span></a>
        <ul>
            <li>
                <a href="#">جزییات محصول</a>
                <ul>
                    <li @if($path=='create_category') class="active" @endif><a href="{{ route('create_category') }}">دسته ها</a></li>
                    <li @if($path=='create_product_status') class="active" @endif><a href="{{ route('create_product_status') }}">وضعیت ها</a></li>
                    <li @if($path=='create_product_author') class="active" @endif><a href="{{ route('create_product_author') }}">نویسنده ها</a></li>
                    <li @if($path=='create_product_translator') class="active" @endif><a href="{{ route('create_product_translator') }}">مترجم ها</a></li>
                    <li @if($path=='create_product_size') class="active" @endif><a href="{{ route('create_product_size') }}">قطع های کتاب</a></li>
                    <li @if($path=='create_product_volume_type') class="active" @endif><a href="{{ route('create_product_volume_type') }}">نوع جلد ها</a></li>
                    <li @if($path=='create_product_publisher') class="active" @endif><a href="{{ route('create_product_publisher') }}">ناشر ها</a></li>
                    <li @if($path=='create_product_language') class="active" @endif><a href="{{ route('create_product_language') }}">زبان ها</a></li>
                    <li @if($path=='create_product_measure') class="active" @endif><a href="{{ route('create_product_measure') }}">واحد اندازه گیری ها</a></li>
                    <li @if($path=='create_product_weight') class="active" @endif><a href="{{ route('create_product_weight') }}">وزن ها</a></li>
                    <li @if($path=='create_product_costUnit') class="active" @endif><a href="{{ route('create_product_costUnit') }}">قیمت ها</a></li>
                </ul>
            </li>
            <li class="navigation-divider"></li>
            <li @if($path=='create_product') class="active" @endif><a href="{{ route('create_product') }}">درج محصول</a></li>
            <li @if($path=='show_product') class="active" @endif><a href="{{ route('show_product') }}">محصولات</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-droplet2"></i> <span>ارتباط با ما</span></a>
        <ul>
            <li @if($path=='create_contact_us_address') class="active" @endif><a href="{{ route('create_contact_us_address') }}">آدرس ها</a></li>
            <li @if($path=='create_contact_us_tell_email') class="active" @endif><a href="{{ route('create_contact_us_tell_email') }}">تلفن و ایمیل ها</a></li>
            <li @if($path=='create_contact_us') class="active" @endif><a href="{{ route('create_contact_us') }}">ارتباط با ما</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="icon-droplet2"></i> <span>منو</span></a>
        <ul>
            <li @if($path=='create_menu') class="active" @endif><a href="{{ route('create_menu') }}">ایجاد و نمایش منو</a></li>
            <li @if($path=='create_menu_text') class="active" @endif><a href="{{ route('create_menu_text') }}">ایجاد متن منو ها</a></li>
            <li @if($path=='show_menu_text') class="active" @endif><a href="{{ route('show_menu_text') }}">نمایش متن منو ها</a></li>
        </ul>
    </li>

    <li @if($path=='create_customer') class="active" @endif><a href="{{ route('create_customer') }}" ><i class="icon-home4"></i> <span>مشتریان ما</span></a></li>
</ul>
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('product_categories')->insert([
                'title' => str_random(10),
                'isDelete' => '0',
            ]);
        }*/
        $user= DB::table('users')->insert([
            'name' => 'reza',
            'email' => 'rezakam64@yahoo.com',
            'password' => '$2y$10$1JbXUd3pibz.S1X/F9KRqOL6LkzzZc.LdRuWZM.sH8jcI1q8T2CK6',
            'is_admin' => '1',
            'remember_token' => 'uqeJzCuXghj1gpuRkKWMLLAniVN3WoaguwDTkvVrZJQQGcFZ8OWDiz2kWHID',
            'created_at'=>'2018/6/6'
        ]);
       $cat1= DB::table('product_categories')->insertGetId([
            'title' => 'تفریحی',
            'slug' => 'تفریحی',
            'isDelete' => '0',
           'created_at'=>'2018/6/6'
        ]);
        $cat2=DB::table('product_categories')->insertGetId([
            'title' => 'سلامت',
            'slug' => 'سلامت',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $cat3=DB::table('product_categories')->insertGetId([
            'title' => 'سیاسی',
            'slug' => 'سیاسی',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $cat4=DB::table('product_categories')->insertGetId([
            'title' => 'اجتماعی',
            'slug' => 'اجتماعی',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $cat5=DB::table('product_categories')->insertGetId([
            'title' => 'دین و مذهب',
            'slug' => 'دین و مذهب',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $cat6=DB::table('product_categories')->insertGetId([
            'title' => 'ورزش',
            'slug' => 'ورزش',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $cost1=DB::table('product_cost_units')->insertGetId([
            'title' => 'ریال',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $cost2=DB::table('product_cost_units')->insertGetId([
            'title' => 'تومان',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $languages1=DB::table('product_languages')->insertGetId([
            'title' => 'فارسی',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]); $languages2=DB::table('product_languages')->insertGetId([
            'title' => 'انگلیسی',
            'isDelete' => '0',
        'created_at'=>'2018/6/6'
        ]); $languages3=DB::table('product_languages')->insertGetId([
            'title' => 'اسپانیایی',
            'isDelete' => '0',
        'created_at'=>'2018/6/6'
        ]);


        $measurement1=DB::table('product_measurement_units')->insertGetId([
            'title' => 'سانتیمتر',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);  $measurement2=DB::table('product_measurement_units')->insertGetId([
            'title' => 'متر',
            'isDelete' => '0',
        'created_at'=>'2018/6/6'
        ]);


        $sizes1=DB::table('product_sizes')->insertGetId([
            'title' => '10*40',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $sizes2=DB::table('product_sizes')->insertGetId([
            'title' => '20*30',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $sizes3=DB::table('product_sizes')->insertGetId([
            'title' => '50*70',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);

        $statuses=DB::table('product_statuses')->insertGetId([
            'title' => 'درست',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $statuses1=DB::table('product_statuses')->insertGetId([
            'title' => 'نادرست',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);


        $weight1=DB::table('product_weight_units')->insertGetId([
            'title' => 'کبلوگرم',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);$weight2=DB::table('product_weight_units')->insertGetId([
            'title' => 'گرم',
            'isDelete' => '0',
        'created_at'=>'2018/6/6'
        ]);

        $volume1=DB::table('product_volume_types')->insertGetId([
            'title' => 'نوع',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $volume2=DB::table('product_volume_types')->insertGetId([
            'title' => 'نوع1',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);



        $publishers1=DB::table('product_publishers')->insertGetId([
            'title' => 'فرد1',
            'address' => 'آدرس',
            'phone1' => '026',
            'phone2' => '026',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);$publishers2=DB::table('product_publishers')->insertGetId([
            'title' => 'فرد2',
            'address' => 'آدرس',
            'phone1' => '026',
            'phone2' => '026',
            'isDelete' => '0',
        'created_at'=>'2018/6/6'
        ]);$publishers3=DB::table('product_publishers')->insertGetId([
            'title' => 'فرد3',
            'address' => 'آدرس',
            'phone1' => '026',
            'phone2' => '026',
            'isDelete' => '0',
        'created_at'=>'2018/6/6'
        ]);


        $translators1=DB::table('product_translators')->insertGetId([
            'first_name' => 'علی',
            'last_name' => 'کریمی',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);
        $authors1= DB::table('product_authors')->insertGetId([
            'first_name' => 'احمد',
            'last_name' => 'احمدی',
            'isDelete' => '0',
            'created_at'=>'2018/6/6'
        ]);



        $faker = Faker::create();
        foreach (range(1,10) as $index) {

            DB::table('products')->insert([
                'title' => 'دستيار',
                'slug' => 'دستيار',
                'product_categories' => $cat1,
                'product_statuses' => $statuses,
                'product_authors' => $authors1,
                'product_translators' => $translators1,
                'product_sizes' => $sizes1,
                'product_volume_types' => $volume1,
                'product_publishers' => $publishers1,
                'product_languages' => $languages1,
                'pages_num' => '200',
                'release_date' => '2018/2/5',
                'print_round' => '11',
                'short_description'=>'asdasdasd',
                'ISBN' => '123123-12313-12312',
                'dimension_length' => '20',
                'dimension_width' => '30',
                'dimension_height' => '40',
                'product_measurement_units' => $measurement1,
                'weight' => '450',
                'product_weight_units' => $weight1,
                'price' => '750000',
                'product_cost_units' => $cost1,
                'picture' => '81366_23902_normal.jpg',
                'body' => 'آن‌قدر فکر کردن به واقعيات زندگی روزمره‌ی فردی و اجتماعی ما جالب است که گاهی اوقات آدم خود‌به‌خود به خنده می‌افتد. باور کنيد چيزهايی را که با فکر کردن در احوال جامعه نوشته‌ام آن‌قدر جالب هستند که هر آدمی را به خنده وا ‌دارد. باور نمی‌کنيد! کتاب را بخوانيد و به احوال خودتان و‌ ـ گاهي هم کسانی مثل ما ـ فکر کنيد! اما همه را با هم نخوانيد که از شدت خنده کارتان به بيمارستان نيفتد! در عين حال زياد هم به واقعيات جامعه فکر نکنيد، چون ممکن است از خنده روده‌بر شويد!',
                'product_user_insert' => $user,
                'isDelete' => '0',
                'created_at'=>'2018/6/6'
            ]);
            DB::table('products')->insert([
                'title' => 'ملت عشق',
                'slug' => 'ملت عشق',
                'product_categories' => $cat2,
                'product_statuses' => $statuses,
                'product_authors' => $authors1,
                'product_translators' => $translators1,
                'product_sizes' => $sizes2,
                'product_volume_types' => $volume2,
                'product_publishers' => $publishers2,
                'product_languages' => $languages2,
                'pages_num' => '200',
                'release_date' => '2018/2/5',
                'print_round' => '11',
                'ISBN' => '123123-12313-12312',
                'dimension_length' => '20',
                'dimension_width' => '30',
                'dimension_height' => '40',
                'product_measurement_units' => $measurement2,
                'weight' => '450',
                'product_weight_units' => $weight2,
                'price' => '250000',
                'short_description'=>'asdasdasd',
                'product_cost_units' => $cost1,
                'picture' => '4339_22364_normal.jpg',
                'body' => 'تاب «ملت عشق» نوشته الیف شافاک ( -۱۹۷۱) نویسنده ترک است، که در ایران با ترجمه ارسلان فصیحی منتشر شده است.
این کتاب توانسته با بیش از پانصد بار تجدید چاپ تبدیل به پرفروش‌ترین رمان ترکیه شود و هم چنین به زبانهای گوناگونی نیز ترجمه شده است.
«ملت عشق» داستان عشق و رهایی است. روایتگر زندگی یکنواخت زنی در غرب که درگیر اندیشه‌های عرفانی شرق می‌شود. «اللا روبینشتاین» چهل ساله، در بیست سال زندگی زناشویی‌اش هیچ‌چیز جز زندگی روزمره را تجربه نکرده است. تنها دلیل و عاملی که سمت و سوی زندگی‌اش را تعیین می‌کند خانه و آسایش خانواده‌اش است.
تا اینکه بعد از بیست سال زندگی مشترک یک روز صبح تصمیم می‌گیرد خود را از بند این زندگی آزاد کند و سفری بی‌بازگشت را آغاز می‌کند. شاید عشق تنها دلیلی است که «اللا» را از زندگی آرام و تکراری اش جدا کرده و در مسیری پر تلاطم قرار می‌دهد.
در بخشی از کتاب «ملت عشق می‌خوانیم»:
«خیلی وقت پیش بود. به دلم افتاد رمانی بنویسم. ملت عشق. جرات نکردم بنویسمش. زبانم لال شد، نوک قلمم کور. کفش آهنی پایم کردم. دنیا را گشتم. آدم‌هایی شناختم، قصه‌هایی جمع کردم. چندین بهار از آن زمان گذشته. کفش‌های آهنی سوراخ شده؛ من اما هنوز خامم، هنوز هم در عشق همچو کودکان ناشی...
مولانا خودش را «خاموش» می‌نامید؛ یعنی ساکت. هیچ به این موضوع اندیشیده‌ای که شاعری، آن هم شاعری که آوازه‌اش عالمگیر شده، انسانی که کار و بارش، هستی‌اش، چیستی‌اش، حتی هوایی که تنفس می‌کند چیزی نیست جز کلمه‌ها و امضایش را پای بیش از پنجاه هزار بیت پرمعنا گذاشته چطور می‌شود که خودش را «خاموش» بنامد؟
کائنات هم مثل ما قلبی نازنین و قلبش تپشی منظم دارد. سال‌هاست به هر جا پا گذاشته‌ام آن صدا را شنیده‌ام. هر انسانی را جواهری پنهان و امانت پروردگار دانسته‌ام و به گفته‌هایش گوش سپرده‌ام. شنیدن را دوست دارم؛ جمله‌ها و کلمه‌ها و حرف‌ها را... اما چیزی که وادارم کرد این کتاب را بنویسم سکوت محض بود.
اغلب مفسران مثنوی بر این نکته تاکید می‌کنند که این اثر جاودان با حرف «ب» شروع شده است. نخستین کلمه‌اش «بشنو!» است. یعنی می‌گویی تصادفی است شاعری که تخلصش «خاموش» بوده ارزشمندترین اثرش را با «بشنو» شروع می‌کند؟ راستی، خاموشی را می‌شود شنید؟
همۀ بخش‌های این رمان نیز با همان حرف بی‌صدا شروع می‌شود. نپرس «چرا؟» خواهش می‌کنم. جوابش را تو پیدا کن و برای خودت نگه دار. چون در این راه‌ها چنان حقیقت‌هایی هست که حتی هنگام روایتشان هم باید به مثابه راز درآیند». ',
                'product_user_insert' => $user,
                'isDelete' => '0',
                'created_at'=>'2018/6/7'
            ]);

            DB::table('products')->insert([
                'title' => 'رژیم غذایی اتکینز',
                'slug' => 'رژیم غذایی اتکینز',
                'product_categories' => $cat3,
                'product_statuses' => $statuses,
                'product_authors' => $authors1,
                'product_translators' => $translators1,
                'product_sizes' => $sizes2,
                'product_volume_types' => $volume2,
                'product_publishers' => $publishers2,
                'product_languages' => $languages2,
                'pages_num' => '200',
                'release_date' => '2018/2/5',
                'print_round' => '11',
                'ISBN' => '123123-12313-12312',
                'dimension_length' => '20',
                'dimension_width' => '30',
                'dimension_height' => '40',
                'product_measurement_units' => $measurement1,
                'weight' => '450',
                'short_description'=>'asdasdasd',
                'product_weight_units' => $weight1,
                'price' => '550000',
                'product_cost_units' => $cost1,
                'picture' => '4181_97465_normal.jpg',
                'body' => 'رژیم غذایی کتوزینگ که مشابه رژیم غذایی برای مصرف پایین قند است، در سال ۱۹۲۱ برای درمان بیماری صرع ابداع شد و تا قبل از سال ۱۹۹۰ این روش رژیم غذایی حتی در عمده تدریس‌های بیمارستان‌های ایالات متحده کنار گذاشته شده بود. اما امروزه این روش درمان در سراسر جهان پذیرفته شده و به‌طور وسیعی از آن استفاده می‌شود. تقریبا تمام پزشک‌ها به تأثیر این رژیم غذایی اذعان دارند و دیگر تردیدی در این زمینه وجود ندارد. چگونه در طی ۱۵ سال چنین تغییر رادیکالی برای درک تأثیر این درمان رخ داده است؟ آیا یک سخنرانی در یک نشست بین‌المللی بوده است؟ یا یک حمایت گروهی؟ و یا یک پوشش تلویزیونی؟ قطعا تمام موارد ذکرشده در این پذیرش همگانی کمک کرده است اما مهم‌ترین تأثیر را تحقیق و اثبات علمی داشته است.
در این کتاب شما در می‌یابید که چگونه رژیم غذایی اَتکینز در یک چهارچوب علمی از یک مد زودگذر به یک درمان تأثیرگذار و سالم تبدیل شده است. این کتاب هم‌چنین بینش باارزشی را برای انجام صحیح رژیم غذایی اَتکینز به‌طور ساده‌تر برای عموم مردم به همراه دارد و سبک زندگی همراه با قند کمتر را به شما می‌آموزد. به‌زودی متوجه می‌شوید که آنچه که در دستان خود گرفته‌اید چیزی بیش از یک کتاب ساده رژیم غذایی است. خلاصه صدها تحقیق و بررسی دکتر استفان دی. فینی، دکتر اریک سی. وستمن و دکتر جف. اس. ولک در بهترین مجله‌های پزشکی و همین‌طور بیش از ۵۰ مقاله بین‌المللی این سه متخصص در زمینه مبارزه با چاقی، کلسترول بالا و دیابت نوع ۲ مبنی بر برتری رژیم غذایی با قند پایین بر رژیم غذایی با چربی پایین در این کتاب یافت می‌شود. ',
                'product_user_insert' => $user,
                'isDelete' => '0',
                'created_at'=>'2018/6/8'
            ]);
            DB::table('products')->insert([
                'title' => '۱۰ فرق عمده‌ی كارآفرينان و كارمندان',
                'slug' => '۱۰ فرق عمده‌ی كارآفرينان و كارمندان',
                'product_categories' => $cat1,
                'product_statuses' => $statuses,
                'product_authors' => $authors1,
                'product_translators' => $translators1,
                'product_sizes' => $sizes1,
                'product_volume_types' => $volume1,
                'product_publishers' => $publishers1,
                'product_languages' => $languages1,
                'pages_num' => '200',
                'release_date' => '2018/2/5',
                'print_round' => '11',
                'ISBN' => '123123-12313-12312',
                'dimension_length' => '20',
                'dimension_width' => '30',
                'dimension_height' => '40',
                'product_measurement_units' => $measurement1,
                'weight' => '450',
                'product_weight_units' => $weight1,
                'price' => '450000',
                'product_cost_units' => $cost2,
                'picture' => '5970_39296_normal.jpg',
                'body' => 'این‌طور که من دیده‌ام، نوبت به پول که می‌رسد، مهم‌ترین فرق بین غنی و فقیر در ذهنیت آدم‌هاست. درحقیقت، می‌خواهم بگویم به‌عنوان مقیاسی برای آینده‌ی مالی‌تان، ذهنیت شما مهم‌تر از حساب بانکی شماست. فردی غنی با ذهنیت فقیرانه به احتمال بسیار ثروت خود را از دست خواهد داد. برعکس، خیلی‌ها که امروز پولدارند، از صفر شروع کرده‌اند، یعنی آه در بساط نداشته‌اند، اما شوق پولدارشدن داشته‌اند و طوری خود را تربیت کرده‌اند که ذهنیت پولدارها را داشته باشند. این افراد با ذهنیتی غنی می‌دانستند که حتی اگر دچار شکست مالی شوند، نه‌تنها می‌توانند، بلکه حتما دوباره سرپا خواهند ایستاد و آن ثروت را دوباره به چنگ خواهند آورد. آنها اهمیت کارآفرینی را درک می‌کنند.
شما کتابی در دست دارید که در سفرتان به سوی تبدیل‌شدن به کارآفرینی موفق می‌تواند برگ برنده‌ی شما باشد. ',
                'product_user_insert' => $user,
                'isDelete' => '0',
                'short_description'=>'asdasdasd',
                'created_at'=>'2018/6/9'
            ]);
            DB::table('products')->insert([
                'title' => 'صبح جادویی: شش عادتی که با انجام‌ آن‌ها قبل از ساعت ۸ صبح زندگیتان متحول خواهد شد‌...',
                'slug' => 'صبح جادویی: شش عادتی که با انجام‌ آن‌ها قبل از ساعت ۸ صبح زندگیتان متحول خواهد شد‌...',
                'product_categories' => $cat1,
                'product_statuses' => $statuses,
                'product_authors' => $authors1,
                'product_translators' => $translators1,
                'product_sizes' => $sizes1,
                'product_volume_types' => $volume1,
                'product_publishers' => $publishers1,
                'product_languages' => $languages1,
                'pages_num' => '200',
                'release_date' => '2018/2/5',
                'print_round' => '11',
                'ISBN' => '123123-12313-12312',
                'dimension_length' => '20',
                'dimension_width' => '30',
                'dimension_height' => '40',
                'product_measurement_units' => $measurement1,
                'weight' => '450',
                'product_weight_units' => $weight1,
                'price' => '350000',
                'product_cost_units' => $cost1,
                'picture' => '79101_10945_normal.jpg',
                'body' => '«اگر آماده‌اید که معمولی بودن را پشت سر بگذارید و نیروهای بالقوه‌تان را به حد اعلی برسانید، فقط این کتاب را بخوانید. کتاب صبح جادویی کلیدی را در اختیار شما قرار می‌دهد تا به کمک آن قفل قدرت شخصی‌تان را باز کنید و از توانایی‌هایی بهره‌برداری کنید که موجب می‌شوند مردم عادی، مردمی فوق‌العاده و غیرعادی شوند. قویاً توصیه می‌کنم این کتاب را بخوانید و صبح جادویی خودتان را کشف کنید.»
گیلین گودوین
یکی از الهام‌بخش‌ترین اشخاص توئیتر در سال ۲۰۰۹ و بنیان‌گذار
www.InspireMeToday.com

«کتاب صبح جادویی یک منجی پیشرفت شخصی است. ابزاری است که به شما کمک می‌کند تا همه‌ی ابزارهای دیگر را در جای خودشان قرار دهید. من زندگی و مردم را خیلی جدی نمی‌گرفتم، اما کتاب صبح جادویی به عنوان مهم‌ترین اسلحه‌ی شما علیه شکست، لایق توجه‌ای مشتاقانه است.»
جان برگاف
مدیرفروش ویتامیکس',
                'short_description'=>'asdasdasd',
                'product_user_insert' => $user,
                'isDelete' => '0',
                'created_at'=>'2018/6/10'
            ]);

            DB::table('products')->insert([
                'title' => 'تختت را مرتب کن : کارهای کوچکی که شاید زندگی‌تان و حتی دنیا را متحول کند',
                'slug' => 'تختت را مرتب کن : کارهای کوچکی که شاید زندگی‌تان و حتی دنیا را متحول کند',
                'product_categories' => $cat1,
                'product_statuses' => $statuses,
                'product_authors' => $authors1,
                'product_translators' => $translators1,
                'product_sizes' => $sizes1,
                'product_volume_types' => $volume1,
                'product_publishers' => $publishers1,
                'product_languages' => $languages1,
                'pages_num' => '200',
                'release_date' => '2018/2/5',
                'print_round' => '11',
                'ISBN' => '123123-12313-12312',
                'dimension_length' => '20',
                'dimension_width' => '30',
                'dimension_height' => '40',
                'product_measurement_units' => $measurement1,
                'weight' => '450',
                'product_weight_units' => $weight1,
                'price' => '350000',
                'product_cost_units' => $cost2,
                'short_description'=>'asdasdasd',
                'picture' => '79813_36988_normal.jpg',
                'body' => 'کتاب «تختت را مرتب کن» یکی از کتاب‌های پرفروش نیویورک تایمز است. دریاسالار «ویلیام مک‌ریون» این کتاب را بر اساس سخنرانی معروفش در آکادمی تگزاس که در اینترنت بیش از ده میلیون بازدید داشت، نوشته است. اواخر ماه می سال ۲۰۱۴ او در آخرین روز کلاس خود، در آکادمی تگزاس در آستین سخنرانی کرد. مک‌ریون با الهام از شعار دانشگاه « آنچه که در اینجا شروع می‌شود، جهان را تغییر می‌دهد.» ده‌ها اصل را که در دوره‌های آموزش دریانوردی آموخته بود، با دیگران به اشتراک گذاشت. اصولی که به او کمک کرده بود تا بر چالش‌هایش، نه تنها در نیروی دریایی، بلکه در زندگی شخصی‌اش نیز غلبه کند. این کتاب با توصیه‌های کاربردی‌اش می‌تواند در تاریک‌ترین لحظات زندگی، الهام‌بخش شما باشد.
اگر توان مقابله با مشکلات زندگی را ندارید، اگر تصور می‌کنید این همه سختی و مشقت حق شما نبوده، اگر حس می‌کنید به بن‌بست رسیده‌اید، و اگر دوست دارید پیشرفت را تجربه کنید، این کتابِ کوتاه و الهام‌بخش را از دست ندهید.',
                'product_user_insert' => $user,
                'isDelete' => '0',
                'created_at'=>'2018/6/11'
            ]);
        }
        $address=DB::table('contact_us_addresses')->insertGetId([
            'name' => 'دفتر مرکزی',
            'address' => 'تهران بزرگراه لشگری  شیشه مینا',
            'lat_google' => '35.704034',
            'long_google'=>'51.280035'
        ]);
        $address1=DB::table('contact_us_addresses')->insertGetId([
            'name' => 'دفتر شعبه سعادت آباد',
            'address' => 'تهران سعادت آباد',
            'lat_google' => '51.280035',
            'long_google'=>'35.704034'
        ]);

        $C1=DB::table('contact_us_tell_and_emails')->insertGetId([
            'name' => 'فکس',
            'value' => '02184584588',
            'type' => '0',
        ]);
        $C2=DB::table('contact_us_tell_and_emails')->insertGetId([
            'name' => 'دفتر شعبه سعادت آباد',
            'value' => '0215585845',
            'type' => '0',
        ]);
        $C3=DB::table('contact_us_tell_and_emails')->insertGetId([
            'name' => 'ایمیل',
            'value' => 'test@test.com',
            'type' => '1',
        ]);


        $C3=DB::table('contact_uses')->insertGetId([
            'Description' => 'asd as das das das dasd asd asd asd asd asd',
            'main_address' => $address,
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}

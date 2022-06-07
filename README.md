# Lotere Amnida: Aplikasi Voting Sederhana
## Konsep
Lotere Amnida adalah aplikasi voting sederhana berbasis Laravel. 

Terdapat 2 peran yaitu User dan Admin. 
Seorang user dapat: 
1. Melihat artikel 
2. Melihat kategori artikel
3. Melakukan voting 
4. Melihat list kandidat dan detail kandidat
5. Melihat hasil voting yang telah dilakukan
6. Mendapatkan email verifikasi

Seorang admin dapat: 
1. Manajemen kandidat (Create, Read, Update, Delete)
2. Melihat statistik voting dan user (Tidak dapat melihat siapa yang melakukan voting)
3. Mendapatkan email jumlah registrasi dan jumlah voting


## Required
### Laravel route, controller and middleware
#### Route
**Lokasi:** Route yang digunakan terdapat pada [routes/web.php](/routes/web.php)

Route digunakan untuk melakukan routing controller dan view pada website seperti untuk mengakses data kandidat, melakukan voting, melihat statistik dan artikel. Routing yang diberikan juga sudah disesuaikan dengan role user yaitu admin/tidak, sehingga yang dapat mengakses hanya yang memiliki peran yang telah ditentukan.

Contoh: 
```php
Route::get('/home', function () {
    if (Gate::allows('is-admin')) {
        return redirect('/kandidat');
    } else {
        return redirect('/articles');
    }
});
Route::get('/', function () {
    if (Gate::allows('is-admin')) {
        return redirect('/kandidat');
    } else {
        return redirect('/articles');
    }
});
```
Hanyalah admin yang dapat mengakses routing untuk kandidat. Apabila bukan merupakan admin, akan langsung ke-redirect ke routing articles. 


#### Controller
**Lokasi** : Controller-controller yang digunakan terdapat pada [app/Http/Controllers](app/Http/Controllers)

Terdapat beberapa fitur utama pada website yaitu: 
1. Management Kandidat
2. Pemilihan/Voting
3. Melihat statistik
4. Melihat artikel

Controller-controller yang digunakan: 
1. [ArticlesController](app/Http/Controllers/ArticlesController.php) - Digunakan untuk mengontrol artikel dari penampilan artikel menggunakan Cache, penampilkan masing-masing artikel
2. [KandidatController](app/Http/Controllers/KandidatController.php) - Digunakan untuk membuat, menambah, mengedit, dan menghapus (CRUD) data-data kandidat
3. [LocalizationController](app/Http/Controllers/LocalizationController.php) - Digunakan untuk mengatur localization
4. [StatsController](app/Http/Controllers/StatsController.php) - Digunakan untuk mengontrol data-data yang akan ditampilkan pada view Stats
5. [VotingController](app/Http/Controllers/VotingController.php) - Digunakan untuk mengelola data-data voting yaitu menampilkan voting dan hasil voting setiap orang. 

#### Middleware
**Lokasi:** Middleware yang digunakan dapat dilihat di [app/Http/Middleware](app/Http/Middleware)

Selain middleware-middleware bawaan, middleware juga digunakan untuk melakukan [Localization](app/Http/Middleware/Localization.php) yaitu mengecek session dan melakukan setLocale. 

### Laravel request, validation and response
#### Request
**Lokasi** : Dikarenakan request banyak digunakan untuk controller [app/Http/Controllers](app/Http/Controllers)

Request pada website digunakan untuk mengambil input dan file dari form Kandidat dan Voting untuk kemudian disimpan ke dalam database setelah dilakukan validasi. Request digunakan juga untuk mengupdate data. 

#### Validation
**Lokasi:** 
1. [Kandidat Controller](app/Http/Controllers/KandidatController.php)
2. [view Kandidat](resources/views/kandidat/create-kandidat.blade.php)

Validation digunakan pada beberapa form seperti form menambah dan mengedit kandidat. Validation dapat dilihat pada [Kandidat Controller](app/Http/Controllers/KandidatController.php) untuk mengecek validasi dari input dan juga [view Kandidat](resources/views/kandidat/create-kandidat.blade.php). Beberapa contoh validation yang digunakan yaitu seperti berikut: 

<img src="/images/validation.PNG" width="500"/>
#### Response
**Lokasi:**
1. [Kandidat Controller](app/Http/Controllers/KandidatController.php)
2. [view Kandidat](resources/views/kandidat/list-kandidat.blade.php)

Response digunakan untuk menampilkan message dan redirect apabila data kandidat berhasil ditambah/ubah/hapus. Untuk response sendiri terdapat pada pada [Kandidat Controller](app/Http/Controllers/KandidatController.php) untuk mengirimkan response menuju view dan juga [view Kandidat](resources/views/kandidat/list-kandidat.blade.php)


Contoh dari implementasi response yaitu:
```php
// contoh dari penggunaan response Redirect
return redirect()->route('kandidat.list-kandidat')->with('tambah_data', 'Penambahan Pengguna berhasil');
return redirect()->route('kandidat.list-kandidat')->with('edit_data', 'Pengeditan Data berhasil!');
return redirect()->route('kandidat.list-kandidat')->with('hapus_data', 'Penghapusan data berhasil');
```



### Laravel model, eloquent and query builder
#### Model
**Lokasi:** [app/Http/Models](app/Http/Models)

Terdapat beberapa model yang diimplementasikan pada website yaitu:
1. [Article](app/Http/Models/Article.php)
2. [Category](app/Http/Models/Category.php)
3. [Kandidat](app/Http/Models/Kandidat.php)
4. [User](app/Http/Models/User.php)
5. [Voting](app/Http/Models/Voting.php)

Model-model di atas digunakan untuk menyimpan fungsi-fungsi eloquent yang akan digunakan. 

#### Eloquent
**Lokasi:** 
1. [app/Http/Models](app/Http/Models)
2. [app/Http/Controllers](app/Http/Controllers)

Beberapa eloquent yang digunakan pada website adalah: 
1. Artikel - Category
```php
// 1 artikel memiliki 1 category, 1 category memiliki banyak artikel. 

// di dalam model Artikel
 public function category(){
        return $this->belongsTo(Category::class);
    }
    
// di dalam model Category
  public function articles(){
        return $this->hasMany(Article::class);
    }
```

2. Voting - User - Kandidat
```php 
// 1 (hasil) voting memiliki 1 kandidat dan 1 user. 1 user hanya dapat memiliki 1 hasil voting, dan 1 kandidat dapat memilii banyak hasil voting.

// di dalam model Voting
public function kandidat(){
        return $this->belongsTo(Kandidat::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

// di dalam model Kandidat
 public function voting(){
        return $this->hasMany(Voting::class);
    }
    
// di dalam model User
 public function voting(){
        return $this->belongsTo(Voting::class);
    }
```

Di karenakan eloquent ini, di dalam tabel Voting, terdapat foreign key untuk kandidat_id dan user_id. 

Adapun selain itu, model-model juga terhubung dengan tabel dengan menggunakan Migrations, yang dapat dilihat pada [database/migrations](database/migrations)

Dikarenakan Eloquent juga dapat digunakan sebagai Query Builder, untuk mengakses data-data pada database mayoritas menggunakan Eloquent yaitu seperti berikut: 
```php
// untuk membuat category baru
  Category::create([
    'name' => 'Berita Terkini',
    slug' => 'berita-terkini'
    ]);
 
 // untuk mencari kandidat dengan id tertentu
 $kandidat = Kandidat::where('id', $id)->first();
 
 // untuk mencari apakah id tersebut berada pada database. apabila tidak ada, akan mereturn error
 $kandidat = Kandidat::findOrFail($id);
 
// untuk mencari user yang dibuat/mendaftar pada hari itu
 $userToday = User::whereDate('created_at', Carbon::today())->get();
 
 // untuk mencari apakah id tersebut berada pada database/tidak. apabila tidak ada, akan mereturn 0
 $hasVoted= Voting::where('user_id', $id)->first();
 
 
'''

#### Query Builder
**Lokasi:** [app/Http/Controllers](app/Http/Controllers)

Query banyak digunakan pada Controller untuk mengambil data dari database untuk ditampilkan pada view. Query-query yang digunakan adalah sebagai berikut: (untuk file berada pada controller masing-masing)

1. Untuk mengambil data pada artikel dan membagi menjadi 10 per halaman
```php
 DB::table('articles')->paginate(10);
```

2.Mengambil data-data user dari yang paling terbaru dan menghitung totalnya
```php
        $user = Cache::remember('users', 60, function () {
            return DB::table('users')->latest()->get();
        });
        
        // // get USER for all
        // $user = User::all();
        $user_count = $user->count();
```

3. Melakukan seeding
```php

        DB::table('voting')->insert([
            'user_id' => '1',
            'kandidat_id' => '1'
        ]);
 ```
 
Kebanyakan querybuilder yang digunakan pada project menggunakan Eloquent, yang dapat dilihat di atas. 

### Laravel authentication and authorization
#### Authentication
**Lokasi:**
1. Fortify: [app/Actions/Fortify](app/Actions/Fortify)
2. FortifyServiceProvider: [FortifyServiceProvider.php](app/Providers/FortifyServiceProvider.php)
3. config: [fortify.php](config/fortify.php)

Untuk Authentication menggunakan package Laravel Fortify. Laravel Fortify adalah package yang menyediakan implementasi backend untuk autentikasi di Laravel meliputi login, register, dll. Laravel Fortify tidak menyediakan user interface seperti Laravel Breeze sehingga lebih leluasa untuk menentukan teknologi bagian frontend-nya. Selain itu, Laravel Fortify juga tidak mengubah controller dan routing yang sudah ada sebelumnya.

Fitur yang digunakan: Login dan Register.

Berikut adalah contoh kode dari Laravel Fortify yang terdapat pada [CreateNewUser.php](app/Actions/Fortify/CreateNewUser.php):
```php
public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
```

#### Authorization
**Lokasi:**
1. [AuthServiceProvider.php](app/Providers/AuthServiceProvider.php)
Menambahkan gate yang mendeteksi 3 jenis pengguna, yaitu admin, user, dan not admin(guest dan user).
```php
        Gate::define('is-admin', function ($user) {
            if ($user->isAdmin) {
                return true;
            }
        });

        Gate::define('is-user', function ($user) {
            if (!$user->isAdmin) {
                return true;
            }
        });

        Gate::define('not-admin', function (?User $user) {
            if (Auth::guest() || Auth::user() && !Auth::user()->isAdmin) {
                return true;
            }
        });
```
2. [Routing](routes/web.php)
Melakukan pengecekan gate didalam routing dengan menggunakan middleware (can:)
```php
Route::group(['prefix' => 'kandidat', 'as' => 'kandidat.', 'middleware' => 'can:is-admin'], function () {
    Route::get('/', [KandidatController::class, 'index'])->name('list-kandidat');
    .............................
});

```

Authorization yang digunakan adalah menggunakan Gate dan dilakukan pengecekan di controller. Pengguna dibagi menjadi 3 jenis, yaitu admin, user, dan not admin(guest dan user).


### Laravel localization and file storage
#### Localization
**Lokasi:**
1. Untuk file bahasa: [resources](resources/lang)
2. Untuk controller: [app/Http/Controllers/LocalizationController](app/Http/Controllers/LocalizationController.php)
```php
    public function index($locale){
        App::setlocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
 ```
3. Untuk middleware: [app/Http/Middleware/Localization](app/Http/Middleware/Localization.php)
```php

4. Untuk route: [routes/web.php](routes/web.php)
```php
Route::get('lang/{locale}', [LocalizationController::class, 'index']);
```
 public function handle(Request $request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        }
        return $next($request);
    }
```

5. Untuk view: [resources\views\layouts](resources\views\layout)
```php
                    <ul class="navbar-nav navbar-align">
                        <ul class="navbar-nav ml-auto">
                            @php $locale = session()->get('locale'); @endphp
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    @switch($locale)
                                        @case('en')
                                            EN
                                        @break

                                        @case('id')
                                            ID
                                        @break

                                        @default
                                            ID
                                    @endswitch
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="lang/en">EN</a>
                                    <a class="dropdown-item" href="lang/id">ID</a>
                                </div>
                            </li>
                        </ul>
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
                            @auth
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                    data-bs-toggle="dropdown">
                                    <span class="text-dark">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit" name="logout">Log Out</button>
                                    </form>
                                </div>
                            @else
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                    data-bs-toggle="dropdown">
                                    <span class="text-dark">Profile</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('login') }}">Log In</a>
                                </div>
                            @endauth

                        </li>
                    </ul>
```


Localization digunakan pada beberapa fitur yaitu untuk menambah kandidat, melihat kandidat, menampilkan pesan validasi, melihat statistik dan pada navbar. Localization yang digunakan yaitu 3 bahasa: Bahasa Indonesia (sebagai default) dan Bahasa Inggris. 

Localization juga memanfaatkan adanya session. 

#### File Storage
**Lokasi:** [Kandidat Controller](app/Http/Controllers/KandidatController.php)


File storage digunakan untuk menyimpan dan mengambil foto Kandidat pada database. Sebelumnya, untuk mengakses file storage sudah menggunakan `php artisan storage:link`agar storage dapat diakses melalui public sesuai dengan kepentingan. 

Adapun contoh pemakaian file storage yaitu:
```php

// untuk menyimpan foto pada database
$path = $request->file('photo')->storeAs('public/images', $fileNameToStore);

// untuk menghapus gambar pada database
Storage::disk('public')->delete('images/' . $kandidat->photo);

// untuk mengakses gambar
src="{{ asset('storage/images/'. $d->photo) }}"

```


### Laravel view and blade component
**Lokasi:** [View](resources\views) 

View dan blade digunakan untuk menampilkan data dengan interface yang lebih ramah mata. Penggunaan view dan blade sangatlah banyak. Ada beberapa contoh penggunaan juga seperti penggunaan associative array untuk mengirimkan data kepada view, dan juga menggunakan compact. Untuk ini diatur pada Controller terkait. 

Contoh penggunaan associate array: 
```php
return view('stats', [
            'registered_count' => $user_count,
            'voting_count' => $voting_count,
            'hasNotVoted' => $hasNotVoted,
            'registered_today_count' => $userToday_count,
            'voted_today_count' => $votingToday_count,
            'hasNotVotedPercent' => $hasNotVotedPercent
        ]);
```

### Laravel session and caching
#### Session
**Lokasi:** 
1. [Untuk Lokalisasi](app/Http/Controllers/LocalizationController.php)
2. [Untuk View](resources/views/kandidat/list-kandidat.blade.php)


Session menyediakan fitur untuk menyimpan informasi tentang aktifitas user yang melakukan request. Session pada kali ini digunakan untuk melakukan localization untuk menyimpan data `locale` yang sebelumnya dan untuk menampilkan success message dengan cara menyimpan data result. 
```php

// untuk menyimpan 'locale'
    public function index($locale){
        App::setlocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
    
// untuk menyimpan data result
 @if (Session::has('tambah_data'))
                <div class="alert alert-success alert-dismissible fade show p-3 bg-success w-100" role="alert">
                    <strong><i class="fa fa-check-circle"></i> {{__('form.message.success')}}!</strong>
                    <br>
                    {{__('form.message.add')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (Session::has('edit_data'))
                <div class="alert alert-success alert-dismissible fade show p-3 bg-success w-100" role="alert"> <strong><i class="fa fa-check-circle"></i> {{__('form.message.success')}}!</strong>
                    <br>
                    {{__('form.message.edit')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (Session::has('hapus_data'))
                <div class="alert alert-success alert-dismissible fade show p-3 bg-success w-100" role="alert"> <strong><i class="fa fa-check-circle"></i> {{__('form.message.success')}}!</strong>
                    <br>
                    {{__('form.message.delete')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
```

#### Caching
**Lokasi**: 
1. [Cache pada Statistik](app/Http/Controllers/StatsController.php)
2. [Cache pada Articles](app/Http/Controllers/ArticlesController.php)

Cache digunakan untuk menyimpan data-data user selama 60 menit. 
```php
        $user = Cache::remember('users', 60, function () {
            return DB::table('users')->latest()->get();
        });
```

Selain itu, cache juga digunakan untuk menyimpan data-data articles selama 60 menit.
 ```php
         $articles = Cache::remember('articles', 60, function () {
            return DB::table('articles')->paginate(10);
        });
 ```

 

### Laravel feature testing and unit testing
### Unit testing
**Lokasi:** [Unit Testing](tests\Unit)

Unit testing dilakukan untuk 3 fitur yaitu Article, Kandidat dan Voting. 

1. Untuk [Article](tests\Unit\Article\ArticleControllerTest.php), unit testing yang dilakukan yaitu mengecek routing. 
```php
    public function test_article()
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
    }

    public function test_article_detail()
    {
        $response = $this->get('/categories');
        $response->assertStatus(200);
    }
```
2. Untuk [Kandidat](tests\Unit\Article\KandidatControllerTest.php), unit testing yang dilakukan yaitu melakukan pengecekan database dan CRUD. 
```php
    public function test_example()
    {
        $this->withoutExceptionHandling();

        $kandidat = Kandidat::create(["nama" => "Afif","keterangan" => "Ini buat coba-coba", "slug" => "afif",  "photo" => "noimage.jpg"]);
        $this->assertDatabaseHas('kandidats', [
                 'nama' => 'Afif','keterangan' => "Ini buat coba-coba", "slug" => "afif", 'photo' => "noimage.jpg"
              ]);

        Kandidat::find($kandidat->id)->update(['nama' => 'Andra','keterangan' => "Kandidat Nomor 1", "slug" => "andra", 'photo' => "noimage.jpg"]);
        $this->assertDatabaseHas('kandidats', [
             'nama' => 'Andra','keterangan' => "Kandidat Nomor 1", "slug" => "andra", 'photo' => "noimage.jpg"
              ]);

        Kandidat::destroy($kandidat->id);
        $this->assertDatabaseMissing('kandidats', [
             'nama' => 'Andra','keterangan' => "Kandidat Nomor 1", "slug" => "andra", 'photo' => "noimage.jpg"
              ]);

        
    }
```
3. Untuk [Voting](tests\Unit\Article\VotingControllerTest.php), unit testing yang dilakukan yaitu melakukan pengecekan database dan CRUD. 
```php
 public function test_voting()
    {
        $this->withoutExceptionHandling();

        $voting = Voting::create(["user_id" => 2,"kandidat_id" => 2]);
        $this->assertDatabaseHas('voting', [
            "user_id" => 2,"kandidat_id" => 2
            ]);

        Voting::find($voting->id)->update(["user_id" => 3,"kandidat_id" => 4]);
        $this->assertDatabaseHas('voting', [
            "user_id" => 3,"kandidat_id" => 4
              ]);

        Voting::destroy($voting->id);
        $this->assertDatabaseMissing('voting', [
            "user_id" => 3,"kandidat_id" => 4
              ]);

    }
```

Berikut adalah contoh hasil testing dengan menggunakan run `php artisan test`:
<img src="/images/test.PNG" width="500"/>


### Feature testing
**Lokasi:** [Feature Testing](tests\Feature)

Unit testing dilakukan untuk 2 fitur yaitu redirect dari home dan gate di view kandidat.

1. Testing [redirect dari home](tests/Feature/HomeTest.php) melakukan pengecekan apakah user yang mengakses home ter-redirect sesuai role.
```php
    public function test_redirectGuest()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('/articles');
    }

    public function test_redirectUser()
    {
        $user = User::find(2);
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('/articles');
    }

    public function test_redirectAdmin()
    {
        $admin = User::find(1);
        $response = $this->actingAs($admin)->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('/kandidat');
    }
```

2. Testing [gate di view kandidat](tests/Feature/KandidatTest.php) melakukan pengecekan apakah role yang tidak bisa mengakses halaman mendapatkan status "403".
```php
    public function test_guest()
    {
        $response = $this->get('/kandidat');
        $response->assertStatus(403);
    }

    public function test_user()
    {
        $user = User::find(2);
        $response = $this->actingAs($user)->get('/kandidat');
        $response->assertStatus(403);
    }

    public function test_admin()
    {
        $admin = User::find(1);
        $response = $this->actingAs($admin)->get('/kandidat');
        $response->assertStatus(200);
    }
```

Berikut adalah contoh hasil testing dengan menggunakan run `php artisan test`:
<img src="/images/test.PNG" width="500"/>

**Browser Test**

Selain testing dengan fitur bawaan Laravel. Dilakukan juga Browser Testing dengan menggunakan package Laravel Dusk.

**Lokasi:** [Browser Testing](tests/Browser)

Browser testing dilakukan untuk 3 fitur yaitu Register, Login, dan Logout.

1. Testing [Register](tests/Browser/RegisterTest.php) melakukan pengecekan apakah fitur register berjalan dengan lancar.
```php
use DatabaseMigrations;

    public function test_register()
    {
        $this->seed();

        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'testing')
                ->type('email', 'testing@mail.com')
                ->type('password', 'testing123')
                ->type('password_confirmation', 'testing123')
                ->press('register')
                ->assertPathIs('/articles');
        });
    }
```

2. Testing [Login](tests/Browser/LoginTest.php) melakukan pengecekan apakah fitur login berjalan dengan lancar.
```php
use DatabaseMigrations;

    public function test_login()
    {
        $this->seed();

        $user = User::factory()->create([
            'email' => 'test@example.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('login')
                ->assertPathIs('/articles');
        });
    }
```

3. Testing [Logout](tests/Browser/LogoutTest.php) melakukan pengecekan apakah fitur logout berjalan dengan lancar.
```php
use DatabaseMigrations;

    public function test_register()
    {
        $this->seed();

        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'testing')
                ->type('email', 'testing@mail.com')
                ->type('password', 'testing123')
                ->type('password_confirmation', 'testing123')
                ->press('register')
                ->assertPathIs('/articles');
        });
    }
```

Berikut adalah contoh hasil testing dengan menggunakan run `php artisan dusk`:
![image](https://user-images.githubusercontent.com/74708771/172272857-99d974b7-4618-46b3-933d-ed6db3dd3e04.png)


## Optional
### Laravel jobs and queue

Laravel job dan queue diimplementasikan untuk mengirimkan email kepada orang-orang yang telah melakukan registrasi. Email akan dikirimkan apabila user telah menekan tombol 'Sign Up'. 

Email queue sangat efisien ketika kita akan berurusan dengan email dalam jumlah besar. Dia memiliki sistem asinkron yang menempatkan email dalam antrian sebelum mencapai server email. Email diproses dalam batch.

Untuk pengiriman email menggunakan `mailtrap.io`

Hasil yang didapatkan adalah sebagai berikut:

<img src="/images/queue.PNG" width="500"/>

**Lokasi:**
1. [CreateNewUser.php](app/Actions/Fortify/CreateNewUser.php) untuk tempat menaruh dispatch email yang akan dikirimkan. Dikarenakan project menggunakan Fortify, maka email akan dikirimkan apabila user akan disimpan datanya (setelah menakan tombol sign up)
```php
dispatch(new TestEmailJob($user));
```
2. [TesTEmailJob.php](app/Jobs/TestEmailJob.php) untuk menginisialisasi job yang akan dilakukan. 
```php
public function handle()
    {
        $email = new TestEmail($this->user);
        Mail::to($this->user['email'])->send($email);
    }
```
3. [TestEmail.php](app/Mail/TestEmail.php) untuk mengirimkan email. Kelas Mailable bertanggung jawab untuk mengumpulkan data dan meneruskan data itu ke view.
```php
public function build()
    {
        return $this->view('emails.testMailJob');
    }
```

4. [File Migrasi](database/migrations/2022_06_03_090017_create_jobs_table.php) yang didapatkan dari `php artisan queue:table`. 


### Laravel command and scheduling
Laravel command and scheduling digunakan untuk mengirimkan email-email berisi statistik seperti jumlah yang mendaftar di website dan juga jumlah yang sudah melakukan voting. Command kedua ini akan dirun setiap hari. 

**Lokasi:** 
1. Commands : [Commands](app\Console\Commands)
Terdapat 2 command yaitu: 
- `registered:users`untuk mengirimkan email dengan jumlah peserta yang telah mendaftar
```php
    public function handle()
    {
        $totalUsers = DB::table('users')
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->count();

        Mail::to('admin@mail.com')->send(new SendMailable($totalUsers));
    }
```
- `voting:stat` untuk mengirimkan email yang berisi jumlah yang sudah mendaftar hari ini. 
```php
 public function handle()
    {
        $totalVoting = DB::table('voting')
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->count();

        Mail::to('admin@mail.com')->send(new SendVotingMailable($totalVoting));
    }
```


3. Kernel   : [Kernel](app\Console\Kernel.php) untuk melakukan scheduling
```php
//command yang akan digunakan
    protected $commands = [
        'App\Console\Commands\RegisteredUsers',
        'App\Console\Commands\VotingStats',
    ];
    
 // scheduling
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('registered:users')->daily();
        // $schedule->command('voting:stats')->twiceDaily(0, 12);
        $schedule->command('voting:stats')->dailyAt('16:15');
    }
```
3. Email: [Email](app\Mail)
4. View (untuk dikirimkan): [View](resources\views\emails)

Adapun hasil dari email yaitu sebgai berikut apabila menggunakan mailtrap:

<img src="/images/command1.PNG" width="500"/>
<img src="/images/command2.PNG" width="500"/>

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



### Laravel model, eloquent and query builder
### Laravel authentication and authorization
### Laravel localization and file storage
### Laravel view and blade component
### Laravel session and caching
### Laravel feature testing and unit testing

## Optional
### Laravel jobs and queue
### Laravel command and scheduling


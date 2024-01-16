<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## TBD

TBD merupakan aplikasi _website_ yang dibangun untuk Loan Document Bank BTN KC Semarang. Beberapa fitur yang tersedia: 
- Login.
- Dashboard (TBD isinya).
- CRUD berkas peminjaman.

## Teknologi

Aplikasi ini dibangun dengan teknologi pengembangan full-stack TALL, yaitu teknologi yang menggabungkan empat teknologi terkenal untuk mengembangkan aplikasi secara full-stack, yaitu:
- Tailwind
- AlpineJS
- Laravel
- Livewire

Selain empat teknologi tersebut, terdapat juga tambahan teknologi untuk membantu _styling_, yaitu Flowbite.

## Cara Setup

### SETUP LARAVEL

1. Clone project ini ke direktori Anda
2. Pindah ke folder project menggunakan

    ```
    cd <proyek-Anda>
    ```

3. Install composer dengan kode berikut

    ```
    composer install
    ```

4. Salin file `.env.example` dan ubah dengan nama `.env`. Gunakan kode ini agar lebih mudah

    ```
    cp .env.example .env
    ```

5. Buka file `.env` dan sesuaikan konfigurasi database Anda, seperti mengubah nama database pada `DB_DATABASE`, username pada `DB_USERNAME`, dan password pada `DB_PASSWORD`.

    > PERHATIAN! Agar minim error, buat database baru terlebih dahulu pada server MySQL anda, lalu beri nama sesuai keinginan. Pastikan nama database sama dengan _value_ .env pada `DB_DATABASE`.

6. Jalankan perintah ini di terminal

    ```
    php artisan key:generate
    ```

7. Jalankan perintah ini di terminal untuk menghubungkan file foto di `/storage/app/public` ke `/public/storage`

    ```
    php artisan storage:link
    ```

8. Jalankan perintah ini di terminal

    ```
    php artisan migrate:fresh --seed
    ```

### SETUP TAILWIND

1. Jalankan perintah ini di terminal
    ```
    npm install
    ```

### MENJALANKAN APLIKASI

1. Nyalakan Apache dan MySQL pada XAMPP

2. Buka 2 terminal di direktori project

3. Jalankan perintah ini di terminal pertama, **JANGAN TUTUP TERMINAL**

    ```
    php artisan serve
    ```

4. Jalankan perintah ini di terminal kedua, **JANGAN TUTUP TERMINAL**

    ```
    npm run dev
    ```

5. Buka tautan yang dibuat setelah menjalankan `php artisan serve`

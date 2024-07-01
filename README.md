#SEA Salon Application
Aplikasi SEA Salon ini merupakan aplikasi yang dapat digunakan semua orang untuk melakukan reservasi di SEA Salon 

## Features Applikasi 
- Login
- Register
- Dashboard
- Landing Page
- Admin Dashboard & Features

## Tech 
Aplikasi ini dibangun menggunakan :
- VS Code
- PHP
- HTML
- CSS
- JAVASCRIPT


## Installation 
1. Download & install xampp
2. Download file SEA-main (semua file di github).
Pindahkan folder SEA-main ke dalam folder:

```
C:\xampp\htdocs\
```

Start apache pada XAMPP Control Panel 

## Create Database 
**PENTING! JANGAN SALAH/TYPO DALAM PENAMAAN TABLE DAN COLUMN.**

**PENTING! SEMUA COLUMN HARUS DIBERI LENGTH "80" dan JENIS "VARCHAR".**
1. Buka database di http://localhost/phpmyadmin
2. Buat 1 stucture/database bernama "sea_salon reservation"
3. Isi database tersebut dengan 5 table -> [branch, customers, reservationdb, reviews, services]
4. Isi Table "branch" dengan column -> [Name, Location, OpeningTime, ClosingTime]
5. Isi Table "customers" dengan column -> [FullName, Email, PhoneNumber, Password]
6. Isi Table "reservationdb" dengan column -> [Email, PhoneNumber, Service, Date, Time, Location]
7. Isi Table "reviews" dengan column -> [Name, Rating, Feedback]
8. Isi Table "services" dengan column -> [Location, Services, Duration]
10. Edit Column "Email" pada table "customers" menjadi unique
11. Database siap digunakan

## Database's Function 
- branch = Untuk melihat cabang2 SEA Salon beserta informasinya
- customers = List customers/pengguna beserta informasinya
- reservationdb = List reservasi beserta informasinya
- reviews = Review pengguna
- services = List services yang ada pada cabang2 SEA Salon

Akses aplikasi/website pada browser dengan url 

```
http://localhost/SEA-main
```


## Credit 
```
Moses Nathanael 
```

Thankyou for using our application. We hope you enjoy it. 

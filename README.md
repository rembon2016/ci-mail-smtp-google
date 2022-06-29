# CodeIgniter dengan Mail SMTP Google

# Install
> composer install

# Setting App Password SMTP Google
1. login akun google yg akan dijadikan email master 
2. klik pada avatar akun di pojok kanan atas dan klik "Manage your Google Account"
3. lakukan pencarian pada search box di tengah atas halaman "app password" dan pilih "App Passwords / Security"
4. setelah itu akan diminta memasukkan password akun google lagi
5. pada bagian "Select the app and device you want to generate the app password for." 
  - pada bagian "select app" pilih "Mail"
  - pada bagian "select device" pilih "Other (Custom Name)"
6. klik "GENERATE"
7. Catat 16 digit App Password untuk dimasukkan pada variable $config['smtp_pass'] sebagai pengganti password akun

# Run
> php -S localhost:8000 index.php

# Test kirim Email
buka url berikut pada browser
> http://localhost:8000/index.php/email/send

# jwt-basic-php
Dasar Penggunaan JWT token pada PHP

Pertama silakan Clone/download project ini,
Lalu pindahkan ke folder htdocs masing masing komputer sobat.

Buka Postman Lalu akses http://localhost/jwt-basic-php/generate_token.php untuk mendapatkan token jwt.

    contoh hasil generate code :
    eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMSIsImVtYWlsIjoic3VrdW4wMjRAZ21haWwuY29tIn0.hbPOjlo_QzvUNttFqPqbWGmRg4mL3K0hp1FgV_U7NWs

Lalu ubah link menjadi http://localhost/jwt-basic-php/cek_token.php dan tambahkan di tab header 

    key : Authorization
    value : eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF91c2VyIjoiMSIsImVtYWlsIjoic3VrdW4wMjRAZ21haWwuY29tIn0.hbPOjlo_QzvUNttFqPqbWGmRg4mL3K0hp1FgV_U7NWs

Keterangan : value adalah kode token hasil generate,dan Authorization adalah nama untuk token nya.

jika kode token sesuai maka akan muncul hasil json berikut :

    {
        "id_user": "1",
        "email": "sukun024@gmail.com",
        "code": 200
    }

jika kode token tidak sesuai maka akan muncul seperti berikut :

    {
        "message": "Unauthroizhed",
        "code": 401
    }


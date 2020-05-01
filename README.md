# jwt-basic-php

Dasar Penggunaan JWT token pada PHP

Pertama silakan Clone/download project ini,
Lalu pindahkan ke folder htdocs masing masing komputer sobat.

Buka Postman Lalu akses http://localhost/jwt-basic-php/generate_token.php, kemudian pilih tab body lalu pilih raw dan di dropdown pilih JSON. lalu masukkan JSON berikut.

    {
        "email" : "sukun024@gmail.com",
        "password" : "123456"
    }

Lalu akan mendapatkan response

    {
        "message":"Success",
        "code":200,"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InN1a3VuMDI0QGdtYWlsLmNvbSIsInBhc3N3b3JkIjoiMTIzNDU2IiwiZXhwaXJlX2RhdGUiOiIyMDIwLTA1LTAzIn0.iKmtdI9fvYpoyQs-APxhnvv6SYscbMMY-ffvVTiaPUM"
    }

Copy token tersebut.

Lalu ubah link menjadi http://localhost/jwt-basic-php/cek_token.php . Lalu di tab Authorization pilih API Key lalu tambahkan.

    key : Authorization
    value : eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InN1a3VuMDI0QGdtYWlsLmNvbSIsInBhc3N3b3JkIjoiMTIzNDU2IiwiZXhwaXJlX2RhdGUiOiIyMDIwLTA1LTAzIn0.iKmtdI9fvYpoyQs-APxhnvv6SYscbMMY-ffvVTiaPUM

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

jika kode token sesuai namun kadaluarsa (lewat 1 menit) maka akan muncul seperti berikut :

    {
        "message": "Token Expired",
        "code": 401
    }

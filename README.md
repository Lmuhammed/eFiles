in php.ini in your env : 

; Maximum allowed size for uploaded files.
upload_max_filesize = 10M 

; Must be greater than or equal to upload_max_filesize
post_max_size = 10M 

===========
php artisan dn:seed

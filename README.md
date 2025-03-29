in php.ini in your env : 

; Maximum allowed size for uploaded files.
upload_max_filesize = 10M 

; Must be greater than or equal to upload_max_filesize
post_max_size = 10M 

===========
php artisan db:seed
 
 ==========

next Improvements :
must :
- more robust  authorization Using policies for each Model
- remove department from admin & manager
- refactor UI to use more Component
- create profile containig accout info for each user
- show all users for each department in admin panel
- make form request error fr 

optional :


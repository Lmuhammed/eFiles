in php.ini in your env : 

; Maximum allowed size for uploaded files.
upload_max_filesize = 10M 

; Must be greater than or equal to upload_max_filesize
post_max_size = 10M 

===========
php artisan db:seed
 
 ==========

next Improvements :
- more robust  authorization Using policies for each Model
- remove department from admin & manager
- refactor UI to use more Component
- make self registerd users inactive so can admin made active
- create profile containig accout info for each user
- show all users for each department in admin panel
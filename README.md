# laravel_docker
**Project quản lý thông tin khách hàng xây dựng bằng laravel chạy trên môi trường docker**
- -> Các bước để chạy project: 
- Cần có Docker, Docker compose, Composer, PHP >=7.4
- Clone project về thư mục bất kỳ
- Cấu hình file env 
- (Database theo tên container trong file compose tức DB_HOST=mysql, database=firegroup,DB_USERNAME=root,DB_PASSWORD=password) // nếu muốn đổi phải cấu hình lại docker
- Chạy lệnh 'composer install' trong thư mục 'src/laravel_docker'
- Chạy lệnh 'php artisan key:generate' trong thư mục 'src/laravel_docker' nếu chưa có key trong file ENV
- Dùng Terminal chạy lệnh 'docker-compose build && docker-compose up -d' trên thư mục vừa clone
- -> Những lệnh sau đầy cần chạy trong container vì cần kết nối tới db nên phải dùng câu lệnh exec của docker-compose.
- Chạy lệnh 'docker-compose exec php php /var/www/html/laravel-docker/artisan migrate'
- Tiếp tục chạy lệnh 'docker-compose exec php php /var/www/html/laravel-docker/artisan db:seed --class=CustomserSeeder'
- Sau đó vào port đã cấu hình cho nginx và sử dụng: http://localhost:8088 thêm '/customer' phía sau để vào quản lý thông tin khách hàng
-                                               ** Cảm ơn vì đã đọc file readme trước khi sử dụng.**

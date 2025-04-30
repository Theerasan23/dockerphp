# ขั้นตอนการใช้งานแบบ docker 
#### _เข้าไปโปรเจคแล้วรัน_
```bash
docker compose up -d
```
#### _หากมีการแก้ไข code_
```bash
docker compose up  --build -d
```
#### _หรือ_
```bash
docker compose up  --build {ชื่อ container} -d
```

####  การเชื่อมต่อฐานข้อมูล ใน .env
```bash
MYSQL_SERVER='mysql' # หากไม่ได้รันที่ docker ให้ใช้ ip ของ  server หรือเครื่องที่รัน ฐานข้อมูล
MYSQL_USER="admin"
MYSQL_ROOT_PASSWORD="12345"
MYSQL_PASSWORD='12345'
MYSQL_DATABASE="SYSTEM_DB" # เปลี่ยนเป็นฐานข้อมูลที่ต้องการ 
```

docker compose file  | หากเชื่อมต่อฐานข้อมูลที่มีอยู่ ให้ทำการลบ หรือ comment ส่วนของ db  นี้ออก เพื่อไม่ให้ระบบสร้างฐานข้อมูลใหม่ 
```bash
  # db:
  #   container_name: mysql
  #   image: mysql:latest
  #   restart: always
  #   ports:
  #     - "60001:3306"
  #   environment:
  #     MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD}
  #     MYSQL_USER: ${MYSQL_USER}
  #     MYSQL_PASSWORD: ${MYSQL_PASSWORD}
  #     MYSQL_DATABASE: ${MYSQL_DATABASE}
  #   volumes:
  #     - database_data:/var/lib/mysql
  #   networks:
  #     - theerasan-networkองการ 
```
และ 
```bash
  # volumes:
  # database_data:
```

## การใช้งานเบื่องต้น 

สร้าง หน้าใหม่ ให้สร้างไฟล์ที่ page และเพิ่ม route ที่ controller/layout.php 

```php
 switch ($route) {
        case 'home':
            require 'page/home.php';
            break;
        case 'about':
            require 'page/about.php';
            break;
        case 'c':
            require 'page/cc.php';
            break;
        case 'contact':
            require 'page/contact.php';
            break;
        //เพิ่มหน้าใหม่
         case 'ชื่อ route':
            require 'page/{ชื่อไฟล์}.php';
            break;   
        //
        case '404':
        default:
            require 'page/404.php';
            break;
    }
```
### Path ที่อยู่ใน docker
```bash
/var/www/html/www/
```
#### ติดตั้ง tailwind
ติดให้ nodejs ให้แล้วเสร็จก่อนรั้นคำสั่ง
[https://nodejs.org/en](https://nodejs.org/en)
รันคำสั่ง
```bash
cd www

npm install
```

### build tailwind 
### ระบบใช้ tailwindทุกครั้งที่มีการเขียน code ใส่ tailwind class ให้ทำการรันคำสั่งนี้ทุกครั้ง
```bash
npm run build
```

#### ในกรณีที่รันโดยไม่ผ่าน docker ให้ทำการติดตั้ง xamp หรือเครื่องมื่ออื่นในการสร้าง web server และทำการ config ให้ server สามารถใช้ .thaccess ได้


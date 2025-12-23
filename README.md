# 311 Project – Kurulum ve Çalıştırma Rehberi

Bu doküman, projeyi kendi bilgisayarında **ilk kez çalıştıracak kişiler** için hazırlanmıştır.  
Aşağıdaki adımları **sırasıyla ve eksiksiz** uygulamanız yeterlidir.

---

## ⚙️ Gerekli VS Code Eklentileri

VS Code üzerinden aşağıdaki eklentiler kurulmalıdır:

- Database Client JDBC  
- MySQL  
- Live Server  
- PHP  
- PHP Intelephense  
- HTML  

---

## 🗄️ MySQL Kurulumu ve Bağlantı

1. İnternetten **MySQL** indirip bilgisayarınıza kurun.
2. Kurulum tamamlandıktan sonra **VS Code**’u açın.
3. Sol menüde bulunan **Database** ikonuna tıklayın.
4. Yeni bir bağlantı oluştururken aşağıdaki ayarları girin:

   - **Server Type:** MySQL  
   - **Host & Port:** Değiştirmeyin  
   - **Username:** `root`  
   - **Password:**  
     Proje klasöründe bulunan `config.php` dosyasının en üstünde yer alan:
     ```php
     $pass = "*****";
     ```

---

## 🧰 XAMPP Kurulumu

1. İnternetten **XAMPP** indirip bilgisayarınıza kurun.
2. XAMPP’yi kurduğunuz **C:** sürücüsüne gidin.
3. Aşağıdaki dizine ilerleyin:


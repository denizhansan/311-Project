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
   - **Password:** MySQL installeri indirdikten sonra sizden oluşturmanızı istediği password'ü gireceksiniz.


---

## 🧰 XAMPP Kurulumu

1. İnternetten **XAMPP** indirip bilgisayarınıza kurun.
2. XAMPP kurulumundan sonra C: diskinde **xampp** -> **htdocs** klasörüne girin.
3. GitHub’dan **klonladığınız proje klasörünü**,  
   **tamamıyla bu htdocs klasörünün içine kopyalayın.**

---

## ▶️ Projeyi Çalıştırma

1. **XAMPP Control Panel**’i açın.
2. **Apache** için **Start** butonuna basarak servisi başlatın.
3. Apache durumu **yeşil** olduktan sonra:
   - Proje klasörü içinde bulunan:
     ```
     theme/notlar.txt
     ```
     dosyasını açın.
4. Bu dosya içerisinde projeyi başlatmak için gerekli komutlar yer almaktadır.
   - **Not:** Sadece *Apache & XAMPP* ile ilgili olan kısımlara bakmanız yeterlidir.

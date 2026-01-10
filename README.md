# 311 Project – Kurulum ve Çalıştırma Rehberi (İlk versiyon için)

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
   - Not: `config.php` dosyasındaki password'ü kendi passwordünüzle değiştirin!!! 


---
## 🗄️ Database Oluşturma ve Veri Ekleme

### 1️⃣ Database Oluşturma

1. VS Code üzerinde **Database** simgesine tıklayın.
2. Sol üstte bulunan, **127.0...** ile başlayan bağlantının yanındaki **+** butonuna basın.
3. Açılan alana aşağıdaki SQL komutunu yazın ve çalıştırın:

   ```sql
   CREATE DATABASE defacto_db;

4. Bu işlemden sonra defacto_db adlı database oluşacaktır.

### 2️⃣ Product Tablosunu Oluşturma

1. Oluşturulan defacto_db veritabanının içine girin.

2. Tables kısmına gelin.

3. Tables başlığının yanındaki + butonuna tıklayın.

4. Açılan alana aşağıdaki SQL kodunu yazın ve çalıştırın:
   ```sql
   CREATE TABLE product (
    product_id INT NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    size INT DEFAULT NULL,
    color VARCHAR(50) DEFAULT NULL,
    stock_quantity INT DEFAULT NULL,
    product_image VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (product_id));
5. Bu işlemden sonra product tablosu oluşturulacaktır.

### 3️⃣ Product Tablosuna Veri Ekleme

1. product tablosunun üzerine gelin.

2. Sağ tarafta çıkan sayfa (SQL) ikonuna tıklayın.

3. Açılan alana aşağıdaki SQL komutlarını yazın ve çalıştırın:
   ```sql
   INSERT INTO product
   (product_name, price, size, color, stock_quantity, product_image)
   VALUES
   ('Regular fit fitilli kadife pantolon', 2890, 3, 'Bej', 40, '1_Pantolon.jpg'),
   ('Jogger fit kisa paca pantolon', 2490, 3, 'Siyah', 35, '2_Pantolon.jpg'),
   ('Jogger fit duz paca pantolon', 2590, 3, 'Beyaz', 30, '3_Pantolon.jpg'),
   ('%100 pamuk wide leg bagcikli pantolon', 2790, 4, 'Ekru', 28, '4_Pantolon.jpg'),
   ('Kargo cepli jogger paca pantolon', 3190, 4, 'Siyah', 26, '5_Pantolon.jpg'),
   ('Regular fit su gecirmez kayak pantolonu', 4990, 5, 'Siyah', 15, '6_Pantolon.jpg'),
   ('Wide leg fitilli kadife pantolon', 2990, 4, 'Kahverengi', 32, '7_Pantolon.jpg'),
   ('Fit fermuarli baskili esofman alti', 2690, 3, 'Bordo', 34, '8_esofman alti.jpg'),
   ('Regular fit basic esofman alti', 2390, 3, 'Gri', 45, '9_esofman alti.jpg'),
   ('Standart fit sporcu esofman alti', 2590, 3, 'Petrol', 38, '10_esofman alti.jpg'),
   ('Standart fit modal sporcu esofman alti', 2890, 4, 'Siyah', 33, '11_esofman alti.jpg'),
   ('Wide leg dokulu esofman alti', 3090, 4, 'Krem', 29, '12_esofman alti.jpg'),
   ('dik yaka fermuarli mont', 4390, 4, 'Siyah', 25, '13_Mont.jpg'),
   ('ic cepli peluslu mont', 3890, 4, 'Lacivert', 30, '14_Mont.jpg'),
   ('kapusonlu astarli mont', 4690, 4, 'Beyaz', 20, '15_Mont_beyaz.jpg'),
   ('kapusonlu mont', 4190, 4, 'Haki', 22, '16_Mont_haki.jpg'),
   ('kayak montu su itici', 4990, 5, 'Sari', 15, '16_Mont_sari.jpg'),
   ('kayak montu su itici', 4890, 5, 'Gri', 16, '17_Mont.jpg'),
   ('kislik kase parka', 4590, 4, 'Bej', 18, '18_Parka_beyaz.jpg'),
   ('kislik kase parka', 4490, 4, 'Siyah', 17, '18_Parka_siyah.jpg'),
   ('regular fit dik yaka mont', 3990, 4, 'Bej', 26, '19_Mont_bej.jpg'),
   ('regular fit dik yaka mont', 4090, 4, 'Kahverengi', 24, '20_Mont_kahve.jpg'),
   ('regular fit mont', 3790, 3, 'Mavi', 28, '21_Mont.jpg'),
   ('slim fit suet mont', 4290, 4, 'Bej', 21, '22_Mont_bej.jpg'),
   ('slim fit suet mont', 4390, 4, 'Kahverengi', 20, '22_Mont_kahve.jpg'),
   ('slim fit suet mont', 4190, 4, 'Siyah', 22, '22_Mont_siyah.jpg'),
   ('su itici regular fit mont', 4590, 4, 'Acik Kahverengi', 19, '23_Mont_acik_kahve.jpg'),
   ('su itici regular fit mont', 4690, 4, 'Haki', 18, '24_Mont_haki.jpg'),
   ('su itici regular fit mont', 4790, 4, 'Koyu Yesil', 17, '24_Mont_koyu_yesil.jpg'),
   ('su itici slim fit mont', 4890, 4, 'Lacivert', 16, '25_Mont_lacivert.jpg'),
   ('su itici slim fit mont', 4790, 4, 'Siyah', 16, '25_Mont_siyah.jpg'),
   ('su itici slim fit mont', 4690, 4, 'Yesil', 17, '25_Mont_yesil.jpg');
4. Komutlar başarıyla çalıştırıldığında product tablosu veriyle dolu olacaktır.
5. Kontrol etmek için `defacto_db -> tables -> product` yolunu izleyin.

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

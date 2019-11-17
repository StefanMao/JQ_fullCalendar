# FullCalendar
Jquery Fullcalandar Integration with PHP and Mysql


# Subject matter
1. Integrate Jquery FullCalendar Plugin with PHP Mysql.
2. How to use FullCalendar.js with PHP script and Mysql database.
3. Complate a simple calendar with CRUD function and event can be draggled

# Functional
1.FullCalendar CRUD with Jquery Ajax PHP and Mysql

## 1.Original Interface
![alt tag](https://imgur.com/oI0UspE.jpg)

## 2.Add Event
滑鼠在該日期上點擊兩下，即可新增事件
![alt tag](https://imgur.com/Y2e3iGv.jpg)

## 3.Add Successful
新增成功，同時也將資料同步更新到 MySQL
![alt tag](https://imgur.com/gpvp8f3.jpg)

## 4.list
也可以利用List清單的方式呈現
![alt tag](https://imgur.com/SUc6EVP.jpg)


## 5.draggle event
可以用滑鼠直接針對日期上的事件進行拖曳(將原本在11/5 拖曳到 11/6)
![alt tag](https://imgur.com/dBttEGh.jpg)

## 6.Delete Event
在事件上點擊游標即可刪除事件
![alt tag](https://imgur.com/RW4XyVi.jpg)

## 7. MySQL Update
將資料同步更新到 MySQL 的fullcalendar 資料
![alt tag](https://imgur.com/qPKvmw2.jpg)



# Reference
1.https://demos.creative-tim.com/now-ui-dashboard-pro/docs/1.0/plugins/fullcalendar.html


## 學習筆記

### 1.資料庫文字亂碼問題
  問題描述: 在Debug的過程中發現，在新增資料到資料庫的時候中文文字會轉成亂碼，並存入資料庫。
  
  檢查方法: 查找資料是在哪一個環節轉變成亂碼情況。
  
  1.檢查物件新增時候，Ajax所傳輸的資料是否為亂碼. (否)
  
  2.檢查php post 至 MySQL 資料庫的時候是否為亂碼. (否)
  
  3.發現是在資料存進資料庫的時候才產生亂碼。
  
  4.檢查後發現，資料表雖然有將編碼設定為utf8_general_ci，但在上一層的資料庫忘記設定，故將資料庫編碼重新設定為支援中文字的編碼選項，則解決問題。



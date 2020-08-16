#วิธิลง 
#1. ทำการ docker-compose up docker file ที่ได้สร้างเอาไว้เพื่อลง ubutu พร้อมทั้งลง php ใน ubutu ตัวด้วย
#2. เมื่อลงเสร็จ จะได้ container มา 1 container  ชื่อว่า myweb ทำการ docker exec -it myweb /bin/bash
#แล้วทำการลง  mysql ตามเว็บนี้ https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-18-04 *ไม่ต้องใช่ sudo


#เวลาสร้าง database ก็สร้างใน mysql ที่ลงเวลาใน contaniner เลย   
#ดังเราจะใช่แค่ container แค่ 1 ตัว ง่ายต่อการอัพขึ้น docker hub

#แบบสำเร็จ  https://dockr.ly/30ix6BN

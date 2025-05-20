# Admin Sales Dashboard System

A web-based sales management dashboard developed using **HTML**, **CSS**, **JavaScript**, **PHP**, and **MySQL (via XAMPP)**. This system is designed for both **administrators** and **customers**, offering a tools for managing orders, tracking sales, and monitoring user data. It utilizes **Bootstrap** for responsive UI, **Chart.js** for dynamic charting, and **DataTables** for advanced table features.

---

## 🧾 Overview

This Admin Sales Dashboard System provides a simple and intuitive interface for managing product orders and tracking key business metrics. Admins can view a dashboard that displays real-time data, while customers can place orders through a dedicated user interface.

---

## ✨ Features

### 🔐 Login System
- Separate login portals for **Admin** and **Customer**

### 🧑‍💼 Admin Dashboard
- Displays key performance indicators:
  - **Total Sales**
  - **Sales Today**
  - **Total Users**
  - **Total Orders**
- Interactive **charts** powered by Chart.js
- **Navigation panels** for:
  - Managing **users** (view, edit, delete)
  - Viewing **sales orders** (view, edit, delete)
  - Viewing list of **products**

### 📦 Customer Page
- Allows users to:
  - **Log in**
  - **Place orders** via an order form

### 📊 Data Management
- Tables are enhanced with **DataTables** to provide:
  - Sorting
  - Searching
  - Pagination

---

## 🧱 Tech Stack

| Technology | Purpose |
|------------|---------|
| **HTML/CSS/JS** | Frontend structure and interactivity |
| **PHP** | Backend logic and server-side scripting |
| **MySQL (XAMPP)** | Database management |
| **Bootstrap** | Responsive UI components |
| **Chart.js** | Dynamic chart visualizations |
| **DataTables.js** | Interactive and searchable tables |

---

## 🔧 Setup Instructions
### **1. Clone the repository:**  
    git clone https://github.com/your-username/admin-sales-dashboard.git
### **2. Place it in your XAMPP htdocs directory.** 
    C:\xampp\htdocs\admin-sales-dashboard
### **3. Start Apache and Mysql.** 
Open the XAMPP Control Panel and start the Apache and MySQL services.
### **4. Create the database**
Open phpMyAdmin at http://localhost/phpmyadmin and create a new database named sales_dashboard_database.
### **5. Import the SQL file into the database** 
In phpMyAdmin, select the sales_dashboard_database database. Click the Import tab. Select the sales_dashboard_database.sql file located in the folder of the project. Click Go to execute the script and populate the database.
### **6. Verify database tables**
Make sure you have this 2 tables on the database:
  - orders
  - users
### **6. Open the project**
Navigate to http://localhost/admin-sales-dashboard/ in your browser.
### **7. Login** 
Default login credentials (can be edited in DB):
   - Admin: admin@gmail.com / 1234
   - Customer: customer@gmail.com / 1234

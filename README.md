# 💰 Personal Expense Tracker

![PHP](https://img.shields.io/badge/PHP-8.2-blue?style=flat-square) 
![MySQL](https://img.shields.io/badge/MySQL-8.0-blue?style=flat-square) 
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple?style=flat-square) 
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow?style=flat-square)

A **full-stack Personal Expense Tracker** I built to manage and visualize expenses in a clean, modern dashboard.  
Designed to be **responsive, user-friendly**, and visually appealing — inspired by social media dashboards like Facebook and Twitter.

---

## 🔹 Features

- **Secure login & registration** with hashed passwords  
- **Add, edit, delete expenses** (CRUD)  
- **Dashboard** displaying all expenses in a table  
- **Pie chart summary** by category using Chart.js  
- Mobile-friendly and responsive with **Bootstrap 5**  
- Smooth **UI animations & hover effects**  
- Optional **custom fields** like Payment Method  

---

## 🛠️ Tech Stack

- **Backend:** PHP, MySQL  
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript  
- **Charting:** Chart.js  
- **Server:** XAMPP (Apache + MySQL)

---

## 📂 Project Structure

personal-expense-tracker/
│-- index.php # Login page
│-- register.php # Registration page
│-- dashboard.php # Dashboard with table & chart
│-- add_expense.php # Add expense form
│-- edit_expense.php # Edit expense form
│-- delete_expense.php # Delete expense functionality
│-- logout.php # Logout functionality
│-- db.php # Database connection
│-- css/style.css # Styling
│-- js/script.js # JS & chart logic
│-- screenshots/ # Folder for images
├─ homepage_personalTracker.png
├─ login&register_index.png
└─ expense_tracker.png


---

##  Setup

1. Install [XAMPP](https://www.apachefriends.org/) (Apache + MySQL)  
2. Clone the repository:

```bash
git clone https://github.com/kodingkole/personal-expense-tracker.git



CREATE DATABASE expense_tracker;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    category VARCHAR(50),
    amount DECIMAL(10,2),
    description VARCHAR(255),
    date DATE,
    payment_method VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

## 📸 Screenshots 

![Homepage Dashboard]         (screenshots/homepage_personalTracker.png)
![Login & Register Page]      (screenshots/login&register_index.png)
![Expense Tracker Form / Chart] (screenshots/expense_tracker.png)


Open in your browser:
http://localhost/personal-expense-tracker/register.php

Contact
Kulsuma Akter Kole
GitHub: https://github.com/kodingkole
Email: akterkulsuma776@gmail.com



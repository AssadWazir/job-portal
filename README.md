# 🌟 Job Portal - Laravel Full-Stack Application

A **comprehensive Job Board application** built with **Laravel**.  
This project simulates a real-world ecosystem where **Candidates, Employers, and Admins** interact seamlessly.  
It was developed to **master complex database relationships, authentication, and role-based access control (RBAC)**.

---

## 🛠 Features by User Role

### Employer Panel
* **Company Profile:** Create and manage a dedicated company profile.
* **Job Management:** Full **CRUD** (Create, Read, Update, Delete) functionality for job postings.
* **Applicant Tracking:** View a list of candidates who applied for specific jobs.
* **Resume Viewer:** Securely view and download candidate resumes (**PDF**) directly from the dashboard.
* **Decision System:** Accept or reject applications with instant status updates for candidates.

### Candidate Panel
* **Public Job Board:** Search and filter jobs by **Title, Category, or Skills**.
* **Application System:** One-click application with **PDF resume upload** and **cover letter support**.
* **Personal Dashboard:** Track the status of all sent applications (**Pending, Accepted, Rejected**) in real-time.

### Admin Control Panel
* **Global Statistics:** Bird's-eye view of total **Users, Jobs, Companies, and Applications**.
* **Category Management:** Manage the industry categories (**IT, Marketing, Finance**) that power job filters.
* **User Management:** Oversee all registered users with the ability to **delete or manage accounts**.
* **Application Oversight:** Monitor every application sent across the platform to ensure site health.

---

## 💻 Technical Stack & Concepts Mastered

* **Eloquent Relationships:** 
* **Security:** **Role-based Middleware** to protect sensitive Admin and Employer routes.
* **File Storage:** Laravel's **Storage system** for secure PDF resume handling.
* **UI/UX:** Responsive design using **Bootstrap 5** and **Blade Partials** for a modular, maintainable frontend.

---

## ⚙ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/AssadWazir/job-portal.git
cd job-portal


### 2. Environment Setup
```bash
cp .env.example .env
php artisan key:generate

### 3. Database & Storage
php artisan migrate --seed
php artisan storage:link

### 4. Start the Server
php artisan serve
```

# Learning Disclaimer

This project is for educational purposes only.
It demonstrates proficiency in PHP/Laravel and modern web development practices.
Focus areas include business logic workflows, database architecture, and full-stack application development.
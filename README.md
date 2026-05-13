# MedConnect: Doctor Availability & Appointment Allocation

![MedConnect Demo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## Description

Hospitals often face challenges in managing doctor availability and appointment scheduling, leading to inefficiencies. **MedConnect** is a full-stack digital platform designed to optimize doctor availability and appointment allocation. By seamlessly connecting patients with specialized doctors, the application improves patient care, reduces waiting times, and streamlines overall hospital scheduling.

## Features

- **Multi-Role Authentication**: Secure role-based access for Admins, Doctors, and Patients.
- **Dynamic Doctor Directory**: Patients can filter and find specialists based on their medical departments.
- **Smart Appointment Booking**: Seamless scheduling system allowing patients to book available slots with preferred doctors.
- **Personalized Dashboards**: 
  - **Patients** can track their upcoming and past appointments.
  - **Doctors** have a dedicated view to manage their schedule and update appointment statuses (e.g., Pending, Confirmed, Completed).
- **Email Notifications**: Automated email confirmations sent to patients upon successful appointment booking.
- **Premium UI/UX**: Built with a modern, responsive "glassmorphism" aesthetic for an engaging user experience.

## Technical Stack & MVC Syllabus Integration

This project was built to fulfill the comprehensive requirements of the **INT221: MVC PROGRAMMING** syllabus, utilizing the Laravel framework:

- **Unit I (MVC Framework)**: Complete utilization of Laravel's MVC architecture and Artisan CLI.
- **Unit II (Routing & Responses)**: Implementation of Route Groups, Middleware protection (`auth`, `guest`, custom `role`), and diverse HTTP responses.
- **Unit III (Controllers & Blade)**: Use of Restful Resource Controllers (`AppointmentController`, `DoctorController`) and Blade Template Inheritance (`layouts.app`).
- **Unit IV & V (Data, Sessions & Emails)**: 
  - Strict Form Request validation with CSRF protection.
  - Implementation of custom Cookies (`Cookie::queue`).
  - Session management for authentication states.
  - Localization strings used in views (`__('messages.welcome_title')`).
  - Mailable classes configured for appointment confirmations.
- **Unit VI (Databases & Eloquent)**: 
  - Comprehensive database schema designed using Migrations.
  - CRUD operations handled entirely through the **Eloquent ORM**.
  - Database Seeders used for initial testing data.

## Getting Started

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL Database

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/medconnect.git
   cd medconnect
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Environment Setup:**
   Copy the example environment file and configure your database settings:
   ```bash
   cp .env.example .env
   ```
   Open the `.env` file and update your database credentials (e.g., `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) according to your local MySQL setup.

4. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations and Seeders:**
   This will create the necessary tables and populate the database with test users and doctors.
   ```bash
   php artisan migrate --seed
   ```

6. **Start the Development Server:**
   ```bash
   php artisan serve
   ```
   Visit `http://localhost:8000` in your browser.

## Test Credentials

Use the following credentials to test the different roles in the application:

- **Admin Login:** `admin@hospital.com` / `password`
- **Doctor Login:** `doctor@hospital.com` / `password`
- **Patient Login:** `patient@hospital.com` / `password`

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# User Management System

## Description
This is a simple User Management System built using Laravel. It includes essential authentication and user management features such as registration, login, profile management, password reset, and an admin panel for managing users.

## Setup

### Prerequisite
Ensure you have the following installed on your machine:
- PHP (>= 8.0)
- Composer
- Laravel
- MySQL

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/MazharSolkar/User-Management-x.git
   cd User-Management-x
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```
3. Setup `.env` file using the `.env.example`
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Run migrations and seed database:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```
6. Serve the application:
   ```bash
   php artisan serve
   ```

## Features

### 1. User Authentication
- Users can register, login, logout, update password.
- Implemented session based authentication

### 2. Password Reset
- Users can request forgot password link in case they forgot their password.

### 3. User Profile
- Users can update their profile.

### 4. Admin Panel
- Only accessible to users with role admin.
- Admin can view, manage user accounts (CRUD Operations).

## Additional Features

### 1. Search
- You can search users using their name or email.

### 2. Pagination
- User lists and admin dashboard tables support pagination.
- Implemented using Laravel's built-in pagination method (`paginate()`).

## Design Decisions
- **Modular Structure**: The application follows an MVC architecture to maintain clean separation of concerns.
- **Blade Templating**: Laravel Blade is used for templating to ensure a dynamic and reusable UI.
- **Eloquent ORM**: Laravel’s Eloquent ORM is used for database operations to simplify queries and relationships.
- **Role-Based Access Control**: Only admins can manage users, ensuring restricted access to sensitive operations.
- **Search and Pagination**: Implemented to improve user experience when browsing and managing a large number of users.

## License

This project is licensed under the MIT License.

## Author

Developed by Mazhar Solkar.
---
Feel free to update the repository link and modify the content based on any additional features or configurations you've added!

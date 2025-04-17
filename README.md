## Backend dev tech task - User Management System
A Laravel Livewire CRUD application to manage users with features like image upload, country selection, and gender specification. Built using **TDD**, adheres to **DDD best practices**, and implements **clean, maintainable code** structure.

### 🚀 Features
 ✅ Create, Read, Update, Delete (CRUD) for users
- 📸 Profile picture upload (with image validation)
- 🌍 Country selection from a predefined list
- 👨‍👩‍👧 Gender selection
- 🔒 Password and password confirmation
- 🔎 View individual user details
- 🔔 Flash messages for create, update, delete actions
- ✅ Livewire-powered UI for smooth interaction
- 🧪 Fully tested with Feature tests using Laravel’s built-in tools and Livewire testing utilities

### 📂 Folder Structure
- `App\Livewire\` – Livewire components for User CRUD (CreateUser, EditUser, UserList, UserView, DeleteUser)
- `App\Models\User` – Extended to support profile image storage
- `Database\Factories\UserFactory` – Generates test and dummy users, including images
- `resources/views` – Blade views with Tailwind CSS styling

### 🧪 Tests
Located in `tests/Feature/UserLivewireTest.php`, covering:
- ✅ User creation
- ✅ User update
- ✅ User deletion (with confirmation)
- ✅ Viewing user details
- ✅ Listing all users
  
### Run Tests
```bash
php artisan test
```
Or sun a specific test:
```bash
php artisan test tests/Feature/UserLivewireTest.php
```

##📦 Installation
### 1. Clone the repo
```bash
git clone https://github.com/awizendd/tech-task.git
cd tech-task
```

### 2. Install dependencies
```bash
composer install
npm install && npm run dev
```

### 3. Setup environment variables
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure the database
Update .env:
```env

DB_CONNECTION=mysql
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=
```

Then:
```bash
php artisan migrate
```

### 5. Run the App
```bash
php artisan serve
```
Visit: http://127.0.0.1:8000

##🌐 Technologies Used
- Laravel 10+
- Laravel Livewire
- Alpine.js
- Tailwind CSS
- SQLite/MySQL
- PHPUnit & Laravel Test Framework

##✨ Extras
-🔁 Animated alert messages using Tailwind transitions
-🧪 TDD methodology with red-green cycle
-📸 Image storage in storage/app/public/profile_picture
-🧪 Factories used for database seeding and testing

##🤝 Contribution
To contribute:
- Fork the repository
- Create your branch (git checkout -b feature/feature-name)
- Commit your changes (git commit -m 'Add feature')
- Push to the branch (git push origin feature/feature-name)
- Open a Pull Request

##📝 License
MIT License © Emmanuel John

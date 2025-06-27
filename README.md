# 📝 TeNTo — Multi-Tenant Todo App

TeNTo is a simple, open-source MVP Todo list application built to demonstrate **multi-tenancy** in Laravel using:

- 🏷️ **Domain-based tenant routing**
- 🗄️ **Data separation per tenant**
- 🛠️ Laravel + Vue 3 + Inertia + Vite + Tailwind CSS

Each tenant (user or organization) registers and gets a **custom subdomain**, with their own isolated database. It's a perfect starter project to learn multi-tenant SaaS design.

---

## 🚀 Features

- 🧾 Tenant-level todo list (isolated by subdomain)
- 🔑 Registration and login per tenant
- 🏗️ Modern Laravel + Inertia stack
- 🎨 Beautiful UI with Tailwind CSS
- ✨ Clean architecture with extensibility in mind

---

## 📦 Tech Stack

- [Laravel 11+](https://laravel.com/)
- [Vue 3](https://vuejs.org/)
- [Inertia.js](https://inertiajs.com/)
- [Vite](https://vitejs.dev/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Stancl/tenancy](https://tenancyforlaravel.com/) (for multi-tenancy)

---

## 🧑‍💻 Local Development Setup

### 1. Clone the repo

```bash
git clone https://github.com/your-username/tento.git
cd tento
```

### 2. Install dependencies
```bash
 composer install && npm install
 ```

### 3. Create .env
```bash
cp .env.example .env
```
Edit .env and set:
```
APP_NAME=TeNTo
APP_URL=http://tento.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=landlord
DB_USERNAME=root
DB_PASSWORD=
```
You’ll also want to set up valet or a local subdomain handler for .test domains.

### 4. Generate application key
```bash
php artisan key:generate
```

### 5. Set up tenancy
```bash
php artisan migrate
```
### 🤝 Contributing
We welcome contributions that make TeNTo better for learners and developers exploring multi-tenancy.

#### To contribute:
1. Fork the repository
2. Create a feature branch
```bash
git checkout -b feature/your-feature
```
3. Commit your changes with clear messages.
4. Push to your fork:
```bash 
git push origin feature/your-feature 
```
5. Open a Pull Request explaining your changes and why they improve tento.

✅ Suggestions, issues, and improvements are highly appreciated. Let’s build this learning resource together for the Laravel community.

###  License
This project is open-source under the MIT license.

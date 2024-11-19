# EventSphere 🌎

[Insert Banner Image Here]

EventSphere is a modern event management system and admin dashboard built for La Consolacion University Philippines. It provides a seamless experience for managing campus events, venues, and registrations.

## ✨ Features

- 📅 Event Management
- 🏛️ Venue Booking System
- 👥 Speaker Management
- 📊 Real-time Analytics Dashboard
- 👤 User Registration & Authentication
- ⭐ Event Feedback System
- 📱 Responsive Design

[Insert Features Screenshot Grid Here]

## 🚀 Tech Stack

EventSphere is built using the powerful TALL stack and modern DevOps tools:

<div class="flex flex-col space-y-2">
  <div class="flex flex-row space-x-2 align-center"><a href="https://laravel.com" target="_blank"><img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" /></a> <span>- As the robust PHP framework</span></div>
  <div class="flex flex-row space-x-2 align-center"><a href="https://alpinejs.dev" target="_blank"><img src="https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=black" alt="Alpine.js" /></a> <span>- For lightweight JavaScript interactions</span></div>
  <div class="flex flex-row space-x-2 align-center"><a href="https://tailwindcss.com" target="_blank"><img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS" /></a> <span>- For utility-first styling</span></div>
  <div class="flex flex-row space-x-2 align-center"><a href="https://livewire.laravel.com" target="_blank"><img src="https://img.shields.io/badge/Livewire-4E56A6?style=for-the-badge&logo=livewire&logoColor=white" alt="Livewire" /></a> <span>- For dynamic frontend interactions</span></div>
  <div class="flex flex-row space-x-2 align-center"><a href="https://filamentphp.com" target="_blank"><img src="https://img.shields.io/badge/Filament-22292f?style=for-the-badge&logo=filament&logoColor=white" alt="Filament" /></a> <span>- For the admin dashboard</span></div>
  <div class="flex flex-row space-x-2 align-center"><a href="https://frankenphp.dev" target="_blank"><img src="https://img.shields.io/badge/FrankenPHP-6C4AB0?style=for-the-badge&logo=php&logoColor=white" alt="FrankenPHP" /></a> <span>- Modern PHP application server</span></div>
  <div class="flex flex-row space-x-2 align-center"><a href="https://www.docker.com" target="_blank"><img src="https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker" /></a> <span>- For containerization and deployment</span></div>
</div>

## 🎯 Core Modules

### Event Management
- Create and manage events
- Track attendance
- Handle registrations
- Manage event capacity

### Venue Management
- Book venues
- Check venue availability
- View venue details and images
- Track venue capacity

### User System
- User registration
- Role-based access control
- Profile management
- Event registration history

[Insert Admin Dashboard Screenshot Here]

## 📸 Screenshots

[Insert Grid of Application Screenshots]

## 🛠️ Installation

### Prerequisites (for local installation)
```
- PHP 8.1+
- Composer
- Node.js & NPM
- MySQL/PostgreSQL
```

### Option 1: Local Installation

```
1. Clone the repository
2. Install dependencies via 'composer install' and 'npm install'
3. Configure your .env file
4. Run a fresh migration via 'php artisan migrate:fresh --seed'
5. Run the server via 'npm run dev'
```

### Option 2: Docker Installation

```
1. Clone the repository
2. Run dockerfile via 'sail build'
3. Run docker-composer file via 'sail up'
4. Run a fresh migration via 'sail artisan migrate:fresh --seed'
5. Run the server via 'sail npm run dev'
```

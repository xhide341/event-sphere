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
  <div class="flex flex-row space-x-2 items-center">
    <a href="https://laravel.com" target="_blank">Laravel</a> - As the robust PHP framework
  </div>
  <div class="flex flex-row space-x-2 items-center">
    <a href="https://alpinejs.dev" target="_blank">Alpine.js</a> - For lightweight JavaScript interactions
  </div>
  <div class="flex flex-row space-x-2 items-center">
    <a href="https://tailwindcss.com" target="_blank">Tailwind CSS</a> - For utility-first styling
  </div>
  <div class="flex flex-row space-x-2 items-center">
    <a href="https://livewire.laravel.com" target="_blank">Livewire</a> - For dynamic frontend interactions
  </div>
  <div class="flex flex-row space-x-2 items-center">
    <a href="https://filamentphp.com" target="_blank">Filament</a> - For the admin dashboard
  </div>
  <div class="flex flex-row space-x-2 items-center">
    <a href="https://frankenphp.dev" target="_blank">FrankenPHP</a> - Modern PHP application server
  </div>
  <div class="flex flex-row space-x-2 items-center">
    <a href="https://www.docker.com" target="_blank">Docker</a> - For containerization and deployment
  </div>
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

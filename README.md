# EventSphere 🎪

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

EventSphere is built using the powerful TALL stack:

- **Tailwind CSS** - For utility-first styling
- **Alpine.js** - For lightweight JavaScript interactions
- **Laravel** - As the robust PHP framework
- **Livewire** - For dynamic frontend interactions
- **Filament** - For the admin dashboard

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

### Prerequisites
- PHP 8.1+
- Composer
- Node.js & NPM
- MySQL/PostgreSQL

### Option 1: Local Installation

1. Clone the repository
2. Install dependencies via 'composer install' and 'npm install'
3. Configure your .env file
4. Run a fresh migration via 'php artisan migrate:fresh --seed'
5. Run the server via 'npm run dev'

### Option 2: Docker Installation

1. Clone the repository
2. Run dockerfile via 'sail build'
3. Run docker-composer file via 'sail up'
4. Run a fresh migration via 'sail artisan migrate:fresh --seed'
5. Run the server via 'sail npm run dev'
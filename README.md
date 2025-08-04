# YIP E-Commerce Case Study

This is a **basic Laravel e-commerce site** built for the PHP Full Stack Developer role at **YipOnline**. The application includes product listing, shopping cart, checkout flow, user authentication, admin order management, and responsive design principles. While Smarty is not yet integrated, the structure follows modular and clean Laravel standards to allow for future integration.

---

## Features Implemented

### User System

* **Register/Login/Logout** (via Laravel Breeze)
* Authenticated users can:

  * Add products to cart
  * Checkout and place orders

### Cart & Checkout

* Add products to session-based cart
* View cart with quantity breakdown
* Checkout only when logged in
* Cart resets after successful order

### Product Management

* Product seeding from database
* Product listing page
* Product detail view with "Add to Cart"

### Admin Dashboard

* Admin user (`is_admin = true`)
* View all orders from all users
* Each order shows:

  * User who ordered
  * Total amount
  * Products and quantities

### Responsive Design

* Mobile-friendly via TailwindCSS (default Breeze styles)

---

## Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/techstackspace/yip-ecommerce.git
cd yip-ecommerce
```

### 2. Install Dependencies

```bash
composer install
npm install && npm run build
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` DB settings to match your MySQL setup:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yip_ecommerce
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

### 4. Migrate and Seed

```bash
php artisan migrate --seed
```

This creates:

* Admin user: `admin@example.com / password`
* Test user: `test@example.com / password`
* Sample products

### 5. Start Development Server

```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## Admin Access

* Login as `admin@example.com`
* Access Admin Orders from nav (if `is_admin` is `true`)
* View all user orders and breakdown

---

## Project Structure Highlights

```
app/
├── Models/
│   ├── Product.php
│   ├── Order.php
│   ├── OrderItem.php
│   └── User.php (with orders() relation)
├── Http/Controllers/
│   ├── CartController.php
│   └── AdminController.php
resources/views/
├── products/index.blade.php
├── cart/index.blade.php
├── admin/orders.blade.php
├── layouts/
│   ├── app.blade.php
│   └── navigation.blade.php
```

---

## Test Credentials

### Admin User

* **Email**: `admin@example.com`
* **Password**: `password`

### Normal User

* **Email**: `test@example.com`
* **Password**: `password`

---

## Customizations / Extensions To Do

* Smarty template integration (optional bonus)
* Product management dashboard (admin side)
* Stripe/Paystack integration
* Order email notifications

---

## Task Compliance Summary

| Requirement                | Status    |
| -------------------------- | --------- |
| Product listing/detail     | Done    |
| Cart & Checkout            | Done    |
| User register/login        | Done    |
| Admin orders dashboard     | Done    |
| Mobile responsive          | Done    |
| Laravel framework used     | Done    |
| Smarty integration (bonus) | Not Yet |

---

## About Developer

**Name**: Osagie Noah \
**Email**: [osagienoah555@gmail.com](mailto:osagienoah555@gmail.com) \
**Location**: Nigeria

---

## License

MIT (or adapt to YipOnline's license policy)

---

## Notes for Reviewer

* Clean, modular Laravel structure used for scalability.
* Seeders, relationships, and session handling all included.
* Let me know if you’d like Smarty templating added as a follow-up task.

---

Thank you for reviewing — looking forward to collaborating with the YipOnline team!

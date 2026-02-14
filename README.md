# Klinik & Apotik Tanjung Sehat - Website Template

A scalable clinic website template built with CodeIgniter 4 and Tailwind CSS.

## Features
- Clean MVC Architecture
- Admin Dashboard with CRUDs
- Multi-clinic Ready (Easy rebranding)
- WhatsApp Floating Button
- SEO Optimized (Sitemap, Robots.txt, Schema.org)
- Mobile-first Responsive Design

## Tech Stack
- **Framework:** CodeIgniter 4.7.0
- **CSS:** Tailwind CSS 3 (Compiled)
- **Database:** SQLite (can be easily changed to MySQL)
- **Icons:** Font Awesome 6

## Setup Instructions

1. **Clone the project**
   ```bash
   composer install
   npm install
   ```

2. **Configure Environment**
   - Copy `env` to `.env` (already done in this template)
   - Ensure `writable` directory is writable.

3. **Database Migration & Seeding**
   ```bash
   php spark migrate
   php spark db:seed SampleSeeder
   ```

4. **Compile Assets**
   ```bash
   npm run build:css
   ```

5. **Run the Application**
   ```bash
   php spark serve
   ```
   Access at `http://localhost:8080`

6. **Admin Access**
   - URL: `http://localhost:8080/admin`
   - Username: `admin`
   - Password: `admin123`

## Production Optimization
- Change `CI_ENVIRONMENT` to `production` in `.env`.
- Set a strong `encryption.key` in `.env`.
- Configure `app.baseURL` with your production domain.
- Use a production-grade database like MySQL for high traffic.
- Minify CSS/JS (already handled by `npm run build:css`).
# abctyping - Typing Learning Platform

## 🎯 Project Overview

abctyping is a comprehensive typing learning and contest platform designed to help individuals and institutions master typing skills through structured, step-by-step learning.

## 🚀 Features

### Core Platform Features
- **Level-wise Learning**: Beginner → Intermediate → Advanced → Expert progression
- **Interactive Lessons**: Step-by-step typing exercises with real-time feedback
- **Typing Practice**: Speed tests, accuracy training, and performance tracking
- **Gamification**: Badges, achievements, and certificates for motivation
- **Progress Tracking**: Detailed analytics and performance history
- **Typing Contests**: Competitive typing challenges with leaderboards

### Institution Features
- **Batch Management**: Organize students into learning groups
- **Student Monitoring**: Track individual and group progress
- **Reporting Tools**: Generate comprehensive performance reports
- **Institution Dashboard**: Comprehensive management interface

### User Roles
- **User (Student)**: Access to lessons, practice, and personal progress tracking
- **Teacher**: Manage assigned batches and monitor student performance
- **Institution Admin**: Full institution management capabilities
- **Super Admin**: System-wide administration and oversight

## 📁 Project Structure

```
abctyping/
├── app/
│   ├── Http/
│   │   ├── Controllers/          # Application controllers
│   │   │   ├── DashboardController.php  # Role-based dashboard controller
│   │   │   ├── ContactController.php    # Contact form handling
│   │   │   └── ...               # Other controllers
│   │   └── Middleware/           # Custom middleware
│   │       └── RoleMiddleware.php # Role-based access control
│   └── Models/                   # Eloquent models
│       └── User.php              # User model with roles
├── resources/
│   ├── views/                    # Blade templates
│   │   ├── layouts/              # Layout templates
│   │   │   ├── app.blade.php     # Main application layout with role-based navigation
│   │   │   └── base.blade.php    # Base layout
│   │   ├── dashboard/            # Dashboard views
│   │   │   ├── user.blade.php            # User dashboard
│   │   │   ├── institution_admin.blade.php # Institution admin dashboard
│   │   │   ├── teacher.blade.php          # Teacher dashboard
│   │   │   └── super_admin.blade.php       # Super admin dashboard
│   │   ├── components/           # Reusable components
│   │   │   └── footer.blade.php  # Footer component
│   │   ├── home.blade.php        # Home page
│   │   ├── about.blade.php        # About page
│   │   ├── contact.blade.php      # Contact page
│   │   ├── privacy-policy.blade.php # Privacy policy
│   │   └── terms-of-service.blade.php # Terms of service
│   └── css/                      # CSS files
│       └── app.css               # Main stylesheet with Tailwind
├── routes/                       # Route definitions
│   └── web.php                  # Web routes with role-based middleware
├── database/                    # Database files
│   └── migrations/              # Database migrations
│       └── 0001_01_01_000000_create_users_table.php # Users table with roles
└── bootstrap/                    # Bootstrap files
    └── app.php                  # Application configuration with middleware
```

## 🔧 Technical Stack

- **Backend**: Laravel 11
- **Frontend**: Tailwind CSS
- **Database**: MySQL/SQLite
- **Authentication**: Laravel Breeze
- **JavaScript**: Alpine.js for interactivity

## 📄 PDF Generation with DOMPDF

The project includes DOMPDF integration for generating PDF documents, particularly useful for creating certificates, reports, and other downloadable content.

### Installation

DOMPDF is already included in the project dependencies. If you need to install it manually:

```bash
composer require barryvdh/laravel-dompdf
```

### Configuration

The package is pre-configured and ready to use. The main configuration options include:

- **Paper Size**: A4, Letter, etc.
- **Orientation**: Portrait or Landscape
- **Font Options**: Custom fonts and styling
- **Image Support**: Embed images in PDFs

### Basic Usage

To generate a PDF in your controllers:

```php
use Barryvdh\DomPDF\Facade\Pdf;

// Generate PDF from view
$pdf = Pdf::loadView('certificates.template', [
    'user' => $user,
    'certificateData' => $data
]);

// Download the PDF
return $pdf->download('certificate.pdf');

// Or stream it to browser
return $pdf->stream('certificate.pdf');
```

### Advanced Features

- **Custom Paper Sizes**: `->setPaper('a4', 'landscape')`
- **Custom Options**: `->setOptions(['defaultFont' => 'sans-serif'])`
- **HTML Content**: Generate PDFs from raw HTML strings
- **View Data**: Pass data to your Blade templates

### Certificate Generation Example

The system includes a certificate generation feature that uses DOMPDF:

```php
// In your controller
public function generateCertificate(User $user)
{
    $certificateData = CertificateService::generateCertificateData($user);

    $pdf = Pdf::loadView('certificates.certificate', [
        'user' => $user,
        'certificate' => $certificateData
    ]);

    return $pdf->download('typing-certificate-'.$user->id.'.pdf');
}
```

### Troubleshooting

- **Font Issues**: Ensure fonts are properly referenced in your CSS
- **Image Paths**: Use absolute paths for images in PDF generation
- **Memory Limits**: Large PDFs may require increased PHP memory limits

## 🎨 Design System

### Color Palette
- **Primary**: Blue gradient (#3b82f6 → #8b5cf6)
- **Secondary**: Purple gradient (#ec4899 → #f97316)
- **Success**: Green (#10b981 → #059669)
- **Warning**: Orange (#f97316)
- **Danger**: Red (#ef4444)

### Typography
- **Font Family**: Figtree (Google Fonts)
- **Headings**: Bold, with proper hierarchy
- **Body Text**: Comfortable line-height and spacing

### Components
- **Cards**: Rounded corners (2xl), soft shadows
- **Buttons**: Rounded-full with hover effects
- **Navigation**: Responsive with mobile menu
- **Tables**: Clean, striped rows with proper padding

## 🚀 Getting Started

### Prerequisites
- PHP 8.1+
- Composer
- Node.js 16+
- MySQL or SQLite

### Installation
```bash
# Clone the repository
git clone https://github.com/your-repo/abctyping.git
cd abctyping

# Install dependencies
composer install
npm install

# Set up environment
cp .env.example .env
php artisan key:generate

# Run migrations and seeders (includes test users)
php artisan migrate:fresh --seed

# Compile assets
npm run dev

# Start development server
php artisan serve
```

### Running the Application
```bash
# Development
npm run dev
php artisan serve

# Production build
npm run build
```

### 🧪 Testing Credentials

The application includes pre-seeded test users for all roles:

| Role | Email | Password |
|------|-------|----------|
| Super Admin | superadmin@abctyping.com | SuperAdmin123! |
| Institution Admin | institution@abctyping.com | Institution123! |
| Teacher | teacher@abctyping.com | Teacher123! |
| Regular User | user@abctyping.com | User123! |

**Testing Instructions:**
1. Login with any of the above credentials
2. The system will automatically redirect you to the appropriate dashboard based on your role
3. Verify that the navigation shows only the links appropriate for your role
4. Test accessing different dashboard routes to ensure role middleware protection works
5. Try accessing other roles' dashboards - you should receive a 403 Forbidden error

### Role-Based Access Testing

**Super Admin Testing:**
- Should see: Dashboard, Institutions, Users, Packages, System Settings
- Should access: `/dashboard/super-admin`
- Test URL: `/dashboard/institution-admin` (should be blocked)

**Institution Admin Testing:**
- Should see: Dashboard, Batches, Students, Reports
- Should access: `/dashboard/institution-admin`
- Test URL: `/dashboard/teacher` (should be blocked)

**Teacher Testing:**
- Should see: Dashboard, My Batches, My Students
- Should access: `/dashboard/teacher`
- Test URL: `/dashboard/user` (should be blocked)

**User Testing:**
- Should see: Dashboard, Levels, Practice, Badges, Certificates
- Should access: `/dashboard/user`
- Test URL: `/dashboard/super-admin` (should be blocked)

## 🔐 Authentication & Roles

### User Roles
The application supports four user roles:

1. **user** - Regular student/learner
2. **teacher** - Educator with student management
3. **institution_admin** - Institution management
4. **super_admin** - System administrator

### Role-Based Access Control
- **Middleware**: `RoleMiddleware` protects routes based on user roles
- **Navigation**: Dynamic menu system shows appropriate links for each role
- **Dashboard**: Each role has a customized dashboard experience

### Adding Roles to Users
Users can be assigned roles through:
- Database seeder
- Admin interface (for super admins)
- Direct database update

## 📱 Responsive Design

The application is fully responsive with:

- **Mobile Navigation**: Hamburger menu for small screens
- **Responsive Grid**: Adapts to different screen sizes
- **Touch-Friendly**: Proper spacing and tap targets
- **Breakpoints**: Tailwind's responsive utilities (sm, md, lg, xl, 2xl)

## 🎯 Key Features Implemented

### Role-Based Dashboard System
- Automatic role detection and routing
- Customized dashboards for each user type
- Role-protected routes with middleware
- Dynamic navigation based on user role

### Legal Pages
- Privacy Policy with comprehensive sections
- Terms of Service with legal disclaimers
- Professional styling matching main site

### Contact System
- Contact form with validation
- Multiple contact methods
- Success/error feedback
- FAQ section with accordion

### Modern UI Components
- Gradient backgrounds
- Card-based layouts
- Progress indicators
- Data tables with sorting
- Quick action buttons

## 🔧 Customization

### Tailwind Configuration
Edit `tailwind.config.js` to modify:
- Color palette
- Font families
- Breakpoints
- Custom animations

### Adding New Pages
1. Create Blade view in `resources/views/`
2. Add route in `routes/web.php`
3. Include in navigation if needed
4. Style with Tailwind classes

### Extending Functionality
- Add new middleware for additional security
- Create new controllers for additional features
- Extend User model for additional fields

## 📋 Roadmap

### Future Enhancements
- **Real-time Typing Tests**: WebSocket-based typing challenges
- **Advanced Analytics**: Machine learning for performance prediction
- **Mobile App**: React Native implementation
- **API Integration**: RESTful API for third-party access
- **Multi-language Support**: Internationalization

## 🤝 Contributing

Contributions are welcome! Please follow these guidelines:

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to your branch
5. Submit a pull request

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

## 📞 Support

For support, questions, or feedback:
- Email: support@abctyping.com
- Website: https://abctyping.com
- Documentation: [Link to documentation]

---

**© 2025 abctyping. All rights reserved.**
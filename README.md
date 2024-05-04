# Todo Application

This is a simple Todo application built with Laravel. It allows users to manage their tasks, mark them as completed, and assign them to other users. It also includes email functionality to notify users when tasks are assigned or unassigned.


## Features

- User authentication and authorization
- CRUD operations for Todos
- Assigning Todos to users
- Toastr notifications for success, warning, and error messages
- Alpine.js for interactive components like confirmation modals
- Email notifications for task assignments and unassignments

![Todo Page](https://github.com/taufik-khatik/todo-application/blob/main/public/my-todos-list-screenshot.png)
*Screenshot: Todo Page*

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/todo-application.git
   ```

2. Navigate to the project directory:
   ```bash
   cd todo-application
   ```

3. Install composer dependencies:
   ```bash
   composer install
   ```  

4. Copy the '.env.example' file and rename it to '.env'. Update the database and other necessary configurations:
   ```bash
   cp .env.example .env
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Update the 'MAIL_*' variables in the '.env' file with your SMTP server credentials to enable email functionality. Example configuration for using Gmail:
   ```dotenv
   MAIL_MAILER=smtpMAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=your_email@gmail.com
   MAIL_PASSWORD=your_password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=your_email@gmail.com
   MAIL_FROM_NAME="${APP_NAME}"
   ```

7. Run database migrations and seeders to set up the database:
   ```bash
   php artisan migrate --seed
   ```

8. Install npm dependencies and compile assets:
   ```bash
   npm install && npm run dev
   ```

9. Start the development server:
   ```bash
   php artisan serve
   ```


## Usage

1. Access the application in your browser at 'http://localhost:8000'.
2. Register a new user or use the default seeded users.
3. Start managing your Todos by creating, editing, assigning, and marking them as completed.


## Email Notifications

- When a Todo task is assigned to a user, an email notification is sent to that user.
- When a Todo task is unassigned (or reassigned), an email notification is sent to the previous assigned user (if any).


## Test Data

Admin User:
- Username: taufikkhatik.exr@gmail.com
- Password: [***********]

Regular User:
- Username: taufikkhatk23@gmail.com
- Password: [***********]


## Credits

- [Laravel](https://laravel.com/)
- [Toastr]()
- [Alpine.js](https://alpinejs.dev/)


## Dependencies 

Laravel version 10.0.0

Php version 8.1.17


## Author
[Taufik Khatik](https://github.com/taufik-khatik)


## License
This project is licensed under the [MIT License]().

# Psources
Programing Sources Php Website

Psources is a PHP-based web application that provides programming resources, cheat sheets, notes, and project ideas for various technologies. The platform supports user and admin roles, allowing resource management and access control.

## Features

- User authentication and management
- Admin dashboard for uploading and deleting resources
- Organized resources for Backend, Frontend, languages, frameworks, and project ideas
- Downloadable PDFs for quick reference
- SQL database for storing users and resource metadata

## Project Structure

```
admin/           # Admin panel and dashboard
user/            # User-facing pages
sources/         # PDF resources and cheat sheets
Database/        # SQL dump for database setup
README.md        # Project documentation
```

## Setup

1. Import the SQL file:  
   Import `Database/psources (1).sql` into your MySQL database.

2. Configure database connection:  
   Update database credentials in your PHP files as needed.

3. Place resource files:  
   Ensure all PDFs are in the `sources/` directory.

4. Run the application:  
   Host the project on a PHP-supported server (e.g., XAMPP, WAMP).

## Usage

- **Admin:**  
  Log in to the admin panel to add, update, or delete resources and project ideas.

- **User:**  
  Browse and download programming resources and project ideas.

## Contributing

Feel free to fork the repository and submit pull requests for improvements or new resources.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

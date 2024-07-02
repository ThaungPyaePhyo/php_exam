# One Pager Blog

## Features
1. Public user can add comments.
2. Admin user can add/edit/delete comments.
3. jQuery for front-end interactions (Vue.js integration as a bonus).

## Requirements
- PHP
- MySQL
- Apache (or any web server)
- Bootstrap
- jQuery

## Configuration

1. **Database Setup**:
   - Import the `comments` table using the following SQL:
     ```sql
     CREATE TABLE `comments` (
       `id` int(11) NOT NULL AUTO_INCREMENT,
       `username` varchar(100) NOT NULL,
       `comment` text NOT NULL,
       `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
       PRIMARY KEY (`id`)
     );
     ```
   - Update the `config.php` file with your database credentials.

2. **Running the Project**:
   - Place the project folder in your web server's root directory (e.g., `htdocs` for XAMPP).
   - Access `index.php` for the public view.
   - Access `admin.php` for the admin panel.

3. **Adding, Editing, and Deleting Comments**:
   - Public users can add comments through `index.php`.
   - Admin users can add, edit, and delete comments through `admin.php`.

## Usage
1. Navigate to the public page to add comments.
2. Navigate to the admin panel to manage comments.

## Additional Information
- This project uses Bootstrap for styling and jQuery for AJAX requests.
- Ensure the server is running and the database is properly configured before accessing the application.

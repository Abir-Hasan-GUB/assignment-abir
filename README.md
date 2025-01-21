Blog Commenting System

This project is a simple blog commenting system built with Laravel. It includes features for creating posts, commenting, managing user-specific posts, and filtering posts by category. It also incorporates user authentication, roles, and policies.

Features

Core Features:

Post Management:

Users can create posts with a title, description, and category.

Users can edit and delete their posts.

Comment Management:

Users can add comments to any post.

Users can view all comments on a post.

Users can edit their own comments.

The post owner can delete comments on their posts.

Post Filtering:

Users can filter posts by category in the feed.

Authentication:

Users can register, log in, and log out.

A test user is provided for demo purposes:

Email: admin@gmail.com

Password: 12345678

Dashboard:

Users can view their posts in a user-specific dashboard.

The dashboard includes pagination and options to view, edit, or delete posts.

Policies:

Implemented policies ensure only authorized users can edit or delete posts and comments.

Installation

Prerequisites

PHP >= 8.1

Composer

MySQL

Laravel >= 9

A web server (e.g., Apache or Nginx)

Steps

Clone the Repository:

git clone https://github.com/your-repo-link.git
cd blog-commenting-system

Install Dependencies:

composer install
npm install && npm run build

Environment Setup:

Duplicate .env.example and rename it to .env.

Configure the database credentials in the .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

Run Migrations and Seeders:

php artisan migrate --seed

Generate the Application Key:

php artisan key:generate

Serve the Application:

php artisan serve

Access the application at http://127.0.0.1:8000.

Dummy User

To explore the system, use the following credentials:

Email: admin@gmail.com

Password: 12345678

Usage

Create Posts:

Log in to the application.

Navigate to the "Create Post" page.

Enter the title, description, and select a category.

Submit the form to create a post.

Comment on Posts:

Open a post from the feed.

Add a comment in the provided field and submit.

Manage Posts and Comments:

Go to the dashboard to view your posts.

Use the provided options to edit or delete posts.

The post owner can delete any comment on their posts.

Filter Posts:

Use the category filter in the feed to display posts from a specific category.

Technical Details

Models

User

Post

Comment

Category

Migrations

Users: Includes fields like name, email, password, etc.

Posts: Includes title, description, category_id, user_id, etc.

Comments: Includes content, user_id, post_id, etc.

Categories: Includes name, id, etc.

Policies

PostPolicy: Manages authorization for editing and deleting posts.

CommentPolicy: Ensures users can only edit their own comments.

Blade Templates

Fully responsive design using Laravel Blade templating.

Pagination

Implemented for posts and dashboard views.

Deployment

The project is deployed at: abirr.com

Screenshots

Homepage

Dashboard

Post Details

License

This project is open-source and available for modification.

Feedback

For any issues or suggestions, feel free to contact me at: abir.green.cse@gmail.com.

I want to add it on git readme

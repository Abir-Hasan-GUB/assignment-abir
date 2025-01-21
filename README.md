# Blog Commenting System

This project is a simple blog commenting system built with Laravel. It includes features for creating posts, commenting, managing user-specific posts, and filtering posts by category. It also incorporates user authentication, roles, and policies.

## Features

### Core Features:

#### Post Management:
- Users can create posts with a title, description, and category.
- Users can edit and delete their posts.

#### Comment Management:
- Users can add comments to any post.
- Users can view all comments on a post.
- Users can edit their own comments.
- The post owner can delete comments on their posts.

#### Post Filtering:
- Users can filter posts by category in the feed.

#### Authentication:
- Users can register, log in, and log out.
- A test user will create if run the user seeder and it's credintial will be:
  - **Email:** admin@gmail.com
  - **Password:** 12345678

#### Dashboard:
- Users can view their posts in a user-specific dashboard.
- The dashboard includes pagination and options to view, edit, or delete posts.

#### Policies:
- Implemented policies ensure only authorized users can edit or delete posts and comments.

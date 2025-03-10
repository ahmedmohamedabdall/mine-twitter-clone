# mine twitter - A Laravel Chat Application

SimpleChat is a Laravel-based chat application that combines features inspired by twitter to create interactive social platform. Users can create posts, like and comment on them, and follow other users. The app also includes an admin panel with exclusive access to manage the application effectively.

## Features

### User Features
- **User Authentication**: Register, login, and logout functionality.
- **Post Management**: Create, read, update, and delete (CRUD) posts.
- **Interactive Features**:
  - Like posts.
  - Add comments to posts.
- **User Interaction**:
  - Follow and unfollow other users.
  - View other users' posts.

### Admin Features
- **Admin Dashboard**:
  - Separate pages accessible only by administrators.
  - Manage users, posts, and comments.
  - Moderate content.

### Design & Framework
- **Responsive Design**: Built with Bootstrap 5 for a seamless experience across devices.
- **Full-Stack Laravel**: Implements Laravel's robust MVC framework for an efficient backend.

## Installation

1. **Clone the Repository**
   ```bash
 git@github.com:ahmedmohamedabdall/mine-twitter-clone.git
   
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Configure Environment**
   - Copy `.env.example` to `.env`.
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your database credentials and other configurations.

4. **Run Migrations**
   ```bash
   php artisan migrate
   ```

5. **Seed Database (Optional)**
   ```bash
   php artisan db:seed
   ```

6. **Run the Application**
   ```bash
   php artisan serve
   ```

   Access the application at `http://127.0.0.1:8000`.

## Usage

- Register a new account or log in with an existing one.
- Create posts, like and comment on other users' posts, and follow other users.
- Admins can log in to the admin dashboard to moderate the platform.

## Contributing

Feel free to fork this repository and make changes. Pull requests are welcome!

## License

This project is open-source and available under the [MIT License](LICENSE).

---

**mine twitter**: A simple  chat and social platform built with Laravel.

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
#   m i n e - t w i t t e r - c l o n e 
 
 

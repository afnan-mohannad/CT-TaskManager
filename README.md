# My Task Manager Application
very simple Laravel web application for task management
## Features
 - Create task
 - Edit task
 - Delete task
 - Reorder tasks with drag and drop in the browser
## How to install and use
1. **Clone the repo**
    git clone git@github.com:afnan-mohannad/CT-TaskManager.git
    cd task-manager
2. **Install dependencies**
    ```
    composer install
    ```
3. **Configure environment**
- cp `.env.example` to `.env`
- update the database credentials and database name
- Run these commands to run database migrations and seed fake test data then generate application key:
  ```
  php artisan key:generate
  php artisan migrate --seed
  ```

4. **Run the app**
   ```
   php artisan serve
   ```
# by Afnan Mohannad Amarni

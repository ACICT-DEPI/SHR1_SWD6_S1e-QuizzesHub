# QuizzesHub

QuizzesHub is a web platform for hosting and attempting quizzes from various colleges and universities in Egypt. The website allows users to log in or continue as guests, select a university, college, course, and attempt quizzes from previous years. The quizzes are presented in an interactive format with timers, score evaluation, and a discussion system where users can comment on and respond to questions.

## Features

- User authentication and guest access
- University, faculty, major, and course selection
- Quiz timer and scoring system
- Multiple quiz types: Multiple Choice Questions (MCQ), Essay, True/False
- Commenting system with replies, likes, and visibility toggles
- Dynamic form creation for adding universities, faculties, courses, and quizzes
- Admin panel for managing content

## Technologies Used

- **Backend**: PHP (Laravel 11)
- **Frontend**: Livewire, Blade, Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Sanctum
- **Others**: AJAX, Commentify package (customized)

## Installation

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM

### Steps

1. Clone the repository:

    ```bash
    git clone https://github.com/ahmed-atef-gad/QuizzesHub.git
    cd quizzeshub
    cd quizzeshub
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install
    ```

3. Set up the environment variables:

    ```bash
    cp .env.example .env
    ```

    - Update your `.env` file with your database and mail configurations and FILESYSTEM_DISK=public.
    - (optional) google client configration.
  
    ```bash
    php artisan storage:link
    ```

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Run the migrations and seed the database:

    ```bash
    php artisan migrate:fresh --seed
    ```

6. Serve the application:

    ```bash
    php artisan serve
    ```

7. Run the front-end:

    ```bash
    npm run build
    ```

## Usage

- Access the platform via `http://localhost:8000` after running the above commands.
- Admin credentials can be set in the seeder file for testing purposes.
- Users can either sign up or continue as guests to browse and take quizzes.


## Project Structure

```bash
├── app
│   ├── Http
│   ├── Models
│   ├── Services
├── database
│   ├── migrations
│   ├── seeders
├── resources
│   ├── views
│   ├── livewire
├── routes
│   ├── api.php
│   ├── web.php
├── tests
└── README.md
```
## ER DIAGRAM
[dbdiagram-quizzesHub](https://dbdiagram.io/d/quizzesHub-66d1de74eef7e08f0e405514)

## License

- This project is licensed under the MIT License.

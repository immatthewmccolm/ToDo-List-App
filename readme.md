# Simple To Do List App

Create a web-based To-Do List Application using PHP and MySQL. The application will allow users to manage tasks by adding, editing, and deleting them. Each task can have a title, description, and a completion status (pending/completed). The goal of this project is to learn about PHP forms, CRUD operations, MySQL integration, session management, and user authentication.

## Features

1. User Authentication:
    - Users should be able to sign up, log in, and log out
    - Use PHP sessions to manage logged-in users
    - Each user should have their own to-do list (data should be stored per user)

2. CRUD Operations for Tasks
    - Users can create, read, update, and delete tasks.
    - Each task will have a title, description, and completionstatus
    - Tasks should be displayed in a list with options to edit or delete

3. Mark Tasks as Complete
    - Allow users to mark tasks as "comp;eted" by checking a box or changing a status.

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/immatthewmccolm/todo-list-app.git
    ```
2. Navigate to the project directory:
    ```sh
    cd todo-list-app
    ```
3. Set up your database and update the credentials in `creds.php`.

## Usage

1. Start your local server (e.g., using XAMPP or MAMP).
2. Open your browser and navigate to `http://localhost/todo-list-app`.

## Contributing

Feel free to fork this repository and submit pull requests. Any contributions are welcome!

## License

This project is licensed under the MIT License.
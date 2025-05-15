# Contributing to ProfsPortail

Thank you for considering contributing to ProfsPortail! Your contributions help us improve this collaborative platform designed for institutes to streamline communication and management.

## How to Contribute

We welcome contributions in the following ways:
- Reporting bugs
- Suggesting new features or improvements
- Writing or updating documentation
- Submitting code changes

Please take a moment to read the guidelines below to ensure a smooth contribution process.

---

## Reporting Issues

If you encounter a bug or have a feature request, please open an [issue](https://github.com/Keshabkjha/ProfsPortail/issues). When submitting your issue, include the following:
1. A clear and descriptive title.
2. Steps to reproduce the issue (if reporting a bug).
3. Expected behavior and what actually happened.
4. Relevant screenshots or error logs (if applicable).

---

## Submitting Pull Requests

Before submitting a pull request, please ensure you follow these steps:

1. **Fork the repository** and clone it to your local machine.

    ```bash
    git clone https://github.com/Keshabkjha/ProfsPortail.git
    ```

2. **Create a new branch for your changes**.

    ```bash
    git checkout -b feature/your-feature-name
    ```

3. **Make your changes**. Ensure your code follows the repository's coding standards and is properly documented.

4. **Run tests** to ensure your changes do not introduce any new issues.

5. **Commit your changes** with a clear and concise commit message.

    ```bash
    git commit -m "Add your commit message here"
    ```

6. **Push your branch** to your fork.

    ```bash
    git push origin feature/your-feature-name
    ```

7. **Submit a pull request** to the `main` branch of the original repository. Provide a detailed description of the changes you made.

---

## Development Guidelines

### Setting Up the Development Environment

Ensure you have the following installed:

- PHP (>= 7.4)
- Composer
- Node.js and npm
- MySQL or any compatible database

Clone the repository to your local machine:

```bash
git clone https://github.com/Keshabkjha/ProfsPortail.git
cd ProfsPortail
```


## Install PHP dependencies using Composer:

```bash
composer install
```
### Install JavaScript dependencies:
```bash
npm install
```
### Set up the database:

- Create a database for the project.
- Configure your .env file with the appropriate database credentials.

- Run migrations to set up the database schema:

```bash
php artisan migrate
```
Start the development server:

```bash
php artisan serve
```
Access the application at http://localhost:8000.

Coding Standards
Follow the PSR-12 coding standard for PHP.

Use meaningful commit messages.

Ensure your code is properly documented.

Write tests for your changes where applicable.

Code of Conduct
By participating in this project, you agree to abide by our Code of Conduct.




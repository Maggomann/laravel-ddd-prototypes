# Laravel DDD Prototypes

## Description

This project is a collection of prototypes implementing Domain Driven Design (DDD) in Laravel. Domain Driven Design is an approach to software development aimed at reducing the complexity of software systems by clearly separating domain logic from infrastructure concerns. The prototypes showcase various aspects of applying DDD in Laravel applications.

Please note that this project is still in the development phase. It serves as an exploration and demonstration of DDD concepts in the Laravel development environment.

## Project Structure

- **Business/Domainname/Domain**: This directory contains the domain layers of the application. Each domain has its own folder and is organized according to DDD principles, including entities, value objects, repositories, etc.

- **Business/Domainname/Application**: This directory contains the application layer, which coordinates the business logic of the application and facilitates interaction between the domain and infrastructure.

```plaintext
- Business
    - Maindomain1
        - Shared
            - Application
            - docs
            - Domain
            - README.md
        - Subdomainname1
            - Application
            - docs
            - Domain
            - README.md
        - Subdomainname2
            - Application
            - docs
            - Domain
            - README.md
    - Maindomain2
- Application
    - Controllers
    - Queries
    - Requests
    - Resources
    - Routes
- Domain
    - Actions
    - Builders
    - DataTransferObjects
    - Enums
    - Events
    - Exceptions
    - Filters
    - Jobs
    - Listeners
    - Mails
    - Models
    - Notifications
    - Observers
    - Policies
    - Providers
    - Services
    - States
    - Traits
    - ViewModels
```

## Installation

**Clone the repository from GitHub:**

```bash
git clone https://github.com/Maggomann/laravel-ddd-prototypes.git
```

**Navigate to the project directory:**

```bash
cd laravel-ddd-prototypes
```

**Install Composer dependencies:**

```bash
composer install
```

**Copy the `.env.example` file and rename it to `.env`:**

```bash
cp .env.example .env
```

**Generate the application key:**

```bash
php artisan key:generate
```

**Configure your database in the `.env` file.**

**Run the database migrations:**

```bash
php artisan migrate
```

**Start the development server:**

```bash
php artisan serve
```

### Register a new DomainService

To register a new domain service, add the service provider to the `config/app.php` file:

```php
'providers' => ServiceProvider::defaultProviders()->merge([

    /*
    * Domain Service Providers...
    */
    Business\Auth\Api\Domain\Providers\AuthServiceProvider::class,
    Business\Example\SubExample\Domain\Providers\ExampleServiceProvider::class,
    // ...
])->toArray(),
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Marco Ehrt](https://github.com/Maggomann)
- [All Contributors](../../contributors)

## Disclaimer

Please note that this Laravel project is not officially operated by Laravel and does not provide any support or warranty from the Laravel team. The use of this project is at your own risk.

This project represents unofficial extensions for Laravel and is maintained by an independent community of developers. We strive to maintain compatibility with the current versions of Laravel, but we cannot guarantee that the project will function flawlessly or be compatible with future versions of Laravel.

We recommend users to create backups of their projects and thoroughly test them before using this project. If you have any questions, issues, or suggestions, we are available to assist you. However, please note that we cannot provide official support for this project.

We would like to emphasize that Laravel is a separate developer community independent of this project. For more information about Laravel, please refer to the official Laravel website.

Please read the license terms to learn more about the conditions for using this project.

## Support

Feel free to contact us with any questions or concerns.

Thank you for your interest in our project!

[GitHub Link](https://github.com/Maggomann/laravel-ddd-prototypes)

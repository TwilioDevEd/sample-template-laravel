<a  href="https://www.twilio.com">
<img  src="https://static0.twilio.com/marketing/bundles/marketing/img/logos/wordmark-red.svg"  alt="Twilio"  width="250"  />
</a>
 
# Twilio Sample App Template

![Laravel CI](https://github.com/TwilioDevEd/sample-template-laravel/workflows/Laravel%20CI/badge.svg)

## About

This is a GitHub template for creating other [Twilio] sample/template apps. It contains a variety of features that should ideally be included in every Twilio sample app. You can use [GitHub's repository template](https://help.github.com/en/github/creating-cloning-and-archiving-repositories/creating-a-repository-from-a-template) functionality to create a copy of this.

Implementations in other languages:

| .NET | Java | Python | PHP | Node |
| :--- | :--- | :----- | :-- | :--- |
| TBD  | TBD  | TBD    | TBD | [Done](https://github.com/twilio-labs/sample-template-nodejs)  |

### How it works

This application is only a barebones PHP application using Laravel. Whenever, possible we should be using this. However, if you are using a framework like Symfony, Lumen or similar that comes with their own standardized application structure, you should try to merge these by using the same `README` structure and test coverage, configuration etc. as this project.

<!--
**TODO: UML Diagram**

We can render UML diagrams using [Mermaid](https://mermaidjs.github.io/).


**TODO: Describe how it works**
-->

## Features

- PHP web server using [Laravel](https://laravel.com/)
- Basic web user interface using [Blade](https://laravel.com/docs/7.x/blade) for templating and Bootstrap for UI
- Unit tests using [PHPUnit](https://phpunit.de/)
- End to End UI testing using [Dusk](https://laravel.com/docs/7.x/dusk)
- Automated CI testing using [GitHub Actions](/.github/workflows/laravel.yml)
- Linting and formatting using [PHP Coding Standards Fixer](https://cs.symfony.com/)
- Project specific environment variables using `.env` files.
- One click deploy buttons for Heroku.

## How to use it

1. Create a copy using [GitHub's repository template](https://help.github.com/en/github/creating-cloning-and-archiving-repositories/creating-a-repository-from-a-template) functionality
2. Update the [`README.md`](README.md), [`composer.json`](composer.json) and [`app.json`](app.json) with the respective values.
3. Build your app as necessary while making sure the tests pass.
4. Publish your app to GitHub

## Set up

### Requirements

- [PHP >= 7.2.5](https://www.php.net/) and [composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- A Twilio account - [sign up](https://www.twilio.com/try-twilio)

### Twilio Account Settings

This application should give you a ready-made starting point for writing your own application.
Before we begin, we need to collect all the config values we need to run the application:

| Config&nbsp;Value | Description                                                                                                                                                  |
| :---------------- | :----------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Account&nbsp;Sid  | Your primary Twilio account identifier - find this [in the Console](https://www.twilio.com/console).                                                         |
| Auth&nbsp;Token   | Used to authenticate - [just like the above, you'll find this here](https://www.twilio.com/console).                                                         |
| Phone&nbsp;number | A Twilio phone number in [E.164 format](https://en.wikipedia.org/wiki/E.164) - you can [get one here](https://www.twilio.com/console/phone-numbers/incoming) |

### Local development

After the above requirements have been met:

1. Clone this repository and `cd` into it

    ```bash
    git clone git@github.com:twilio-labs/sample-template-laravel.git
    cd sample-template-laravel
    ```

1. Install PHP dependencies

    ```bash
    composer install
    ```

1. Generate application key

    ```bash
    php artisan key:generate
    ```

1. Set your environment variables

    ```bash
    cp .env.example .env
    ```

    See [Twilio Account Settings](#twilio-account-settings) to locate the necessary environment variables.

1. Install Node dependencies
    ```bash
    npm install 
    ```

1. Build the frontend assets
    ```bash
    npm run dev
    ```

1. Run the application

    ```bash
    php artisan serve
    ```

1. Navigate to [http://localhost:8000](http://localhost:8000)

    That's it!

### Unit and Integration Tests

You can run the Unit and Feature tests locally by typing:
```bash
php artisan test
```

### End to End Tests

1. To run the Browser tests you first need to install the latest version of ChromeDriver for your OS
    ```bash
    php artisan dusk:chrome-driver
    ```

1. Copy the `.env.dusk.testing` to `.env.dusk.local`
    ```bash
    cp .env.dusk.testing .env.dusk.local
    ```

1. Then you can run the tests by typing:
    ```bash
    php artisan dusk
    ```
    **Note:** You need to have the dev server running or use `php artisan dusk:serve` instead

### Cloud deployment

Additionally to trying out this application locally, you can deploy it to a variety of host services. Here is a small selection of them.

Please be aware that some of these might charge you for the usage or might make the source code for this application visible to the public. When in doubt research the respective hosting service first.

| Service                           |                                                                                                                                                                                                                           |
| :-------------------------------- | :------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| [Heroku](https://www.heroku.com/) | [![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)                                                                                                                                       |

## Resources

- [GitHub's repository template](https://help.github.com/en/github/creating-cloning-and-archiving-repositories/creating-a-repository-from-a-template) functionality

## Contributing

This template is open source and welcomes contributions. All contributions are subject to our [Code of Conduct](https://github.com/twilio-labs/.github/blob/master/CODE_OF_CONDUCT.md).

[Visit the project on GitHub](https://github.com/twilio-labs/sample-template-nodejs)

## License

[MIT](http://www.opensource.org/licenses/mit-license.html)

## Disclaimer

No warranty expressed or implied. Software is as is.

[twilio]: https://www.twilio.com

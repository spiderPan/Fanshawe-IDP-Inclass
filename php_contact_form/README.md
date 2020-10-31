# Email with AJAX

This is a sample project using AJAX to handle mail submission. It's implemented with async / await and imported into the main JavaScript file as a module / component.

There's a (very) simple form that sends a user's first name, last name, email and message to an API endpoint; it has some extremely simple success / failure handling.

## Installation
Clone the repo to your local dev environment. This uses PHP on the back end, so you'll need something like WAMP or MAMP to run it (alternatively configure a Docker project and run it that way).

## Docker
- Run `docker-compose up` and then visit the site in http://localhost:3040
- Mailhog can be found in http://localhost:8025

## Usage
Pretty straightforward - navigate to the live instance and try submitting an email. The endpoint isn't connected to an API at this point - just a simple POST check and it returns back a success or error message, depending on the outcome.

CSS is generated with SASS using the command line tools. You'll need dart-sass (preferred) - [you can get it here](https://sass-lang.com/install)

## Credits
TVR - this is a stripped-down example of async / await and API endpoint testing for Authoring Level 3. Not for production. Demo only!

## License
MIT
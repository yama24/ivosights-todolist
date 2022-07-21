
# Ivosights ToDoList

A task notes app with email notification


## Made on

 - Laravel 9
 - Vue Js 3
 - MongoDB

## Installation

Make sure this:

- PHP version is 8 or above
- MongoDB driver for PHP already installed
- npm already installed

Clone the repo

```bash
git clone https://github.com/yama24/ivosights-todolist.git
```

or if you have Github CLI installed

```bash
gh repo clone yama24/ivosights-todolist
```

Get into the folder

```bash
cd ivosights-todolist
```

Download the dependencies

```bash
composer install
```

npm dependencies and run dev

```bash
npm i && npm run dev
```

Create .env file

```bash
cp .env.example .env
```

Generate APP_KEY

```bash
php artisan key:generate
```

Open .env file and setup the value

- APP_URL=(http://localhost/8000 or domain)
- DB_DATABASE=(your MongoDB database name)
- DB_USERNAME=(MongoDB username)
- DB_PASSWORD=(MongoDB user password)

and for email please set according to your email 

for test, I suggest to use [Mailtrap.io](https://mailtrap.io/)

run the local server

```bash
php artisan serve
```

for notification, use crontab/cronjob and run in every hour

```bash
crontab -e
```

add this end of line and save

```bash
0 * * * * curl --silent "http://localhost:8000/crontab"
```

the user will receive an email if there is a task that will expire in the next hour
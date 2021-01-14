## About MDM Organize

MDM Organize is an app that has two parts:

- Client App:
  + Register/Login
  + See Profile
  + See list tasks assigned to me
  + See task and add comments
- Admin App:
  + Login
  + Manage (view, edit, delete) all resources: Users, Roles, Projects, Tasks, Comments
  + Filter and Sort for Users list
  + Dashboard view

## Installation

First create a MySQL db with name: mdmorganize.

Set up locally

    git clone mihaimdm22/pm-mdm-organize
    cd pm-mdm-organize
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    php artisan migrate:fresh --seed

## License

MDM Organizer is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<br>
<p align="center"><img src="public/img/ist_logo.png" width="400" alt="iStudentTrack Logo"></p>
<br>
<p align="center"><a target="_blank"><img href="https://pnc.edu.ph/" src="public/img/pnc_header.png" width="300" alt="UC (PnC) Header"></a></p>

## 📘 Requirements
Make sure you have installed the following:
- [Visual Studio Code](https://code.visualstudio.com/download)
- [XAMPP](https://www.apachefriends.org/download.html)
- [NodeJS](https://nodejs.org/en/download/)
- [Composer](https://getcomposer.org/download/)
- [Git](https://git-scm.com/downloads)
- [GitHub Desktop](https://desktop.github.com/) (Optional)

## 🔧 Installation
### Starting XAMPP Server
1. Open XAMPP Control Panel
2. Start *Apache* & *MySQL* servers
3. Search *http://localhost/phpmyadmin* in any browser
4. Create new database and name it *'student_logger'*
5. Clone the repository with [CLI](#cloning-repository-with-cli) or [GitHub Desktop](#cloning-repository-with-github-desktop)

<br>

### Cloning Repository with CLI
1. Open Visual Studio Code
2. Choose a folder where you want to clone the repository in *File > Open Folder*
3. Open Visual Studio Code terminal *(Ctrl + `)* and enter the following commands:

Clone the repository
```
git clone https://github.com/burnjoe/student-logger.git
```

Change terminal directory
```
cd student-logger
```

<br>

### Cloning Repository with GitHub Desktop
1. Open GitHub Desktop
2. Clone the repository in *File > Clone Repository*

Select URL tab and paste the following:
```
https://github.com/burnjoe/student-logger.git
```

3. Choose a folder where you want to clone the repository and then *Clone*
4. Open the cloned repository in Visual Studio Code in *Repository > Open in Visual Studio Code*

<br>

### Adding All Dependencies and Setting Up the Project

#### Open Visual Studio Code terminal *(Ctrl + `)* and enter the following commands:

Install composer to the project
```
composer install
```

Install npm to the project
```
npm install
```

Create .env 
```
copy .env.example .env
```

Generate new app key
```
php artisan key:generate
```

Run the migration and seed
```
php artisan migrate:fresh --seed
```

Create symbolic link for storage
```
php artisan storage:link
```


## ⚡ Running the Server

#### Enter these following commands to your terminal:

Start local development server for your laravel app
```
php artisan serve
```

Open new terminal and start local development server for node
```
npm run dev
```

Start Laravel Websocket server
```
php artisan websockets:serve
```

### ✨ You can now access the server at http://localhost:8000

### ✨ Server Deployed with Hostinger: https://istudenttrack.com
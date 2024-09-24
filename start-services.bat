@echo off
REM Levantar servidor Laravel
cd /d C:\xampp\htdocs\Proyecto-Integrador\webtechv-app
start cmd /k "php artisan serve"

REM Levantar frontend con pnpm
cd /d C:\xampp\htdocs\Proyecto-Integrador\webtechf-app
start cmd /k "pnpm start --o"

REM Ejecutar la aplicación Flask con Python
cd /d C:\xampp\htdocs\Proyecto-Integrador\webtech-robot\src\
start cmd /k "python main.py"

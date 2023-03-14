<h2>Strona checkoutu dla sklepu. Zadanie testowe.</h2>
<hr style="border:2px solid gray">
<h4>Preferowana konfiguracja do testowania:</h2>
<code>php8.1+</code><br>
<code>nodejs: 14.19.0^</code><br>
<code>npm: 6.14.16^</code><br>
<hr style="border:2px solid gray">
<h4>Stack użyty w napisaniu zadania:</h4>
<code>Laravel v10</code>
<code>Vue 3</code>
<code>Tailwind</code>
<hr style="border:2px solid gray">
1. Stwóz pustą bazę danych o nazwie 'checkout_page' w kliencie MySQL. By to zrobić należy zalogować się w konsoli MySQL i użyć polecenia:
<br><code>CREATE DATABASE checkout_page;</code><br>
2. Sklonuj ten repozytorium na swoim lokalny serwerze używając polecenie 
<br><code>git clone https://github.com/samk1r0/smartbees-testtask</code><br>
3. Sprawdź czy wtyczki <code>pdo_mysql.so</code> oraz <code>fileinfo</code> są włączone w pliku php.ini. Jeżeli te wtyczki będą wyłączone - włącz je. <br>
4. W katalogu /checkout-api uruchom następne komendy: <br>
<code>composer update</code>
<code>composer install</code> <br>
5. W pliku .env sprawdź i zmodyfikuj wartości zmiennych z prefiksem DB aby odpowiadały nazwie, username'owi, oraz haślę bazy danych MySQL
6. W katalogu /checkout-api uruchom komendę: <br>
<code>php artisan migrate</code> <br>
7. W tym samym katalogu uruchom serwer: <br>
<code>php artisan serve</code> <br>
8. W katalogu /checkout-client uruchom polecenie: <br>
<code>npm i</code> <br>
9. W tym samym folderze skompiluj aplikację za pomocą polecenia: <br>
<code>npm run dev</code> <br>
10. Po skompilowaniu frontendu można kliknąc na link, który pojawił się w konsoli po wykonaniu polecenia w katalogu /checkout-client.
Wiarygodnie będzie to http://127.0.0.1:5173/

# IMS
### Inventory Management System

## Table of Contents
<ul>
    <li><a href=#about>About</a></li>
    <li><a href=#features>Features</a></li>
    <li><a href=#requirements>Requirements</a></li>
    <li><a href=#installation>Installation</a></li>
    <li><a href=#configuration>Configuration</a></li>
    <li><a href=#usage>Usage</a></li>
    <li><a href=#testing>Testing</a></li>
    <li><a href=#deployment>Deployment</a></li>
    <li><a href=#contributing>Contributing</a></li>
    <li><a href=#license>License</a></li>
    <li><a href=#contact>Contact</a></li>
</ul>

<h3 id="about">About</h3>
<p>Work in Progress</p>

<h3 id="features">Features</h3>
<p>Work in Progress</p>

<h3 id="requirements">Requirements</h3>
<ol>
    <li>PHP >= 8.3.6</li>
    <li>Laravel >= 11.9</li>
    <li>Composer >= 2.7.6</li>
    <li>MySQL >= 8.3.0</li>
</ol>

<h3 id="installation">Installation</h3>
<h4>Step 1: Clone the repository</h4>

```
git clone https://github.com/shakkhordas/ims
cd ims
```

<h4>Step 2: Install dependencies</h4>

```
composer install
npm install && npm run dev
```

<h4>Step 3: Set up environment variables</h4>
<p>Rename the .env.example file to .env and update the configuration:</p>

```
cp .env.example .env
```

<p>Generate the application key:</p>

```
php artisan key:generate
```

<h4>Step 4: Set up the database</h4>
<p>Create a database and update the `.env` file with the following database credentials.</p>

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ims
DB_USERNAME=root
DB_PASSWORD=
```

<p>Run the migrations:</p>

```
php artisan migrate
```

<h3 id="configuration">Configuration</h3>
<h4>Mail Configuration</h4>
<p>N/A</p>

<h3 id="usage">Usage</h3>
<ul>
    <li>Run the application locally:</li>

    ```
    php artisan serve
    ```

</ul>

<h3 id="testing">
    Testing
</h3>
<p>lorem ipsum</p>

<h3 id="deployment">
    Deployment
</h3>
<p>lorem ipsum</p>

<h3 id="contributing">
    Contributing
</h3>
<p>lorem ipsum</p>

<h3 id="license">
    License
</h3>
<p>lorem ipsum</p>

<h3 id="contact">
    Contact
</h3>
<p>lorem ipsum</p>

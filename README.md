<h1>Hemmy laravel roles Manager</h1>
</br>
<h3>This package manager roles per user groups</h3>

<b>Uses</b>
<ul>
    <li>http://server_ip/hemmy_function to view all function and there you can create new system function</li>
    <li>http://server_ip/roles to view all roles and there you can create new system function</li>
</ul>

<br>
<br>

<code> composer require hemmy/hemmy_package </code>

</br>
<code> php artisan vendor:publish --provider="Hemmy\RoleManager\RoleManagerServiceProvider" </code>

<br>
<code> php artisan migrate </code>
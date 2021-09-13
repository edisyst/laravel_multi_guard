#### UserStandard
Devo modificare il template di login e register




#### Admin
In vendor/laravel/fortify/src/Http/Responses/LogoutResponse.php devo mettere

    : redirect('/admin/login');

solo che così mi fa lo stesso redirect se faccio logout da user

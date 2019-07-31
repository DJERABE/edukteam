# e-school by CodeSprt
...

### Installation
1. Cloner le repo
2. Une fois dans le terminal à la racine du projet, installez les dépendances avec la commande `composer install`
3. Renseignez les informations de la base de données dans le .env
4. Effectuez ensuite la migration des tables avec `php artisan migrate`
5. Puis le seeder `php artisan db:seed`

Les choses sérieuses peuvent maintenant commencer :smirk:

### Ajouter une nouvelle ressource
1. Créez le model
 ```bash 
    ## Creation du model Comment avec sa migration et son resource controller
    php artisan make:model Comment -m -c --resource
```
2. Renseignez la route
```php
Route::group( ['middleware' => ['auth']], function() {
    ...
    Route::resource('comments', 'CommentController');
    ...
});
```

3. Importez le trait `Authorizable` 
```php
use App\Authorizable;
class CommentController extends Controller
{
    use Authorizable;
    ...
```

4. Générez les permissions du modèle `Comment`
```bash
php artisan auth:permission Comment
```

Voilà, votre controller est enfin prêt! 
 
### Commande auth:permission 
Cette commande est utilisé pour ajouter ou supprimer les autorisations pour un modèle donné
 
 ```bash
## ajouter les permissions
php artisan auth:permission Comment

## supprimer les permissions
php artisan auth:permission Comment --remove
```

### Auteur
[CodeSprt](http://codesprt.com)

#### Package utilisé
[Spatie](https://github.com/spatie/laravel-permission)

#### Template utilisé
[Elite Admin 4.0](https://themeforest.net/item/elite-admin-the-ultimate-dashboard-web-app-kit-material-design/16750820) dispo sur themelock
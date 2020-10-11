<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'flowers24online');

// Project repository
set('repository', 'https://github.com/pavellevin/flowers24online');

// [Optional] Allocate tty for git clone. Default value is false.
//set('git_tty', true);

// Shared files/dirs between deploys 
set('shared_files', [
    '.env',
    '.htaccess',
]);

set('shared_dirs', [
    'storage/app',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/media',
    'storage/logs',
    'public/images/uploads',
    'node_modules',
]);

// Writable dirs by web server 
set('writable_dirs', ['bootstrap/cache', 'storage', 'vendor', 'public/storage/media']);


// Hosts

host('ut396634.ftp.tools')
    ->stage('production')
    ->multiplexing(false)
    ->user('ut396634')
//    ->set(
//        'composer_options',
//        'install --verbose --no-dev --prefer-dist --optimize-autoloader --no-progress --no-interaction'
//    )
    ->set('deploy_path', '~/flowers.test/www/');
//    ->set('deploy_path', '~/{{application}}');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');

/**
 * Install NPM package.
 */
task('deploy:install-npm', function () {
    run('cd {{release_path}} && npm i');
});

/**
 * Compile assets.
 */
task('deploy:compile-assets', function () {
    run('cd {{release_path}} && gulp --production');
});

/**
 * Make migrate.
 */
task('deploy:migrations', function() {
    run('cd {{release_path}} && php artisan migrate --force');
});

/**
 * Make seed.
 */
/*task('deploy:seed', function() {
run('cd {{release_path}} && php artisan db:seed');
});*/

/**
 * Create cache for routes.
 */
task('deploy:create-route-cache', function() {
    run('cd {{release_path}} && php artisan route:clear');
});

/**
 * Create cache for config.
 */
task('deploy:create-config-cache', function() {
    run('cd {{release_path}} && php artisan config:clear');
});

/**
 * Clear all cached data.
 */
task('deploy:clean-cached-data', function() {
    run('cd {{release_path}} && php artisan view:clear');
});

/**
 * Clear cached data from bootstrap.
 */
task('deploy:clean-cached-data-boot', function() {
    run('cd {{release_path}} && rm bootstrap/cache/*');
});

/**
 * Restart Apache on success deploy.
 */
task('reload:apache', function () {
    run('sudo service httpd restart');
})->desc('Restart Apache service');

/**
 * Restart Nging on success deploy.
 */
task('reload:nginx', function () {
    run('sudo service nginx restart');
})->desc('Restart Nginx service');

task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:clean-cached-data',
    'deploy:clean-cached-data-boot',
    'deploy:create-route-cache',
    'deploy:create-config-cache',
//    'deploy:install-npm',
//    'deploy:compile-assets',
    'deploy:migrations',
// 'deploy:seed',
    'deploy:symlink',
    'cleanup',
])->desc('Deploy your project');

after('deploy', 'success');

/**
 * Restart servers.
 */
//after('success', 'reload:apache');
//after('success', 'reload:nginx');

/**
 * After rollback restart servers.
 */
//after('rollback', 'reload:apache');
//after('rollback', 'reload:nginx');
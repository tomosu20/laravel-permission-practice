
## About This Repository

Laravel-permissionを使って権限管理を構築する練習。

https://spatie.be/docs/laravel-permission

## Docker上で動作させるまで

※sailコマンド設定周りの説明は省く。

### docker上で起動

```shell
git clone https://github.com/tomosu20/laravel-permission-practice.git

sail up -d
```

### backend側

```shell
sail composer install
sail php artisan migrate:fresh --seeder
sail php artisan serve
```

### frontend側

```shell
sail npm install
sail npm run dev
```

## Seedingしている初期ログイン情報

http://localhost/admin/login

| Email  |  Password |
|---|---|
| admin@example.com  |  password |

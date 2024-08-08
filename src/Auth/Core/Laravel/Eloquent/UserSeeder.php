<?php

namespace Src\Auth\Core\Laravel\Eloquent;

use Illuminate\Database\Seeder;
use Src\Shared\Kernel\ValueObjects\Main\UuidValue;
use Src\Shared\Kernel\Utils\Primitivos\StringUtils;
use Src\Shared\DAO\Usuario\Infrastructure\Eloquent\UsuarioModel;

class UserSeeder extends Seeder
{
    public const ADMIN = 'admin';
    public const USER = 'user';
    public const ADMIN_EMAIL = 'admin@example.com';
    public const USER_EMAIL = 'user@example.com';
    public const PASSWORD = 'password';

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('Comienza a ejecutarse el User Auth Seeder:');
        $data = [
            ['id' => UuidValue::create()->value(), 'name' => StringUtils::capitalizar(self::ADMIN), 'usuario' => self::ADMIN, 'email' => self::ADMIN_EMAIL, 'password' => bcrypt(self::PASSWORD)],
            ['id' => UuidValue::create()->value(), 'name' => StringUtils::capitalizar(self::USER), 'usuario' => self::USER, 'email' => self::USER_EMAIL, 'password' => bcrypt(self::PASSWORD)],
        ];

        foreach ($data as $seed) {
            UsuarioModel::factory($seed)->create();
        }
    }
}

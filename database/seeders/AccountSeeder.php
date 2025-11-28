<?php
namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $assets = Account::create([
            'name'     => 'Assets',
            'code'     => '1000',
            'type'     => 'asset',
            'is_group' => 1,
        ]);

        Account::create([
            'parent_id' => $assets->id,
            'name'      => 'Cash',
            'code'      => '1010',
            'type'      => 'asset',
            'is_group'  => 0,
        ]);

        Account::create([
            'parent_id' => $assets->id,
            'name'      => 'Bank',
            'code'      => '1020',
            'type'      => 'asset',
            'is_group'  => 0,
        ]);

        $income = Account::create([
            'name'     => 'Income',
            'code'     => '4000',
            'type'     => 'income',
            'is_group' => 1,
        ]);

        Account::create([
            'parent_id' => $income->id,
            'name'      => 'Sales',
            'code'      => '4010',
            'type'      => 'income',
            'is_group'  => 0,
        ]);
    }

}

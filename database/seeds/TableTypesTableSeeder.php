<?php

use App\Models\TableType;
use Illuminate\Database\Seeder;

class TableTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $tableTypesData = $this->getTableTypesData();
        foreach ($tableTypesData as  $entry) {
            $tableType = TableType::create([
                'name' => $entry['name'],
            ]);
        }
    }

    public function getTableTypesData()
    {
        return [
            [
                'name' => 'Organization',
            ],
            [
                'name' => 'Event',
            ],
        ];
    }
}

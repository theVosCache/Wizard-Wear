<?php

namespace Database\Seeders;

use App\Models\Dnd\Potion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\SimpleExcel\SimpleExcelReader;

class DndPotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = SimpleExcelReader::create(__DIR__ . '/data/potions.csv')->getRows();

        /* Potion,Rarity,Type,Year,5e Equivalent,Effects,Flawed,Exceptional,Galleon Price */
        $rows->each(function (array $row){
            if (Potion::where('name', $row['Potion'])->exists()){
                return;
            }

            $potion = new Potion([
                'name' => $row['Potion'],
                'rarity' => $row['Rarity'],
                'potion_type' => $row['Type'],
                'learned_in_year' => $this->yearToNumber($row['Year']),
                'dnd_equivalent' => $row['5e Equivalent'],
                'effects' => $row['Effects'],
                'flawed' => $row['Flawed'],
                'exceptional' => $row['Exceptional'],
                'galleon_price' => $row['Galleon Price']
            ]);

            $potion->save();
        });
    }

    private function yearToNumber(?string $year): ?int
    {
        return match ($year){
            'First' => 1,
            'Second' => 2,
            'Third' => 3,
            'Fourth' => 4,
            'Fifth' => 5,
            'Sixth' => 6,
            'Seventh' => 7,
            default => null
        };
    }
}

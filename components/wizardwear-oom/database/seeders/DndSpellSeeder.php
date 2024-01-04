<?php

namespace Database\Seeders;

use App\Models\Dnd\Spell;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DndSpellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spellData = json_decode(
            json: file_get_contents(filename: __DIR__ . '/data/webdata_file.json'),
            associative: true
        );

        foreach ($spellData['rows'] as $row) {
            if ($row['googleSheet'] !== 'Spells') {
                continue;
            }

            if (Spell::where('name', $row['Name'])->count() === 0) {
                $spell = new Spell;

                if ($this->levelTextToInt($row['Level']) === null){
                    dd(trim(strtolower($row['Level'])), $row);
                };

                $spell->name = $row['Name'];
                $spell->description = $row['Description'];
                $spell->school_of_magic = $row['School of Magic'];
                $spell->is_school_of_magic_exclusive = ($row['Exclusive to School of Magic'] === 'Yes');
                $spell->level = $this->levelTextToInt($row['Level']);
                $spell->is_concentration = ($row['Concentration']  === 'Yes');
                $spell->is_ritual = ($row['Ritual']  === 'Yes');
                $spell->is_dedication = Str::contains(haystack: $row['Duration'], needles: 'Dedication');
                $spell->casting_time = $row['Casting Time'];
                $spell->range = $row['Range'];
                $spell->duration = $row['Duration'];
                $spell->tags = $row['Tags'];
                $spell->effects = $row['Sub-text'];

                $spell->save();
            }
        }
    }

    private function levelTextToInt(string $level): ?int
    {
        $level = trim(strtolower($level));
        return match ($level) {
            'cantrip' => 0,
            '1st level' => 1,
            '2nd level' => 2,
            '3rd level' => 3,
            '4th level' => 4,
            '5th level' => 5,
            '6th level' => 6,
            '7th level' => 7,
            '8th level' => 8,
            '9th level' => 9,
            default => null
        };
    }
}

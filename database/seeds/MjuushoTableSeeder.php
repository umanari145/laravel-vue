<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class MjuushoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path('zenkoku.csv');
        $fp = @fopen($filePath, 'r');

        $loopIndex = 0;
        $totalIndex = 0;
        $addresses = [];
        while ($res = fgetcsv($fp)) {
            if ($loopIndex >= 1) {
                $addresses[] = [
                    $res[0],
                    str_replace('-', '', $res[4]),
                    $res[1],
                    $res[7],
                    $res[2],
                    $res[9],
                    $res[3],
                    $res[11],
                    $res[15]
                ];
            }
            if ($loopIndex == 10) {
                $this->addressInsert($addresses);
                $loopIndex = 1;
                $addresses = [];
                continue;
            }
            $loopIndex++;
            $totalIndex++;
            if ($totalIndex === 100) {
                break;
            }
        }
    }

    private function addressInsert(array $addresses)
    {
        $sql = "INSERT INTO m_juusho (address_cd, zip, m_prefectures_id, ken, shikuchouson_cd, shikuchouson, ooaza_cd, ooaza, aza) VALUES ";
        $prepareSQlArr = array_fill(0, count($addresses[0]), "?");
        $prepareSQl = implode(',', $prepareSQlArr);
        $prepareSQl2 = sprintf('(%s)', $prepareSQl);
        $allPrepareSQlArr = array_fill(0, count($addresses), $prepareSQl2);
        $sql .= implode(',', $allPrepareSQlArr);
        $bindValue = collect($addresses)->flatten()->toArray();
        DB::insert($sql, $bindValue);
    }
}

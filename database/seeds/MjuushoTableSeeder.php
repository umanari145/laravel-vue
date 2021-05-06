<?php

use Illuminate\Database\Seeder;

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
        while ($res = fgetcsv($fp)) {
            $addresses = [];
            if ($loopIndex > 1) {
                $addresses[] = [
                    $res[0],
                    $res[4],
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
                continue;
            }
            $loopIndex++;
        }
    }

    private function addressInsert(array $addresses)
    {
        $sql = "INSERT INTO m_juusho (address_cd, zip, m_prefectures_id, ken, shikuchouson_cd, shikuchouson, oaza_cd, oaza, aza) VALUES ";
        $prepareSQlArr = array_fill(0, count($addresses[0]), "?");
        $prepareSQl = implode(',', $prepareSQlArr);
        $prepareSQl2 = sprintf('(%s)', $prepareSQl);
        $allPrepareSQlArr = array_fill(0, count($addresses), $prepareSQl2);
//        $allPrepareSQl = implode("");
    }
}

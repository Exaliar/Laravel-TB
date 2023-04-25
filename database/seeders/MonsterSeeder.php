<?php

namespace Database\Seeders;

use App\Models\Monster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonsterSeeder extends Seeder
{
    private $monsters = [];

    public function run()
    {
        // \App\Models\Monster::factory(150)->create();
        $collections = [
            [0,'Ghoul','melee_unit','beast',NULL,28,84,10,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Banszi','ranged_unit',NULL,NULL,100,300,45,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Nekromanta','ranged_unit',NULL,NULL,720,2160,50,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Jezdziec Mrocznych Ogarow','mounted_unit',NULL,NULL,1100,3300,40,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [3,'Kat','melee_unit',NULL,NULL,2300,6900,45,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [4,'Czarny Jezdziec','mounted_unit',NULL,NULL,5800,17400,50,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [5,'Gargulec','flying_unit','beast',NULL,19000,57000,45,'elemental',70,'mounted_unit',NULL,NULL,NULL],
            [6,'Zabojczy Rydwan','mounted_unit',NULL,NULL,57000,171000,60,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [6,'Kosciany Golem','melee_unit','elemental',NULL,70000,210000,40,'dragon',NULL,NULL,NULL,NULL,NULL],
            [7,'Wladca','ranged_unit','giant',NULL,200000,600000,50,'beast',60,'melee_unit',NULL,NULL,NULL],
            [0,'Lesny Gnom','melee_unit',NULL,NULL,28,84,10,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Wrozka','ranged_unit',NULL,NULL,100,300,35,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Druid','ranged_unit',NULL,NULL,900,2700,25,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [3,'Centaur','mounted_unit',NULL,NULL,2600,7800,50,'ranged_unit',20,'siege_engine',NULL,NULL,NULL],
            [4,'Jezdziec Pegazow','flying_unit',NULL,NULL,8200,24600,60,'melee_unit',50,'dragon',NULL,NULL,NULL],
            [5,'Niedzwiedz','melee_unit','beast',NULL,22000,66000,50,'elemental',70,'mounted_unit',NULL,NULL,NULL],
            [5,'Jezdziec Jednorozcow','mounted_unit',NULL,NULL,27000,81000,65,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [6,'Ent','melee_unit','elemental',NULL,73000,219000,55,'ranged_unit',45,'dragon',NULL,NULL,NULL],
            [7,'Smok Zycia','flying_unit','dragon',NULL,240000,720000,60,'mounted_unit',50,'giant',NULL,NULL,NULL],
            [0,'Szkielet','melee_unit',NULL,NULL,56,168,15,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Czarownik','ranged_unit',NULL,NULL,150,450,25,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Jezdziec Jaguara','mounted_unit',NULL,NULL,270,810,30,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Wilkolak','melee_unit','beast',NULL,360,1080,45,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [3,'Jezdziec Smierci','mounted_unit',NULL,NULL,3200,9600,50,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [4,'Starozytny Wampir','flying_unit','beast',NULL,9900,29700,40,'elemental',60,'melee_unit',NULL,NULL,NULL],
            [5,'Jezdziec Bykow','mounted_unit',NULL,NULL,29000,87000,55,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [5,'Olbrzymi Zombi','melee_unit','giant',NULL,33000,99000,45,'beast',70,'mounted_unit',NULL,NULL,NULL],
            [6,'Przeklety Dendroid','melee_unit','elemental',NULL,110000,330000,65,'ranged_unit',50,'dragon',NULL,NULL,NULL],
            [7,'Przeklety Smok','flying_unit','dragon',NULL,320000,960000,50,'mounted_unit',50,'giant',NULL,NULL,NULL],
            [0,'Goblin','melee_unit',NULL,NULL,28,84,10,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Jezdziec Wilkow','mounted_unit',NULL,NULL,150,450,60,'ranged_unit',40,'siege_engine',NULL,NULL,NULL],
            [2,'Mistrz Toporow','ranged_unit',NULL,NULL,360,1080,45,'melee_unit',50,'flying_unit',NULL,NULL,NULL],
            [3,'Szaman Ogrow','melee_unit',NULL,NULL,3200,9600,60,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [4,'Wrona Burzy','flying_unit','beast',NULL,13000,39000,45,'elemental',55,'melee_unit',NULL,NULL,NULL],
            [5,'Jezdziec Skorpionow','mounted_unit',NULL,NULL,37000,111000,40,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [5,'Cyklop','ranged_unit','giant',NULL,45000,135000,40,'beast',45,'melee_unit',100,'fortification',NULL],
            [6,'Paskudztwo','melee_unit','beast',NULL,130000,390000,50,'elemental',60,'ranged_unit',NULL,NULL,NULL],
            [7,'Robak Pustynny','melee_unit','elemental',NULL,430000,1290000,75,'mounted_unit',50,'dragon',NULL,NULL,NULL],
            [0,'Demon','melee_unit',NULL,NULL,28,84,15,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Magog','ranged_unit',NULL,NULL,50,150,30,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Rogaty Demon','melee_unit',NULL,NULL,720,2160,40,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [3,'Jezdziec Ognistego Rumaka','mounted_unit',NULL,NULL,4100,12300,50,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [3,'Nadzorca','ranged_unit',NULL,NULL,6500,19500,70,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [4,'Cerber','melee_unit','beast',NULL,17000,51000,50,'elemental',65,'ranged_unit',NULL,NULL,NULL],
            [5,'Ifrit','flying_unit','elemental',NULL,44000,132000,70,'melee_unit',40,'dragon',NULL,NULL,NULL],
            [5,'Jezdziec Ognistego Robaka','mounted_unit',NULL,NULL,50000,150000,55,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [6,'Arcydemon','melee_unit','giant',NULL,180000,540000,40,'beast',60,'mounted_unit',NULL,NULL,NULL],
            [7,'Wladca Ognia','ranged_unit','elemental',NULL,56000,1680000,80,'melee_unit',45,'dragon',NULL,NULL,NULL],
            [1,'Starozzytny Wampir','flying_unit',NULL,NULL,120000,360000,70,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Powstawszy Z Martwych','melee_unit',NULL,NULL,150000,450000,70,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Wieczny Kanonier','ranged_unit',NULL,NULL,440000,1320000,65,'flying_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Jezdziec Na Szczurze','mounted_unit',NULL,NULL,550000,1650000,65,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [3,'Okretowy Golem','melee_unit',NULL,NULL,1980000,5940000,75,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Haby','ranged_unit',NULL,NULL,110000,320000,70,'flying_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Huracan','mounted_unit',NULL,NULL,180000,550000,75,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'ChAk','melee_unit',NULL,NULL,500000,1490000,65,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Wiwern','flying_unit',NULL,NULL,690000,2070000,75,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [3,'Ajaw','mounted_unit',NULL,NULL,2480000,7440000,80,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [5,'Mury Twierdzy','fortification',NULL,NULL,10000,30000,100,'ranged_unit',100,'mounted_unit',100,'melee_unit',NULL],
            [1,'Sowa Niedzwiedz','melee_unit',NULL,NULL,140000,410000,65,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Driada','ranged_unit',NULL,NULL,200000,600000,75,'flying_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Straznik','mounted_unit',NULL,NULL,470000,1410000,70,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Peryt','flying_unit',NULL,NULL,720000,2150000,70,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [3,'Tryfid','ranged_unit',NULL,NULL,2180000,6550000,85,'flying_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Ognista Wiedzma','flying_unit',NULL,NULL,90000,280000,70,'melee_unit',NULL,NULL,NULL,NULL,NULL],
            [1,'Wulkaniczny Golem','ranged_unit',NULL,NULL,170000,510000,60,'flying_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Demoniczna Salamandra','melee_unit',NULL,NULL,410000,1240000,65,'mounted_unit',NULL,NULL,NULL,NULL,NULL],
            [2,'Jezdziec Na Krabie','mounted_unit',NULL,NULL,630000,1900000,75,'ranged_unit',NULL,NULL,NULL,NULL,NULL],
            [3,'Ognisty Horror','flying_unit',NULL,NULL,2280000,6840000,80,'melee_unit',NULL,NULL,NULL,NULL,NULL]
        ];

        foreach ($collections as $value) {
            $this->monsters[] =
            [
                'lvl' => $value[0],
                'name' => $value[1],
                // 'menu_type' => $value[2],
                'first_type' => $value[2],
                'second_type' => $value[3],
                'third_type' => $value[4],
                'strength' => $value[5],
                'health' => $value[6],
                'first_bonus' => $value[7],
                'first_bonus_who' => $value[8],
                'second_bonus' => $value[9],
                'second_bonus_who' => $value[10],
                'third_bonus' => $value[11],
                'third_bonus_who' => $value[12],
                'graphics' => $value[13],
            ];
        }

        foreach ($this->monsters as $monsterData) {
            $army = new Monster;
            $army->fill($monsterData);
            $army->save();
        }
    }
}

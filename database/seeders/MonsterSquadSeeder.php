<?php

namespace Database\Seeders;

use App\Config\MonstersSquadTypeConfig;
use App\Config\MonstersTypeConfig;
use App\Models\Monster;
use App\Models\MonsterSquad;
use Illuminate\Database\Seeder;

class MonsterSquadSeeder extends Seeder
{
    private $normals = [];
    private $rares = [];
    private $heroics = [];
    private $citadels = [];
    private $epics = [];
    private $others = [];
    public function run()
    {
        $collectionHeroic = [
            [16,MonstersTypeConfig::UNDEAD,'Banszi',10400,'Nekromanta',2200,'Czarny Jezdziec',440,'Zabojczy Rydwan',96],
            [17,MonstersTypeConfig::ELF,'Druid',1720,'Jezdziec Pegazow',170,'Jezdziec Jednorozcow',114,'Ent',130],
            [18,MonstersTypeConfig::CURSED,'Czarownik',7600,'Wilkolak',6400,'Starozytny Wampir',540,'Przeklety Dendroid',130],
            [19,MonstersTypeConfig::BARBARIAN,'Jezdziec Wilkow',22000,'Mistrz Toporow',14200,'Jezdziec Skorpionow',220,'Paskudztwo',130],
            [20,MonstersTypeConfig::INFERNO,'Magog',100000,'Jezdziec Ognistego Rumaka',1840,'Cerber',680,'Arcydemon',146],
            [21,MonstersTypeConfig::UNDEAD,'Czarny Jezdziec',1480,'Gargulec',620,'Zabojczy Rydwan',340,'Kosciany Golem',540],
            [22,MonstersTypeConfig::ELF,'Jezdziec Pegazow',1600,'Niedzwiedz',820,'Jezdziec Jednorozcow',1100,'Ent',800],
            [23,MonstersTypeConfig::CURSED,'Jezdziec Smierci',5800,'Starozytny Wampir',3200,'Jezdziec Bykow',1580,'Przeklety Dendroid',800],
            [24,MonstersTypeConfig::BARBARIAN,'Mistrz Toporow',78000,'Szaman Ogrow',13200,'Wrona Burzy',5400,'Paskudztwo',1080],
            [25,MonstersTypeConfig::INFERNO,'Rogaty Demon',60000,'Nadzorca',10000,'Cerber',6400,'Arcydemon',1200],
            [26,MonstersTypeConfig::UNDEAD,'Czarny Jezdziec',10800,'Gargulec',5000,'Zabojczy Rydwan',2800,'Wladca',1580],
            [27,MonstersTypeConfig::ELF,'Jezdziec Pegazow',11200,'Jezdziec Jednorozcow',5000,'Ent',3200,'Smok Zycia',1900],
            [28,MonstersTypeConfig::CURSED,'Olbrzymi Zombi',4000,'Jezdziec Bykow',6800,'Przeklety Dendroid',3000,'Przeklety Smok',2000],
            [29,MonstersTypeConfig::BARBARIAN,'Szaman Ogrow',60000,'Cyklop',6400,'Paskudztwo',3800,'Robak Pustynny',2200],
            [30,MonstersTypeConfig::INFERNO,'Nadzorca',44000,'Ifrit',9600,'Jezdziec Ognistego Robaka',14000,'Arcydemon',7800],
            [31,MonstersTypeConfig::UNDEAD,'Gargulec',19400,'Kosciany Golem',10600,'Zabojczy Rydwan',13000,'Wladca',9200],
            [33,MonstersTypeConfig::CURSED,'Olbrzymi Zombi',9600,'Jezdziec Bykow',56000,'Przeklety Dendroid',11600,'Przeklety Smok',10000],
            [32,MonstersTypeConfig::ELF,'Niedzwiedz',11000,'Jezdziec Jednorozcow',44000,'Ent',13400,'Smok Zycia',10200],
            [34,MonstersTypeConfig::BARBARIAN,'Cyklop',18600,'Jezdziec Skorpionow',46000,'Paskudztwo',13000,'Robak Pustynny',9800],
            [35,MonstersTypeConfig::INFERNO,'Ifrit',12600,'Jezdziec Ognistego Robaka',56000,'Arcydemon',12200,'Wladca Ognia',9800],
            [36,MonstersTypeConfig::UNDEAD,'Starozzytny Wampir',5000,'Jezdziec Na Szczurze',4400,'Wieczny Kanonier',6800,'Okretowy Golem',3000],
            [38,MonstersTypeConfig::CURSED,'Haby',6800,'Wiwern',4200,'ChAk',7400,'Ajaw',3000],
            [41,MonstersTypeConfig::UNDEAD,'Starozzytny Wampir',7800,'Jezdziec Na Szczurze',7000,'Wieczny Kanonier',10800,'Okretowy Golem',4800],
            [43,MonstersTypeConfig::CURSED,'Haby',10800,'Wiwern',6600,'ChAk',11600,'Ajaw',4600],
            [37,MonstersTypeConfig::ELF,'Sowa Niedzwiedz',4800,'Peryt',3800,'Straznik',7000,'Tryfid',3000],
            [42,MonstersTypeConfig::ELF,'Sowa Niedzwiedz',7600,'Peryt',5800,'Straznik',11200,'Tryfid',4800],
            [40,MonstersTypeConfig::INFERNO,'Wulkaniczny Golem',5400,'Jezdziec Na Krabie',5600,'Demoniczna Salamandra',10800,'Ognisty Horror',4000],
            [45,MonstersTypeConfig::INFERNO,'Wulkaniczny Golem',8600,'Jezdziec Na Krabie',9200,'Demoniczna Salamandra',17600,'Ognisty Horror',6400]
        ];

        foreach ($collectionHeroic as $value) {
            $first = $this->getIdMonster($value[2]);
            $second = $this->getIdMonster($value[4]);
            $third = $this->getIdMonster($value[6]);
            $fourth = $this->getIdMonster($value[8]);
            $this->heroics[] =
            [
                'squad_type' => MonstersSquadTypeConfig::HEROIC,
                'lvl' => $value[0],
                'type' => $value[1],
                'first_multiple' => 5,
                'first_monster' => $first, //edit
                'first_monster_count' => $value[3],
                'second_multiple' => 5,
                'second_monster' => $second, // edit
                'second_monster_count' => $value[5],
                'third_multiple' => 5,
                'third_monster' => $third, //edit
                'third_monster_count' => $value[7],
                'fourth_multiple' => 5,
                'fourth_monster' => $fourth, //edit
                'fourth_monster_count' => $value[9]
            ];
        }

        foreach ($this->heroics as $valueHeroic) {
            $heroic = new MonsterSquad;
            $heroic->fill($valueHeroic);
            $heroic->save();
        }

        $collectionCitadels = [
            [10,MonstersTypeConfig::ELF,'Lesny Gnom',2200,'Wrozka',1200,'Druid',100,'Jezdziec Pegazow',19,'Niedzwiedz',9,'Mury Twierdzy',90,'50,4k','25,2k'],
            [15,MonstersTypeConfig::ELF,'Wrozka',5000,'Druid',1100,'Centaur',290,'Jezdziec Jednorozcow',47,'Mury Twierdzy',700,'Ent',21,'580k','290k'],
            [20,MonstersTypeConfig::ELF,'Druid',3600,'Centaur',2500,'Niedzwiedz',230,'Mury Twierdzy',3650,'Ent',110,'Smok Zycia',41,'5m','2,5m'],
            [25,MonstersTypeConfig::ELF,'Centaur',10000,'Jezdziec Pegazow',4300,'Niedzwiedz',2400,'Mury Twierdzy',31900,'Ent',880,'Smok Zycia',480,'58m','29m'],
            [30,MonstersTypeConfig::ELF,'Centaur',49000,'Jezdziec PEgazow',21000,'Niedzwiedz',12000,'Mury Twierdzy',135000,'Ent',4300,'Smok Zycia',2300,'312m','156m'],
            [20,MonstersTypeConfig::CURSED,'Wilkolak',2900,'Jezdziec Smierci',650,'Jezdziec Bykow',54,'Olbrzymi Zombi',80,'Mury Twierdzy',9200,'Przeklety Smok',10,'1,36m','680k'],
            [25,MonstersTypeConfig::CURSED,'Jezdziec Smierci',2750,'Jezdziec Bykow',400,'Olbrzymi Zombi',540,'Mury Twierdzy',77500,'Przeklety Dendroid',205,'Przeklety Smok',120,'16,8m','8,4m']
        ];

        foreach ($collectionCitadels as $value) {
            $this->citadels[] =
            [
                'squad_type' => MonstersSquadTypeConfig::CITADEL,
                'lvl' => $value[0],
                'type' => $value[1],
                'first_multiple' => 1,
                'first_monster' => $this->getIdMonster($value[2]), //edit
                'first_monster_count' => $value[3],
                'second_multiple' => 1,
                'second_monster' => $this->getIdMonster($value[4]), // edit
                'second_monster_count' => $value[5],
                'third_multiple' => 1,
                'third_monster' => $this->getIdMonster($value[6]), //edit
                'third_monster_count' => $value[7],
                'fourth_multiple' => 1,
                'fourth_monster' => $this->getIdMonster($value[8]), //edit
                'fourth_monster_count' => $value[9],
                'fifth_multiple' => 1,
                'fifth_monster' => $this->getIdMonster($value[10]), //edit
                'fifth_monster_count' => $value[11],
                'sixth_multiple' => 1,
                'sixth_monster' => $this->getIdMonster($value[12]), //edit
                'sixth_monster_count' => $value[13],
            ];
        }

        foreach ($this->citadels as $valueCitadel) {
            $citadel = new MonsterSquad;
            $citadel->fill($valueCitadel);
            $citadel->save();
        }

        $collectionRare = [
            [1,'undead','Ghoul',56,'Banszi',16,'Jezdziec Mrocznych Ogarow',2],
            [2,'elf','Lesny Gnom',14,'Wrozka',7,'Centaur',3],
            [3,'cursed','Szkielet',23,'Czarownik',25,'Jezdziec Smierci',2],
            [4,'barbarian','Goblin',70,'Jezdziec Wilkow',39,'Szaman Ogrow',4],
            [5,'inferno','Demon',110,'Magog',180,'Nadzorca',3],
            [6,'undead','Banszi',48,'Jezdziec Mrocznych Ogarow',13,'Czarny Jezdziec',5],
            [7,'elf','Wrozka',220,'Druid',25,'Jezdziec Pegazow',4],
            [8,'cursed','Czarownik',230,'Wilkolak',97,'Starozytny Wampir',5],
            [9,'barbarian','Jezdziec Wilkow',360,'Mistrz Toporow',150,'Wrona Burzy',6],
            [10,'inferno','Magog',1700,'Rogaty Demon',120,'Cerber',7],
            [11,'elf','Lesny Gnom',4500,'Wrozka',1300,'Jezdziec Pegazow',21],
            [11,'undead','Ghoul',3700,'Banszi',1000,'Czarny Jezdziec',24],
            [12,'barbarian','Goblin',6800,'Jezdziec Wilkow',1300,'Wrona Burzy',19],
            [12,'cursed','Szkielet',2800,'Czarownik',1000,'Starozytny Wampir',21],
            [13,'undead','Ghoul',10000,'Nekromanta',390,'Czarny Jezdziec',65],
            [13,'inferno','Demon',8300,'Magog',4600,'Cerber',18],
            [14,'elf','Lesny Gnom',12000,'Druid',380,'Jezdziec Pegazow',56],
            [14,'cursed','Szkielet',7600,'Jezdziec Jaguara',1600,'Starozytny Wampir',57],
            [15,'barbarian','Goblin',19000,'Mistrz Toporow',1400,'Wrona Burzy',53],
            [15,'inferno','Demon',23000,'Rogaty Demon',880,'Cerber',50],
            [16,'elf','Wrozka',8000,'Druid',890,'Jezdziec Pegazow',130],
            [16,'undead','Banszi',7100,'Nekromanta',990,'Czarny Jezdziec',160],
            [16,'cursed','Czarownik',6000,'Jezdziec Jaguara',3300,'Starozytny Wampir',120],
            [17,'undead','Ghoul',45000,'Banszi',13000,'Czarny Jezdziec',290],
            [17,'inferno','Magog',23000,'Rogaty Demon',1600,'Cerber',89],
            [17,'barbarian','Jezdziec Wilkow',6700,'Mistrz Toporow',2800,'Wrona Burzy',100],
            [18,'elf','Lesny Gnom',51000,'Wrozka',14000,'Jezdziec Pegazow',230],
            [18,'cursed','Szkielet',29000,'Czarownik',11000,'Starozytny Wampir',220],
            [18,'barbarian','Goblin',64000,'Jezdziec Wilkow',12000,'Wrona Burzy',180],
            [19,'elf','Lesny Gnom',91000,'Druid',2800,'Jezdziec Pegazow',410],
            [19,'undead','Ghoul',81000,'Nekromanta',3100,'Czarny Jezdziec',520],
            [19,'inferno','Demon',72000,'Jezdziec Ognistego Rumaka',490,'Cerber',160],
            [20,'barbarian','Goblin',110000,'Mistrz Toporow',8900,'Wrona Burzy',330],
            [20,'inferno','Magog',72000,'Jezdziec Ognistego Rumaka',880,'Cerber',280],
            [20,'cursed','Szkielet',51000,'Wilkolak',7900,'Starozytny Wampir',380],
            [21,'barbarian','Jezdziec Wilkow',34000,'Mistrz Toporow',14000,'Wrona Burzy',520],
            [21,'elf','Wrozka',43000,'Druid',4800,'Jezdziec Pegazow',700],
            [21,'undead','Banszi',39000,'Nekromanta',5500,'Czarny Jezdziec',900],
            [21,'inferno','Magog',110000,'Nadzorca',860,'Cerber',440],
            [21,'cursed','Czarownik',31000,'Jezdziec Jaguara',17000,'Starozytny Wampir',630],
            [22,'barbarian','Goblin',280000,'Jezdziec Wilkow',53000,'Wrona Burzy',810],
            [22,'elf','Lesny Gnom',240000,'Wrozka',66000,'Jezdziec Pegazow',1100],
            [22,'undead','Ghoul',220000,'Banszi',61000,'Czarny Jezdziec',1400],
            [22,'inferno','Demon',310000,'Magog',170000,'Cerber',680],
            [22,'cursed','Szkielet',130000,'Czarownik',48000,'Starozytny Wampir',980],
            [23,'barbarian','Goblin',440000,'Mistrz Toporow',34000,'Wrona Burzy',1300],
            [23,'elf','Lesny Gnom',370000,'Druid',11000,'Jezdziec Pegazow',1700],
            [23,'undead','Ghoul',340000,'Nekromanta',13000,'Czarny Jezdziec',2200],
            [23,'inferno','Demon',480000,'Rogaty Demon',19000,'Cerber',1000],
            [23,'cursed','Szkielet',200000,'Wilkolak',31000,'Starozytny Wampir',1500],
            [24,'barbarian','Jezdziec Wilkow',130000,'Mistrz Toporow',53000,'Wrona Burzy',1900],
            [24,'elf','Wrozka',160000,'Druid',18000,'Jezdziec Pegazow',2600],
            [24,'undead','Banszi',150000,'Nekromanta',20000,'Czarny Jezdziec',3400],
            [24,'inferno','Magog',410000,'Rogaty Demon',29000,'Cerber',1600],
            [24,'cursed','Wilkolak',48000,'Jezdziec Jaguara',64000,'Starozytny Wampir',2300],
            [25,'barbarian','Goblin',1000000,'Jezdziec Wilkow',200000,'Jezdziec Skorpionow',1100],
            [25,'elf','Lesny Gnom',880000,'Wrozka',250000,'Niedzwiedz',1500],
            [25,'undead','Ghoul',810000,'Banszi',230000,'Gargulec',1600],
            [25,'inferno','Demon',1100000,'Magog',640000,'Ifrit',970],
            [25,'cursed','Szkielet',480000,'Czarownik',180000,'Olbrzymi Zombi',1100],
            [26,'barbarian','Goblin',1600000,'Mistrz Toporow',120000,'Cyklop',1300],
            [26,'elf','Lesny Gnom',1300000,'Druid',42000,'Niedzwiedz',2300],
            [26,'undead','Ghoul',1200000,'Jezdziec Mrocznych Ogarow',32000,'Gargulec',2400],
            [26,'inferno','Demon',1700000,'Rogaty Demon',66000,'Jezdziec Ognistego Robaka',1300],
            [26,'cursed','Szkielet',720000,'Wilkolak',110000,'Jezdziec Bykow',1900],
            [27,'barbarian','Jezdziec Wilkow',430000,'Mistrz Toporow',180000,'Jezdziec Skorpionow',2300],
            [27,'elf','Wrozka',550000,'Druid',61000,'Jezdziec Jednorozcow',2700],
            [27,'undead','Banszi',510000,'Jezdziec Mrocznych Ogarow',46000,'Gargulec',3600],
            [27,'inferno','Magog',1400000,'Rogaty Demon',96000,'Ifrit',2100],
            [27,'cursed','Czarownik',400000,'Wilkolak',170000,'Olbrzymi Zombi',2400],
            [28,'barbarian','Jezdziec Wilkow',630000,'Szaman Ogrow',30000,'Cyklop',2800],
            [28,'elf','Wrozka',810000,'Centaur',31000,'Niedzwiedz',4900],
            [28,'undead','Banszi',750000,'Kat',33000,'Gargulec',5300],
            [28,'inferno','Magog',2000000,'Nadzorca',16000,'Jezdziec Ognistego Robaka',2700],
            [28,'cursed','Czarownik',580000,'Jezdziec Smierci',27000,'Jezdziec Bykow',4000],
            [29,'barbarian','Mistrz Toporow',390000,'Szaman Ogrow',43000,'Jezdziec Skorpionow',5000],
            [29,'elf','Druid',130000,'Centaur',46000,'Jezdziec Jednorozcow',5900],
            [29,'undead','Jezdziec Mrocznych Ogarow',100000,'Kat',48000,'Gargulec',7700],
            [29,'inferno','Rogaty Demon',210000,'Nadzorca',23000,'Ifrit',4500],
            [29,'cursed','Wilkolak',360000,'Jezdziec Smierci',40000,'Olbrzymi Zombi',5200],
            [30,'barbarian','Jezdziec Wilkow',1400000,'Wrona Burzy',16000,'Cyklop',6100],
            [30,'elf','Wrozka',1800000,'Jezdziec Pegazow',21000,'Niedzwiedz',11000],
            [30,'undead','Banszi',1600000,'Czarny Jezdziec',28000,'Gargulec',11000],
            [30,'inferno','Magog',4400000,'Cerber',13000,'Jezdziec Ognistego Robaka',5900],
            [30,'cursed','Czarownik',1300000,'Starozytny Wampir',19000,'Jezdziec Bykow',8700],
            [31,'barbarian','Mistrz Toporow',760000,'Wrona Burzy',21000,'Jezdziec Skorpionow',9900],
            [31,'elf','Druid',270000,'Jezdziec Pegazow',30000,'Jezdziec Jednorozcow',12000],
            [31,'undead','Nekromanta',320000,'Czarny Jezdziec',40000,'Gargulec',16000],
            [31,'inferno','Jezdziec Ognistego Rumaka',71000,'Cerber',17000,'Ifrit',8800],
            [31,'cursed','Jezdziec Jaguara',960000,'Starozytny Wampir',26000,'Olbrzymi Zombi',11000],
            [32,'barbarian','Szaman Ogrow',110000,'Wrona Burzy',28000,'Cyklop',11000],
            [32,'elf','Centaur',120000,'Jezdziec Pegazow',40000,'Niedzwiedz',20000],
            [32,'undead','Kat',130000,'Czarny Jezdziec',53000,'Gargulec',22000],
            [32,'inferno','Nadzorca',59000,'Cerber',23000,'Jezdziec Ognistego Robaka',10000],
            [32,'cursed','Jezdziec Smierci',110000,'Starozytny Wampir',35000,'Jezdziec Bykow',16000],
            [33,'barbarian','Mistrz Toporow',1300000,'Wrona Burzy',37000,'Jezdziec Skorpionow',17000],
            [33,'elf','Druid',470000,'Jezdziec Pegazow',52000,'Jezdziec Jednorozcow',21000],
            [33,'undead','Nekromanta',560000,'Czarny Jezdziec',70000,'Gargulec',28000],
            [33,'inferno','Rogaty Demon',700000,'Cerber',30000,'Ifrit',15000],
            [33,'cursed','Jezdziec Jaguara',1700000,'Starozytny Wampir',46000,'Olbrzymi Zombi',18000],
            [34,'barbarian','Szaman Ogrow',200000,'Wrona Burzy',48000,'Jezdziec Skorpionow',23000],
            [34,'elf','Centaur',220000,'Jezdziec Pegazow',69000,'Niedzwiedz',34000],
            [34,'undead','Kat',230000,'Czarny Jezdziec',92000,'Gargulec',37000],
            [34,'inferno','Jezdziec Ognistego Rumaka',160000,'Cerber',39000,'Ifrit',20000],
            [34,'cursed','Jezdziec Smierci',190000,'Starozytny Wampir',60000,'Jezdziec Bykow',27000],
            [35,'barbarian','Szaman Ogrow',260000,'Wrona Burzy',64000,'Cyklop',25000],
            [35,'elf','Centaur',290000,'Jezdziec Pegazow',90000,'Jezdziec Jednorozcow',37000],
            [35,'undead','Kat',310000,'Czarny Jezdziec',120000,'Gargulec',49000],
            [35,'inferno','Nadzorca',130000,'Cerber',51000,'Jezdziec Ognistego Robaka',23000],
            [35,'cursed','Jezdziec Smierci',240000,'Starozytny Wampir',79000,'Olbrzymi Zombi',32000],
            [36,'undead','Zabojczy Rydwan',17000,'Powstawszy Z Martwych',6200,'Wieczny Kanonier',2900],
            [36,'cursed','Huracan',6200,'Haby',11000,'ChAk',3100],
            [37,'undead','Wladca',7400,'Starozzytny Wampir',12000,'Jezdziec Na Szczurze',3600],
            [37,'cursed','Przeklety Dendroid',17000,'Haby',17000,'Wiwern',3400],
            [38,'undead','Zabojczy Rydwan',41000,'Powstawszy Z Martwych',15000,'Wieczny Kanonier',7000],
            [39,'undead','Wladca',18000,'Starozzytny Wampir',30000,'Jezdziec Na Szczurze',8800],
            [39,'cursed','Huracan',15000,'Haby',26000,'ChAk',7500],
            [40,'cursed','Przeklety Dendroid',41000,'Haby',40000,'Wiwern',8400],
            [41,'undead','Zabojczy Rydwan',100000,'Powstawszy Z Martwych',37000,'Wieczny Kanonier',17000],
            [41,'cursed','Huracan',37000,'Haby',63000,'ChAk',18000],
            [42,'undead','Wladca',42000,'Starozzytny Wampir',70000,'Jezdziec Na Szczurze',21000],
            [42,'cursed','Przeklety Dendroid',91000,'Haby',91000,'Wiwern',19000],
            [43,'undead','Zabojczy Rydwan',210000,'Powstawszy Z Martwych',77000,'Wieczny Kanonier',35000],
            [44,'undead','Wladca',79000,'Starozzytny Wampir',130000,'Jezdziec Na Szczurze',39000],
            [44,'cursed','Huracan',72000,'Haby',120000,'ChAk',36000],
            [45,'cursed','Przeklety Dendroid',170000,'Haby',170000,'Wiwern',35000],
            [36,'elf','Ent',14000,'Driada',5300,'Straznik',2200],
            [37,'elf','Jezdziec Jednorozcow',61000,'Sowa Niedzwiedz',12000,'Peryt',2300],
            [38,'elf','Ent',35000,'Driada',13000,'Straznik',5400],
            [40,'elf','Jezdziec Jednorozcow',150000,'Sowa Niedzwiedz',29000,'Peryt',5500],
            [41,'elf','Ent',85000,'Driada',31000,'Straznik',13000],
            [42,'elf','Jezdziec Jednorozcow',340000,'Sowa Niedzwiedz',66000,'Peryt',13000],
            [43,'elf','Ent',170000,'Driada',63000,'Straznik',27000],
            [45,'elf','Jezdziec Jednorozcow',640000,'Sowa Niedzwiedz',120000,'Peryt',24000],
            [37,'inferno','Jezdziec Ognistego Robaka',27000,'Wladca Ognia',2400,'Demoniczna Salamandra',4400],
            [38,'inferno','Ifrit',49000,'Wladca Ognia',3800,'Jezdziec Na Krabie',4500],
            [39,'inferno','Jezdziec Ognistego Robaka',66000,'Wladca Ognia',5900,'Demoniczna Salamandra',11000],
            [40,'inferno','Ifrit',120000,'Wladca Ognia',9200,'Jezdziec Na Krabie',11000],
            [42,'inferno','Jezdziec Ognistego Robaka',160000,'Wladca Ognia',14000,'Demoniczna Salamandra',26000],
            [43,'inferno','Ifrit',250000,'Wladca Ognia',20000,'Jezdziec Na Krabie',23000],
            [44,'inferno','Jezdziec Ognistego Robaka',300000,'Wladca Ognia',27000,'Demoniczna Salamandra',48000],
            [45,'inferno','Ifrit',470000,'Wladca Ognia',37000,'Jezdziec Na Krabie',43000]
        ];

        foreach ($collectionRare as $value) {
            $this->rares[] =
            [
                'squad_type' => MonstersSquadTypeConfig::RARE,
                'lvl' => $value[0],
                'type' => $value[1],
                'first_multiple' => 1,
                'first_monster' => $this->getIdMonster($value[2]), //edit
                'first_monster_count' => $value[3],
                'second_multiple' => 1,
                'second_monster' => $this->getIdMonster($value[4]), // edit
                'second_monster_count' => $value[5],
                'third_multiple' => 1,
                'third_monster' => $this->getIdMonster($value[6]), //edit
                'third_monster_count' => $value[7]
            ];
        }

        foreach ($this->rares as $valueRare) {
            $rare = new MonsterSquad;
            $rare->fill($valueRare);
            $rare->save();
        }

        $collectionNormal = [
            [1,'undead','Ghoul',93,NULL,NULL,'200','100'],
            [2,'elf','Lesny Gnom',140,NULL,NULL,'340','170'],
            [3,'cursed','Szkielet',110,NULL,NULL,'540','270'],
            [4,'barbarian','Goblin',330,NULL,NULL,'880','440'],
            [5,'inferno','Demon',500,NULL,NULL,'1,44k','720'],
            [6,'undead','Banszi',210,NULL,NULL,'2,4k','1,2k'],
            [7,'elf','Wrozka',330,NULL,NULL,'3,8k','1,9k'],
            [8,'cursed','Czarownik',330,NULL,NULL,'6,2k','3,1k'],
            [9,'barbarian','Jezdziec Wilkow',510,NULL,NULL,'10k','5k'],
            [10,'inferno','Magog',2300,NULL,NULL,'16,2k','8,1k'],
            [11,'elf','Lesny Gnom',1900,'Wrozka',1200,'26,2k','13,1k'],
            [11,'undead','Ghoul',1500,'Jezdziec Mrocznych Ogarow',91,'20,6k','10,3k'],
            [12,'barbarian','Goblin',2800,'Jezdziec Wilkow',1200,'42,2k','21,1k'],
            [12,'cursed','Szkielet',1100,'Jezdziec Jaguara',550,'33,2k','16,6k'],
            [13,'undead','Jezdziec Mrocznych Ogarow',110,'Nekromanta',380,'67,8k','33,9k'],
            [13,'inferno','Demon',3400,'Magog',4500,'53,4k','26,7k'],
            [14,'elf','Lesny Gnom',5100,'Druid',370,'85,8k','42,9k'],
            [14,'cursed','Czarownik',1200,'Jezdziec Jaguara',1500,'108k','54k'],
            [15,'barbarian','Goblin',7700,'Mistrz Toporow',1400,'138k','69k'],
            [15,'inferno','Demon',9400,'Rogaty Demon',850,'176k','88k'],
            [16,'elf','Wrozka',3300,'Druid',850,'226k','113k'],
            [16,'undead','Banszi',2900,'Jezdziec Mrocznych Ogarow',620,'200k','100k'],
            [16,'cursed','Czarownik',2400,'Wilkolak',2400,'258k','129k'],
            [17,'barbarian','Jezdziec Wilkow',2700,'Mistrz Toporow',2700,'294k','147k'],
            [17,'undead','Nekromanta',710,'Jezdziec Mrocznych Ogarow',1100,'380k','190k'],
            [17,'inferno','Rogaty Demon',640,'Jezdziec Ognistego Rumaka',260,'334k','167k'],
            [18,'barbarian','Goblin',26000,'Mistrz Toporow',4600,'558k','279k'],
            [18,'elf','Lesny Gnom',20000,'Druid',1500,'432k','216k'],
            [18,'cursed','Jezdziec Jaguara',2400,'Wilkolak',4200,'492k','246k'],
            [19,'elf','Wrozka',17000,'Centaur',640,'822k','411k'],
            [19,'undead','Jezdziec Mrocznych Ogarow',1100,'Nekromanta',2500,'722k','361k'],
            [19,'inferno','Demon',29000,'Rogaty Demon',2600,'636k','318k'],
            [20,'barbarian','Goblin',45000,'Mistrz Toporow',8100,'1,06m','532k'],
            [20,'inferno','Magog',28000,'Rogaty Demon',4500,'1,21m','605k'],
            [20,'cursed','Czarownik',9700,'Jezdziec Jaguara',4100,'936k','468k'],
            [21,'barbarian','Jezdziec Wilkow',13000,'Mistrz Toporow',13000,'1,82m','910k'],
            [21,'elf','Wrozka',17000,'Druid',4400,'1,48m','740k'],
            [21,'undead','Banszi',15000,'Jezdziec Mrocznych Ogarow',3200,'1,34m','670k'],
            [21,'inferno','Magog',44000,'Rogaty Demon',7200,'2m','1m'],
            [21,'cursed','Czarownik',12000,'Jezdziec Jaguara',16000,'1,64m','820k'],
            [22,'barbarian','Goblin',110000,'Mistrz Toporow',21000,'3,04m','1,52m'],
            [22,'elf','Druid',4400,'Centaur',1900,'2,48m','1,24m'],
            [22,'undead','Ghoul',140000,'Jezdziec Mrocznych Ogarow',3700,'2,24m','1,12m'],
            [22,'inferno','Demon',120000,'Rogaty Demon',11000,'3,36m','1,68m'],
            [22,'cursed','Wilkolak',8100,'Jezdziec Jaguara',25000,'2,74m','1,37m'],
            [23,'barbarian','Jezdziec Wilkow',34000,'Mistrz Toporow',33000,'5,06m','2,53m'],
            [23,'elf','Wrozka',42000,'Centaur',3800,'4,14m','2,07m'],
            [23,'undead','Ghoul',140000,'Jezdziec Mrocznych Ogarow',8100,'3,72m','1,86m'],
            [23,'inferno','Magog',110000,'Jezdziec Ognistego Rumaka',3100,'5,62m','2,81m'],
            [23,'cursed','Jezdziec Jaguara',17000,'Wilkolak',30000,'4,58m','2,29m'],
            [24,'barbarian','Goblin',290000,'Szaman Ogrow',5800,'8,46m','4,23m'],
            [24,'elf','Lesny Gnom',240000,'Centaur',6000,'6,88m','3,44m'],
            [24,'undead','Jezdziec Mrocznych Ogarow',9200,'Nekromanta',14000,'6,22m','3,11m'],
            [24,'inferno','Demon',310000,'Jezdziec Ognistego Rumaka',5000,'9,36m','4,68m'],
            [24,'cursed','Szkielet',130000,'Jezdziec Smierci',5300,'7,62m','3,81m'],
            [25,'barbarian','Mistrz Toporow',35000,'Szaman Ogrow',9200,'14m','7m'],
            [25,'elf','Wrozka',110000,'Centaur',9400,'11,4m','5,7m'],
            [25,'undead','Banszi',96000,'Kat',9700,'10,4m','5,2m'],
            [25,'inferno','Magog',280000,'Nadzorca',5000,'15,6m','7,8m'],
            [25,'cursed','Czarownik',77000,'Jezdziec Smierci',8400,'12,7m','6,36m'],
            [26,'barbarian','Mistrz Toporow',53000,'Szaman Ogrow',14000,'22,2m','11,1m'],
            [26,'elf','Druid',18000,'Centaur',15000,'18,6m','9,3m'],
            [26,'undead','Jezdziec Mrocznych Ogarow',14000,'Kat',15000,'17m','8,5m'],
            [26,'inferno','Nadzorca',5300,'Jezdziec Ognistego Rumaka',8300,'24,4m','12,2m'],
            [26,'cursed','Wilkolak',49000,'Jezdziec Smierci',13000,'20,4m','10,2m'],
            [27,'barbarian','Goblin',1000000,'Szaman Ogrow',20000,'34,8m','17,4m'],
            [27,'elf','Lesny Gnom',860000,'Centaur',22000,'29m','14,5m'],
            [27,'undead','Jezdziec Mrocznych Ogarow',34000,'Nekromanta',51000,'26,6m','13,3m'],
            [27,'inferno','Jezdziec Ognistego Rumaka',7400,'Nadzorca',11000,'38m','19m'],
            [27,'cursed','Szkielet',460000,'Jezdziec Smierci',19000,'31,8m','15,9m'],
            [28,'barbarian','Goblin',1500000,'Szaman Ogrow',30000,'54m','27m'],
            [28,'elf','Wrozka',350000,'Centaur',32000,'45,2m','22,6'],
            [28,'undead','Banszi',330000,'Kat',33000,'41,4m','20,7m'],
            [28,'inferno','Magog',900000,'Jezdziec Ognistego Rumaka',26000,'59,2m','29,6m'],
            [28,'cursed','Czarownik',260000,'Jezdziec Smierci',28000,'49,6m','24,8'],
            [29,'barbarian','Mistrz Toporow',170000,'Szaman Ogrow',45000,'84,4m','42,2m'],
            [29,'elf','Druid',58000,'Centaur',47000,'70,6m','35,3m'],
            [29,'undead','Jezdziec Mrocznych Ogarow',44000,'Kat',49000,'64,6m','32,3m'],
            [29,'inferno','Rogaty Demon',92000,'Nadzorca',24000,'92,2m','46,1m'],
            [29,'cursed','Wilkolak',160000,'Jezdziec Smierci',41000,'77,2m','38,6m'],
            [30,'barbarian','Mistrz Toporow',250000,'Szaman Ogrow',66000,'132m','66m'],
            [30,'elf','Wrozka',780000,'Centaur',70000,'110m','55m'],
            [30,'undead','Jezdziec Mrocznych Ogarow',65000,'Kat',73000,'100m','50m'],
            [30,'inferno','Demon',3500000,'Jezdziec Ognistego Rumaka',56000,'144m','72m'],
            [30,'cursed','Czarownik',560000,'Jezdziec Smierci',61000,'120m','60m'],
            [31,'barbarian','Jezdziec Wilkow',820000,'Szaman Ogrow',89000,'187m','93,5m'],
            [31,'elf','Wrozka',1100000,'Centaur',98000,'164m','82m'],
            [31,'undead','Banszi',1000000,'Kat',110000,'154m','77m'],
            [31,'inferno','Nadzorca',33000,'Jezdziec Ognistego Rumaka',53000,'200m','100m'],
            [31,'cursed','Czarownik',770000,'Jezdziec Smierci',84000,'175m','87,5m'],
            [32,'barbarian','Mistrz Toporow',450000,'Szaman Ogrow',120000,'260m','130m'],
            [32,'elf','Druid',160000,'Centaur',130000,'228m','114m'],
            [32,'undead','Nekromanta',190000,'Kat',140000,'214m','107m'],
            [32,'inferno','Rogaty Demon',240000,'Jezdziec Ognistego Rumaka',97000,'278m','139m'],
            [32,'cursed','Wilkolak',420000,'Jezdziec Smierci',110000,'244m','122m'],
            [33,'barbarian','Goblin',7600000,'Szaman Ogrow',160000,'362m','181m'],
            [33,'elf','Lesny Gnom',6800000,'Centaur',170000,'316m','158m'],
            [33,'undead','Jezdziec Mrocznych Ogarow',160000,'Kat',180000,'296m','148m'],
            [33,'inferno','Nadzorca',58000,'Jezdziec Ognistego Rumaka',92000,'386m','193m'],
            [33,'cursed','Szkielet',3600000,'Jezdziec Smierci',150000,'338m','169m'],
            [34,'barbarian','Mistrz Toporow',780000,'Szaman Ogrow',210000,'502m','251m'],
            [34,'elf','Wrozka',2500000,'Centaur',230000,'440m','220m'],
            [34,'undead','Banszi',2400000,'Kat',240000,'412m','206m'],
            [34,'inferno','Nadzorca',76000,'Jezdziec Ognistego Rumaka',120000,'536m','268m'],
            [34,'cursed','Czarownik',1800000,'Jezdziec Smierci',190000,'470m','235m'],
            [35,'barbarian','Mistrz Toporow',1000000,'Szaman Ogrow',270000,'700m','350m'],
            [35,'elf','Druid',370000,'Centaur',300000,'612m','306m'],
            [35,'undead','Jezdziec Mrocznych Ogarow',290000,'Kat',320000,'574m','287m'],
            [35,'inferno','Jezdziec Ognistego Rumaka',96000,'Nadzorca',140000,'746m','373m'],
            [35,'cursed','Wilkolak',970000,'Jezdziec Smierci',260000,'654m','327m'],
            [36,'undead','Zabojczy Rydwan',7500,'Starozzytny Wampir',8100,'818m','409m'],
            [36,'cursed','Przeklety Dendroid',4700,'Haby',11000,'982m','491m'],
            [37,'undead','Zabojczy Rydwan',11000,'Powstawszy Z Martwych',9700,'1,29b','645m'],
            [37,'cursed','Haby',7000,'Huracan',9500,'1,54b','774m'],
            [38,'undead','Wladca',4700,'Starozzytny Wampir',18000,'2,04b','1,02b'],
            [39,'undead','Gargulec',73000,'Powstawszy Z Martwych',22000,'3,22b','1,61b'],
            [39,'cursed','Przeklety Smok',3500,'Haby',24000,'2,44b','1,22b'],
            [40,'cursed','Przeklety Smok',5300,'Huracan',21000,'3,86b','1,93b'],
            [41,'undead','Kosciany Golem',31000,'Starozzytny Wampir',41000,'5,06b','2,53b'],
            [41,'cursed','Jezdziec Bykow',85000,'Haby',55000,'6,08b','3,04b'],
            [42,'undead','Wladca',15000,'Powstawszy Z Martwych',48000,'7,84b','3,92b'],
            [42,'cursed','Przeklety Dendroid',33000,'Huracan',45000,'9,02b','4,51b'],
            [43,'undead','Zabojczy Rydwan',75000,'Starozzytny Wampir',81000,'11,1b','5,58b'],
            [44,'undead','Zabojczy Rydwan',100000,'Powstawszy Z Martwych',87000,'15,9b','7,95b'],
            [44,'cursed','Przeklety Dendroid',45000,'Haby',100000,'12,8b','6,43b'],
            [45,'cursed','Haby',60000,'Huracan',82000,'18,3b','9,16b'],
            [36,'elf','Smok Zycia',1900,'Sowa Niedzwiedz',7800,'896m','448m'],
            [37,'elf','Smok Zycia',2900,'Driada',8100,'1,41b','707m'],
            [38,'elf','Jezdziec Jednorozcow',39000,'Sowa Niedzwiedz',17000,'2,24b','1,12b'],
            [40,'elf','Ent',21000,'Driada',18000,'3,52b','1,76b'],
            [41,'elf','Driada',12000,'Sowa Niedzwiedz',39000,'5,56b','2,78b'],
            [42,'elf','Jezdziec Jednorozcow',120000,'Driada',39000,'8,4b','4,2b'],
            [43,'elf','Smok Zycia',19000,'Sowa Niedzwiedz',76000,'11,9b','5,99b'],
            [45,'elf','Smok Zycia',26000,'Driada',71000,'17b','8,53b'],
            [37,'inferno','Wladca Ognia',1000,'Ognista Wiedzma',15000,'1,17b','585m'],
            [38,'inferno','Ifrit',20000,'Wulkaniczny Golem',12000,'1,83b','915m'],
            [39,'inferno','Wladca Ognia',2300,'Ognista Wiedzma',33000,'2,86b','1,43b'],
            [40,'inferno','Ifrit',44000,'Wulkaniczny Golem',26000,'4,48b','2,24b'],
            [42,'inferno','Wladca Ognia',5100,'Ognista Wiedzma',72000,'7,04b','3,52b'],
            [43,'inferno','Ifrit',88000,'Wulkaniczny Golem',53000,'10b','5,02b'],
            [44,'inferno','Wladca Ognia',6400,'Ognista Wiedzma',130000,'14,3b','7,18b'],
            [45,'inferno','Ifrit',160000,'Wulkaniczny Golem',98000,'20,6b','10,3b']
        ];

        foreach ($collectionNormal as $value) {
            $this->normals[] =
            [
                'squad_type' => MonstersSquadTypeConfig::NORMAL,
                'lvl' => $value[0],
                'type' => $value[1],
                'first_multiple' => 1,
                'first_monster' => $this->getIdMonster($value[2]), //edit
                'first_monster_count' => $value[3],
                'second_multiple' => 1,
                'second_monster' => $this->getIdMonster($value[4]), // edit
                'second_monster_count' => $value[5]
            ];
        }

        foreach ($this->normals as $valueNormal) {
            $normal = new MonsterSquad;
            $normal->fill($valueNormal);
            $normal->save();
        }

    }
    private function getIdMonster(?string $name) : ?int
    {
        if ($name === null) {
            return null;
        }
        $monster = Monster::where('name', $name)->first();
        return $monster->id;
    }
}

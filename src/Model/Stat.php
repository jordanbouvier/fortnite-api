<?php
namespace FortniteApi\Model;

use FortniteApi\Exceptions\InvalidStatException;

class  Stat
{
    const FORTNITE_QUEUE_CODE = [
        'p10' => 'duo',
        'p2' => 'solo',
        'p9' => 'squad'
    ];

    private $soloScore;
    private $duoScore;
    private $squadScore;
    private $soloMatchPlayed;
    private $duoMatchPlayed;
    private $squadMatchPlayed;
    private $soloTop25;
    private $duoTop12;
    private $squadTop6;
    private $soloTop10;
    private $duoTop5;
    private $squadTop3;
    private $soloTop1;
    private $duoTop1;
    private $squadTop1;
    private $soloKills;
    private $duoKills;
    private $squadKills;
    private $soloTimePlayed;
    private $duoTimePlayed;
    private $squadTimePlayed;
    private $lastModified;
    private $plateform;

    public function __construct()
    {
        $this->lastModified = new \DateTime();
    }


    /**
     * @return mixed
     */
    public function getSoloScore()
    {
        return $this->soloScore;
    }

    /**
     * @param mixed $soloScore
     * @return Stat
     */
    public function setSoloScore($soloScore)
    {
        $this->soloScore = $soloScore;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuoScore()
    {
        return $this->duoScore;
    }

    /**
     * @param mixed $duoScore
     * @return Stat
     */
    public function setDuoScore($duoScore)
    {
        $this->duoScore = $duoScore;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSquadScore()
    {
        return $this->squadScore;
    }

    /**
     * @param mixed $squadScore
     * @return Stat
     */
    public function setSquadScore($squadScore)
    {
        $this->squadScore = $squadScore;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoloMatchPlayed()
    {
        return $this->soloMatchPlayed;
    }

    /**
     * @param mixed $soloMatchPlayed
     * @return Stat
     */
    public function setSoloMatchPlayed($soloMatchPlayed)
    {
        $this->soloMatchPlayed = $soloMatchPlayed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuoMatchPlayed()
    {
        return $this->duoMatchPlayed;
    }

    /**
     * @param mixed $duoMatchPlayed
     * @return Stat
     */
    public function setDuoMatchPlayed($duoMatchPlayed)
    {
        $this->duoMatchPlayed = $duoMatchPlayed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSquadMatchPlayed()
    {
        return $this->squadMatchPlayed;
    }

    /**
     * @param mixed $squadMatchPlayed
     * @return Stat
     */
    public function setSquadMatchPlayed($squadMatchPlayed)
    {
        $this->squadMatchPlayed = $squadMatchPlayed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoloTop25()
    {
        return $this->soloTop25;
    }

    /**
     * @param mixed $soloTop25
     * @return Stat
     */
    public function setSoloTop25($soloTop25)
    {
        $this->soloTop25 = $soloTop25;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuoTop12()
    {
        return $this->duoTop12;
    }

    /**
     * @param mixed $duoTop12
     * @return Stat
     */
    public function setDuoTop12($duoTop12)
    {
        $this->duoTop12 = $duoTop12;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSquadTop6()
    {
        return $this->squadTop6;
    }

    /**
     * @param mixed $squadTop6
     * @return Stat
     */
    public function setSquadTop6($squadTop6)
    {
        $this->squadTop6 = $squadTop6;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoloTop10()
    {
        return $this->soloTop10;
    }

    /**
     * @param mixed $soloTop10
     * @return Stat
     */
    public function setSoloTop10($soloTop10)
    {
        $this->soloTop10 = $soloTop10;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuoTop5()
    {
        return $this->duoTop5;
    }

    /**
     * @param mixed $duoTop5
     * @return Stat
     */
    public function setDuoTop5($duoTop5)
    {
        $this->duoTop5 = $duoTop5;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSquadTop3()
    {
        return $this->squadTop3;
    }

    /**
     * @param mixed $squadTop3
     * @return Stat
     */
    public function setSquadTop3($squadTop3)
    {
        $this->squadTop3 = $squadTop3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoloTop1()
    {
        return $this->soloTop1;
    }

    /**
     * @param mixed $soloTop1
     * @return Stat
     */
    public function setSoloTop1($soloTop1)
    {
        $this->soloTop1 = $soloTop1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuoTop1()
    {
        return $this->duoTop1;
    }

    /**
     * @param mixed $duoTop1
     * @return Stat
     */
    public function setDuoTop1($duoTop1)
    {
        $this->duoTop1 = $duoTop1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSquadTop1()
    {
        return $this->squadTop1;
    }

    /**
     * @param mixed $squadTop1
     * @return Stat
     */
    public function setSquadTop1($squadTop1)
    {
        $this->squadTop1 = $squadTop1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoloKills()
    {
        return $this->soloKills;
    }

    /**
     * @param mixed $soloKills
     * @return Stat
     */
    public function setSoloKills($soloKills)
    {
        $this->soloKills = $soloKills;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuoKills()
    {
        return $this->duoKills;
    }

    /**
     * @param mixed $duoKills
     * @return Stat
     */
    public function setDuoKills($duoKills)
    {
        $this->duoKills = $duoKills;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSquadKills()
    {
        return $this->squadKills;
    }

    /**
     * @param mixed $squadKills
     * @return Stat
     */
    public function setSquadKills($squadKills)
    {
        $this->squadKills = $squadKills;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoloTimePlayed()
    {
        return $this->soloTimePlayed;
    }

    /**
     * @param mixed $soloTimePlayed
     * @return Stat
     */
    public function setSoloTimePlayed($soloTimePlayed)
    {
        $this->soloTimePlayed = $soloTimePlayed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuoTimePlayed()
    {
        return $this->duoTimePlayed;
    }

    /**
     * @param mixed $duoTimePlayed
     * @return Stat
     */
    public function setDuoTimePlayed($duoTimePlayed)
    {
        $this->duoTimePlayed = $duoTimePlayed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSquadTimePlayed()
    {
        return $this->squadTimePlayed;
    }

    /**
     * @param mixed $squadTimePlayed
     * @return Stat
     */
    public function setSquadTimePlayed($squadTimePlayed)
    {
        $this->squadTimePlayed = $squadTimePlayed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @param mixed $lastModified
     * @return Stat
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getPlateform()
    {
        return $this->plateform;
    }

    /**
     * @param mixed $plateform
     * @return Stat
     */
    public function setPlateform($plateform)
    {
        $this->plateform = $plateform;
        return $this;
    }

    /**
     * @param string $data
     * @param $plateform
     * @return Stat
     * @throws InvalidStatException
     */
    public static function convertStatsFromApi(string $data, $plateform): Stat
    {
        $data = json_decode($data);
        $result = [];
        foreach($data as $stat){
            $pieces = explode('_', $stat->name);
            if(!key_exists(4, $pieces) || !key_exists(3,$pieces) || !key_exists(2, $pieces) || !key_exists(1,$pieces) || !key_exists(0, $pieces)){
                throw new InvalidStatException();
            }

            $result[$plateform][self::FORTNITE_QUEUE_CODE[$pieces[4]]][$pieces[1]] = $stat->value;
        }

        $stats = new Stat();

        $stats->setSoloKills($result[$plateform]['solo']['kills'])
            ->setSoloMatchPlayed($result[$plateform]['solo']['matchesplayed'])
            ->setSoloTimePlayed($result[$plateform]['solo']['minutesplayed'])
            ->setSoloTop25($result[$plateform]['solo']['placetop25'])
            ->setSoloTop10($result[$plateform]['solo']['placetop10'])
            ->setSoloTop1($result[$plateform]['solo']['placetop1'])
            ->setSoloScore($result[$plateform]['solo']['score'])
            ->setDuoKills($result[$plateform]['duo']['kills'])
            ->setDuoMatchPlayed($result[$plateform]['duo']['matchesplayed'])
            ->setDuoTimePlayed($result[$plateform]['duo']['minutesplayed'])
            ->setDuoTop12($result[$plateform]['duo']['placetop12'])
            ->setDuoTop5($result[$plateform]['duo']['placetop5'])
            ->setDuoTop1($result[$plateform]['duo']['placetop1'])
            ->setDuoScore($result[$plateform]['duo']['score'])
            ->setSquadKills($result[$plateform]['squad']['kills'])
            ->setSquadMatchPlayed($result[$plateform]['squad']['matchesplayed'])
            ->setSquadTimePlayed($result[$plateform]['squad']['minutesplayed'])
            ->setSquadTop6($result[$plateform]['squad']['placetop6'])
            ->setSquadTop3($result[$plateform]['squad']['placetop3'])
            ->setSquadTop1($result[$plateform]['squad']['placetop1'])
            ->setSquadScore($result[$plateform]['squad']['score'])
            ->setPlateform($plateform);
        return $stats;
    }

}

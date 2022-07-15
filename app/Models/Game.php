<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    
    public function homeTeam()
    {
        return $this->hasOne(Team::class, 'id', 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->hasOne(Team::class, 'id', 'away_team_id');
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }

    public function homeTeamStats()
    {
        return $this->hasMany(TeamStat::class)->where('home_away', 'home');
    }

    public function awayTeamStats()
    {
        return $this->hasMany(TeamStat::class)->where('home_away', 'away');
    }

    public function homePlayerStats()
    {
        return $this->hasMany(PlayerStat::class)->where('home_away', 'home');
    }

    public function awayPlayerStats()
    {
        return $this->hasMany(PlayerStat::class)->where('home_away', 'away');
    }
}

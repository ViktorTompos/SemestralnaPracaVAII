<?php

namespace App\Models;

use Framework\Core\Model;

/**
 * Class tournament
 * Model turnaja, zodpoveda tabulke tournaments v databaze.
 */

class Tournament extends Model
{
    protected ?int $id = null;
    protected ?string $name = null;
    protected ?string $game = null;
    protected ?string $start_date = null;
    protected ?string $location = null;
    protected ?int $max_teams = null;
    protected ?int $prize = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getGame(): ?string
    {
        return $this->game;
    }

    public function setGame(?string $game): void
    {
        $this->game = $game;
    }

    public function getStartDate(): ?string
    {
        return $this->start_date;
    }

    public function setStartDate(?string $start_date): void
    {
        $this->start_date = $start_date;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    public function getMaxTeams(): ?int
    {
        return $this->max_teams;
    }

    public function setMaxTeams(?int $max_teams): void
    {
        $this->max_teams = $max_teams;
    }

    public function getPrize(): ?int
    {
        return $this->prize;
    }

    public function setPrize(?int $prize): void
    {
        $this->prize = $prize;
    }

}
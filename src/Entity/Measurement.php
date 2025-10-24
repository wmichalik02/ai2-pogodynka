<?php

namespace App\Entity;

use App\Repository\MeasurementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeasurementRepository::class)]
class Measurement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: 0)]
    private ?string $celsius = null;

	#[ORM\Column(type: 'float', nullable: true)]
	private ?float $windSpeed = null;

	#[ORM\Column(type: 'decimal', precision: 5, scale: 2, nullable: true)]
	private ?string $precipitation = null;

    #[ORM\ManyToOne(inversedBy: 'measurements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?WeatherStation $station = null;

    public function getId(): ?int
    {
        return $this->id;
    }




    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getCelsius(): ?string
    {
        return $this->celsius;
    }

    public function setCelsius(string $celsius): static
    {
        $this->celsius = $celsius;

        return $this;
    }

    public function getWindSpeed(): ?float
    {
        return $this->windSpeed;
    }

    public function setWindSpeed(float $windSpeed): static
    {
        $this->windSpeed = $windSpeed;

        return $this;
    }

    public function getPrecipitation(): ?string
    {
        return $this->precipitation;
    }

    public function setPrecipitation(string $precipitation): static
    {
        $this->precipitation = $precipitation;

        return $this;
    }

    public function getStation(): ?WeatherStation
    {
        return $this->station;
    }

    public function setStation(?WeatherStation $station): static
    {
        $this->station = $station;

        return $this;
    }
}

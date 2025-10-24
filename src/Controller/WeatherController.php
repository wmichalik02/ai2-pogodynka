<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MeasurementRepository;
use App\Repository\LocationRepository;
final class WeatherController extends AbstractController
{
    #[Route('/weather/{city}', name: 'app_weather_city')]
    public function city(string $city, LocationRepository $locationRepo, MeasurementRepository $measurementRepo): Response
    {
        $location = $locationRepo->findOneByCity($city);

        if (!$location) {
            throw $this->createNotFoundException("Nie znaleziono lokalizacji: $city");
        }

        $measurements = $measurementRepo->findByLocation($location);

        return $this->render('weather/city.html.twig', [
            'location' => $location,
            'measurements' => $measurements,
        ]);
    }


}

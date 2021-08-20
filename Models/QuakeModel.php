<?php
/**
 * user: javaci
 * date: 20.08.2021
 * project: turkey-earthquake-api
 */


class QuakeModel
{
    public function __construct(
        public ?string $date,
        public ?string $time,
        public ?float $latitude,
        public ?float $longitude,
        public ?float $depth,
        public ?string $scale_MD,
        public ?string $scale_ML,
        public ?string $scale_Mw,
        public ?string $location,
        public ?string $hash = null
    )
    {
        $this->createAndSetHash();
    }

    private function createAndSetHash()
    {
        $this->hash = md5($this->date . $this->time . $this->depth . $this->location);
    }

}
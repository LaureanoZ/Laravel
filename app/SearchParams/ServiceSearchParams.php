<?php

namespace App\SearchParams;

class ServiceSearchParams
{
    private ?string $title = null;

    public function __construct(array $params)
    {
        $this->title = $params['t'] ?? null;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }
}

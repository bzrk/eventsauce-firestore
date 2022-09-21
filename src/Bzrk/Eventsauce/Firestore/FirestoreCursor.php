<?php

declare(strict_types=1);

namespace Bzrk\Eventsauce\Firestore;

use EventSauce\EventSourcing\PaginationCursor;

final class FirestoreCursor implements PaginationCursor
{
    private function __construct(private readonly string $value, private readonly bool $isAtStart)
    {
    }

    public function toString(): string
    {
        return $this->value;
    }

    public static function fromString(string $cursor): static
    {
        return new static($cursor, false);
    }

    public static function fromStart(): static
    {
        return new static('', true);
    }

    public function isAtStart(): bool
    {
        return $this->isAtStart;
    }
}

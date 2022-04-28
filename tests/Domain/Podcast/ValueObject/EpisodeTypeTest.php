<?php

declare(strict_types=1);

namespace Tests\Domain\Podcast\ValueObject;

use Domain\Podcast\ValueObject\EpisodeType;
use PHPUnit\Framework\TestCase;

final class EpisodeTypeTest extends TestCase
{
    public function testInstanceValueHasExceptedOptions(): void
    {
        $types = ['Full', 'Bonus', 'Trailer'];
        foreach ($types as $type) {
            $this->assertContains($type, EpisodeType::TYPES);
        }
    }

    public function testCreateInstanceValueWithInvalidOption(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        EpisodeType::fromString('invalid');
    }

    public function testInstanceValueCastToStringValue(): void
    {
        $full = EpisodeType::full();
        $this->assertSame('Full', (string) $full);

        $bonus = EpisodeType::bonus();
        $this->assertSame('Bonus', (string) $bonus);

        $trailer = EpisodeType::trailer();
        $this->assertSame('Trailer', (string) $trailer);
    }

    public function testSameInstanceValueAreEquals(): void
    {
        $type = EpisodeType::trailer();
        $type2 = EpisodeType::trailer();
        $this->assertSame(true, $type->equals($type2));
    }

    public function testDifferentInstanceValueAreNotEquals(): void
    {
        $type = EpisodeType::full();
        $type2 = EpisodeType::bonus();
        $this->assertSame(false, $type->equals($type2));
    }

    public function testStringValueEqualsInstanceValue(): void
    {
        $type = EpisodeType::full();
        $type2 = 'Full';
        $this->assertSame(true, $type->equals($type2));
    }
}

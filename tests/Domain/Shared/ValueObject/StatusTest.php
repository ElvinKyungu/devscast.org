<?php

declare(strict_types=1);

namespace Tests\Domain\Shared\ValueObject;

use Domain\Shared\ValueObject\Status;
use PHPUnit\Framework\TestCase;

/**
 * Class StatusTest.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class StatusTest extends TestCase
{
    public function testInstanceValueHasExceptedOptions(): void
    {
        $states = ['draft', 'published', 'reviewing'];
        foreach ($states as $state) {
            $this->assertContains($state, Status::STATUS);
        }
    }

    public function testCreateInstanceValueWithInvalidOption(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Status::fromString('invalid');
    }

    public function testInstanceValueCastToStringValue(): void
    {
        $a = Status::draft();
        $this->assertSame('draft', (string) $a);

        $b = Status::published();
        $this->assertSame('published', (string) $b);

        $c = Status::reviewing();
        $this->assertSame('reviewing', (string) $c);
    }

    public function testSameInstanceValueAreEquals(): void
    {
        $a = Status::draft();
        $b = Status::draft();
        $this->assertSame(true, $a->equals($b));
        $this->assertSame(true, $b->equals($a));
    }

    public function testDifferentInstanceValueAreNotEquals(): void
    {
        $a = Status::draft();
        $b = Status::published();
        $this->assertSame(false, $a->equals($b));
        $this->assertSame(false, $b->equals($a));
    }

    public function testStringValueEqualsInstanceValue(): void
    {
        $a = Status::draft();
        $b = 'draft';
        $this->assertSame(true, $a->equals($b));
    }
}

<?php

declare(strict_types=1);

namespace Tests\Domain\Shared\ValueObject;

use Domain\Shared\ValueObject\Visibility;
use PHPUnit\Framework\TestCase;

/**
 * Class VisibilityTest.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class VisibilityTest extends TestCase
{
    public function testInstanceValueHasExceptedOptions(): void
    {
        $visibilities = ['public', 'private', 'unlisted'];
        foreach ($visibilities as $visibility) {
            $this->assertContains($visibility, Visibility::VISIBILITIES);
        }
    }

    public function testCreateInstanceValueWithInvalidOption(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Visibility::fromString('invalid');
    }

    public function testInstanceValueCastToStringValue(): void
    {
        $a = Visibility::public();
        $this->assertSame('public', (string) $a);

        $b = Visibility::private();
        $this->assertSame('private', (string) $b);

        $c = Visibility::unlisted();
        $this->assertSame('unlisted', (string) $c);
    }

    public function testSameInstanceValueAreEquals(): void
    {
        $a = Visibility::public();
        $b = Visibility::public();
        $this->assertSame(true, $a->equals($b));
        $this->assertSame(true, $b->equals($a));
    }

    public function testDifferentInstanceValueAreNotEquals(): void
    {
        $a = Visibility::public();
        $b = Visibility::private();
        $this->assertSame(false, $a->equals($b));
        $this->assertSame(false, $b->equals($a));
    }

    public function testStringValueEqualsInstanceValue(): void
    {
        $a = Visibility::public();
        $b = 'public';
        $this->assertSame(true, $a->equals($b));
    }
}

<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class ThisTest extends Setlogout
{
    public function testFailure(): void
    {
        $this->assertTrue(false);
    }
}
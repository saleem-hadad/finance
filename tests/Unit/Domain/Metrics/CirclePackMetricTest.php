<?php

namespace Tests\Unit\Domain\Ranges\Metrics\Metrics;

use Tests\TestCase;
use App\Domain\Metrics\CirclePackMetric;

class CirclePackMetricTest extends TestCase
{
    /** @test */
    public function it_has_correct_component()
    {
        $sut = new FakeCirclePackMetric;

        $this->assertEquals('circle-pack-metric', $sut->component());
    }
}

class FakeCirclePackMetric extends CirclePackMetric
{
}

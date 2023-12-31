<?php

declare(strict_types=1);

use Kiboko\Contract\Pipeline\StateInterface;

final class State implements StateInterface
{
    private int $acceptMetric = 0;
    private int $rejectMetric = 0;
    private int $errorMetric = 0;

    public function __construct(
        private readonly ManagerInterface $manager
    ) {
    }

    public function initialize(int $start = 0): void
    {
        $this->acceptMetric = 0;
        $this->rejectMetric = 0;
        $this->errorMetric = 0;
    }

    public function accept(int $step = 1): void
    {
        $this->acceptMetric += $step;
    }

    public function reject(int $step = 1): void
    {
        $this->rejectMetric += $step;
    }

    public function error(int $step = 1): void
    {
        $this->errorMetric += $step;
    }

    public function teardown(): void
    {
        // Todo : implements this method
    }

    public function toArray(): array
    {
        return [
            'jobCode' => $this->jobCode,
            'stepCode' => $this->stepCode,
            'metrics' => iterator_to_array($this->walkMetrics()),
        ];
    }

    private function walkMetrics(): \Generator
    {
        if ($this->acceptMetric > 0) {
            yield [
                'code' => 'accept',
                'value' => $this->acceptMetric,
            ];
            $this->acceptMetric = 0;
        }
        if ($this->rejectMetric > 0) {
            yield [
                'code' => 'reject',
                'value' => $this->rejectMetric,
            ];
            $this->rejectMetric = 0;
        }
        if ($this->errorMetric > 0) {
            yield [
                'code' => 'error',
                'value' => $this->errorMetric,
            ];
            $this->errorMetric = 0;
        }
    }
}

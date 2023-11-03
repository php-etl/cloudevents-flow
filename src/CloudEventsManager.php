<?php

declare(strict_types=1);

final class CloudEventsManager implements ManagerInterface
{
    private \CloudEvents\Http\MarshallerInterface $marshaller;

    public function __construct(
        ?\CloudEvents\Http\MarshallerInterface $marshaller = null,
        private readonly \Psr\Http\Client\ClientInterface $client,
    ) {
        $this->marshaller = $this->marshaller ?? \CloudEvents\Http\Marshaller::createJsonMarshaller();
    }

    public function started($execution): void
    {
        $event = new \CloudEvents\V1\CloudEvent(
            (string) \Symfony\Component\Uid\Uuid::v4(),
            'https://test.localhost',
            'com.gyroscops.cloud.v1.command.WorkflowExecutionStarted',
            [
                'id' => $execution,
                'time' => new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
            ],
            'application/json',
            '{"type":"object","properties":{"id":{"type":"string"},"date":{"type":"string"}}}',
            time: new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
        );

        $request = $this->marshaller
            ->marshalStructuredRequest($event, 'POST', 'http://caddy/cloud-events')
            ->withHeader('Authorization', 'Bearer 1234');

        $response = $this->client->sendRequest($request);
    }

    public function updated(): void
    {
        $event = new \CloudEvents\V1\CloudEvent(
            (string) \Symfony\Component\Uid\Uuid::v4(),
            'https://test.localhost',
            'com.gyroscops.cloud.v1.command.WorkflowExecutionStarted',
            [
                'id' => '0000-0000-0000-0000',
                'time' => new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
            ],
            'application/json',
            '{"type":"object","properties":{"id":{"type":"string"},"date":{"type":"string"}}}',
            time: new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
        );

        $request = $this->marshaller
            ->marshalStructuredRequest($event, 'POST', 'http://caddy/cloud-events')
            ->withHeader('Authorization', 'Bearer 1234');

        $response = $this->client->sendRequest($request);
    }

    public function terminated(): void
    {
        $event = new \CloudEvents\V1\CloudEvent(
            (string) \Symfony\Component\Uid\Uuid::v4(),
            'https://test.localhost',
            'com.gyroscops.cloud.v1.command.WorkflowExecutionStarted',
            [
                'id' => '0000-0000-0000-0000',
                'time' => new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
            ],
            'application/json',
            '{"type":"object","properties":{"id":{"type":"string"},"date":{"type":"string"}}}',
            time: new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
        );

        $request = $this->marshaller
            ->marshalStructuredRequest($event, 'POST', 'http://caddy/cloud-events')
            ->withHeader('Authorization', 'Bearer 1234');

        $response = $this->client->sendRequest($request);
    }

    public function interrupted(): void
    {
        $event = new \CloudEvents\V1\CloudEvent(
            (string) \Symfony\Component\Uid\Uuid::v4(),
            'https://test.localhost',
            'com.gyroscops.cloud.v1.command.WorkflowExecutionStarted',
            [
                'id' => '0000-0000-0000-0000',
                'time' => new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
            ],
            'application/json',
            '{"type":"object","properties":{"id":{"type":"string"},"date":{"type":"string"}}}',
            time: new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
        );

        $request = $this->marshaller
            ->marshalStructuredRequest($event, 'POST', 'http://caddy/cloud-events')
            ->withHeader('Authorization', 'Bearer 1234');

        $response = $this->client->sendRequest($request);
    }

    public function resumed(): void
    {
        $event = new \CloudEvents\V1\CloudEvent(
            (string) \Symfony\Component\Uid\Uuid::v4(),
            'https://test.localhost',
            'com.gyroscops.cloud.v1.command.WorkflowExecutionStarted',
            [
                'id' => '0000-0000-0000-0000',
                'time' => new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
            ],
            'application/json',
            '{"type":"object","properties":{"id":{"type":"string"},"date":{"type":"string"}}}',
            time: new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
        );

        $request = $this->marshaller
            ->marshalStructuredRequest($event, 'POST', 'http://caddy/cloud-events')
            ->withHeader('Authorization', 'Bearer 1234');

        $response = $this->client->sendRequest($request);
    }

    public function finished(): void
    {
        $event = new \CloudEvents\V1\CloudEvent(
            (string) \Symfony\Component\Uid\Uuid::v4(),
            'https://test.localhost',
            'com.gyroscops.cloud.v1.command.WorkflowExecutionStarted',
            [
                'id' => '0000-0000-0000-0000',
                'time' => new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
            ],
            'application/json',
            '{"type":"object","properties":{"id":{"type":"string"},"date":{"type":"string"}}}',
            time: new \DateTimeImmutable(timezone: new DateTimeZone('UTC')),
        );

        $request = $this->marshaller
            ->marshalStructuredRequest($event, 'POST', 'http://caddy/cloud-events')
            ->withHeader('Authorization', 'Bearer 1234');

        $response = $this->client->sendRequest($request);
    }
}

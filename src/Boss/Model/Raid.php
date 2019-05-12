<?php

declare(strict_types=1);

namespace Raid\Boss\Model;

use DateTimeImmutable;
use DateTimeInterface;
use Raid\Player\Model\Party\Party;

/**
 * Raid
 */
class Raid
{
    /**
     * Boss
     *
     * @var BossInterface
     */
    private $boss;

    /**
     * Party
     *
     * @var Party
     */
    private $party;

    /**
     * Start time
     *
     * @var null|DateTimeImmutable
     */
    private $startedAt;

    /**
     * If the raid is currently active
     *
     * @var bool
     */
    private $isActive;

    /**
     * Constructor
     *
     * @param BossInterface $boss
     * @param Party         $party
     */
    public function __construct(BossInterface $boss, Party $party)
    {
        $this->boss      = $boss;
        $this->party     = $party;
        $this->isActive  = false;
    }

    /**
     * Returns boss
     *
     * @return BossInterface
     */
    public function getBoss(): BossInterface
    {
        return $this->boss;
    }

    /**
     * Returns party
     *
     * @return Party
     */
    public function getParty(): Party
    {
        return $this->party;
    }

    /**
     * Returns raid start time
     *
     * @return DateTimeInterface|null
     */
    public function getStartTime(): ?DateTimeInterface
    {
        return $this->startedAt;
    }

    /**
     * Starts encounter
     *
     * @return void
     */
    public function start(): void
    {
        $this->isActive  = true;
        $this->startedAt = new DateTimeImmutable();
    }
}

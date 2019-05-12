<?php

declare(strict_types=1);

namespace Raid\Boss\Model;

use Raid\Player\Model\Party\Party;

/**
 * Raid
 */
class Raid
{
    /**
     * Identifier
     *
     * @var string
     */
    private $id;

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
     * Constructor
     *
     * @param string        $id
     * @param BossInterface $boss
     * @param Party         $party
     */
    public function __construct(string $id, BossInterface $boss, Party $party)
    {
        $this->id       = $id;
        $this->boss     = $boss;
        $this->party    = $party;
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
     * Starts encounter
     *
     * @return void
     */
    public function start(): void
    {
        $this->party->participateInRaid($this->id);
    }
}

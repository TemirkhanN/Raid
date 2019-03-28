<?php

declare(strict_types=1);

namespace Raid\Player\Model;

use Raid\Player\ValueObject\PlayerPreset;

class Player
{
    private $name;

    /**
     * @var int
     */
    private $attack;

    /**
     * @var int
     */
    private $defence;

    /**
     * @var int
     */
    private $currentHealth;

    /**
     * @var int
     */
    private $maxHealth;

    public function __construct(PlayerPreset $playerPreset)
    {
        $this->name = $playerPreset->getName();
        $this->attack = $playerPreset->getAttack();
        $this->defence = $playerPreset->getDefence();
        $this->maxHealth = $playerPreset->getMaxHealth();
        $this->currentHealth = $this->maxHealth;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAttack(): int
    {
        return $this->attack;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @return int
     */
    public function getCurrentHealth(): int
    {
        return $this->currentHealth;
    }

    /**
     * @return int
     */
    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }
}

/*

package Player;

import Overseer.Subject;
import Overseer.Target;
import Player.Exception.LogicException;
import Skill.Skill;

import java.util.List;

public class Player implements Subject, Target {
    private String name;
    private Integer attack;
    private List<Integer> skills;
    private Party party;

    public Player (PlayerPreset preset) {
        name = preset.getName();
        skills = preset.getSkills();
        attack = preset.getAttack();
    }

    public String getName() {
        return name;
    }

    public int getAttack() {
        return attack;
    }

    public List<Integer> getSkills() {
        return skills;
    }

    public void useSkill(Skill skill, Target target) {

    }

    public Party partyUp(Player anotherPlayer) throws LogicException {
        if (party == null) {
            party = new Party(this);
        }

        if (party.isFull()) {
            throw new LogicException("Player");
        }

        party.addMember(anotherPlayer);

        return party;
    }
}
*/

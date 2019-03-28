<?php

declare(strict_types=1);

namespace Raid\Player\Model;

use Raid\Player\ValueObject\PlayerPreset;

class Player
{
    private $name;

    public function __construct(PlayerPreset $playerPreset)
    {
        $this->name = $playerPreset->getName();
    }

    public function getName(): string
    {
        return $this->name;
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

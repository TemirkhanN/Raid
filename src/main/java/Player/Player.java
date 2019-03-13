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
        if (party.isFull()) {
            throw new LogicException("Player");
        }

        if (party == null) {
            party = new Party(this);
        }

        party.addMember(anotherPlayer);

        return party;
    }
}
